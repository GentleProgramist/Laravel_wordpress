<?php

namespace Tests\Browser\UK;

use Facebook\WebDriver\WebDriverBy;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MarriedFormTest extends DuskTestCase
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
            $browser->visit('http://127.0.0.1:8000/offer/track/?oid=1&vid=1')
                ->clickLink('Apply Now')
                ->assertSee('1. Get Started')
                ->pause(5000)

                ->type('loanAmount', $faker->randomElement(['100', '200', '300', '400', '500']))
                ->select('loanTerms', $faker->randomElement(['3', '6', '12']))
                ->pressAndWaitFor($faker->randomElement([
                    '#Subsistence',
                    '#OneOffPurchase',
                    '#Other',
                    '#DebtConsolidation',
                    '#CarLoan',
                    '#PayBills',
                    '#PayOffLoan',
                    '#ShortTermCash',
                    '#HomeImprovements']))
                ->pause(3000)

                ->scrollIntoView('#nttMiss')
                ->pressAndWaitFor($faker->randomElement(['#nttMr', '#nttMiss', '#nttMrs', '#nttMrs']))
                ->type('firstName', $faker->firstName)
                ->type('lastName', $faker->lastName)
                ->type('dateOfBirth', $faker->date($format = 'd-m-Y'))
                ->type('email', $faker->email)
                ->type('homePhoneNumber', '07123456789')
                ->type('mobilePhoneNumber', '07123456789')
                ->type('workPhoneNumber',  '07123456789')
                ->scrollIntoView('#msSingle')
                ->pause(3000)
                ->pressAndWaitFor($faker->randomElement([
                    '#msMarried',
//                    '#msSingle',
//                    '#msLivingTogether',
//                    '#msSeparated',
//                    '#msDivorced',
//                    '#msWidowed',
//                    '#msOther'
                ]))
                ->pause(3000)
                ->pressAndWaitFor($faker->randomElement(['#dep0', '#dep1', '#dep2', '#dep3' ]))
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
                ->type('postCode', 'EC1V 9BD')
                ->type('houseNumber', $faker->numberBetween(1, 121))
                ->type('addressStreet1', $faker->streetAddress)
                ->type('locality', $faker->city)
                ->pause(3000)
                ->type('city', $faker->city)
                ->type('county', $faker->state)
                ->type('monthlyMortgageRent', $faker->numberBetween(500, 4000))
                ->scrollIntoView('#EmployedFullTime')
                ->pause(3000)
                ->pressAndWaitFor($faker->randomElement([
                    '#EmployedFullTime',
                    '#EmployedPartTime',
                    '#SelfEmployed',
                    '#EmployedTemporary',
//                    '#Pension',
//                    '#DisabilityBenefits',
//                    '#Benefits',
                ]))
                ->pause(3000);


//            switch ()
//            {
//                case '#EmployedFullTime' || '#EmployedPartTime' || '#EmployedTemporary':
//                    $browser->scrollIntoView('#employerName')
//                        ->type('employerName', $faker->company)
//                        ->scrollIntoView('#ConstructionManufacturing')
//                        ->pressAndWaitFor($faker->randomElement([
//                            "#ConstructionManufacturing",
//                            "#Military",
//                            "#Health",
//                            "#BankingInsurance",
//                            "#Education",
//                            "#CivilService",
//                            "#SupermarketRetail",
//                            "#UtilitiesTelecom",
//                            "#HotelRestaurantAndLeisure",
//                            "#OtherOfficeBased",
//                            "#OtherNotOfficeBased",
//                            "#DrivingDelivery",
//                            "#AdministrationSecretarial",
//                            "#MidLevelManagement",
//                            "#SeniorLevelManagement",
//                            "#SkilledTrade",
//                            "#Professional"]))
//                        ->scrollIntoView('#jobTitle')
//                        ->type('jobTitle', $faker->jobTitle);
//                    break;
//                case '#SelfEmployed':
//                    $browser->scrollIntoView('#ConstructionManufacturing')
//                        ->pressAndWaitFor($faker->randomElement([
//                            "#ConstructionManufacturing",
//                            "#Military",
//                            "#Health",
//                            "#BankingInsurance",
//                            "#Education",
//                            "#CivilService",
//                            "#SupermarketRetail",
//                            "#UtilitiesTelecom",
//                            "#HotelRestaurantAndLeisure",
//                            "#OtherOfficeBased",
//                            "#OtherNotOfficeBased",
//                            "#DrivingDelivery",
//                            "#AdministrationSecretarial",
//                            "#MidLevelManagement",
//                            "#SeniorLevelManagement",
//                            "#SkilledTrade",
//                            "#Professional"]))
//                        ->scrollIntoView('#jobTitle')
//                        ->type('jobTitle', $faker->jobTitle);
//                    break;
//            }

