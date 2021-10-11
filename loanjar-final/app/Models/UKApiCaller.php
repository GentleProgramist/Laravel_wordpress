<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;

class UKApiCaller extends ApiCaller
{
    use HasFactory;

    function __construct() {

        parent::__construct();
        Log::debug( 'Initialised UPing_UK_API_Caller_Model');
        define('UPING_APPLICATION_SUBMIT_URL_UK', $this->urls['application_submit_url_uk']);
        $this->country_code = 'uk';

    }


    /**
     *  Validates the data before sending to u-ping
     *
     * @param $request
     */
    function validate_data($request) {}


    /**
     *  Prepares the data to match u-ping's API specs
     *
     * @param $request
     */
    function prep_data($request) {

        // Test mode parameter
        $istest = $request->input('istest');
        if($istest === null || trim($istest) === '') {
            $_POST['istest'] = '';
        }

        // Facebook Pixel ID
        $fbpix = $request->input('fbpix');
        if($fbpix === null || trim($fbpix) === '') {
            $_POST['fbpix'] = '';
        }

        // VID
        $vid = $request->input('vid');
        if($vid === null || trim($vid) === '') {
            $_POST['vid'] = '1';
        }

        // OID
        $oid = $request->input('oid');
        if($oid === null || trim($oid) === '') {
            $_POST['oid'] = '';
        }

        // Tier
        $_POST['tier'] = 'tier1';

        // DOB
        $dateOfBirth = strtotime($request->input('dateOfBirth'));
        $dateOfBirthDay = date('d', $dateOfBirth);
        $dateOfBirthMonth = date('m', $dateOfBirth);
        $dateOfBirthYear = date('Y', $dateOfBirth);

        $_POST['dateOfBirthDay'] = $dateOfBirthDay;
        $_POST['dateOfBirthMonth'] = $dateOfBirthMonth;
        $_POST['dateOfBirthYear'] = $dateOfBirthYear;

//        $_POST['dateOfBirth'] = date('Y-m-d', strtotime(str_replace('/', '-', $request->input('dateOfBirth'))));

        // Employer name
        switch($request->input('incomeSource')) {
            case 'SelfEmployed':
            case 'Pension':
            case 'DisabilityBenefits':
            case 'Benefits':
                $_POST['employerName'] = 'unemployed';
                break;
        }

        // Employment industry
        switch($request->input('incomeSource')) {
            case 'Pension':
            case 'DisabilityBenefits':
            case 'Benefits':
                $_POST['employerIndustry'] = 'None';
                break;
        }

        // jobTitle
        switch($request->input('incomeSource')) {
            case 'Pension':
            case 'DisabilityBenefits':
            case 'Benefits':
                $_POST['jobTitle'] = '';
                break;
        }

        // nextPayDate
        $nextPayDate = strtotime($request->input('nextPayDate1'));
        $day = date('d', $nextPayDate);
        $month = date('m', $nextPayDate);
        $year = date('Y', $nextPayDate);

        $_POST['nextPayDateDay'] = $day;
        $_POST['nextPayDateMonth'] = $month;
        $_POST['nextPayDateYear'] = $year;

        // followingPayDate
        $followingPayDate = strtotime($request->input('nextPayDate2'));
        $followingPayDateDay = date('d', $followingPayDate);
        $followingPayDateMonth = date('m', $followingPayDate);
        $followingPayDateYear = date('Y', $followingPayDate);

        $_POST['followingPayDateDay'] = $followingPayDateDay;
        $_POST['followingPayDateMonth'] = $followingPayDateMonth;
        $_POST['followingPayDateYear'] = $followingPayDateYear;

        // Time at address
        $_POST['monthsAtAddress'] = $request->input('monthsAtAddress');
//        $_POST['stayYear'] = floor($request->input('timeataddress')/(12.00 * 2));
//        $_POST['stayMonth'] = $request->input('timeataddress') - $_POST['stayYear'] * 12;
//        unset($_POST['timeataddress']);

        // Time in work
        $_POST['employmentMonth'] = $request->input('employmentMonth');
//        $_POST['employmentYear'] = floor($request->input('employmentYear')/(12.00 * 2));
//        $_POST['employmentMonth'] = $request->input('employmentMonth') - $_POST['employmentYear'] * 12;
//        unset($_POST['employmentYear']);

        // HTTP Referrer
//        $this->load->library('user_agent');
        $_POST['userAgent'] = $request->header('user-agent');

//        $_POST['ipAddress'] = $request->ip();

        // Address2
        if($request->input('locality') === null) {
            $_POST['locality'] = '';
        }

        // Terms
        if($request->input('consentFinancial') === null) {
            $_POST['consentFinancial'] = 0;
        } else {
            $_POST['consentFinancial'] = 1;
        }
        if($request->input('consentCreditSearch') === null) {
            $_POST['consentCreditSearch'] = 0;
        } else {
            $_POST['consentCreditSearch'] = 1;
        }
        if($request->input('consentThirdPartyEmails') === null) {
            $_POST['consentThirdPartyEmails'] = 0;
        } else {
            $_POST['consentThirdPartyEmails'] = 1;
        }
        if($request->input('consentThirdPartySMS') === null) {
            $_POST['consentThirdPartySMS'] = 0;
        } else {
            $_POST['consentThirdPartySMS'] = 1;
        }
        if($request->input('consentThirdPartyPhone') === null) {
            $_POST['consentThirdPartyPhone'] = 0;
        } else {
            $_POST['consentThirdPartyPhone'] = 1;
        }


    }


