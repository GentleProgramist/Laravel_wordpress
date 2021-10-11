<main>
	<div id="progress-indicator">
		<div class="percent"></div>
	</div>
	<div class="container" id="form-container">
		<div class="row">
			<div class="col-sm-12">

				<form id="main-form" class="form-horizontal" action="{{route('process/uk') }}"
					  method="POST" onsubmit="return validateForm(event);" novalidate data-countrycode="uk">


					<!-- SOF: Hidden Fields -->
					<input type="hidden" name="fbpix" value="<?= isset($_GET['fbpix']) ? $_GET['fbpix'] : ''; ?>">
					<input type="hidden" name="vid" value="<?= isset($_GET['vid']) ? $_GET['vid'] : ''; ?>">
<!--					<input type="hidden" name="istest" value="--><?//= SUBMIT_TEST_APPLICATIONS; ?><!--">-->
					<input type="hidden" name="transaction_id" value="<?= isset($_GET['transaction_id']) ? $_GET['transaction_id'] : ''; ?>">
					<input type="hidden" name="oid" value="<?= isset($_GET['oid']) ? $_GET['oid'] : ''; ?>">
					<input type="hidden" name="submit_timestamp" value="">
					<!-- EOF: Hidden Fields -->

					<!-- SOF: Form Section | Get Started -->
					<div class="form-group section-header">
						<div class="col-xs-12 text-center">
							<h3>1. Get Started123</h3>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="loan_amount" class="control-label">How much would you like?<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="tel" class="form-control" name="loan_amount" placeholder="Enter loan amount" autofocus="" required min="100" max="5000" step="100" />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="label label-info">Available in £100 increments</div>
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="term" class="control-label">Please select your loan period<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<select class="form-control" id="term" name="term" required>
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
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="purpose" class="control-label">Loan purpose<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-default">
									<input type="radio" name="purpose" value="Subsistence" required /> Subsistence
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="purpose" value="OneOffPurchase" required /> One Off<br />Purchase
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="purpose" value="DebtConsolidation" required /> Debt<br />Consolidation
								</label>
								<label class="btn btn-default">
									<input type="radio" name="purpose" value="CarLoan" required /> Car Loan
								</label>
								<label class="btn btn-default">
									<input type="radio" name="purpose" value="PayBills" required /> Pay Bills
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="purpose" value="PayOffLoan" required /> Pay Off<br />Loan
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="purpose" value="ShortTermCash" required /> Short Term<br />Cash
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="purpose" value="HomeImprovements" required /> Home<br />Improvements
								</label>
								<label class="btn btn-default">
									<input type="radio" name="purpose" value="Other" required /> Other
								</label>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
							<div class="label label-info" role="alert">Please choose the option that suits for you, or if none are applicable, choose "Other"</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="title" class="control-label">Title<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-default">
									<input type="radio" name="title" value="Mr" required> Mr
								</label>
								<label class="btn btn-default">
									<input type="radio" name="title" value="Miss" required> Miss
								</label>
								<label class="btn btn-default">
									<input type="radio" name="title" value="Mrs" required> Mrs
								</label>
								<label class="btn btn-default">
									<input type="radio" name="title" value="Ms" required> Ms
								</label>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
							<div class="label label-info" role="alert">We only use your data for anaylising. For more information see our <a class="alert-link" href="privacy-policy.php">privacy policy</a>.</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="first_name" class="control-label">First Name<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="text" class="form-control" name="first_name" placeholder="Enter your first name" minlength="2" required data-validateregex="^[a-zA-Z ]+$" data-validateregexerrormessage="First name can not contain any character other than alphabets and spaces" />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="last_name" class="control-label">Last Name<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="text" class="form-control" name="last_name" placeholder="Enter your last name" required minlength="2" data-validateregex="^[a-zA-Z-\' ]+$" data-validateregexerrormessage="Last name can not contain any characters other than alphabets, spaces, hyphens and apostrophes" />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="dob" class="control-label">Date of birth<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="text" class="form-control" id="dob" name="dob" placeholder="DD/MM/YYYY" required autocomplete="off" />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
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
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="mobile" class="control-label">Mobile phone number<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile number" data-length="11" maxlength="11" data-beginswith="07" required />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="homephone" class="control-label">Home phone number<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="tel" class="form-control" id="homephone" name="homephone" placeholder="Enter home phone number" required data-length="11" maxlength="11" data-beginswithany="01,02,07" />
							<button type="button" class="btn btn-success use-mobile-number hidden">Use mobile<br />number</button>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="employerphone" class="control-label">Daytime phone number<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="tel" class="form-control" id="employerphone" name="employerphone" placeholder="Enter daytime number" required data-length="11" maxlength="11" data-beginswithany="01,02,07" />
							<button type="button" class="btn btn-success use-mobile-number hidden">Use mobile<br />number</button>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="marital_status" class="control-label">Marital status<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-default">
									<input type="radio" name="marital_status" value="Single" required> Single
								</label>
								<label class="btn btn-default">
									<input type="radio" name="marital_status" value="Married" required> Married
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="marital_status" value="LivingTogether" required> Living<br />Together
								</label>
								<label class="btn btn-default">
									<input type="radio" name="marital_status" value="Separated" required> Separated
								</label>
								<label class="btn btn-default">
									<input type="radio" name="marital_status" value="Divorced" required> Divorced
								</label>
								<label class="btn btn-default">
									<input type="radio" name="marital_status" value="Widowed" required> Widowed
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
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="no_of_dependents" class="control-label">Number of dependants<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-default">
									<input type="radio" name="no_of_dependents" value="0" required> None
								</label>
								<label class="btn btn-default">
									<input type="radio" name="no_of_dependents" value="1" required> 1
								</label>
								<label class="btn btn-default">
									<input type="radio" name="no_of_dependents" value="2" required> 2
								</label>
								<label class="btn btn-default">
									<input type="radio" name="no_of_dependents" value="3" required> 3+
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
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="status" class="control-label">Home status<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-default wrap">
									<input type="radio" name="status" value="HomeOwner" required> Home<br />owner
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="status" value="PrivateTenant" required> Private<br />tenant
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="status" value="CouncilTenant" required> Council<br />tenant
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="status" value="LivingWithParents" required> Living with<br />parents
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="status" value="LivingWithFriends" required> Living with<br />friends
								</label>
								<label class="btn btn-default">
									<input type="radio" name="status" value="Other" required> Other
								</label>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
							<div class="label label-info" role="alert">Your current living address.</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="timeataddress" class="control-label">How long have you been at this address?</label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-default wrap">
									<input type="radio" name="timeataddress" value="12" required> Less than<br />1 year
								</label>
								<label class="btn btn-default">
									<input type="radio" name="timeataddress" value="24" required> 1 - 2 years
								</label>
								<label class="btn btn-default">
									<input type="radio" name="timeataddress" value="36" required> 2 - 3 years
								</label>
								<label class="btn btn-default">
									<input type="radio" name="timeataddress" value="48" required> 3 - 4 years
								</label>
								<label class="btn btn-default">
									<input type="radio" name="timeataddress" value="60" required> 4 - 5 years
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="timeataddress" value="96" required> More than<br />5 years
								</label>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<!-- <div class="form-group">
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
					</div> -->
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="postcode" class="control-label">Postcode<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="text" name="postcode" value="" placeholder="Enter postcode" class="form-control" required minlength="6" maxlength="8" />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="house" class="control-label">House Name/Number<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="text" id="house" name="house" value="" placeholder="Enter house name/number" class="form-control" required />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="address1" class="control-label">Street<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="text" name="address1" id="address1" value="" placeholder="Enter street name" class="form-control" required data-differsfrom="house" />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="address2" class="control-label">Locality<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="text" name="address2" value="" placeholder="Enter locality name" class="form-control" />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="town" class="control-label">Town/City<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="text" name="town" value="" placeholder="Enter town/city name" class="form-control" required />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
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
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="mortrent" class="control-label">Monthly Mortgage/Rent<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="tel" name="mortrent" value="" placeholder="Enter monthly mortgage/rent" class="form-control" required min="0" />
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
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="primaryincome" class="control-label">Employment status<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-default wrap">
									<input type="radio" name="primaryincome" value="SelfEmployed" required> Self<br />Employed
								</label>
								<label class="btn btn-default">
									<input type="radio" name="primaryincome" value="EmployedFullTime" required> Full Time
								</label>
								<label class="btn btn-default">
									<input type="radio" name="primaryincome" value="EmployedPartTime" required> Part Time
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="primaryincome" value="EmployedTemporary" required> Temporary<br />Employment
								</label>
								<label class="btn btn-default">
									<input type="radio" name="primaryincome" value="Pension" required> Pension
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="primaryincome" value="DisabilityBenefits" required> Disability<br />Benefits
								</label>
								<label class="btn btn-default">
									<input type="radio" name="primaryincome" value="Benefits" required> Benefits
								</label>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group hidden">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="employername" class="control-label">Employers Name<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="text" name="employername" value="" placeholder="" class="form-control" minlength="2" data-requiredif="employerNameRequired" />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group hidden">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="industry" class="control-label">Your Employment Industry<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="btn-group" data-toggle="buttons" data-requiredif="employerIndustryRequired">
								<label class="btn btn-default wrap">
									<input type="radio" name="industry" value="ConstructionManufacturing" > Construction<br />Manufacturing
								</label>
								<label class="btn btn-default">
									<input type="radio" name="industry" value="Military" > Military
								</label>
								<label class="btn btn-default">
									<input type="radio" name="industry" value="Health" > Health
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="industry" value="BankingInsurance" > Banking<br />Insurance
								</label>
								<label class="btn btn-default">
									<input type="radio" name="industry" value="Education" > Education
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="industry" value="CivilService" > Civil<br />Service
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="industry" value="SupermarketRetail" > Supermarket<br />Retail
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="industry" value="UtilitiesTelecom" > Utilities<br />Telecom
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="industry" value="HotelRestaurantAndLeisure" > Hotel, Restaurant<br />And Leisure
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="industry" value="OtherOfficeBased" > Other Office<br />Based
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="industry" value="OtherNotOfficeBased" > Other Not<br />Office Based
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="industry" value="DrivingDelivery" > Driving<br />Delivery
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="industry" value="AdministrationSecretarial" > Administration<br />Secretarial
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="industry" value="MidLevelManagement" > Mid Level<br />Management
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="industry" value="SeniorLevelManagement" > Senior Level<br />Management
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="industry" value="SkilledTrade" > Skilled<br />Trade
								</label>
								<label class="btn btn-default">
									<input type="radio" name="industry" value="Professional" > Professional
								</label>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group hidden">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="job_title" class="control-label">Job Title<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="text" name="job_title" value="" placeholder="Enter job title" class="form-control" />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="timeinwork" class="control-label">Time<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-default wrap">
									<input type="radio" name="timeinwork" value="12" required> Less than<br />1 year
								</label>
								<label class="btn btn-default">
									<input type="radio" name="timeinwork" value="24" required> 1 - 2
								</label>
								<label class="btn btn-default">
									<input type="radio" name="timeinwork" value="36" required> 2 - 3
								</label>
								<label class="btn btn-default">
									<input type="radio" name="timeinwork" value="48" required> 3 - 4
								</label>
								<label class="btn btn-default">
									<input type="radio" name="timeinwork" value="60" required> 4 - 5
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="timeinwork" value="96" required> More than<br />5 years
								</label>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="payfrequency" class="control-label">How often are you paid?<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<select class="form-control" id="payfrequency" name="payfrequency" required>
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
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="nextpaydate" class="control-label">Next Pay Date<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="text" name="nextpaydate" value="" placeholder="Please select a date" class="form-control" autocomplete="off" required />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="followingpaydate" class="control-label">Following Pay Date<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="text" name="followingpaydate" value="" placeholder="Please select a date" class="form-control" autocomplete="off" required />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="netpay" class="control-label">Monthly Take Home Pay<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="tel" name="netpay" value="" placeholder="Enter your monthly income" class="form-control" min="0" max="15000" required />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group hidden">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="combined_pay" class="control-label">Total Monthly Household Income<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="tel" name="combined_pay" value="" placeholder="Enter your total monthly household income" class="form-control" data-customvalidationrule="combinedPayMinIf" data-requiredif="combinedPayRequired" />
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
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="commit" class="control-label">Monthly loan repayments<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="tel" name="commit" value="" class="form-control" placeholder="Enter monthly loan repayments" required min="0" />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="utilities" class="control-label">Monthly utility bills<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="tel" name="utilities" value="" class="form-control" placeholder="Enter monthly utility bills" required min="0" />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="transport" class="control-label">Monthly transport costs<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="tel" name="transport" value="" class="form-control" placeholder="Enter monthly transport costs" required min="0" />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="food" class="control-label">Monthly food costs<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="tel" name="food" value="" class="form-control" placeholder="Enter monthly food costs" required min="0" />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="expense" class="control-label">Other monthly expenses<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="tel" name="expense" value="" class="form-control" placeholder="Enter other monthly expenses" required min="0" />
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
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="debitcard" class="control-label">Do you use a debit card?<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-default">
									<input type="radio" name="debitcard" value="Solo" required> Solo
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="debitcard" value="SwitchMaestro" required> Switch<br />Maestro
								</label>
								<label class="btn btn-default">
									<input type="radio" name="debitcard" value="Visa" required> Visa
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="debitcard" value="VisaDebit" required> Visa<br />Debit
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="debitcard" value="VisaDelta" required> Visa<br />Delta
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="debitcard" value="VisaElectron" required> Visa<br />Electron
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="debitcard" value="MasterCard" required> Master<br />Card
								</label>
								<label class="btn btn-default wrap">
									<input type="radio" name="debitcard" value="MasterCardDebit" required> Master Debit<br />Card
								</label>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
							<div class="label label-info" role="alert">This is just for verification.</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="bankaccount" class="control-label">Bank Account Number<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="password" name="bankaccount" value="" placeholder="Enter bank account number" class="form-control" required data-length="8" minlength="8" maxlength="8" />
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
							<div class="hidden label label-danger" role="alert"></div>
							<div class="label label-info" role="alert">100% secure verification only. This is where, if accepted, your loan funds will be sent.</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
							<label for="sortcode" class="control-label">Bank Sort Code<span class="text-danger">*</span></label>
						</div>
						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
							<input type="password" name="sortcode" value="" placeholder="Enter bank sort code" class="form-control" required data-length="6" minlength="6" maxlength="6" />
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
							<p>By submitting this application I confirm that I have read and understood The Stag Finance Ltd's Terms & Conditions and Privacy Policy. I understand my application may be transmitted to a panel of lenders and credit brokers who may contact me by SMS, email and automated voice messaging. I agree to a credit check being carried out in relation to my application.</p>
						</div>
					</div>
					<div class="form-group section-header">
						<div class="col-sm-8 col-sm-offset-2">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="terms1" /> I agree that The Stag Finance Ltd trusted 3rd party partners <a href="/privacy.php" target="_blank">listed here</a>, and those providing the category of services detailed in the Privacy Policy may contact me by email(you can unsubscribe at any time).
								</label>
								<div class="hidden label label-danger" role="alert"></div>
							</div>
						</div>
					</div>
					<div class="form-group section-header">
						<div class="col-sm-8 col-sm-offset-2">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="terms2" /> I agree that The Stag Finance Ltd trusted 3rd party partners <a href="/privacy.php" target="_blank">listed here</a>, and those providing the category of services detailed in the Privacy Policy may contact me by phone(you can unsubscribe at any time).
								</label>
								<div class="hidden label label-danger" role="alert"></div>
							</div>
						</div>
					</div>
					<div class="form-group section-header">
						<div class="col-sm-8 col-sm-offset-2">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="terms3" /> I agree that The Stag Finance Ltd trusted 3rd party partners <a href="/privacy.php" target="_blank">listed here</a>, and those providing the category of services detailed in the Privacy Policy may contact me by SMS or automated messages(you can unsubscribe at any time).
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
	<?php $this->load->view('partials/application-status-screens'); ?>
</main>
