<?php
//namespace App\Buyerapis\vendor\BizFellaUSA;
namespace UPing;



class Consent
{

    public $consentFinancial;
    public $consentThirdPartyEmails;
    public $consentThirdPartyPhone;
    public $consentThirdPartySMS;

    private $logger = null;

    public function attachLogger(\Psr\Log\LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

    public function toJson()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Consent::toJson() called");
        }
        $r = $this->validate();
        if ($r === true) {
            return json_encode($this->toArray());
        }  else {
			echo "not valid";
		}
    }

    public function validate()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Consent::validate() called");
        }
        $validator = new ExtendedValidator(array(
            'consentFinancial' => $this->consentFinancial,
            'consentThirdPartyEmails' => $this->consentThirdPartyEmails,
            'consentThirdPartyPhone' => $this->consentThirdPartyPhone,
            'consentThirdPartySMS' => $this->consentThirdPartySMS,

        ));
        $validator->rules($this->getValidationRules());
        if ($validator->validate()) {
            if (!is_null($this->logger)) {
                $this->logger->info("Consent validation passed");
            }
            return true;
        } else {
            if (!is_null($this->logger)) {
             $this->logger->warning("Consent validation errors found: ",
             array('errors' => $validator->errors()));
            }
            return $validator->errors();
            //print_r($validator->errors());
        }
    }

    private function getValidationRules()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Consent::getValidationRules() called");
        }
        return [
            'required' => [
                [
                    [
                        'credit_check',
//                        'remarketing_email',
//                        'remarketing_phone',
//                        'remarketing_sms',
                    ]
                ]
            ],
        ];
    }

    private function getTodayDate()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Consent::getTodayDate() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        return $date;
    }

    private function getValidPAYDATE()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Consent::getValidPAYDATE() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        $date->add(date_interval_create_from_date_string('45 days'));
        return $date;
    }

    private function getValidDOB()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Consent::getValidDOB() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        $date->sub(date_interval_create_from_date_string('18 years'));
        return $date;
    }

    public function toArray()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Consent::toArray() called");
        }
        $r = $this->validate();
        if ($r === true) {
            return [
                'consentFinancial' => $this->consentFinancial,
                'consentThirdPartyEmails' => $this->consentThirdPartyEmails,
                'consentThirdPartyPhone' => $this->consentThirdPartyPhone,
                'consentThirdPartySMS' => $this->consentThirdPartySMS,
            ];
		} else {
//            dd('Not Valid');
			echo "not valid application details<br>";
        }
    }

    private function strDateToJsonDate($strdate)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Consent::strDateToJsonDate() called with strdate=$strdate");
        }
//        dd(555);
        $date = new \DateTime($strdate, new \DateTimeZone("UTC"));
        return '/Date(' . ($date->getTimestamp() * 1000) . ')/';
    }

    private function NormalizePhone($phone, $country)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Consent::NormalizePhone() called with phone=$phone and country=$country");
        }
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $swissNumberProto = $phoneUtil->parse($phone, $country);
        //PhoneNumberFormat::NATIONAL or PhoneNumberFormat::INTERNATIONAL
        return $phoneUtil->format($swissNumberProto, \libphonenumber\PhoneNumberFormat::NATIONAL);
    }

}
