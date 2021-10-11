<div id="error-box" style="text-align: left !important; display: none; position: fixed; top: 0; left: 0; right: 0; height: 100px; background-color: white; color: black; font-size: 14px; z-index: 40000; border: solid 5px black; box-shadow: 0 0 10px 1px black; overflow: auto; padding: 5px;"></div>
<div id="progress-indicator">
    <div class="percent"></div>
</div>
<div class="container" id="form-container">
	<div class="row">
		<div class="col-sm-12">

			<form id="main-form" class="form-horizontal" action="{{{route('process', $countrycode="uk")}}}"
				  method="POST" onsubmit="return validateForm(event);" novalidate
                  data-countrycode="uk"
            >
                @csrf
				<!-- SOF: Hidden Fields -->
				<input type="hidden" name="fbpix" value="<?= isset($_GET['fbpix']) ? $_GET['fbpix'] : ''; ?>">
				<input type="hidden" name="vid" value="<?= isset($_GET['vid']) ? $_GET['vid'] : ''; ?>">
<!--				<input type="hidden" name="istest" value="--><?//= SUBMIT_TEST_APPLICATIONS; ?><!--">-->
				<input type="hidden" name="transaction_id" value="<?= isset($_GET['transaction_id']) ? $_GET['transaction_id'] : ''; ?>">
				<input type="hidden" name="oid" value="<?= isset($_GET['oid']) ? $_GET['oid'] : ''; ?>">
				<!-- EOF: Hidden Fields -->

				<!-- SOF: Form Section | Get Started -->
				<div class="form-group section-header">
					<div class="col-xs-12 text-center">
						<h3>1. Get Started</h3>
					</div>
				</div>
                    <!-- Loan amount *-->
				<div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="loanAmount" class="control-label">How much would you like?<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="tel" class="form-control" name="loanAmount" placeholder="Enter loan amount" autofocus="" required min="100" max="5000" step="100" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="label label-info">Available in £100 increments</div>
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- Loan Terms *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="loanTerms" class="control-label">Please select your loan period<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<select class="form-control" id="loanTerms" name="loanTerms" required>
							<option value="3">3 months</option>
							<option value="6">6 months</option>
							<option value="12">12 months</option>
							<option value="18">18 months</option>
							<option value="24">24 months</option>
							<option value="36">36 months</option>
						</select>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
				<!-- EOF: Form Section | Get Started -->


				<!-- SOF: Form Section | Personal Details -->
				<div class="form-group section-header">
					<div class="col-xs-12 text-center">
						<h3>2. Please fill with your details</h3>
					</div>
				</div>
                    <!-- Loan Purpose *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="loanPurpose" class="control-label">Loan Purpose<span class="text-danger">*</span></label>
					</div>

					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default">
								<input type="radio" name="loanPurpose" id="loanPurpose" value="Subsistence" required /> Subsistence
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="loanPurpose" value="OneOffPurchase" required /> One Off<br />Purchase
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="loanPurpose" value="DebtConsolidation" required /> Debt<br />Consolidation
							</label>
							<label class="btn btn-default">
								<input type="radio" name="loanPurpose" id="CarLoan" value="CarLoan" required /> Car Loan
							</label>
							<label class="btn btn-default">
								<input type="radio" name="loanPurpose" value="PayBills" required /> Pay Bills
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="loanPurpose" value="PayOffLoan" required /> Pay Off<br />Loan
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="loanPurpose" value="ShortTermCash" required /> Short Term<br />Cash
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="loanPurpose" value="HomeImprovements" required /> Home<br />Improvements
							</label>
							<label class="btn btn-default">
								<input type="radio" name="loanPurpose" value="Other" required /> Other
							</label>
						</div>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
						<div class="label label-info" role="alert">Please choose the option that suits for you, or if none are applicable, choose "Other"</div>
					</div>
				</div>
                    <!-- nameTitle *-->
				<div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="nameTitle" class="control-label">Title<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default">
								<input type="radio" name="nameTitle" id="Mr" value="Mr" required> Mr
							</label>
							<label class="btn btn-default">
								<input type="radio" name="nameTitle" value="Miss" required> Miss
							</label>
							<label class="btn btn-default">
								<input type="radio" name="nameTitle" id="Mrs" value="Mrs" required> Mrs
							</label>
							<label class="btn btn-default">
								<input type="radio" name="nameTitle" value="Ms" required> Ms
							</label>
						</div>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
						<div class="label label-info" role="alert">We only use your data for analyising. For more information see our <a class="alert-link" href="privacy-policy.php">privacy policy</a>.</div>
					</div>
				</div>

                    <!-- First Name *-->
				<div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="firstName" class="control-label">First Name<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="text" class="form-control" name="firstName" placeholder="Enter your first name" minlength="2" required data-validateregex="^[a-zA-Z ]+$" data-validateregexerrormessage="First name can not contain any character other than alphabets and spaces" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- Last Name *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="lastName" class="control-label">Last Name<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="text" class="form-control" name="lastName" placeholder="Enter your last name" required minlength="2" data-validateregex="^[a-zA-Z-\' ]+$" data-validateregexerrormessage="Last name can not contain any characters other than alphabets, spaces, hyphens and apostrophes" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- Date Of Birth *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="dateOfBirth" class="control-label">Date of birth<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="text" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="DD/MM/YYYY" required autocomplete="off" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- Email *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="email" class="control-label">Email<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
						<div class="label label-info" role="alert">We need your contact details incase we need to contact you about your quote.</div>
					</div>
				</div>
                    <!-- mobilePhoneNumber *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="mobilePhoneNumber" class="control-label">Mobile phone number<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="tel" class="form-control" id="mobilePhoneNumber" name="mobilePhoneNumber" placeholder="Enter mobile number" data-length="11" maxlength="11" data-beginswith="07" required />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- homePhoneNumber *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="homePhoneNumber" class="control-label">Home phone number<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="tel" class="form-control" id="homePhoneNumber" name="homePhoneNumber" placeholder="Enter home phone number" required data-length="11" maxlength="11" data-beginswithany="01,02,07" />
						<button type="button" class="btn btn-success use-mobile-number hidden">Use mobile<br />number</button>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- workPhoneNumber *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="workPhoneNumber" class="control-label">Daytime phone number<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="tel" class="form-control" id="workPhoneNumber" name="workPhoneNumber" placeholder="Enter daytime number" required data-length="11" maxlength="11" data-beginswithany="01,02,07" />
						<button type="button" class="btn btn-success use-mobile-number hidden">Use mobile<br />number</button>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- maritalStatus *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="maritalStatus" class="control-label">Marital status<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default">
								<input type="radio" name="maritalStatus" value="Single" required> Single
							</label>
							<label class="btn btn-default">
								<input type="radio" name="maritalStatus" value="Married" required> Married
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="maritalStatus" value="LivingTogether" required> Living<br />Together
							</label>
							<label class="btn btn-default">
								<input type="radio" name="maritalStatus" value="Separated" required> Separated
							</label>
							<label class="btn btn-default">
								<input type="radio" name="maritalStatus" value="Divorced" required> Divorced
							</label>
							<label class="btn btn-default">
								<input type="radio" name="maritalStatus" value="Widowed" required> Widowed
							</label>
							<label class="btn btn-default">
								<input type="radio" name="marital_status" value="Other" required> Other
							</label>
						</div>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- dependants *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="dependants" class="control-label">Number of dependants<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default">
								<input type="radio" name="dependants" value="0" required> None
							</label>
							<label class="btn btn-default">
								<input type="radio" name="dependants" value="1" required> 1
							</label>
							<label class="btn btn-default">
								<input type="radio" name="dependants" value="2" required> 2
							</label>
							<label class="btn btn-default">
								<input type="radio" name="dependants" value="3" required> 3+
							</label>
						</div>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
				<!-- EOF: Form Section | Personal Details -->

				<!-- SOF: Form Section | Home Details -->
				<div class="form-group section-header">
					<div class="col-xs-12 text-center">
						<h3>3. Your home details</h3>
					</div>
				</div>
                    <!-- residentialStatus *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="residentialStatus" class="control-label">Home status<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default wrap">
								<input type="radio" name="residentialStatus" value="HomeOwner" required> Home<br />owner
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="residentialStatus" value="PrivateTenant" required> Private<br />tenant
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="residentialStatus" value="CouncilTenant" required> Council<br />tenant
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="residentialStatus" value="LivingWithParents" required> Living with<br />parents
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="residentialStatus" value="LivingWithFriends" required> Living with<br />friends
							</label>
							<label class="btn btn-default">
								<input type="radio" name="residentialStatus" value="Other" required> Other
							</label>
						</div>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
						<div class="label label-info" role="alert">Your current living address.</div>
					</div>
				</div>
                    <!-- monthsAtAddress *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="monthsAtAddress" class="control-label">How long have you been at this address?</label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default wrap">
								<input type="radio" name="monthsAtAddress" value="12" required> Less than<br />1 year
							</label>
							<label class="btn btn-default">
								<input type="radio" name="monthsAtAddress" value="24" required> 1 - 2 years
							</label>
							<label class="btn btn-default">
								<input type="radio" name="monthsAtAddress" value="36" required> 2 - 3 years
							</label>
							<label class="btn btn-default">
								<input type="radio" name="monthsAtAddress" value="48" required> 3 - 4 years
							</label>
							<label class="btn btn-default">
								<input type="radio" name="monthsAtAddress" value="60" required> 4 - 5 years
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="monthsAtAddress" value="96" required> More than<br />5 years
							</label>
						</div>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- monthsAtAddress *-->
                    <div class="form-group">
                        <!--  Address Finder-->
                        <div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="autofill_address" class="control-label">Search your address</label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<input type="text" id="autofill_address" value="" placeholder="Start typing to search" class="form-control" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="label label-info" role="alert">
							Auto fill your address by searching it here or enter your address manually below
						</div>
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- postCode *-->
                    <div class="form-group" data-validatecallback="toggleAutoFillMissingFieldsMessage">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="postCode" class="control-label">Postcode<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="text" name="postCode" value="" placeholder="Enter postcode" class="form-control" required minlength="6" maxlength="8" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>

                    <!-- houseNumber *-->
                    <div class="form-group" data-validatecallback="toggleAutoFillMissingFieldsMessage">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="houseNumber" class="control-label">House Name/Number<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="text" id="houseNumber" name="houseNumber" value="" placeholder="Enter house name/number" class="form-control" required />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- addressStreet1 *-->
                    <div class="form-group" data-validatecallback="toggleAutoFillMissingFieldsMessage">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="addressStreet1" class="control-label">Street<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="text" name="addressStreet1" value="" placeholder="Enter street name" class="form-control" required data-differsfrom="house" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- locality *-->
                    <div class="form-group" data-validatecallback="toggleAutoFillMissingFieldsMessage">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="locality" class="control-label">Locality<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="text" name="locality" value="" placeholder="Enter locality name" class="form-control" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- city *-->
                    <div class="form-group" data-validatecallback="toggleAutoFillMissingFieldsMessage">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="city" class="control-label">Town/City<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="text" name="city" value="" placeholder="Enter town/city name" class="form-control" required />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- county *-->
                    <div class="form-group" data-validatecallback="toggleAutoFillMissingFieldsMessage">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="county" class="control-label">County<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="text" name="county" value="" placeholder="Enter county name" class="form-control" required />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- monthlyMortgageRent *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="monthlyMortgageRent" class="control-label">Monthly Mortgage/Rent<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="tel" name="monthlyMortgageRent" value="" placeholder="Enter monthly mortgage/rent" class="form-control" required min="0" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
				<!-- EOF: Form Section | Home Details -->

				<!-- SOF: Form Section | Employment Details -->
				<div class="form-group section-header">
					<div class="col-xs-12 text-center">
						<h3>3. Your employment details</h3>
					</div>
				</div>
                    <!-- incomeSource *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="incomeSource" class="control-label">Employment status<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default wrap">
								<input type="radio" name="incomeSource" value="SelfEmployed" required> Self<br />Employed
							</label>
							<label class="btn btn-default">
								<input type="radio" name="incomeSource" value="EmployedFullTime" required> Full Time
							</label>
							<label class="btn btn-default">
								<input type="radio" name="incomeSource" value="EmployedPartTime" required> Part Time
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="incomeSource" value="EmployedTemporary" required> Temporary<br />Employment
							</label>
							<label class="btn btn-default">
								<input type="radio" name="incomeSource" value="Pension" required> Pension
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="incomeSource" value="DisabilityBenefits" required> Disability<br />Benefits
							</label>
							<label class="btn btn-default">
								<input type="radio" name="incomeSource" value="Benefits" required> Benefits
							</label>
						</div>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- employerName -->
                    <div class="form-group hidden">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="employerName" class="control-label">Employers Name<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="text" name="employerName" value="" placeholder="" class="form-control" minlength="2" data-requiredif="employerNameRequired" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- employerIndustry -->
                    <div class="form-group hidden">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="employerIndustry" class="control-label">Your Employment Industry<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="btn-group" data-toggle="buttons" data-requiredif="employerIndustryRequired">
							<label class="btn btn-default wrap">
								<input type="radio" name="employerIndustry" value="ConstructionManufacturing" > Construction<br />Manufacturing
							</label>
							<label class="btn btn-default">
								<input type="radio" name="employerIndustry" value="Military" > Military
							</label>
							<label class="btn btn-default">
								<input type="radio" name="employerIndustry" value="Health" > Health
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="employerIndustry" value="BankingInsurance" > Banking<br />Insurance
							</label>
							<label class="btn btn-default">
								<input type="radio" name="employerIndustry" value="Education" > Education
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="employerIndustry" value="CivilService" > Civil<br />Service
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="employerIndustry" value="SupermarketRetail" > Supermarket<br />Retail
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="employerIndustry" value="UtilitiesTelecom" > Utilities<br />Telecom
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="employerIndustry" value="HotelRestaurantAndLeisure" > Hotel, Restaurant<br />And Leisure
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="employerIndustry" value="OtherOfficeBased" > Other Office<br />Based
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="employerIndustry" value="OtherNotOfficeBased" > Other Not<br />Office Based
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="employerIndustry" value="DrivingDelivery" > Driving<br />Delivery
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="employerIndustry" value="AdministrationSecretarial" > Administration<br />Secretarial
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="employerIndustry" value="MidLevelManagement" > Mid Level<br />Management
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="employerIndustry" value="SeniorLevelManagement" > Senior Level<br />Management
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="employerIndustry" value="SkilledTrade" > Skilled<br />Trade
							</label>
							<label class="btn btn-default">
								<input type="radio" name="employerIndustry" value="Professional" > Professional
							</label>
						</div>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- jobTitle -->
                    <div class="form-group hidden">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="jobTitle" class="control-label">Job Title<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="text" name="jobTitle" value="" placeholder="Enter job title" class="form-control" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- employmentMonth -->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="employmentMonth" class="control-label">Time Employed<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default wrap">
								<input type="radio" name="employmentMonth" value="12" required> Less than<br />1 year
							</label>
							<label class="btn btn-default">
								<input type="radio" name="employmentMonth" value="24" required> 1 - 2
							</label>
							<label class="btn btn-default">
								<input type="radio" name="employmentMonth" value="36" required> 2 - 3
							</label>
							<label class="btn btn-default">
								<input type="radio" name="employmentMonth" value="48" required> 3 - 4
							</label>
							<label class="btn btn-default">
								<input type="radio" name="employmentMonth" value="60" required> 4 - 5
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="employmentMonth" value="96" required> More than<br />5 years
							</label>
						</div>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- incomeCycle *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="incomeCycle" class="control-label">How often are you paid?<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<select class="form-control" id="incomeCycle" name="incomeCycle" required>
							<option value="">Please select</option>
							<option value="SpecificDayOfMonth">Specific Day of the Month</option>
							<option value="Weekly">Weekly</option>
							<option value="BiWeekly">BiWeekly</option>
							<option value="Fortnightly">Fortnightly</option>
							<option value="LastDayMonth">Last Day of the Month</option>
							<option value="LastWorkingDayMonth">Last Working Day of the Month</option>
							<option value="TwiceMonthly">Twice Monthly</option>
							<option value="FourWeekly">Four Weekly</option>
							<option value="LastFriday">Last Friday of the Month</option>
							<option value="LastThursday">Last Thursday of the Month</option>
							<option value="LastWednesday">Last Wednesday of the Month</option>
							<option value="LastTuesday">Last Tuesday of the Month</option>
							<option value="LastMonday">Last Monday of the Month</option>
						</select>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- nextPayDate1 *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="nextPayDate1" class="control-label">Next Pay Date<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="text" name="nextPayDate1" value="" placeholder="Please select a date" class="form-control" autocomplete="off" required />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- nextPayDate2 -->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="nextPayDate2" class="control-label">Following Pay Date<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="text" name="nextPayDate2" value="" placeholder="Please select a date" class="form-control" autocomplete="off" required />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- monthlyIncome *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="monthlyIncome" class="control-label">Monthly Take Home Pay<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="tel" name="monthlyIncome" value="" placeholder="Enter your monthly income" class="form-control" min="0" max="15000" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- combined_pay -->
                    <div class="form-group hidden">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="combined_pay" class="control-label">Total Monthly Household Income<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="tel" name="combined_pay" value="" placeholder="Enter your total monthly household income" class="form-control" min="0" data-requiredif="combinedPayRequired" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
				<!-- EOF: Form Section | Employment Details -->

				<!-- SOF: Form Section | Your monthly expenditure -->
				<div class="form-group section-header">
					<div class="col-xs-12 text-center">
						<h3>5. Your monthly expenditure</h3>
						<h4>These can be estimates and if you split your bills then please only give us your share</h4>
					</div>
				</div>
                    <!-- monthlyRepayments *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="monthlyRepayments" class="control-label">Monthly loan repayments<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="tel" name="monthlyRepayments" value="" class="form-control" placeholder="Enter monthly loan repayments" required min="0" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- monthlyUtilities *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="monthlyUtilities" class="control-label">Monthly utility bills<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="tel" name="monthlyUtilities" value="" class="form-control" placeholder="Enter monthly utility bills" required min="0" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- monthlyTransport *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="monthlyTransport" class="control-label">Monthly transport costs<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="tel" name="monthlyTransport" value="" class="form-control" placeholder="Enter monthly transport costs" required min="0" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- monthlyFood *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="monthlyFood" class="control-label">Monthly food costs<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="tel" name="monthlyFood" value="" class="form-control" placeholder="Enter monthly food costs" required min="0" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
                    <!-- otherExpense *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="otherExpense" class="control-label">Other monthly expenses<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="tel" name="otherExpense" value="" class="form-control" placeholder="Enter other monthly expenses" required min="0" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
				<!-- EOF: Form Section | Your monthly expenditure -->

				<!-- SOF: Form Section | Bank verification -->
				<div class="form-group section-header">
					<div class="col-xs-12 text-center">
						<h3>6. Bank verification</h3>
						<h4>You require a valid UK bank account to be eligible for a loan</h4>
					</div>
				</div>
                    <!-- bankCardType *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="bankCardType" class="control-label">Do you use a debit card?<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default">
								<input type="radio" name="bankCardType" value="Solo" required> Solo
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="bankCardType" value="SwitchMaestro" required> Switch<br />Maestro
							</label>
							<label class="btn btn-default">
								<input type="radio" name="bankCardType" value="Visa" required> Visa
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="bankCardType" value="VisaDebit" required> Visa<br />Debit
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="bankCardType" value="VisaDelta" required> Visa<br />Delta
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="bankCardType" value="VisaElectron" required> Visa<br />Electron
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="bankCardType" value="MasterCard" required> Master<br />Card
							</label>
							<label class="btn btn-default wrap">
								<input type="radio" name="bankCardType" value="MasterCardDebit" required> Master Debit<br />Card
							</label>
						</div>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
						<div class="label label-info" role="alert">This is just for verification.</div>
					</div>
				</div>
                    <!-- bankAccountNumber *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="bankAccountNumber" class="control-label">Bank Account Number<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="password" name="bankAccountNumber" value="" placeholder="Enter bank account number" class="form-control" required data-length="8" minlength="8" maxlength="8" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
						<div class="label label-info" role="alert">100% secure verification only. This is where, if accepted, your loan funds will be sent.</div>
					</div>
				</div>
                    <!-- bankRoutingNumber *-->
                    <div class="form-group">
					<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
						<label for="bankRoutingNumber" class="control-label">Bank Sort Code<span class="text-danger">*</span></label>
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
						<input type="password" name="bankRoutingNumber" value="" placeholder="Enter bank sort code" class="form-control" required data-length="6" minlength="6" maxlength="6" />
					</div>
					<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
						<div class="hidden label label-danger" role="alert"></div>
					</div>
				</div>
				<!-- EOF: Form Section | Bank verification -->

				<!-- SOF: Form Section | Your Confirmation -->
				<div class="form-group section-header">
					<div class="col-sm-8 col-sm-offset-2 text-center">
						<h3>Your Confirmation</h3>
						<p>By submitting this application I confirm that I have read and understood Amikaro Finance Ltd's Terms & Conditions and Privacy Policy. I understand my application may be transmitted to a panel of lenders and credit brokers who may contact me by SMS, email and automated voice messaging. I agree to a credit check being carried out in relation to my application.</p>
					</div>
				</div>
                    <!-- consentFinancial *-->
                    <div class="form-group section-header">
					<div class="col-sm-8 col-sm-offset-2">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="consentFinancial" /> I agree that Amikaro Finance Ltd trusted 3rd party partners listed here, and those providing the category of services detailed in the Privacy Policy may contact me by email(you can unsubscribe at any time).
							</label>
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
				</div>
                    <!-- consentCreditSearch *-->
                    <div class="form-group section-header">
					<div class="col-sm-8 col-sm-offset-2">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="consentCreditSearch" /> I agree that Amikaro Finance Ltd trusted 3rd party partners listed here, and those providing the category of services detailed in the Privacy Policy may contact me by phone(you can unsubscribe at any time).
							</label>
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
				</div>
                    <!-- consentThirdPartyEmails *-->
                    <div class="form-group section-header">
					<div class="col-sm-8 col-sm-offset-2">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="consentThirdPartyEmails" /> I agree that Amikaro Finance Ltd trusted 3rd party partners listed here, and those providing the category of services detailed in the Privacy Policy may contact me by SMS or automated messages(you can unsubscribe at any time).
							</label>
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
				</div>
                    <!-- consentThirdPartySMS *-->
                    <div class="form-group section-header">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="consentThirdPartySMS" /> I agree that Amikaro Finance Ltd trusted 3rd party partners listed here, and those providing the category of services detailed in the Privacy Policy may contact me by SMS or automated messages(you can unsubscribe at any time).
                                </label>
                                <div class="hidden label label-danger" role="alert"></div>
                            </div>
                        </div>
                    </div>
                    <!-- consentThirdPartyPhone *-->
                    <div class="form-group section-header">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="consentThirdPartyPhone" /> I agree that Amikaro Finance Ltd trusted 3rd party partners listed here, and those providing the category of services detailed in the Privacy Policy may contact me by SMS or automated messages(you can unsubscribe at any time).
                                </label>
                                <div class="hidden label label-danger" role="alert"></div>
                            </div>
                        </div>
                    </div>
				<!-- EOF: Form Section | Your Confirmation -->

				<!-- SOF: Form Section | Submit -->
				<div class="form-group section-header">
					<div class="col-sm-6 col-sm-offset-3 text-center">
						<button type="button" id="submit-btn" class="btn-appply">Get my personalised quote</button>
					</div>
				</div>
				<!-- EOF: Form Section | Submit -->

			</form>
		</div>
	</div>
