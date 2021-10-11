<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class USApiCaller extends ApiCaller
{
    use HasFactory;

    function __construct() {

        parent::__construct();
        Log::debug( 'DEBUG:: Initialised UPing_US_API_Caller_Model');
        define('UPING_APPLICATION_SUBMIT_URL_US', $this->urls['application_submit_url_usa']);
        $this->country_code = 'us';

    }


    /**
     * Validates the data before sending to u-ping
     *
     * @param $request
     */
    function validate_data($request) {}


    /**
     *  Prepares the data to match u-ping's API specs
     *
     * @param $request
     * @return object
     */
    function prep_data($request) {

        $post = (object)[];
        // Test mode parameter
        $post->istest = $request->input('istest');
        if($post->istest === null || trim($post->istest) === '') {
            $post->istest = false;
        }

        // Facebook Pixel ID
        $post->fbpix = $request->input('fbpix');
        if($post->fbpix === null || trim($post->fbpix) === '') {
            $post->fbpix = '';
        }

        // VID
        $post->vid = $request->input('vid');
        if($post->vid === null || trim($post->vid) === '') {
            $post->vid = 'AFF_1';
        }

        // OID
        $post->oid = $request->input('oid');
        if($post->oid === null || trim($post->oid) === '') {
            $post->oid = '1';
        }
        // Source
        $post->transaction_id = $request->input('transaction_id') ?? 'DIRECT';
        $post->aff_sub = $request->input('aff_sub') ?? null;
        $post->aff_sub2 = $request->input('aff_sub2') ?? null;
        $post->aff_sub3 = $request->input('aff_sub3') ?? null;
        $post->aff_sub4 = $request->input('aff_sub4') ?? null;
        $post->aff_sub5 = $request->input('aff_sub5') ?? null;

        // Tier
        $post->tier = '0';

        $post->nameTitle = $request->input('nameTitle');
        $post->incomeCycle = $request->input('incomeCycle');
//        dd($post->incomeCycle);

        // DOB
        $dateOfBirth = strtotime($request->input('dateOfBirth'));
        $dateOfBirthDay = date('d', $dateOfBirth);
        $dateOfBirthMonth = date('m', $dateOfBirth);
        $dateOfBirthYear = date('Y', $dateOfBirth);

        $post->dateOfBirthDay = $dateOfBirthDay;
        $post->dateOfBirthMonth = $dateOfBirthMonth;
        $post->dateOfBirthYear = $dateOfBirthYear;
//        dd($post->dateOfBirthDay']);

        // Employer name
        switch($request->input('incomeSource')) {
            case 'SelfEmployed':
            case 'Pension':
            case 'DisabilityBenefits':
            case 'Benefits':
                $post->employerName = 'unemployed';
                break;
        }

        // Employment industry
        switch($request->input('incomeSource')) {
            case 'Pension':
            case 'DisabilityBenefits':
            case 'Benefits':
                $post->employerIndustry = 'None';
                break;
        }

        // Job title
        $post->jobTitle = $request->jobTitle ?? 'Not Available';

        switch($request->input('incomeSource')) {
            case 'Pension':
            case 'DisabilityBenefits':
            case 'Benefits':
                $post->jobTitle = '';
                break;
        }

        // nextPayDate
        $nextPayDate = strtotime($request->input('nextPayDate1'));
        $npd_day = date('d', $nextPayDate);
        $npd_month = date('m', $nextPayDate);
        $npd_year = date('Y', $nextPayDate);

        $post->nextPayDateDay = $npd_day;
        $post->nextPayDateMonth = $npd_month;
        $post->nextPayDateYear = $npd_year;

        // followingPayDate
        $followingPayDate = strtotime($request->input('nextPayDate2'));
        $fpd_day = date('d', $followingPayDate);
        $fpd_month = date('m', $followingPayDate);
        $fpd_year = date('Y', $followingPayDate);

        $post->followingPayDateDay = $fpd_day;
        $post->followingPayDateMonth = $fpd_month;
        $post->followingPayDateYear = $fpd_year;

        // Time at address
        $post->monthsAtAddress = $request->input('monthsAtAddress');
//        dd($post->monthsAtAddress);
        // Time in work
        $post->monthsAtEmployer = $request->input('employmentMonth');

        // HTTP Referrer
        $post->userAgent = $request->header('user-agent');
        $post->ipAddress = $request->ip();
        $post->creationUrl = $request->url();
        $post->referringUrl = $request->headers->get('referer');

        // Address2
        if($request->input('city') === null) {
            $post->city = '';
        }

        // Terms
        if($request->input('consentFinancial') === null) {
            $post->consentFinancial = false;
        } else {
            $post->consentFinancial = true;
        }
        if($request->input('consentThirdPartyEmails') === null) {
            $post->consentThirdPartyEmails = false;
        } else {
            $post->consentThirdPartyEmails = true;
        }
        if($request->input('consentThirdPartyPhone') === null) {
            $post->consentThirdPartyPhone = false;
        } else {
            $post->consentThirdPartyPhone = true;
        }
        if($request->input('consentThirdPartySMS') === null) {
            $post->consentThirdPartySMS = false;
        } else {
            $post->consentThirdPartySMS = true;
        }

        // SSN
        $post->ssn = $request->input('ssn1') . $request->input('ssn2') . $request->input('ssn3');
        $bankMonth = $request->input('bankMonth');
        $bankYear = $request->input('bankYear');
        $post->bankAccountLength = floor($bankYear * 12 + $bankMonth);
        $post->incomePaymentType = $request->input('bankDirectDeposit');

        return $post;
    }


    /**
     * This function is necessary to prevent extra fields from submitting with the form
     * @param $request
     * @param $post
     */
    function map_data($request, $post, $transaction_id) {

//        dd($transaction_id);
            $this->mapped_data = (object)[];
            $this->mapped_data->istest = false;
            $this->mapped_data->vid = $post->vid;
            $this->mapped_data->oid = $post->oid;
            $this->mapped_data->transaction_id = $transaction_id;
            $this->mapped_data->aff_sub = $post->aff_sub ?? '';
            $this->mapped_data->aff_sub2 = $post->aff_sub2 ?? '';
            $this->mapped_data->aff_sub3 = $post->aff_sub3 ?? '';
            $this->mapped_data->aff_sub4 = $post->aff_sub4 ?? '';
            $this->mapped_data->aff_sub5 = $post->aff_sub5 ?? '';
            $this->mapped_data->subid = $post->subid ?? '';
            $this->mapped_data->tier = $post->tier ?? '0';
            $this->mapped_data->timeout = $post->timeout ?? '120';
            $this->mapped_data->minCommissionAmount = '';
            $this->mapped_data->maxCommissionAmount = '';
            $this->mapped_data->response_type = 'xml';

            $this->mapped_data->source = (object)[];
            $this->mapped_data->source->ipAddress = $post->ipAddress;
            $this->mapped_data->source->creationUrl = $post->creationUrl;
            $this->mapped_data->source->referringUrl = $post->referringUrl;
            $this->mapped_data->source->userAgent = $post->userAgent;

            $this->mapped_data->loan = (object)[];
            $this->mapped_data->loan->loanAmount = $request->input('loanAmount');
//            $this->mapped_data->loan->loanPurpose = $request->input('loanPurpose');
            $this->mapped_data->loan->loanTerms = $request->input('loanTerms');

            $this->mapped_data->applicant = (object)[];
            $this->mapped_data->applicant->nameTitle = $request->input('nameTitle');
            $this->mapped_data->applicant->firstName = $request->input('firstName');
            $this->mapped_data->applicant->lastName = $request->input('lastName');
            $this->mapped_data->applicant->drivingLicenseNumber = $request->input('licenseNumber');
            $this->mapped_data->applicant->drivingLicenseState = $request->input('licenseState');
            $this->mapped_data->applicant->ssn = $post->ssn;
            $this->mapped_data->applicant->dateOfBirthDay = $post->dateOfBirthDay;
            $this->mapped_data->applicant->dateOfBirthMonth = $post->dateOfBirthMonth;
            $this->mapped_data->applicant->dateOfBirthYear = $post->dateOfBirthYear;
            $this->mapped_data->applicant->email = $request->input('email');
            $this->mapped_data->applicant->homePhoneNumber = $request->input('homePhoneNumber');
            $this->mapped_data->applicant->cellPhoneNumber = $request->input('cellPhoneNumber');
            $this->mapped_data->applicant->workPhoneNumber = $request->input('workPhoneNumber');
            $this->mapped_data->applicant->inMilitary = $request->input('inMilitary');

            $this->mapped_data->residence = (object)[];
            $this->mapped_data->residence->state = $request->input('state');
            $this->mapped_data->residence->city = $request->input('city');
            $this->mapped_data->residence->zip = $request->input('zip');
            $this->mapped_data->residence->addressStreet1 = $request->input('addressStreet1');
            $this->mapped_data->residence->residentialStatus = $request->input('residentialStatus');
            $this->mapped_data->residence->monthsAtAddress = $post->monthsAtAddress;

            $this->mapped_data->employer = (object)[];
            $this->mapped_data->employer->employerName = $request->input('employerName');
            $this->mapped_data->employer->jobTitle = $post->jobTitle;
            $this->mapped_data->employer->incomeSource = $request->input('incomeSource');
            $this->mapped_data->employer->monthlyIncome = $request->input('monthlyIncome');
            $this->mapped_data->employer->monthsAtEmployer = $post->monthsAtEmployer;
            $this->mapped_data->employer->nextPayDateDay = $post->nextPayDateDay;
            $this->mapped_data->employer->nextPayDateMonth = $post->nextPayDateMonth;
            $this->mapped_data->employer->nextPayDateYear = $post->nextPayDateYear;
            $this->mapped_data->employer->followingPayDateDay = $post->followingPayDateDay;
            $this->mapped_data->employer->followingPayDateMonth = $post->followingPayDateMonth;
            $this->mapped_data->employer->followingPayDateYear = $post->followingPayDateYear;
            $this->mapped_data->employer->incomeCycle = $post->incomeCycle;
            $this->mapped_data->employer->incomePaymentType = $post->incomePaymentType;

            $this->mapped_data->bank = (object)[];
            $this->mapped_data->bank->bankName = $request->input('bankName');
            $this->mapped_data->bank->bankAccountLength = $post->bankAccountLength;
            $this->mapped_data->bank->bankRoutingNumber = $request->input('bankRoutingNumber');
            $this->mapped_data->bank->bankAccountNumber = $request->input('bankAccountNumber');
            $this->mapped_data->bank->bankAccountType = $request->input('bankAccountType');

            $this->mapped_data->consent = (object)[];
            $this->mapped_data->consent->consentFinancial =  $post->consentFinancial;
            $this->mapped_data->consent->consentThirdPartyEmails =  $post->consentThirdPartyEmails ?? false;
            $this->mapped_data->consent->consentThirdPartyPhone =  $post->consentThirdPartyPhone  ?? false;
            $this->mapped_data->consent->consentThirdPartySMS =  $post->consentThirdPartySMS ?? false;

//            dd($this->mapped_data);
        // Total monthly household income
        if($request->input('maritalStatus') == 'Married') {
            $this->mapped_data->applicant->combinedMonthlyHouseholdIncome = $request->input('CombinedMonthlyHouseholdIncome');
        }

        // Add timestamps
//        $this->mapped_data['request_client_issued_at'] = $request->input('submit_timestamp');
//        $this->mapped_data['request_affiliate_received_at'] = $request->input('request_affiliate_received_at');
//        $this->mapped_data['request_affiliate_issued_at'] = Carbon::now()->microsecond;
    }
}
