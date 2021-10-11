<?php
//namespace App\Buyerapis\vendor\BizFellaUSA;
namespace BizFellaUSA;


class Employment
{

    public $employer;
    public $job_title;
    public $income_type;
    public $monthly_income;
    public $months_at_employer;
    public $next_pay_date;
    public $following_pay_date;
    public $pay_frequency;
    public $direct_deposit;

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
            'employer' => $this->employer,
            'job_title' => $this->job_title,
            'income_type' => $this->income_type,
            'monthly_income' => $this->monthly_income,
            'months_at_employer' => $this->months_at_employer,
            'next_pay_date' => $this->next_pay_date,
            'following_pay_date' => $this->following_pay_date,
            'pay_frequency' => $this->pay_frequency,
            'direct_deposit' => $this->direct_deposit,

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
                        'employer',
                        'income_type',
                        'monthly_income',
                        'months_at_employer',
                        'next_pay_date',
                        'following_pay_date',
                        'pay_frequency',
                        'direct_deposit',
                    ]
                ]
            ],
            'date' => [
                [['next_pay_date', 'following_pay_date']]
            ],
            'dateAfter' => [
                [['next_pay_date', 'following_pay_date'], $this->getTodayDate()],
            ],
            'dateBefore' => [
                [['next_pay_date', 'following_pay_date'], $this->getValidPAYDATE()],
            ],
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
                'employer' => $this->employer,
                'job_title' => $this->job_title,
                'income_type' => $this->income_type,
                'monthly_income' => $this->monthly_income,
                'months_at_employer' => $this->months_at_employer,
                'next_pay_date' => $this->next_pay_date,
                'following_pay_date' => $this->following_pay_date,
                'pay_frequency' => $this->pay_frequency,
                'direct_deposit' => $this->direct_deposit,
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
