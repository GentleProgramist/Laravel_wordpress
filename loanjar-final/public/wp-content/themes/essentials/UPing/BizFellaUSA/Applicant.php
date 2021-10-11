<?php
namespace BizFellaUSA;



class Applicant
{

    public $first_name;
    public $last_name;
    public $drivers_license_number;
    public $drivers_license_state;
    public $ssn;
    public $birth_date;
    public $email;
    public $home_phone;
    public $cell_phone;
    public $work_phone;
    public $military;

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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'drivers_license_number' => $this->drivers_license_number,
            'drivers_license_state' => $this->drivers_license_state,
            'ssn' => $this->ssn,

            'birth_date' => $this->birth_date,
            'email' => $this->email,

            'home_phone' => $this->home_phone,
            'cell_phone' => $this->cell_phone,
            'work_phone' => $this->work_phone,
            'military' => $this->military,
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
                        'first_name',
                        'last_name',
                        'drivers_license_number',
                        'drivers_license_state',
                        'ssn',
                        'birth_date',
                        'email',
                        'home_phone',
                        'cell_phone',
                        'work_phone',
                        'military',
                    ]
                ]
            ],
//            'email' => [
//                [['email']]
//            ],
//            'phone' => [
//                [['home_phone', 'cell_phone', 'work_phone']]
//            ],
            'lengthMin' => [
                [['first_name', 'last_name'], 2],
            ],
            'alpha' => [
                [['first_name', 'last_name']]
            ],
//            'date' => [
//                [['birth_date']]
//         ]
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
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'drivers_license_number' => $this->drivers_license_number,
                'drivers_license_state' => $this->drivers_license_state,
                'ssn' => $this->ssn,
                'birth_date' => $this->birth_date,
                'email' => $this->email,
                'home_phone' => $this->home_phone,
                'cell_phone' => $this->cell_phone,
                'work_phone' => $this->work_phone,
                'military' => $this->military,

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
