<?php

namespace Tests\Browser\US;

use Faker\Factory;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EmployedFormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {

        $faker = Factory::create();



        $this->browse(function (Browser $browser) use ($faker) {
            $browser->visit('http://127.0.0.1:8000/click/tracker?offer_id=2&aff_id=1')
//            $browser->visit('https://portal.uping.co.uk/click/tracker?offer_id=2&aff_id=1')
                ->pause(5000)
                ->clickLink('apply')
                ->assertSee('1. Get Started')
                ->pause(5000)

                ->type('loanAmount', $faker->randomElement(['100', '200', '300', '400', '500']))
                ->select('loanTerms', $faker->randomElement(['3', '6', '12']))

                ->scrollIntoView('#nttMiss')
                ->pressAndWaitFor($faker->randomElement(['#nttMr', '#nttMiss', '#nttMrs', '#nttMrs']))
                ->type('firstName', $faker->firstName)
                ->type('lastName', $faker->lastName)
                ->type('dateOfBirthDay', '13')
                ->type('dateOfBirthMonth', '06')
                ->type('dateOfBirthYear', '1960')
                ->type('ssn1', '123')
                ->type('ssn2', '12')
                ->type('ssn3', '1234')
                ->pause(3000)
                ->type('licenseNumber', '12345678')
                ->scrollIntoView('#licenseState')
                ->select('licenseState', $faker->randomElement(['AL', 'AK', 'AZ','CA', 'CO', 'DE']))
                ->type('email', $faker->email)
                ->type('cellPhoneNumber', '7123456789')
                ->type('homePhoneNumber', '7123456789')
                ->type('workPhoneNumber',  '7123456789')
                ->scrollIntoView('#inMilitary')
                ->pause(3000)

                ->pressAndWaitFor($faker->randomElement([
                    '#milNone',
                    '#milVeteran',
                    '#milReserves',
                    '#milActiveDuty',
                ]))
                ->scrollIntoView('#msSingle')
                ->pause(3000)
                ->pressAndWaitFor($faker->randomElement([
//                    '#msMarried',
                    '#msSingle',
                    '#msLivingTogether',
                    '#msSeparated',
                    '#msDivorced',
                    '#msWidowed',
                    '#msOther'
                ]))
                ->pause(3000)
                ->pressAndWaitFor($faker->randomElement(['#dep0', '#dep1', '#dep2', '#dep3' ]))
                ->scrollIntoView('#rsHomeOwner')
                ->pressAndWaitFor($faker->randomElement([
                    "#rsHomeOwner",
                    "#rsPrivateTenant",
                    "#rsCouncilTenant",
                    "#rsLivingWithParents",
                    "#rsLivingWithFriends",
                    "#rsOther"
                ]))
                ->scrollIntoView('#maa12')
                ->pause(3000)
                ->pressAndWaitFor($faker->randomElement(['#maa12', '#maa24', '#maa36', '#maa60', '#maa96' ]))
                ->type('zip', '77777')
                ->type('houseNumber', $faker->numberBetween(1, 121))
                ->type('addressStreet1', $faker->streetAddress)
                ->type('city', $faker->city)
                ->pause(3000)
                ->select('state', $faker->randomElement(['AL', 'AK', 'AZ','CA', 'CO', 'DE']))
                ->scrollIntoView('#incomeSource')
                ->pause(3000)
                ->pressAndWaitFor($faker->randomElement([
                    '#EmployedFullTime',
                    '#EmployedPartTime',
                    '#EmployedTemporary',
//                    '#SelfEmployed',
//                    '#Pension',
//                    '#DisabilityBenefits',
//                    '#Benefits',
                ]))
                ->pause(3000)
                ->scrollIntoView('#employerName')
                ->type('employerName', $faker->company)
                ->scrollIntoView('#jobTitle')
                ->scrollIntoView('#em12')
                ->pause(3000)
                ->pressAndWaitFor($faker->randomElement(['#em12', '#em24', '#em36', '#em48', '#em60']))
                ->scrollIntoView('#bankDirectDeposit')
                ->select('bankDirectDeposit', $faker->randomElement(['Cash', 'Cheque', 'RegionalDirectDeposit','NonRegionalDirectDeposit']))
                ->select('incomeCycle', $faker->randomElement([
                    "SpecificDayOfMonth",
                    "Weekly",
                    "BiWeekly",
                    "Fortnightly",
                    "LastDayMonth",
                    "LastWorkingDayMonth",
                    "TwiceMonthly",
                    "FourWeekly",
                    "LastFriday",
                    "LastThursday",
                    "LastWednesday",
                    "LastTuesday",
                    "LastMonday"
                ]))
                ->type('nextPayDate1', '07/06/2021')
                ->type('nextPayDate2', '12/06/2021')
                ->scrollIntoView('#monthlyIncome')
                ->pause(3000)
                ->type('monthlyIncome', $faker->numberBetween(750, 1999));


        $browser->scrollIntoView('#bankName')
                ->type('bankName', $faker->userName)
                ->type('bankAccountNumber', $faker->bankAccountNumber)
                ->type('bankRoutingNumber', $faker->bankAccountNumber)
                ->select('bankAccountType', $faker->randomElement(['Checking', 'Savings']))
                ->scrollIntoView('#bankMonthYear')
                ->select('bankYear', $faker->randomElement(['5', '10', '15']))
                ->select('bankMonth', $faker->randomElement(['5', '10', '12']))
                ->scrollIntoView('#consentFinancial')
                ->pause(3000)
                ->check('#consentFinancial')
                ->pause(3000)
//                ->press('#submit-btn')
                ->pause(3000000);
//                 Check redirection generated
//                ->assertPathBeginsWith('http://127.0.0.1:8002/Users/tomjameson/upingv-1/uping-v.1.0/api/application/redirecturl/');

        });
    }
}
