<?php
//namespace App\Buyerapis\vendor\BizFellaUSA;
namespace BizFellaUSA;

class Params
{

    public $user_ip;
    public $form_url;
    public $referer_url;
    public $user_agent;

    private $logger = null;

    public function attachLogger(\Psr\Log\LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

    public function toJson()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Params::toJson() called");
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
            $this->logger->debug("Params::validate() called");
        }
        $validator = new ExtendedValidator(array(
            'user_ip' => $this->user_ip,
            'form_url' => $this->form_url,
            'referer_url' => $this->referer_url,
            'user_agent' => $this->user_agent,

        ));
        $validator->rules($this->getValidationRules());
        if ($validator->validate()) {
            if (!is_null($this->logger)) {
                $this->logger->info("Params validation passed");
            }
            return true;
        } else {
            if (!is_null($this->logger)) {
             $this->logger->warning("Params validation errors found: ",
             array('errors' => $validator->errors()));
            }
            return $validator->errors();
            //print_r($validator->errors());
        }
    }

    private function getValidationRules()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Params::getValidationRules() called");
        }
        return [
            'required' => [
                [
                    [
                        'user_ip',
                        'form_url',
                        'referer_url',
                        'user_agent',
                    ]
                ]
            ],
        ];
    }

    private function getTodayDate()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Params::getTodayDate() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        return $date;
    }

    private function getValidPAYDATE()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Params::getValidPAYDATE() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        $date->add(date_interval_create_from_date_string('45 days'));
        return $date;
    }

    private function getValidDOB()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Params::getValidDOB() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        $date->sub(date_interval_create_from_date_string('18 years'));
        return $date;
    }

    public function toArray()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Params::toArray() called");
        }
        $r = $this->validate();
        if ($r === true) {
            return [
                'user_ip' => $this->user_ip,
                'form_url' => $this->form_url,
                'referer_url' => $this->referer_url,
                'user_agent' => $this->user_agent,

            ];
		} else {
//            dd('Not Valid');
			echo "not valid application details<br>";
        }
    }

    private function strDateToJsonDate($strdate)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Params::strDateToJsonDate() called with strdate=$strdate");
        }
//        dd(555);
        $date = new \DateTime($strdate, new \DateTimeZone("UTC"));
        return '/Date(' . ($date->getTimestamp() * 1000) . ')/';
    }

    private function NormalizePhone($phone, $country)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Params::NormalizePhone() called with phone=$phone and country=$country");
        }
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $swissNumberProto = $phoneUtil->parse($phone, $country);
        //PhoneNumberFormat::NATIONAL or PhoneNumberFormat::INTERNATIONAL
        return $phoneUtil->format($swissNumberProto, \libphonenumber\PhoneNumberFormat::NATIONAL);
    }

}
