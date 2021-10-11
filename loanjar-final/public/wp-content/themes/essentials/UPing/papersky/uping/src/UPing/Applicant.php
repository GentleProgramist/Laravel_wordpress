<?php
namespace UPing;




class Applicant
{

    public $firstname;
    public $lastname;
    public $drivinglicensenumber;
    public $drivinglicensestate;
    public $ssn;
    public $dateofbirthday;
    public $dateofbirthmonth;
    public $dateofbirthyear;
    public $email;
    public $homephonenumber;
    public $cellphonenumber;
    public $workphonenumber;
    public $inmilitary;

    private $logger = null;

    public function attachLogger(\Psr\Log\LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

    public function toJson()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Applicant::toJson() called");
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
            $this->logger->debug("Applicant::validate() called");
        }
        $validator = new ExtendedValidator(array(
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'drivinglicensenumber' => $this->drivinglicensenumber,
            'drivinglicensestate' => $this->drivinglicensestate,
            'ssn' => $this->ssn,

            'dateofbirthday' => $this->dateofbirthday,
            'dateofbirthmonth' => $this->dateofbirthmonth,
            'dateofbirthyear' => $this->dateofbirthyear,
            'email' => $this->email,

            'homephonenumber' => $this->homephonenumber,
            'cellphonenumber' => $this->cellphonenumber,
            'workphonenumber' => $this->workphonenumber,
            'inmilitary' => $this->inmilitary,
        ));
        $validator->rules($this->getValidationRules());
        if ($validator->validate()) {
            if (!is_null($this->logger)) {
                $this->logger->info("Applicant validation passed");
            }
            return true;
        } else {
            if (!is_null($this->logger)) {
             $this->logger->warning("Applicant validation errors found: ",
             array('errors' => $validator->errors()));
            }
            return $validator->errors();
            //print_r($validator->errors());
        }
    }

    private function getValidationRules()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Applicant::getValidationRules() called");
        }
        return [
            'required' => [
                [
                    [
                        'firstname',
                        'lastname',
                        'drivinglicensenumber',
                        'drivinglicensestate',
                        'ssn',
                        'dateofbirthday',
                        'dateofbirthmonth',
                        'dateofbirthyear',
                        'email',
                        'homephonenumber',
                        'cellphonenumber',
                        'workphonenumber',
                        'inmilitary',
                    ]
                ]
            ],
            'email' => [
                [['email']]
            ],
            'phone' => [
                [['homephonenumber', 'cellphonenumber', 'workphonenumber']]
            ],
            'lengthMin' => [
                [['firstname', 'lastname'], 2],
            ],
            'alpha' => [
                [['firstname', 'lastname']]
            ],
        ];
    }

    private function getTodayDate()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Applicant::getTodayDate() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        return $date;
    }

    private function getValidPAYDATE()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Applicant::getValidPAYDATE() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        $date->add(date_interval_create_from_date_string('45 days'));
        return $date;
    }

    private function getValidDOB()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Applicant::getValidDOB() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        $date->sub(date_interval_create_from_date_string('18 years'));
        return $date;
    }

    public function toArray()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Applicant::toArray() called");
        }
        $r = $this->validate();
        if ($r === true) {
            return [
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'drivinglicensenumber' => $this->drivinglicensenumber,
                'drivinglicensestate' => $this->drivinglicensestate,
                'ssn' => $this->ssn,

                'dateofbirthday' => $this->dateofbirthday,
                'dateofbirthmonth' => $this->dateofbirthmonth,
                'dateofbirthyear' => $this->dateofbirthyear,
                'email' => $this->email,

                'homephonenumber' => $this->homephonenumber,
                'cellphonenumber' => $this->cellphonenumber,
                'workphonenumber' => $this->workphonenumber,
                'inmilitary' => $this->inmilitary,

            ];
		} else {
//            dd('Not Valid');
			echo "not valid applicant details<br>";
        }
    }

    private function strDateToJsonDate($strdate)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Applicant::strDateToJsonDate() called with strdate=$strdate");
        }
//        dd(555);
        $date = new \DateTime($strdate, new \DateTimeZone("UTC"));
        return '/Date(' . ($date->getTimestamp() * 1000) . ')/';
    }

    private function NormalizePhone($phone, $country)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Applicant::NormalizePhone() called with phone=$phone and country=$country");
        }
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $swissNumberProto = $phoneUtil->parse($phone, $country);
        //PhoneNumberFormat::NATIONAL or PhoneNumberFormat::INTERNATIONAL
        return $phoneUtil->format($swissNumberProto, \libphonenumber\PhoneNumberFormat::NATIONAL);
    }

}
