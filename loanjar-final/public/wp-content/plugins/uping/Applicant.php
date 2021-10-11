<?php
namespace UPing;




class Applicant
{

    public $firstName;
    public $lastName;
    public $drivingLicenseNumber;
    public $drivingLicenseState;
    public $ssn;
    public $dateOfBirthDay;
    public $dateOfBirthMonth;
    public $dateOfBirthYear;
    public $email;
    public $homePhoneNumber;
    public $cellPhoneNumber;
    public $workPhoneNumber;
    public $inMilitary;

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
            'firstname' => $this->firstName,
            'lastname' => $this->lastName,
            'drivingLicenseNumber' => $this->drivingLicenseNumber,
            'drivingLicenseState' => $this->drivingLicenseState,
            'ssn' => $this->ssn,
            'dateOfBirthDay' => $this->dateOfBirthDay,
            'dateOfBirthMonth' => $this->dateOfBirthMonth,
            'dateOfBirthYear' => $this->dateOfBirthYear,
            'email' => $this->email,
            'homePhoneNumber' => $this->homePhoneNumber,
            'cellPhoneNumber' => $this->cellPhoneNumber,
            'workPhoneNumber' => $this->workPhoneNumber,
            'inMilitary' => $this->inMilitary,
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
                        'firstName',
                        'lastName',
                        'drivingLicenseNumber',
                        'drivingLicenseState',
                        'ssn',
                        'dateOfBirthDay',
                        'dateOfBirthMonth',
                        'dateOfBirthYear',
                        'email',
                        'homePhoneNumber',
                        'cellPhoneNumber',
                        'workPhoneNumber',
                        'inMilitary',
                    ]
                ]
            ],
            'email' => [
                [['email']]
            ],
//            'phone' => [
//                [['homePhoneNumber', 'cellphonenumber', 'workphonenumber']]
//            ],
            'lengthMin' => [
                [['firstName', 'lastName'], 2],
            ],
            'alpha' => [
                [['firstName', 'lastName']]
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
                'firstname' => $this->firstName,
                'lastname' => $this->lastName,
                'drivingLicenseNumber' => $this->drivingLicenseNumber,
                'drivingLicenseState' => $this->drivingLicenseState,
                'ssn' => $this->ssn,
                'dateOfBirthDay' => $this->dateOfBirthDay,
                'dateOfBirthMonth' => $this->dateOfBirthMonth,
                'dateOfBirthYear' => $this->dateOfBirthYear,
                'email' => $this->email,
                'homePhoneNumber' => $this->homePhoneNumber,
                'cellPhoneNumber' => $this->cellPhoneNumber,
                'workPhoneNumber' => $this->workPhoneNumber,
                'inMilitary' => $this->inMilitary,

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
