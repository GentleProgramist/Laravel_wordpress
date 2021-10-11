<?php
//namespace BizFellaUSA;
namespace UPing;



use Illuminate\Support\Facades\Log;

class Application
{

    public $vid;
    public $subid;
    public $timeout;
    public $istest;

    public $application;
    public $source;
    public $loan;
    public $applicant;
    public $residence;
    public $employer;
    public $bank;
    public $consent;

//    public $mincommissionamount;
//    public $maxcommissionamount;
//    public $tier;

    private $connection_status = false;
    private $logger = null;

    private $validation_rules = [
        'required' => [
            [[
//                'application',
                'source', 'loan', 'applicant', 'residence', 'employer', 'bank'
            ]]
        ],
//        'integer' => [
//            [['timeout']]
//        ],
//        'min' => [
//            [['timeout'], 45]
//        ],
//        'max' => [
//            [['timeout'], 120]
//        ],
        'instanceOf' => [
//            [['application'], 'UPing\Application'],
            [['source'], 'UPing\Source'],
            [['loan'], 'UPing\Loan'],
            [['applicant'], 'UPing\Applicant'],
            [['residence'], 'UPing\Residence'],
            [['employer'], 'UPing\Employer'],
            [['bank'], 'UPing\Bank'],
            [['consent'], 'UPing\Consent'],
        ]
    ];

    public function attachLogger(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function setSourceDetails(Source $source)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Application::setSourceDetails() called with source=" . var_export($source,
                    true));
        }
        $this->source = $source;
        if (!is_null($this->logger)) {
            $source->attachLogger($this->logger);
        }
    }
    public function setApplicationDetails(Application $application)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Application::setSourceDetails() called with application=" . var_export($application,
                    true));
        }
        $this->application = $application;
        if (!is_null($this->logger)) {
            $application->attachLogger($this->logger);
        }
    }
    public function setApplicantDetails(Applicant $applicant)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Application::setApplicantDetails() called with applicant=" . var_export($applicant,
                    true));
        }
        $this->applicant = $applicant;
        if (!is_null($this->logger)) {
            $applicant->attachLogger($this->logger);
        }
    }
    public function setLoanDetails(Loan $loan)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Application::setLoanDetails() called with loan=" . var_export($loan,
                    true));
        }
        $this->loan = $loan;
        if (!is_null($this->logger)) {
            $loan->attachLogger($this->logger);
        }
    }
    public function setEmployerDetails(Employer $employer)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Application::setEmployerDetails() called with $employer=" . var_export($employer,
                    true));
        }
        $this->employer = $employer;
        if (!is_null($this->logger)) {
            $employer->attachLogger($this->logger);
        }
    }
    public function setResidenceDetails(Residence $residence)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Application::setResidenceDetails() called with $residence=" . var_export($residence,
                    true));
        }
        $this->residence = $residence;
        if (!is_null($this->logger)) {
            $residence->attachLogger($this->logger);
        }
    }
    public function setBankDetails(Bank $bank)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Application::setBankDetails() called with $bank=" . var_export($bank,
                    true));
        }
        $this->bank = $bank;
        if (!is_null($this->logger)) {
            $bank->attachLogger($this->logger);
        }
    }
    public function setConsentDetails(Consent $consent)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Application::setConsentDetails() called with $consent=" . var_export($consent,
                    true));
        }
        $this->consent = $consent;
        if (!is_null($this->logger)) {
            $consent->attachLogger($this->logger);
        }
    }


    public function get_connection_status()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Application::get_connection_status() called");
        }
        return $this->connection_status;
    }

    public function send($application)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Application::send() called");
        }
        $r = $this->validate();
        if ($r === true) {
//            $request = $this->toJson();
            $request = json_encode($application);
//            dd($request);



            if (!is_null($this->logger)) {
                $this->logger->info("request sent: " . $request);
            }

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1:8002/api/application/usa/post");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
//            curl_setopt($ch, CURLOPT_TIMEOUT, $application->timeout);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLINFO_HEADER_OUT, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Accept: application/json, text/javascript, *.*',
                'Content-type: application/json; charset=utf-8',
                'Expect:',
                'Authorization: Bearer 1|mJwzwA1pUUOhvfYrchYqsuf9hGatl2Lc1OKJTLPH',
            ));


            $server_output = curl_exec($ch);
            Log::debug('UPING::', (array) $server_output);
            $info = curl_getinfo($ch);

            if (!is_null($this->logger)) {
                $this->logger->info("got response with code " . $info['http_code'] . ': ' . $server_output);
            }

//            if (curl_errno($ch)) {
//                $server_output = "CURL ERROR: " . curl_error($ch);
//            } else if (empty($server_output)) {
//                $server_output = "Time out - ($application->timeout secs)"; // Timeout in $t1 secs
//            }
//            Log::debug('DEBUG:: CURL response details: ' . print_r($server_output, true));


            curl_close($ch);
            $this->connection_status = $info;
            return new Status($info['http_code'], $server_output, null, $this->logger);
        }
        else {
			echo "APPLI no valido";
            return false;
        }
    }

    public function validate($full_validation = true)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Application::validate() called with full_validation=$full_validation");
        }

        $validator = new ExtendedValidator(array(
                'application' => $this->application,
                'source' => $this->source,
                'loan' => $this->loan,
                'applicant' => $this->applicant,
                'employer' => $this->employer,
                'residence' => $this->residence,
                'bank' => $this->bank,
            ));
//        dd($validator);
        $validator->rules($this->validation_rules);
        if ($validator->validate()) {
            if ($full_validation) {
                if (($this->applicant->validate()) && ($this->source->validate())) {
                    return true;
                    //echo " valido 1";

                } else {
                        if (!is_null($this->logger)) {
                        $this->logger->warning("Application validation errors found in child object");
                    }
                    //echo "NO valido 1";
                    return false;
                }
            } else {
				//echo " valido 2";
                return true;
            }
        } else {
            dd(222);
			//echo "NO valido 2";
            if (!is_null($this->logger)) {
                $this->logger->warning("Application validation errors found in main object: ",
                    array('errors' => $validator->errors()));
            }
            return $validator->errors();
        }
    }

    public function toJson()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Application::toJson() called");
        }
        $r = $this->validate();
        if ($r === true) {
            return json_encode($this->toArray());
        } else {
            return false;
        }
    }

    public function toArray()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Application::toArray() called");
        }
        $r = $this->validate();
        if ($r === true) {
             return [
//                'application' => $this->application,
                'source' => $this->source,
                'loan' => $this->loan,
                'applicant' => $this->applicant,
                'employer' => $this->employer,
                'residence' => $this->residence,
                'bank' => $this->bank,
                'consent' => $this->consent,
            ];

        } else {
            return false;
        }
    }
}