</div>
<div class="container overlay screen hidden" id="loading-screen">
	<div class="col-sm-12 text-center">
		<h2><?php __('Thanks for applying with My Loans'); ?></h2>
		<h1><?php __('Please wait while we search the best loan for you'); ?></h1>
		<div class="spinner text-center">
			<i class="fa fa-spinner fa-spin"></i>
		</div>
	</div>
</div>
<div class="container overlay error screen hidden" id="rejected-screen">
	<span class="close-btn">&times;</span>
	<div class="col-sm-12 text-center">
		<h2><?php __('Rejected'); ?></h2>
		<h1><?php __('Sorry, your application was rejected. Please try again later.'); ?></h1>
	</div>
</div>
<div class="container overlay error screen hidden" id="error-screen">
	<div class="col-sm-12 text-center">
		<h2><?php __('An error occurred'); ?></h2>
		<h1><?php __('Please try again later'); ?></h1>
	</div>
</div>
<div class="container overlay error screen hidden" id="validation-errors-screen">
	<span class="close-btn">&times;</span>
	<div class="col-sm-12 text-center">
		<h1><?php __('Please fix the following validation errors and resubmit the form'); ?></h1>
		<ul id="server-validation-errors"></ul>
	</div>
</div>
<div class="container overlay error screen hidden" id="network-error-screen">
	<div class="col-sm-12 text-center">
		<h2><?php __('A network error occurred'); ?></h2>
		<h1><?php __('Please check your internet connection. If it\'s working, please retry after some time.'); ?></h1>
	</div>
