<?php
//namespace App\Buyerapis\vendor\BizFellaUSA;
namespace BizFellaUSA;


class Residence
{

    public $state;
    public $city;
    public $zip;
    public $address;
    public $own_home;
    public $months_at_address;

    private $logger = null;

    public function attachLogger(\Psr\Log\LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

    public function toJson()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Residence::toJson() called");
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
            $this->logger->debug("Residence::validate() called");
        }
        $validator = new ExtendedValidator(array(
            'state' => $this->state,
            'city' => $this->city,
            'zip' => $this->zip,
            'address' => $this->address,
            'own_home' => $this->own_home,
            'months_at_address' => $this->months_at_address,

        ));
        $validator->rules($this->getValidationRules());
        if ($validator->validate()) {
            if (!is_null($this->logger)) {
                $this->logger->info("Residence validation passed");
            }
            return true;
        } else {
            if (!is_null($this->logger)) {
             $this->logger->warning("Residence validation errors found: ",
             array('errors' => $validator->errors()));
            }
            return $validator->errors();
            //print_r($validator->errors());
        }
    }

    private function getValidationRules()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Residence::getValidationRules() called");
        }
        return [
            'required' => [
                [
                    [
                        'state',
                        'city',
                        'zip',
                        'address',
                        'own_home',
                        'months_at_address',
                    ]
                ]
            ],
        ];
    }

    private function getTodayDate()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Residence::getTodayDate() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        return $date;
    }

    private function getValidPAYDATE()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Residence::getValidPAYDATE() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        $date->add(date_interval_create_from_date_string('45 days'));
        return $date;
    }

    private function getValidDOB()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Residence::getValidDOB() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        $date->sub(date_interval_create_from_date_string('18 years'));
        return $date;
    }

    public function toArray()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Residence::toArray() called");
        }
        $r = $this->validate();
        if ($r === true) {
            return [
                'State' => $this->state,
                'City' => $this->city,
                'Zip' => $this->zip,
                'Address' => $this->address,
                'OwnHome' => $this->own_home,
                'MonthsAtAddress' => $this->months_at_address,

            ];
		} else {
//            dd('Not Valid');
			echo "not valid application details<br>";
        }
    }

    private function strDateToJsonDate($strdate)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Residence::strDateToJsonDate() called with strdate=$strdate");
        }
//        dd(555);
        $date = new \DateTime($strdate, new \DateTimeZone("UTC"));
        return '/Date(' . ($date->getTimestamp() * 1000) . ')/';
    }

    private function NormalizePhone($phone, $country)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Residence::NormalizePhone() called with phone=$phone and country=$country");
        }
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $swissNumberProto = $phoneUtil->parse($phone, $country);
        //PhoneNumberFormat::NATIONAL or PhoneNumberFormat::INTERNATIONAL
        return $phoneUtil->format($swissNumberProto, \libphonenumber\PhoneNumberFormat::NATIONAL);
    }

}