    /**
     * This function is necessary to prevent extra fields from submitting with the form
     *
     * @param $request
     */
    function map_data($request) {

        $this->mapped_data = [
            'istest' => '1',
//			'fbpix' => $request->input('fbpix'),
            'vid' => $request->input('vid'),
            'oid' => $request->input('oid'),
//            'transaction_id' => $request->input('transaction_id'),
            'tier' => 'tier1',

            'nameTitle' => $request->input('nameTitle'),
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),

            'loanAmount' => $request->input('loanAmount'),
            'loanTerms' => $request->input('loanTerms'),
            'loanPurpose' => $request->input('loanPurpose'),

            'dateOfBirth' => $request->input('dateOfBirth'),
            'email' => $request->input('email'),
            'maritalStatus' => $request->input('maritalStatus'),
            'dependants' => $request->input('dependants'),

            'mobilePhoneNumber' => $request->input('mobilePhoneNumber'),
            'homePhoneNumber' => $request->input('homePhoneNumber'),
            'workPhoneNumber' => $request->input('workPhoneNumber'),


            'employerName' => $request->input('employerName'),
            'jobTitle' => $request->input('jobTitle'),
            'employmentMonth' => $request->input('employmentMonth'),
            'employmentYear' => $request->input('employmentYear'),
            'employerIndustry' => $request->input('employerIndustry'),

            'incomeSource' => $request->input('incomeSource'),
            'incomeCycle' => $request->input('incomeCycle'),
            'monthlyIncome' => $request->input('monthlyIncome'),

            'nextPayDate1' => $request->input('nextPayDate1'),
            'nextPayDate2' => $request->input('nextPayDate2'),

            'houseNumber' => $request->input('houseNumber'),
            'addressStreet1' => $request->input('addressStreet1'),
            'city' => $request->input('city'),
            'locality' => $request->input('locality'),
            'county' => $request->input('county'),
            'monthsAtAddress' => $request->input('monthsAtAddress'),
            'postCode' => $request->input('postCode'),
            'residentialStatus' => $request->input('residentialStatus'),

            'monthlyMortgageRent' => $request->input('monthlyMortgageRent'),
            'monthlyRepayments' => $request->input('monthlyRepayments'),
            'monthlyUtilities' => $request->input('monthlyUtilities'),
            'monthlyTransport' => $request->input('monthlyTransport'),
            'monthlyFood' => $request->input('monthlyFood'),
            'otherExpense' => $request->input('otherExpense'),

            'bankCardType' => $request->input('bankCardType'),
            'bankAccountNumber' => $request->input('bankAccountNumber'),
            'bankRoutingNumber' => $request->input('bankRoutingNumber'),
//            'bankMonthYear' => '1234',

            'consentFinancial' => $request->input('consentFinancial'),
            'consentCreditSearch' => $request->input('consentCreditSearch'),
            'consentThirdPartyEmails' => $request->input('consentThirdPartyEmails'),
            'consentThirdPartySMS' => $request->input('consentThirdPartySMS'),
            'consentThirdPartyPhone' => $request->input('consentThirdPartyPhone'),

            'ipAddress' => $request->ip(),
            'userAgent' => $request->header('user-agent'),
            'creationUrl' => $request->header('referer'),
            'referringUrl' => $request->input('http_referrer'),

        ];

//         Total monthly household income
        if($request->input('maritalStatus') == 'Married') {
            $this->mapped_data['CombinedMonthlyHouseholdIncome'] = $request->input('combined_pay');
        }

        // Add timestamps
        $this->mapped_data['request_client_issued_at'] = $request->input('submit_timestamp');
        $this->mapped_data['request_affiliate_received_at'] = $request->input('request_affiliate_received_at');
        $this->mapped_data['request_affiliate_issued_at'] = Carbon::now()->microsecond;

//        dd($this->mapped_data);
    }
}
