<?php
namespace PingYo;

class ApplicationDetails
{

    public $Title;
    public $FirstName;
    public $LastName;
    public $DateOfBirth;
    public $Email;
    public $HomePhoneNumber;
    public $MobilePhoneNumber;
    public $WorkPhoneNumber;

    public $EmployerName;
    public $JobTitle;
    public $EmploymentStarted;
    public $IncomeSource;
    public $PayFrequency;
    public $PayAmount;
    public $IncomePaymentType;
    public $NextPayDate;
    public $FollowingPayDate;
    public $LoanAmount;
    public $Term;
    public $NationalIdentityNumber;
    public $ConsentToCreditSearch;
    public $ConsentToMarketingEmails;

    public $ResidentialStatus;

    public $HouseNumber;
    public $HouseName;
    public $AddressStreet1;
    public $AddressCity;
    public $AddressState;
    public $AddressMoveIn;
    public $AddressPostcode;

    public $MaritalStatus;
    public $NumberOfDependents;
    public $CombinedMonthlyHouseholdIncome;
    public $DriversLicenseNumber;
    public $DriversLicenseState;
    public $MilitaryService;

    public $BankName;
    public $BankAccountNumber;
    public $BankRoutingNumber;
    public $BankAccountType;
    public $BankAccountOpened;

    public $MinimumCommissionAmount;
    public $MaximumCommissionAmount;
    public $ApplicationExtensions;

    private $logger = null;

//    private $consenttocreditsearch_variants = [false, true];

