<?php
//namespace App\Buyerapis\vendor\BizFellaUSA;
namespace UPing;



class Employer
{

    public $employerName;
    public $jobTitle;
    public $incomeSource;
    public $monthlyIncome;
    public $monthsAtEmployer;
    public $nextPayDateDay;
    public $nextPayDateMonth;
    public $nextPayDateYear;
    public $followingPayDateDay;
    public $followingPayDateMonth;
    public $followingPayDateYear;
    public $incomeCycle;
    public $incomePaymentType;

    private $logger = null;


    public function attachLogger(\Psr\Log\LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

    public function toJson()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Employment::toJson() called");
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
            $this->logger->debug("Employment::validate() called");
        }
        $validator = new ExtendedValidator(array(
            'employerName' => $this->employerName,
            'jobTitle' => $this->jobTitle,
            'incomeSource' => $this->incomeSource,
            'monthlyIncome' => $this->monthlyIncome,
            'monthsAtEmployer' => $this->monthsAtEmployer,
            'nextPayDateDay' => $this->nextPayDateDay,
            'nextPayDateMonth' => $this->nextPayDateMonth,
            'nextPayDateYear' => $this->nextPayDateYear,
            'followingPayDateDay' => $this->followingPayDateDay,
            'followingPayDateMonth' => $this->followingPayDateMonth,
            'followingPayDateYear' => $this->followingPayDateYear,
            'incomeCycle' => $this->incomeCycle,
            'incomePaymentType' => $this->incomePaymentType,

        ));
        $validator->rules($this->getValidationRules());
        if ($validator->validate()) {
            if (!is_null($this->logger)) {
                $this->logger->info("Employment validation passed");
            }
            return true;
        } else {
            if (!is_null($this->logger)) {
             $this->logger->warning("Employment validation errors found: ",
             array('errors' => $validator->errors()));
            }
            return $validator->errors();
            //print_r($validator->errors());
        }
    }

    private function getValidationRules()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Employment::getValidationRules() called");
        }
        return [
            'required' => [
                [
                    [
                        'employerName',
                        'jobTitle',
                        'incomeSource',
                        'monthlyIncome',
                        'monthsAtEmployer',
                        'nextPayDateDay',
                        'nextPayDateMonth',
                        'nextPayDateYear',
                        'followingPayDateDay',
                        'followingPayDateMonth',
                        'followingPayDateYear',
                        'incomeCycle',
                        'incomePaymentType',
                    ]
                ]
            ],
//            'date' => [
//                [['next_pay_date', 'following_pay_date']]
//            ],
//            'dateAfter' => [
//                [['next_pay_date', 'following_pay_date'], $this->getTodayDate()],
//            ],
//            'dateBefore' => [
//                [['next_pay_date', 'following_pay_date'], $this->getValidPAYDATE()],
//            ],
        ];
    }

    private function getTodayDate()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Employment::getTodayDate() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        return $date;
    }

    private function getValidPAYDATE()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Employment::getValidPAYDATE() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        $date->add(date_interval_create_from_date_string('45 days'));
        return $date;
    }

    private function getValidDOB()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Employment::getValidDOB() called");
        }
        $date = new \DateTime("now", new \DateTimeZone("UTC"));
        $date->sub(date_interval_create_from_date_string('18 years'));
        return $date;
    }

    public function toArray()
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Employment::toArray() called");
        }
        $r = $this->validate();
        if ($r === true) {
            return [
                'employerName' => $this->employerName,
                'jobTitle' => $this->jobTitle,
                'incomeSource' => $this->incomeSource,
                'monthlyIncome' => $this->monthlyIncome,
                'monthsAtEmployer' => $this->monthsAtEmployer,
                'nextPayDateDay' => $this->nextPayDateDay,
                'nextPayDateMonth' => $this->nextPayDateMonth,
                'nextPayDateYear' => $this->nextPayDateYear,
                'followingPayDateDay' => $this->followingPayDateDay,
                'followingPayDateMonth' => $this->followingPayDateMonth,
                'followingPayDateYear' => $this->followingPayDateYear,
                'incomeCycle' => $this->incomeCycle,
                'incomePaymentType' => $this->incomePaymentType,

            ];
		} else {
//            dd('Not Valid');
			echo "not valid application details<br>";
        }
    }

    private function strDateToJsonDate($strdate)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Employment::strDateToJsonDate() called with strdate=$strdate");
        }
//        dd(555);
        $date = new \DateTime($strdate, new \DateTimeZone("UTC"));
        return '/Date(' . ($date->getTimestamp() * 1000) . ')/';
    }

    private function NormalizePhone($phone, $country)
    {
        if (!is_null($this->logger)) {
            $this->logger->debug("Employment::NormalizePhone() called with phone=$phone and country=$country");
        }
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $swissNumberProto = $phoneUtil->parse($phone, $country);
        //PhoneNumberFormat::NATIONAL or PhoneNumberFormat::INTERNATIONAL
        return $phoneUtil->format($swissNumberProto, \libphonenumber\PhoneNumberFormat::NATIONAL);
    }

}
