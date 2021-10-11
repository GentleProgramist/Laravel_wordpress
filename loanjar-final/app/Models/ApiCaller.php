<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Kyranb\Footprints\TrackableInterface;
use Kyranb\Footprints\TrackRegistrationAttribution;

class ApiCaller extends Model
{
    use HasFactory;

    var $validation_errors;
    var $mapped_data;
    var $uping_response;
    var $postback_response;
    var $country_code;
    var $urls;
    var $lead_log_id;

    function __construct()
    {
        parent::__construct();
        $this->mapped_data = [];
        $this->validation_errors = false;
        $this->urls = [
            'application_submit_url_usa' => config('constants.application_submit_url_usa'),
            'application_submit_url_uk' => config('constants.application_submit_url_uk'),
        ];
    }

    /**
     *
     * @param Request $request
     * @return array
     */
    function execute(Request $request, $transaction_id)
    {

//        dd($leadlogid);
        $leadlogid = $this->add_lead_log($request, $this->mapped_data);

        $this->validate_data($request);
        if ($this->validation_errors === false) {
            $post = $this->prep_data($request);
            $this->map_data($request, $post, $transaction_id);
            $this->update_lead_log_data($leadlogid, $this->mapped_data);


            $response = $this->post_data($this->mapped_data);

        } else {
            $response['status'] = 'validation_errors';
            $response['errors'] = $this->validation_errors;
        }
        $this->update_lead_log($leadlogid, $response);
        return $response;
    }


    /**
     *  Validates the data before sending to u-ping
     *
     * @param $request
     * @param $mapped_data
     * @return int
     */
    function add_lead_log($request, $mapped_data)
    {
        $query = DB::table('lead_logs')->insertGetId([
            'vid' => $request->input('vid'),
            'oid' => $request->input('oid'),
            'transaction_id' => $request->input('transaction_id'),
            'country_code' => $this->country_code,
            'data' => json_encode($request->input()),
            'response' => ''
        ]);
        $leadlogid = $query;

        return $leadlogid;
    }



    /**
     * Add a lead log
     *
     * @param $request
     * @return array
     */
    function post_data($request)
    {

        $this->uping_response =
            (new CurlHelper)->curl_post($this->urls['application_submit_url_usa'], $this->mapped_data);

        $response_affiliate_received_at = Carbon::now()->microsecond;

        libxml_use_internal_errors(true);

        $doc = simplexml_load_string($this->uping_response['res']);

        $url_uping = '';
        $this->postback_response['res'] = '';

        if (!$doc) {

            $data['status'] = 'error';
            $data['error'] = 'Invalid XML response from u-ping';
            $data['response'] = $this->uping_response['res'];
            $data['model_type'] = $this->uping_response['res'][0];

        } else {

            // Check for validation errors from U-PING
            if (preg_match('/<Errors>(.*?)<\/Errors>/', (string)$this->uping_response['res'], $Errors) === 1) {
                $data['status'] = 'buyer-error';
                $data['error'] = $Errors;
                $data['response'] = $this->uping_response['res'];
            } else {

                // Extract data from XML
                preg_match('/<Price>(.*?)<\/Price>/', (string)$this->uping_response['res'], $price);
                preg_match('/<Response>(.*?)<\/Response>/', (string)$this->uping_response['res'], $status);
                preg_match('/<Leadid>(.*?)<\/Leadid>/', (string)$this->uping_response['res'], $pingid);
                preg_match('/<RedirectURL>(.*?)<\/RedirectURL>/', (string)$this->uping_response['res'], $RedirectURL);
                preg_match('/<Thresold>(.*?)<\/Thresold>/', (string)$this->uping_response['res'], $Thresold);
                preg_match('/<model_type>(.*?)<\/model_type>/', (string)$this->uping_response['res'], $ModelType);
                preg_match('/<ThresoldAmount>(.*?)<\/ThresoldAmount>/', (string)$this->uping_response['res'], $ThresoldAmount);
                preg_match('/<Descriptions>(.*?)<\/Descriptions>/', (string)$this->uping_response['res'], $Descriptions);
                preg_match('/<CheckStatusID>(.*?)<\/CheckStatusID>/', (string)$this->uping_response['res'], $CheckStatusID);
                preg_match('/<CheckStatus>(.*?)<\/CheckStatus>/', (string)$this->uping_response['res'], $CheckStatus);

                $check_status_id = $CheckStatusID[1];
                $transaction_id = $this->mapped_data->transaction_id;

                $lead_log = $this->update_check_status_id($transaction_id, $check_status_id);


                $params = [];
                $params['transaction_id'] = $this->mapped_data->transaction_id ?? null;
                $params['offer_id'] = $this->mapped_data->oid;
                $params['partner_id'] = $this->mapped_data->vid;
                $params['aff_sub'] = $this->mapped_data->aff_sub ?? null;
                $params['aff_sub2'] = $this->mapped_data->aff_sub2 ?? null;
                $params['aff_sub3'] = $this->mapped_data->aff_sub3 ?? null;
                $params['aff_sub4'] = $this->mapped_data->aff_sub4 ?? null;
                $params['aff_sub5'] = $this->mapped_data->aff_sub5 ?? null;
                $params['amount'] = $price[1] ?? '0.00';
                $params['lead_id'] = $pingid[1] ?? '';

                $url_uping = '';
                $header = '';



                if (isset($status[1]) && $status[1] == 'LenderFound' && !empty($transaction_id)) {
                    Log::debug('here');

                    // CPS
                    if (!empty($ModelType[1]) && $ModelType[1] === 'CPS') {
                        $url_uping = config('constants.UPING_POSTBACK_URL');
                        $this->postback_response = (new CurlHelper)->curl_postback($url_uping, $params, $header);
                        Log::debug('PB RES::', (array) $this->postback_response);
                    // CPA/ CPL -> Accumulator
                    } elseif ($Thresold[1] == 'true') {
                        $url_uping = config('constants.UPING_POSTBACK_URL');
                        $this->postback_response = (new CurlHelper)->curl_postback($url_uping, $params, $header);
                        Log::debug('PB RES::', (array) $this->postback_response);
                    }

                }

                if (isset($status[1]) && $status[1] == 'LenderFound') {

                    $data = array(
                        'status' => 'success',
                        'RedirectURL' => $RedirectURL[1],
                        'Leadid' => $pingid[1]);
                }

                if (isset($status[1]) && $status[1] == 'NoLenderFound') {

                        $data = array(
                            'status' => 'rejected',
                            'message' => 'No Lender Found',
//                            'field_errors' => $Descriptions[1],
                        );
                }

                if (isset($Descriptions[1]) && !empty($Descriptions[1])) {

                    $data = array(
                        'status' => 'form_validation_errors',
                        'message' => 'Please correct the form validation errors',
                        'field_errors' => $Descriptions[1],
                    );
                }


                $data = [
                    'status' => 'pending',
                    'message' => 'processing',
                    'uping_response' => $this->uping_response,
                    'RedirectURL' => ''
                ];



//                dd($data);
                $data['check_status_id'] = $CheckStatusID[1];
                $data['check_status'] = $CheckStatus[1];
                $data['response_affiliate_received_at'] = $response_affiliate_received_at;


            }
        }

        // Check if a valid lead ID was returned from U-PING
        $invalid_lead_id = false;
        if (!isset($data['Leadid'])) {
            $invalid_lead_id = 'NULL';
            Log::debug('DEBUG: INVALID LEAD ID: NULL');
        } else if (trim($data['Leadid']) == '' || !is_numeric($data['Leadid'])) {
            $invalid_lead_id = print_r($data['Leadid'], true);
            Log::debug('DEBUG: INVALID LEAD ID: ' . $invalid_lead_id);
        }

        // Send an alert email
        if ($invalid_lead_id !== false) {
            $message = 'An application at Loan-Pal returned an invalid lead ID from UPING. Please find the details below.';
            $message .= "\n\n" . "\n\n" . 'POST DATA';
            $message .= "\n\n" . json_encode($this->mapped_data, JSON_PRETTY_PRINT);
            $message .= "\n\n" . "\n\n" . 'UPING RESPONSE (' . $url_uping . ')';
            $message .= "\n\n" . json_encode($this->uping_response, JSON_PRETTY_PRINT);
            @mail("tom@uping.co.uk", "Loan-Pal: Invalid Lead ID: " . $invalid_lead_id, $message);
        }

        return $data;
    }

