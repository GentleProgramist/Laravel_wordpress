<?php
namespace UPing;


use Illuminate\Support\Facades\Log;

class Status
{

    public $httpcode = "";
    public $errors = "";
    public $correlationid = "";
    public $message = "";
    public $statuscheckurl = "";

    public $percentagecomplete = 0;
    public $redirecturl = "";
    public $status = "";
    public $estimatedcommission = "";

    private $logger = null;

    function __construct(
        $http_code,
        $json_response,
        $correlationid = null,
        \Psr\Log\LoggerInterface $logger = null
    )
    {
        $xml_file = simplexml_load_string($json_response);
        $json = json_encode( $xml_file );
//        dd($json);
//        $json_response = json_decode($json,TRUE);

//        dd($array);
        if (!is_null($logger)) {
            $this->logger = $logger;
        }

        if (!is_null($correlationid)) {
            $this->correlationid = $correlationid;
            $this->statuscheckurl = '/application/usa/status/' . $correlationid;
        } else {
            $r = (object)json_decode($json, TRUE);
//            dd($r);
            $this->httpcode = $http_code;
//            dd($this->httpcode);
            if (isset($r->Errors)) {
                $this->errors = $r->Errors;
            }
            if (isset($r->CheckStatusID)) {
                $this->correlationid = $r->CheckStatusID;
            }
            if (isset($r->Message)) {
                $this->message = $r->Message;
            }
            if (isset($r->CheckStatusURL)) {
                $this->statuscheckurl = $r->CheckStatusURL;
            }
        }
    }

    public static function CreateFromCorrelationId($correlationid, \Psr\Log\LoggerInterface $logger = null)
    {
        return new Status(null, null, $correlationid, $logger);
    }

    public function refresh()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Status::refresh()");
        }
        $ch = curl_init();

//        dd($this->statuscheckurl);
        if (!is_null($this->logger)) {
            $this->logger->info("status request sent: http://127.0.0.1:8002/api" . $this->statuscheckurl);
        }

        curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1:8002/api" . $this->statuscheckurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept: application/json, text/javascript, *.*',
            'Content-type: application/json; charset=utf-8',
            'Expect:',
            'Authorization: Bearer 1|mJwzwA1pUUOhvfYrchYqsuf9hGatl2Lc1OKJTLPH',

        ));
        //Authorization: Bearer 3|9GnlM0TYWqlyUQj5degwI5nv7m6AmOMzHoaQ1sPA

        $server_output = curl_exec($ch);
//        dd($server_output);
        $xml_file = simplexml_load_string($server_output);
        $json = json_encode( $xml_file );

        if (!is_null($this->logger)) {
            $this->logger->info('got response: ' . $server_output);
        }

        $r = (object)json_decode($json, TRUE);
        Log::debug('Status Response::', (array) $r);
        if (isset($r->PercentageComplete)) {
            $this->percentagecomplete = $r->PercentageComplete;
        }
        if (isset($r->RedirectURL)) {
            $this->redirecturl = $r->RedirectURL;
        }
        if (isset($r->Message)) {
            $this->message = $r->Message;
        }
        if (isset($r->Response)) {
            $this->status = $r->Response;
        }
        if (isset($r->Price)) {
            $this->estimatedcommission = $r->Price;
        }

        $info = curl_getinfo($ch);
        curl_close($ch);

        return $r;
    }

}