//            if ($browser->assertButtonEnabled('#SelfEmployed')) {
//                $browser
//                    ->scrollIntoView('#employerName')
//                    ->type('employerName', $faker->company)
//                    ->scrollIntoView('#ConstructionManufacturing')
//                    ->pressAndWaitFor($faker->randomElement([
//                        "#ConstructionManufacturing",
//                        "#Military",
//                        "#Health",
//                        "#BankingInsurance",
//                        "#Education",
//                        "#CivilService",
//                        "#SupermarketRetail",
//                        "#UtilitiesTelecom",
//                        "#HotelRestaurantAndLeisure",
//                        "#OtherOfficeBased",
//                        "#OtherNotOfficeBased",
//                        "#DrivingDelivery",
//                        "#AdministrationSecretarial",
//                        "#MidLevelManagement",
//                        "#SeniorLevelManagement",
//                        "#SkilledTrade",
//                        "#Professional"]))
//                    ->scrollIntoView('#jobTitle')
//                    ->type('jobTitle', $faker->jobTitle);
//            }
//
//            if ($browser->assertSee('Employers Name*')) {
//            $browser
//                ->scrollIntoView('#ConstructionManufacturing')
//                ->pressAndWaitFor($faker->randomElement([
//                    "#ConstructionManufacturing",
//                    "#Military",
//                    "#Health",
//                    "#BankingInsurance",
//                    "#Education",
//                    "#CivilService",
//                    "#SupermarketRetail",
//                    "#UtilitiesTelecom",
//                    "#HotelRestaurantAndLeisure",
//                    "#OtherOfficeBased",
//                    "#OtherNotOfficeBased",
//                    "#DrivingDelivery",
//                    "#AdministrationSecretarial",
//                    "#MidLevelManagement",
//                    "#SeniorLevelManagement",
//                    "#SkilledTrade",
//                    "#Professional"]))
//                ->scrollIntoView('#jobTitle')
//                ->type('jobTitle', $faker->jobTitle);
//            }


             $browser->scrollIntoView('#em12')
                ->pause(3000)
                ->pressAndWaitFor($faker->randomElement(['#em12', '#em24', '#em36', '#em48', '#em60']))
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
                ->type('nextPayDate1', '20/05/2021')
                ->type('nextPayDate2', '27/05/2021')
                ->scrollIntoView('#monthlyIncome')
                ->pause(3000)
                ->type('monthlyIncome', $faker->numberBetween(750, 1999));

            if ($browser->assertSee('Total Monthly Household Income*') && $browser->assertValue('#combined_pay', '')) {
                $browser
                    ->scrollIntoView('#combined_pay')
                    ->type('combined_pay', $faker->numberBetween(2000, 4000))
                    ->scrollIntoView('#ctpp')
                    ->pause(2000);

            }

        $browser->type('monthlyRepayments', $faker->numberBetween('50', '200'))
                ->type('monthlyUtilities', $faker->numberBetween('50', '200'))

                ->type('monthlyTransport', $faker->numberBetween('50', '200'))
                ->type('monthlyFood', $faker->numberBetween('50', '200'))
                ->type('otherExpense', $faker->numberBetween('50', '2000'))
                ->scrollIntoView('#bankCardType')
                ->pause(3000)
                ->pressAndWaitFor($faker->randomElement([
                    '#bctSolo',
                    '#bctSwitchMaestro',
                    '#bctVisa',
                    '#bctVisaDebit',
                    '#bctVisaDelta',
                    '#bctVisaElectron',
                    '#bctMasterCard',
                    '#bctMasterCardDebit',
                    ]))
                ->type('bankAccountNumber', '12345678')
                ->type('bankRoutingNumber', '123456')
                ->scrollIntoView('#consentFinancial')
                ->pause(3000)
                ->check('#csf')
                ->check('#ccs')
                ->check('#ctpe')
                ->check('#ctps')
                ->scrollIntoView('#consentThirdPartyPhone')
                ->pause(3000)
                ->check('#ctpp')
//                ->press('#submit-btn')
                ->pause(300000)
//                 Check redirection generated
                ->assertPathBeginsWith('http://127.0.0.1:8002/Users/tomjameson/upingv-1/uping-v.1.0/api/application/redirecturl/');



        });
    }
}
