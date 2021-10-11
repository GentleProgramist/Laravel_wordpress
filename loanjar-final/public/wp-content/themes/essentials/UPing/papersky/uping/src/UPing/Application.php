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

    public $source;
    public $loan;
    public $applicant;
    public $residence;
    public $employment;
    public $bank;
    public $consent;

//    public $mincommissionamount;
//    public $maxcommissionamount;
//    public $tier;

    private $connection_status = false;
    private $logger = null;

    private $validation_rules = [
        'required' => [
            [[ 'timeout', 'source', 'loan', 'applicant', 'residence', 'employment', 'bank', 'consent']]
        ],
        'integer' => [
            [['timeout']]
        ],
        'min' => [
            [['timeout'], 45]
        ],
        'max' => [
            [['timeout'], 120]
        ],
        'instanceOf' => [
            [['source'], 'UPing\Source'],
            [['loan'], 'UPing\Loan'],
            [['applicant'], 'UPing\Applicant'],
            [['residence'], 'UPing\Residence'],
            [['employment'], 'UPing\Employment'],
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
    public function setEmploymentDetails(Employment $employment)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Application::setEmploymentDetails() called with $employment=" . var_export($employment,
                    true));
        }
        $this->employment = $employment;
        if (!is_null($this->logger)) {
            $employment->attachLogger($this->logger);
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

    public function send()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Application::send() called");
        }
        $r = $this->validate();
//        $r = true;
        if ($r === true) {
            $request = $this->toJson();


            if (!is_null($this->logger)) {
                $this->logger->info("request sent: " . $request);
            }

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLINFO_HEADER_OUT, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Accept: application/json, text/javascript, *.*',
                'Content-type: application/json; charset=utf-8',
                'Expect:'
            ));


            $server_output = curl_exec($ch);
            dd($server_output);
            Log::debug('PingYo::', (array) $server_output);
            $info = curl_getinfo($ch);

            if (!is_null($this->logger)) {
                $this->logger->info("got response with code " . $info['http_code'] . ': ' . $server_output);
            }

            curl_close($ch);
            $this->connection_status = $info;
            return new Status($info['http_code'], $server_output, null, $this->logger);
        } else {
			//echo "APPLI no valido";
            return false;
        }
    }

    public function validate($full_validation = true)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Application::validate() called with full_validation=$full_validation");
        }

        $validator = new ExtendedValidator(array(
                'source' => $this->source,
                'loan' => $this->loan,
                'applicant' => $this->applicant,
                'employment' => $this->employment,
                'residence' => $this->residence,
                'bank' => $this->bank,
            ));
        $validator->rules($this->validation_rules);
        if ($validator->validate()) {
            if ($full_validation) {
//                if (($this->applicationdetails->validate()) && ($this->sourcedetails->validate())) {
                    if (!is_null($this->logger)) {
                        $this->logger->info("Application validation passed");
//                    }
                    //echo " valido 1";
                    return true;
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
//        $r = $this->validate();
        $r = true;
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
//        $r = $this->validate();
        $r = true;
        if ($r === true) {
             return [
                'Params' => $this->params,
                'Loan' => $this->loan,
                'Applicant' => $this->applicant,
                'Employment' => $this->employment,
                'Residence' => $this->residence,
                'Bank' => $this->bank,
                'Consent' => $this->consent,
            ];

        } else {
            return false;
        }
    }
}
