<?php

namespace App\Http\Controllers;

use App\Models\ApiCaller;
use App\Models\CurlHelper;
use App\Models\UKApiCaller;
use App\Models\USApiCaller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FormController extends Controller
{
    public $transaction_id;

    public function index()
    {
        return view('apply');
    }

    /**
     * This function handles the Form Submit based on
     * the country code of the session.
     * @param $json
     * @param $country_code
     * @return JsonResponse
     */
    public function process($json, $country_code)
    {
//        $post = json_decode($request->getContent());

        var_dump($json);
        die();
        if ($request->isJson()) {
            $post = json_decode($request->getContent());
            var_dump($request->input());
            die();

        }

        var_dump($request->input());
        die();
        $t_id = $request->input('transaction_id') ?? 'DIRECT';
        $this->transaction_id = $t_id;
        // Add timestamps
        $_POST['request_affiliate_received_at'] = Carbon::now()->microsecond;

        Log::debug('DEBUG:: Data posted');
        Log::debug($request->input());
        Log::debug($this->transaction_id);
        Log::debug('DEBUG:: Inside process() with $country_code = ' . $country_code);

        // Default response in case of a silent error
        $response = [
            'status' => 'unknown'
        ];


        // Run the thing
        switch ($country_code) {
            case 'uk':
                $response = (new UKApiCaller)->execute($request, $this->transaction_id);
                Log::debug('DEBUG:: Calling UPing_UK_API_Caller_Model...');
                break;
            case 'us':
                $response = (new USApiCaller)->execute($request, $this->transaction_id);
                Log::debug('DEBUG:: Calling UPing_US_API_Caller_Model...');
                break;
            default:
                Log::debug('DEBUG:: Invalid country code specified: ' . print_r($country_code, true));
                break;
        }
        $response['response_affiliate_issued_at'] = Carbon::now()->microsecond;


        // Send the response
        Log::debug('DEBUG:: Response returned from model: ' . print_r($response, true));
//        $this->CheckStatusNew($country_code, $request);
//        return $response;
        return response()->json($response);
    }


    /**
     * Checks the status of the lead
     *
     * @param Request $request
     * @param $country_code
     * @param $check_status_id
     * @return JsonResponse
     */
    public function CheckStatusNew(Request $request, $country_code, $check_status_id)
    {
        Log::debug('DEBUG:: Checking Status for country code' . $country_code);
        Log::debug('DEBUG:: Post data received: ' . print_r($request->input(), true));

        $lead_log = DB::table('lead_logs')->where('check_status_id', '=', $check_status_id)->first();
        $lead_log_id = $lead_log->id;


        // Prepare the data
        $transaction_id = $lead_log->transaction_id ?? 'DIRECT';
        Log::debug('Transaction ID::', (array) $transaction_id);
        $oid = $request->input('oid');

        $data = [
            'leadid' => $request->input('leadid'),
            'oid' => $oid,
            'check_status_id' => $check_status_id,
            'transaction_id' => $transaction_id
        ];
//        dd($data);

        switch ($country_code) {
            case 'us':
                $url = config('constants.UPING_CHECK_STATUS_URL_US');
                break;

            default:
                $url = config('constants.UPING_CHECK_STATUS_URL_UK');
                break;
        }

        $data['id'] = $request->input('id');

        $res = (new CurlHelper)->curl_post($url . $check_status_id, '');
        Log::debug('DEBUG:: API URL for checking status: ' . $url);


        // Parse the response
        preg_match('/<Price>(.*?)<\/Price>/', (string)$res['res'], $price);
        preg_match('/<Response>(.*?)<\/Response>/', (string)$res['res'], $status);
        preg_match('/<Leadid>(.*?)<\/Leadid>/', (string)$res['res'], $leadid);
        preg_match('/<RedirectURL>(.*?)<\/RedirectURL>/', (string)$res['res'], $RedirectURL);
        preg_match('/<PercentageComplete>(.*?)<\/PercentageComplete>/', (string)$res['res'], $PercentageComplete);
        preg_match('/<LanderFound>(.*?)<\/LanderFound>/', (string)$res['res'], $LanderFound);
        preg_match('/<Threshold>(.*?)<\/Threshold>/', (string)$res['res'], $Threshold);
        preg_match('/<ThresholdAmount>(.*?)<\/ThresholdAmount>/', (string)$res['res'], $ThresholdAmount);
        preg_match('/<model_type>(.*?)<\/model_type>/', (string)$res['res'], $ModelType);
        preg_match('/<CheckStatusID>(.*?)<\/CheckStatusID>/', (string)$res['res'], $CheckStatusID);
        preg_match('/<CheckStatus>(.*?)<\/CheckStatus>/', (string)$res['res'], $CheckStatus);
        preg_match('/<CheckStatusURL>(.*?)<\/CheckStatusURL>/', (string)$res['res'], $CheckStatusURL);
        preg_match('/<PostbackMethod>(.*?)<\/PostbackMethod>/', (string)$res['res'], $postback_method);
        preg_match('/<IframeURL>(.*?)<\/IframeURL>/', (string)$res['res'], $iframe_url);
        $url_uping = '';
        $response_uping['res'] = 'No response yet';


        // Check lead status
        if (isset($status[1]) && $status[1] == 'LenderFound') {
            $res = ApiCaller::update_lead_id_data($lead_log_id, $leadid[1], $status[1], $res);
            // Lead is accepted by a lender
            Log::debug('DEBUG:: Lead accepted by buyer');

            $data = [
                'status' => 'success',
                'RedirectURL' => $RedirectURL[1],
                'Price' => $price[1],
                'Threshold' => $Threshold[1] ?? "",
//                'ThresholdAmount' => $ThresholdAmount[1] ?? "",
            ];
//            var_dump($Threshold);
//            die();

            Log::info('HERE');
            // Fire the postback
            if (isset($Threshold[1]) && $Threshold[1] == 'true') {
                if ($postback_method[1] == 'iframe') {
                    // Iframe postback
                    // Rev-share
                    Log::debug('DEBUG:: Preparing iframe postback');
                    $data['load_iframe'] = $iframe_url[1];
                }
            } else {
                Log::info('POSTBACK HERE');

                $url_uping = config('constants.UPING_POSTBACK_URL');


                $parameters = array(
                    'offer_id' => $lead_log->oid,
                    'partner_id' => $lead_log->vid,
                    'lead_id' => $leadid[1],
                    'amount' => $price[1] ?? '',
                    'transaction_id' => $lead_log->transaction_id,
                    'aff_sub' => $lead_log->aff_sub ?? '',
                    'aff_sub2' => $lead_log->aff_sub2 ?? '',
                    'aff_sub3' => $lead_log->aff_sub3 ?? '',
                    'aff_sub4' => $lead_log->aff_sub4 ?? '',
                    'aff_sub5' => $lead_log->aff_sub5 ?? ''
                );

                // Build our query.
//                $query = http_build_query($parameters);
                Log::debug('PB Query:: ', (array) $parameters);


                // HTTP postback
                if (isset($ModelType[1]) && $ModelType[1] === 'CPA' || 'CPL' || 'CPF') {
                    // CPA & CPL
                    Log::debug('DEBUG:: Firing postback for CPA/CPL');
                    $response_uping = (new CurlHelper)->curl_postback($url_uping, $parameters, '');
                    Log::debug('PB:: Response', (array)$response_uping);

                } else {
                    // Rev-share
                    Log::debug('DEBUG:: Firing postback for CPS');
                    $response_uping = (new CurlHelper)->curl_postback($url_uping, $parameters, '');
                    Log::debug('PB:: Response', (array)$response_uping);
                }
            }
        }
        if (isset($status[1]) && $status[1] == 'NoLenderFound') {
            $res = ApiCaller::update_lead_id_data($lead_log_id, $leadid[1], $status[1], $res);
            // Lead is either rejected by the lender
            Log::debug('DEBUG:: Lead rejected by buyer');

            $data = array(
                'status' => 'rejected',
                'PercentageComplete' => '100',
                'RedirectURL' => ''
            );
        }

        if (isset($CheckStatus[1]) && $CheckStatus[1] == 'pending') {
//            $res = ApiCaller::update_lead_id_data($lead_log_id, $leadid[1], $status[1], $res);
            Log::debug('DEBUG:: Lead processing');

            $data = [
                'status' => 'pending',
                'RedirectURL' => $CheckStatus[1],
                'PercentageComplete' => $PercentageComplete[1],
            ];
        }


        Log::debug('DEBUG:: Final prepared response: ' . print_r($data, true));
//        dd($data);

//        $data['check_status_id'] = $CheckStatusID[1];
//        $data['response_affiliate_received_at'] = $response_affiliate_received_at;
        $data['response_affiliate_issued_at'] = Carbon::now()->microsecond;

// Send the response
        return response()->json($data, 200);
    }


    /**
     *
     * @param $country_code
     * @param $request
     */
    public
    function last_check_status($country_code, $request)
    {
        dd($request);
        Log::debug('DEBUG: Last Check status for country code ' . $country_code);
        Log::debug('DEBUG: Post data received: ' . print_r($request->input(), true));

        // Prepare the data
        $transaction_id = $request->input('transaction_id');
        $oid = $request->input('oid');

        $data = [
            'leadid' => $request->input('leadid'),
            'oid' => $request->input('oid'),
            'request_client_issued_at' => $request->input('start'),
            'request_affiliate_received_at' => Carbon::now()->microsecond,
            'check_status_id' => $request->input('id'),
        ];

        switch ($country_code) {
            case 'us':
                $url = config('constants.UPING_LAST_CHECK_STATUS_URL_US');
                break;

            default:
                $url = config('constants.UPING_LAST_CHECK_STATUS_URL_UK');
                break;
        }
        Log::debug('DEBUG: API URL for checking status: ' . $url);

        // Execute the request
        $data['id'] = $request->input('id');
        $data['request_affiliate_issued_at'] = Carbon::now()->microsecond;
        $data['response_affiliate_received_at'] = $request->input('prev_response_affiliate_received_at');
        $data['response_affiliate_issued_at'] = $request->input('prev_response_affiliate_issued_at');
        $data['response_client_received_at'] = $request->input('prev_response_client_received_at');
        $res = curl_post($url, $data);
        Log::debug('DEBUG: API response: ' . print_r($res, true));
    }

    /**
     *
     * @param $search_term
     */
    public
    function get_bank_suggestions($search_term)
    {
//        Library::
//        $this->load->library('pingyo');
//        $api_result = $this->pingyo->search_banks($search_term);
//        echo json_encode($api_result);
    }

    /**
     *
     * @param $search_term
     */
    public
    function get_bank($search_term)
    {
//        $this->load->library('pingyo');
//        $api_result = $this->pingyo->search_branches($search_term);
//        echo json_encode($api_result);
    }

    /**
     *
     * @param $zipcode
     */
    public
    function get_address_suggestions($zipcode)
    {
//        $this->load->library('pingyo');
//        $api_result = $this->pingyo->search_addresses($zipcode);
//        echo json_encode($api_result);
    }
}