    /**
     * @param $transaction_id
     * @param $check_status_id
     * @return int
     */
    public function update_check_status_id($transaction_id, $check_status_id)
    {
        $query = DB::table('lead_logs')
            ->where('transaction_id', $transaction_id)
            ->update([
                'check_status_id' => $check_status_id,

            ]);

        return $query;
    }

    /**
     * Update lead log with response bs
     * @param $response
     * @param $leadlogid
     */
    function update_lead_log($leadlogid, $response)
    {

        $query = DB::table('lead_logs')
            ->where('id', $leadlogid)
            ->update([
                'lead_id' => $response['status'],
                'response_code' => $response['status'],
                'response' => json_encode($response),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }

    /**
     * Update lead log with response bs
     * @param $lead_log_id
     * @param $leadid
     * @param $status
     * @param $response
     * @return int
     */
    public static function update_lead_id_data($lead_log_id, $leadid, $status, $response)
    {

        $query = DB::table('lead_logs')
            ->where('id', $lead_log_id)
            ->update([
                'lead_id' => $leadid,
                'response_code' => $status,
                'response' => json_encode($response),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        return $query;

    }

    /**
     * Update lead log with response bs
     * @param $leadlogid
     * @param $mapped_data
     */
    function update_lead_log_data($leadlogid, $mapped_data)
    {

        $query = DB::table('lead_logs')
            ->where('id', $leadlogid)
            ->update([
                'transaction_id' => $mapped_data->transaction_id,
                'aff_sub' => $mapped_data->aff_sub,
                'aff_sub2' => $mapped_data->aff_sub2,
                'aff_sub3' => $mapped_data->aff_sub3,
                'aff_sub4' => $mapped_data->aff_sub4,
                'aff_sub5' => $mapped_data->aff_sub5,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

    }

//    public function trackRegistration(Request $request): void
//    {
//        // TODO: Implement trackRegistration() method.
//    }

//    /**
//     * The event map for the model.
//     *
//     * @var array
//     */
//    protected $dispatchesEvents = [
//        'saved' => UserSaved::class,
//        'deleted' => UserDeleted::class,
//    ];

}