</div>
<div class="container overlay error screen hidden" id="unhandled-error-screen">
	<div class="col-sm-12 text-center">
		<h2><?php __('An unhandled error occurred'); ?></h2>
		<h1><?php __('We are on it. Please try again after some time.'); ?></h1>
	</div>
</div>
<div class="container overlay error screen hidden" id="database-error-screen">
	<div class="col-sm-12 text-center">
		<h2><?php __('A database error occurred'); ?></h2>
		<h1><?php __('We are on it. Please try again after some time.'); ?></h1>
	</div>
</div>
<div class="container overlay screen hidden" id="redirecting-screen">
	<div class="col-sm-12 text-center">
		<h2><?php __('Congrats!'); ?></h2>
		<h1><?php __('You\'re being redirected to the offers page'); ?></h1>
		<h3><a href="">Click here if you're not redirected within 3 seconds</a>
	</div>
</div>
<div class="container overlay screen hidden" id="progress-screen">
	<h2><?php __('Please wait'); ?></h2>
	<h1><?php __('Your application is being processed'); ?></h1>
	<div class="progress" style="height: 40px;">
	  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0"
	  aria-valuemin="0" aria-valuemax="100" style="width:0%; font-size: 20px; line-height: 40px;">
	    0% Complete
	  </div>
	</div>
</div>