    public function attachLogger(\Psr\Log\LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

    public function toJson()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("ApplicationDetails::toJson() called");
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
            $this->logger->debug("ApplicationDetails::validate() called");
        }
        $validator = new ExtendedValidator(array(
            'Title' => $this->Title,
            'FirstName' => $this->FirstName,
            'LastName' => $this->LastName,
            'DateOfBirth' => $this->DateOfBirth,
            'Email' => $this->Email,
            'HomePhoneNumber' => $this->HomePhoneNumber,
            'MobilePhoneNumber' => $this->MobilePhoneNumber,
            'WorkPhoneNumber' => $this->WorkPhoneNumber,
            'EmployerName' => $this->EmployerName,
            'JobTitle' => $this->JobTitle,
            'EmploymentStarted' => $this->EmploymentStarted,
            'IncomeSource' => $this->IncomeSource,
            'PayFrequency' => $this->PayFrequency,
            'PayAmount' => $this->PayAmount,
            'NextPayDate' => $this->NextPayDate,
            'FollowingPayDate' => $this->FollowingPayDate,
            'LoanAmount' => $this->LoanAmount,
            'Term' => $this->Term,
            'ConsentToCreditSearch' => $this->ConsentToCreditSearch,
            'ConsentToMarketingEmails' => $this->ConsentToMarketingEmails,
            'ResidentialStatus' => $this->ResidentialStatus,

            'HouseNumber' => $this->HouseNumber,
            'HouseName' => $this->HouseName,
            'AddressStreet1' => $this->AddressStreet1,
            'AddressCity' => $this->AddressCity,
            'AddressState' => $this->AddressState,
            'AddressMoveIn' => $this->AddressMoveIn,
            'AddressPostcode' => $this->AddressPostcode,

            'NationalIdentityNumber' => $this->NationalIdentityNumber,
            'DriversLicenseState' => $this->DriversLicenseState,
            'MilitaryService' => $this->MilitaryService,
            'IncomePaymentType' => $this->IncomePaymentType,

            'BankName' => $this->BankName,
            'BankAccountType' => $this->BankAccountType,
            'BankAccountNumber' => $this->BankAccountNumber,
            'BankRoutingNumber' => $this->BankRoutingNumber,
            'BankAccountOpened' => $this->BankAccountOpened,

        ));
        $validator->rules($this->getValidationRules());
        if ($validator->validate()) {
            if (!is_null($this->logger)) {
                $this->logger->info("ApplicationDetails validation passed");
            }
            return true;
        } else {
            if (!is_null($this->logger)) {
             $this->logger->warning("ApplicationDetails validation errors found: ",
             array('errors' => $validator->errors()));
            }
            return $validator->errors();
            //print_r($validator->errors());
        }
    }

    private function getValidationRules()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("ApplicationDetails::getValidationRules() called");
        }
        return [
            'required' => [
                [
                    [
                        'Title',
                        'FirstName',
                        'LastName',
                        'DateOfBirth',
                        'Email',
                        'HomePhoneNumber',
                        'MobilePhoneNumber',
                        'WorkPhoneNumber',
                        'EmployerName',
                        'JobTitle',
                        'EmploymentStarted',
                        'IncomeSource',
                        'PayFrequency',
                        'PayAmount',
                        'IncomePaymentType',
                        'NextPayDate',
                        'FollowingPayDate',
                        'LoanAmount',
                        'Term',
                        'ConsentToCreditSearch',
                        'ConsentToMarketingEmails',
                        'ResidentialStatus',
                        'AddressStreet1',
                        'AddressCity',
                        'AddressState',
                        'AddressMoveIn',
                        'AddressPostcode',
                        'BankName',
                        'BankAccountNumber',
                        'BankRoutingNumber',
                        'BankAccountType',
                        'BankAccountOpened',


                    ]
                ]
            ],
//            'required_with' => [
//                [['nationalidentitynumbertype'], 'nationalidentitynumber']
//            ],
            'required_without' => [
                [['HouseNumber'], 'HouseName'],
                [['HouseName'], 'HouseNumber']
            ],
//            'required_if' => [
//                [['nationalidentitynumber'], ['bankcardtype', ['None', 'Unknown']]]
//            ],
            'email' => [
                [['Email']]
            ],
            //'phone' => [
            //    [['homephonenumber', 'mobilephonenumber', 'workphonenumber'], 'addresscountrycode']
            //],
            'lengthMin' => [
                [['FirstName', 'LastName'], 2],
                [['EmployerName'], 1]
            ],
            'alpha' => [
                [['FirstName', 'LastName']]
            ],
//            'date' => [
//                [['dateofbirth', 'employmentstarted', 'nextpaydate', 'followingpaydate', 'addressmovein']]
//            ],
//            'dateAfter' => [
//                [['nextpaydate', 'followingpaydate'], $this->getTodayDate()],
//            ],
            //'dateBefore' => [
            //    [['nextpaydate', 'followingpaydate'], $this->getValidPAYDATE()],
            //    [['dateofbirth'], $this->getValidDOB()]
            //],
        ];
    }

    private function getTodayDate()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("ApplicationDetails::getTodayDate() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        return $date;
    }

    private function getValidPAYDATE()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("ApplicationDetails::getValidPAYDATE() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        $date->add(date_interval_create_from_date_string('45 days'));
        return $date;
    }

    private function getValidDOB()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("ApplicationDetails::getValidDOB() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        $date->sub(date_interval_create_from_date_string('18 years'));
        return $date;
    }

    public function toArray()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("ApplicationDetails::toArray() called");
        }
        $r = $this->validate();
        if ($r === true) {
            return [
                'Title' => $this->Title,
                'FirstName' => $this->FirstName,
                'LastName' => $this->LastName,
                'DateOfBirth' => $this->DateOfBirth,
                'Email' => $this->Email,
                'HomePhoneNumber' => $this->HomePhoneNumber,
                'MobilePhoneNumber' => $this->MobilePhoneNumber,
                'WorkPhoneNumber' => $this->WorkPhoneNumber,
                'EmployerName' => $this->EmployerName,
                'JobTitle' => $this->JobTitle,
                'EmploymentStarted' => $this->EmploymentStarted,
                'IncomeSource' => $this->IncomeSource,
                'PayFrequency' => $this->PayFrequency,
                'PayAmount' => $this->PayAmount,
                'NextPayDate' => $this->NextPayDate,
                'FollowingPayDate' => $this->FollowingPayDate,
                'LoanAmount' => $this->LoanAmount,
                'Term' => $this->Term,
                'ConsentToCreditSearch' => $this->ConsentToCreditSearch,
                'ConsentToMarketingEmails' => $this->ConsentToMarketingEmails,
                'ResidentialStatus' => $this->ResidentialStatus,
                'HouseNumber' => $this->HouseNumber,
                'HouseName' => $this->HouseName,
                'AddressStreet1' => $this->AddressStreet1,
                'AddressCity' => $this->AddressCity,
                'AddressState' => $this->AddressState,
                'AddressMoveIn' => $this->AddressMoveIn,
                'AddressPostcode' => $this->AddressPostcode,

                'NationalIdentityNumber' => $this->NationalIdentityNumber,
                'DriversLicenseState' => $this->DriversLicenseState,
                'MilitaryService' => $this->MilitaryService,
                'IncomePaymentType' => $this->IncomePaymentType,


                'BankName' => $this->BankName,
                'BankAccountType' => $this->BankAccountType,
                'BankAccountNumber' => $this->BankAccountNumber,
                'BankRoutingNumber' => $this->BankRoutingNumber,
                'BankAccountOpened' => $this->BankAccountOpened,

                'MinimumCommissionAmount' => $this->MinimumCommissionAmount,
                'MaximumCommissionAmount' => $this->MaximumCommissionAmount,
                'ApplicationExtensions' => $this->ApplicationExtensions,
                "LoanAmountCurrencyCode" => null,
                "PayAmountCurrencyCode" => null
            ];
		} else {
//            dd('Not Valid');
			echo "not valid application details<br>";
        }
    }

    private function strDateToJsonDate($strdate)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("ApplicationDetails::strDateToJsonDate() called with strdate=$strdate");
        }
//        dd(555);
        $date = new \DateTime($strdate, new \DateTimeZone("UTC"));
        return '/Date(' . ($date->getTimestamp() * 1000) . ')/';
    }

    private function NormalizePhone($phone, $country)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("ApplicationDetails::NormalizePhone() called with phone=$phone and country=$country");
        }
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $swissNumberProto = $phoneUtil->parse($phone, $country);
        //PhoneNumberFormat::NATIONAL or PhoneNumberFormat::INTERNATIONAL
        return $phoneUtil->format($swissNumberProto, \libphonenumber\PhoneNumberFormat::NATIONAL);
    }

}
