  <main>
  	<div id="progress-indicator">
  		<div class="percent"></div>
  	</div>
  	<div class="container" id="form-container">
  		<div class="row">
  			<div class="col-sm-12">
  				<form id="application-form" class="form-horizontal" action="{{route('process', $countrycode="us") }}"
                      method="POST" onsubmit="return validateForm(event);" novalidate
                      data-countrycode="us">
                    @csrf


  					<!-- SOF: Hidden Fields -->
  					<input type="hidden" id="fbpix" name="fbpix" value="<?= $_GET['fbpix'] ?? ''; ?>">
  					<input type="hidden" id="vid" name="vid" value="<?= $_GET['vid'] ?? ''; ?>">
{{--  					<input type="hidden" name="istest" value="<?= SUBMIT_TEST_APPLICATIONS; ?>">--}}
  					<input type="hidden" id="transaction_id" name="transaction_id" value="<?= $_GET['aff_sub'] ?? ''; ?>">
  					<input type="hidden" id="oid" name="oid" value="<?= $_GET['oid'] ?? ''; ?>">
  					<input type="hidden" id="aff_sub" name="aff_sub" value="<?= $_GET['aff_sub'] ?? ''; ?>">
  					<input type="hidden" id="aff_sub2" name="aff_sub2" value="<?= $_GET['aff_sub2'] ?? ''; ?>">
{{--                    <input type="hidden" name="submit_timestamp" value="">--}}
  					<!-- EOF: Hidden Fields -->

  					<!-- SOF: Form Section | Get Started -->
  					<div class="form-group section-header">
  						<div class="col-xs-12 text-center">
  							<h3>1. Get Started</h3>
  						</div>
  					</div>

                    <!-- loanAmount -->
  					<div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="loanAmount" class="control-label">How much would you like?<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<input type="tel" class="form-control" name="loanAmount" placeholder="Enter loan amount" autofocus="" required min="100" max="5000" step="100" />
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="label label-info">Available in $100 increments</div>
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- loanTerms -->
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
                    <!-- nameTitle -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="nameTitle" class="control-label">Title<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="btn-group" data-toggle="buttons">
  								<label class="btn btn-default" id="nttMr">
  									<input type="radio" name="nameTitle" value="Mr" required> Mr
  								</label>
  								<label class="btn btn-default" id="nttMiss">
  									<input type="radio" name="nameTitle" value="Miss" required> Miss
  								</label>
  								<label class="btn btn-default" id="nttMrs">
  									<input type="radio" name="nameTitle" value="Mrs" required> Mrs
  								</label>
  								<label class="btn btn-default" id="nttMs">
  									<input type="radio" name="nameTitle" value="Ms" required> Ms
  								</label>
  							</div>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="label label-info" role="alert">We only use your data for anaylising. For more information see our <a class="alert-link" href="privacy-policy.php">privacy policy</a>.</div>
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- firstName -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="firstName"  class="control-label">First Name<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<input type="text" class="form-control" id="firstName"  name="firstName" placeholder="First name" minlength="2" required data-validateregex="^[a-zA-Z ]+$" data-validateregexerrormessage="First name can not contain any character other than alphabets and spaces" />
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- lastName -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="lastName" class="control-label">Last Name<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<input type="text" class="form-control" name="lastName" placeholder="Last name" required minlength="2" data-validateregex="^[a-zA-Z-\' ]+$" data-validateregexerrormessage="Last name can not contain any characters other than alphabets, spaces, hyphens and apostrophes" />
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- dateOfBirthDay -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="dateOfBirth" class="control-label">Date of birth<span class="text-danger">*</span></label>
  						</div>
                    <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<div class="row">
  								<div class="col-xs-4">
  									<input type="tel" class="form-control" name="dateOfBirthDay" id="dateOfBirthDay" autocomplete="off" required placeholder="DD" data-length="3" minlength="2" maxlength="2" />
  								</div>
  								<div class="col-xs-4 ssn-dash">
  									<input type="tel" class="form-control" name="dateOfBirthMonth" id="dateOfBirthMonth" autocomplete="off" required placeholder="MM" data-length="2" minlength="2" maxlength="2" />
  								</div>
  								<div class="col-xs-4 ssn-dash">
  									<input type="tel" class="form-control" name="dateOfBirthYear" id="dateOfBirthYear" autocomplete="off" required placeholder="YYYY" data-length="4" minlength="4" maxlength="4" />
  								</div>
  							</div>
  						</div>
{{--                        <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">--}}
{{--  							<input type="text" class="form-control" id="dateOfBirthDay" name="dateOfBirthDay" placeholder="DD/MM/YYYY" required autocomplete="off" />--}}
{{--  						</div>--}}
{{--  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">--}}
{{--  							<div class="hidden label label-danger" role="alert"></div>--}}
{{--  						</div>--}}
  					</div>
                    <!-- SSN -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="ssn" class="control-label">Social Security Number<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<div class="row">
  								<div class="col-xs-4">
  									<input type="tel" class="form-control" name="ssn1" id="ssn1" autocomplete="off" required placeholder="XXX" data-length="3" minlength="3" maxlength="3" />
  								</div>
  								<div class="col-xs-4 ssn-dash">
  									<input type="tel" class="form-control" name="ssn2" id="ssn2" autocomplete="off" required placeholder="XX" data-length="2" minlength="2" maxlength="2" />
  								</div>
  								<div class="col-xs-4 ssn-dash">
  									<input type="tel" class="form-control" name="ssn3" id="ssn3" autocomplete="off" required placeholder="XXXX" data-length="4" minlength="4" maxlength="4" />
  								</div>
  							</div>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- licenseNumber -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="licenseNumber" class="control-label">Driving License Number<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<input type="text" class="form-control" id="licenseNumber" name="licenseNumber" required autocomplete="off" minlength="7" />
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- licenseState -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="licenseState" class="control-label">Driving License State<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<select class="form-control" id="licenseState" name="licenseState" required>
  								<option value="" disabled="disabled" selected="">Select</option>
  								<option value="AL">Alabama</option>
  								<option value="AK">Alaska</option>
  								<option value="AZ">Arizona</option>
  								<option value="AR">Arkansas</option>
  								<option value="CA">California</option>
  								<option value="CO">Colorado</option>
  								<option value="CT">Connecticut</option>
  								<option value="DE">Delaware</option>
  								<option value="DC">District of Columbia</option>
  								<option value="FL">Florida</option>
  								<option value="GA">Georgia</option>
  								<option value="HI">Hawaii</option>
  								<option value="ID">Idaho</option>
  								<option value="IL">Illinois</option>
  								<option value="IN">Indiana</option>
  								<option value="IA">Iowa</option>
  								<option value="KS">Kansas</option>
  								<option value="KY">Kentucky</option>
  								<option value="LA">Louisiana</option>
  								<option value="ME">Maine</option>
  								<option value="MD">Maryland</option>
  								<option value="MA">Massachusetts</option>
  								<option value="MI">Michigan</option>
  								<option value="MN">Minnesota</option>
  								<option value="MS">Mississippi</option>
  								<option value="MO">Missouri</option>
  								<option value="MT">Montana</option>
  								<option value="NE">Nebraska</option>
  								<option value="NV">Nevada</option>
  								<option value="NH">New Hampshire</option>
  								<option value="NJ">New Jersey</option>
  								<option value="NM">New Mexico</option>
  								<option value="NY">New York</option>
  								<option value="NC">North Carolina</option>
  								<option value="ND">North Dakota</option>
  								<option value="OH">Ohio</option>
  								<option value="OK">Oklahoma</option>
  								<option value="OR">Oregon</option>
  								<option value="PA">Pennsylvania</option>
  								<option value="RI">Rhode Island</option>
  								<option value="SC">South Carolina</option>
  								<option value="SD">South Dakota</option>
  								<option value="TN">Tennessee</option>
  								<option value="TX">Texas</option>
  								<option value="UT">Utah</option>
  								<option value="VT">Vermont</option>
  								<option value="VA">Virginia</option>
  								<option value="WA">Washington</option>
  								<option value="WV">West Virginia</option>
  								<option value="WI">Wisconsin</option>
  								<option value="WY">Wyoming</option>
  								<option value="AA">Armed Forces Americas</option>
  								<option value="AE">Armed Forces Europe</option>
  								<option value="AP">Armed Forces Pacific</option>
  							</select>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- email -->
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
                    <!-- cellPhoneNumber -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="cellPhoneNumber" class="control-label">Mobile phone number<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<input type="tel" class="form-control" id="cellPhoneNumber" name="cellPhoneNumber" placeholder="Enter mobile number" data-length="10" maxlength="10" minlength="10" required />
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- homePhoneNumber -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="homePhoneNumber" class="control-label">Home phone number<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<input type="tel" class="form-control" id="homePhoneNumber" name="homePhoneNumber" placeholder="Enter home phone number" required data-length="10" maxlength="10" minlength="10" />
  							<button type="button" class="btn btn-success use-mobile-number hidden">Use mobile<br />number</button>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- workPhoneNumber -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="workPhoneNumber" class="control-label">Daytime phone number<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<input type="tel" class="form-control" id="workPhoneNumber" name="workPhoneNumber" placeholder="Enter daytime number" required data-length="10" maxlength="10" minlength="10" />
  							<button type="button" class="btn btn-success use-mobile-number hidden">Use mobile<br />number</button>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- inMilitary -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="inMilitary" id="inMilitary" class="control-label">Military service<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="btn-group" data-toggle="buttons">
  								<label class="btn btn-default" id="milNone">
  									<input type="radio" name="inMilitary" value="None" required> None
  								</label>
  								<label class="btn btn-default" id="milVeteran">
  									<input type="radio" name="inMilitary" value="Veteran" required> Veteran
  								</label>
  								<label class="btn btn-default" id="milReserves">
  									<input type="radio" name="inMilitary" value="Reserves" required> Reserves
  								</label>
  								<label class="btn btn-default wrap" id="milActiveDuty">
  									<input type="radio" name="inMilitary" value="ActiveDuty" required> Active<br />Duty
  								</label>
  							</div>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- maritalStatus -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="maritalStatus" class="control-label">Marital status<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="btn-group" data-toggle="buttons">
  								<label class="btn btn-default" id="msSingle">
  									<input type="radio" name="maritalStatus" value="Single" required> Single
  								</label>
  								<label class="btn btn-default" id="msMarried">
  									<input type="radio" name="maritalStatus" value="Married" required> Married
  								</label>
  								<label class="btn btn-default wrap" id="msLivingTogether">
  									<input type="radio" name="maritalStatus" value="LivingTogether" required> Living<br />Together
  								</label>
  								<label class="btn btn-default" id="msSeparated">
  									<input type="radio" name="maritalStatus" value="Separated" required> Separated
  								</label>
  								<label class="btn btn-default" id="msDivorced">
  									<input type="radio" name="maritalStatus" value="Divorced" required> Divorced
  								</label>
  								<label class="btn btn-default" id="msWidowed">
  									<input type="radio" name="maritalStatus" value="Widowed" required> Widowed
  								</label>
  								<label class="btn btn-default" id="msOther">
  									<input type="radio" name="maritalStatus" value="Other" required> Other
  								</label>
  							</div>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- dependants -->
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
                                <label for="dependants" class="control-label">Number of dependants<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
                                <div class="btn-group" data-toggle="buttons" >
                                    <label class="btn btn-default" id="dep0">
                                        <input type="radio" name="dependants" value="0" required> None
                                    </label>
                                    <label class="btn btn-default" id="dep1">
                                        <input type="radio" name="dependants" value="1" required> 1
                                    </label>
                                    <label class="btn btn-default" id="dep2">
                                        <input type="radio" name="dependants" value="2" required> 2
                                    </label>
                                    <label class="btn btn-default" id="dep3">
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
                    <!-- residentialStatus -->
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
                                <label for="residentialStatus" class="control-label">Home status<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default wrap" id="rsHomeOwner">
                                        <input type="radio" name="residentialStatus" value="HomeOwner" required> Home<br />owner
                                    </label>
                                    <label class="btn btn-default wrap" id="rsPrivateTenant">
                                        <input type="radio" name="residentialStatus" value="PrivateTenant" required> Private<br />tenant
                                    </label>
                                    <label class="btn btn-default wrap" id="rsCouncilTenant">
                                        <input type="radio" name="residentialStatus" value="CouncilTenant" required> Council<br />tenant
                                    </label>
                                    <label class="btn btn-default wrap" id="rsLivingWithParents">
                                        <input type="radio" name="residentialStatus" value="LivingWithParents" required> Living with<br />parents
                                    </label>
                                    <label class="btn btn-default wrap" id="rsLivingWithFriends">
                                        <input type="radio" name="residentialStatus" value="LivingWithFriends" required> Living with<br />friends
                                    </label>
                                    <label class="btn btn-default" id="rsOther">
                                        <input type="radio" name="residentialStatus" value="Other" required> Other
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
                                <div class="hidden label label-danger" role="alert"></div>
                                <div class="label label-info" role="alert">Your current living address.</div>
                            </div>
                        </div>
                    <!-- monthsAtAddress -->
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
                                <label for="monthsAtAddress" class="control-label">How long have you been at this address?</label>
                            </div>
                            <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default wrap" id="maa12">
                                        <input type="radio" name="monthsAtAddress" value="12" required> Less than<br />1 year
                                    </label>
                                    <label class="btn btn-default" id="maa24">
                                        <input type="radio" name="monthsAtAddress" value="24" required> 1 - 2 years
                                    </label>
                                    <label class="btn btn-default" id="maa36">
                                        <input type="radio" name="monthsAtAddress" value="36" required> 2 - 3 years
                                    </label>
                                    <label class="btn btn-default" id="maa48">
                                        <input type="radio" name="monthsAtAddress" value="48" required> 3 - 4 years
                                    </label>
                                    <label class="btn btn-default" id="maa60">
                                        <input type="radio" name="monthsAtAddress" value="60" required> 4 - 5 years
                                    </label>
                                    <label class="btn btn-default wrap" id="maa96">
                                        <input type="radio" name="monthsAtAddress" value="96" required> More than<br />5 years
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
                                <div class="hidden label label-danger" role="alert"></div>
                            </div>
                        </div>
                    <!-- zip -->
                    <div class="form-group" data-validatecallback="toggleAutoFillMissingFieldsMessage">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="zip" class="control-label">Zip Code<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<input type="text" id="zip" name="zip" value="" placeholder="Enter zipcode" class="form-control" required minlength="5" maxlength="5" data-length="5" autocomplete="new-street-address" />
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
                        <!-- city *-->
                        <div class="form-group" data-validatecallback="toggleAutoFillMissingFieldsMessage">
                            <div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
                                <label for="city" class="control-label">Town/City<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
                                <input type="text" name="city" value="" placeholder="Enter city name" class="form-control" />
                            </div>
                            <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
                                <div class="hidden label label-danger" role="alert"></div>
                            </div>
                        </div>
                        <!-- state -->
  					<div class="form-group" data-validatecallback="toggleAutoFillMissingFieldsMessage">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="state" class="control-label">State<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<select class="form-control" name="state" id="state" required>
  								<option value="" selected="selected" disabled>Select a State</option>
  								<option value="AL">Alabama</option>
  								<option value="AK">Alaska</option>
  								<option value="AZ">Arizona</option>
  								<option value="AR">Arkansas</option>
  								<option value="CA">California</option>
  								<option value="CO">Colorado</option>
  								<option value="CT">Connecticut</option>
  								<option value="DE">Delaware</option>
  								<option value="DC">District Of Columbia</option>
  								<option value="FL">Florida</option>
  								<option value="GA">Georgia</option>
  								<option value="HI">Hawaii</option>
  								<option value="ID">Idaho</option>
  								<option value="IL">Illinois</option>
  								<option value="IN">Indiana</option>
  								<option value="IA">Iowa</option>
  								<option value="KS">Kansas</option>
  								<option value="KY">Kentucky</option>
  								<option value="LA">Louisiana</option>
  								<option value="ME">Maine</option>
  								<option value="MD">Maryland</option>
  								<option value="MA">Massachusetts</option>
  								<option value="MI">Michigan</option>
  								<option value="MN">Minnesota</option>
  								<option value="MS">Mississippi</option>
  								<option value="MO">Missouri</option>
  								<option value="MT">Montana</option>
  								<option value="NE">Nebraska</option>
  								<option value="NV">Nevada</option>
  								<option value="NH">New Hampshire</option>
  								<option value="NJ">New Jersey</option>
  								<option value="NM">New Mexico</option>
  								<option value="NY">New York</option>
  								<option value="NC">North Carolina</option>
  								<option value="ND">North Dakota</option>
  								<option value="OH">Ohio</option>
  								<option value="OK">Oklahoma</option>
  								<option value="OR">Oregon</option>
  								<option value="PA">Pennsylvania</option>
  								<option value="RI">Rhode Island</option>
  								<option value="SC">South Carolina</option>
  								<option value="SD">South Dakota</option>
  								<option value="TN">Tennessee</option>
  								<option value="TX">Texas</option>
  								<option value="UT">Utah</option>
  								<option value="VT">Vermont</option>
  								<option value="VA">Virginia</option>
  								<option value="WA">Washington</option>
  								<option value="WV">West Virginia</option>
  								<option value="WI">Wisconsin</option>
  								<option value="WY">Wyoming</option>
  							</select>
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
                    <!-- incomeSource -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="incomeSource" id="incomeSource" class="control-label">Employment status<span class="text-danger">*</span></label>
  						</div>
                        <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
                            <div class="btn-group" data-toggle="buttons" >
                                <label class="btn btn-default wrap" id="SelfEmployed">
                                    <input type="radio" name="incomeSource" value="SelfEmployed" required> Self<br />Employed
                                </label>
                                <label class="btn btn-default" id="EmployedFullTime">
                                    <input type="radio" name="incomeSource" value="EmployedFullTime" required> Full Time
                                </label>
                                <label class="btn btn-default" id="EmployedPartTime">
                                    <input type="radio" name="incomeSource" value="EmployedPartTime" required> Part Time
                                </label>
                                <label class="btn btn-default wrap" id="EmployedTemporary">
                                    <input type="radio" name="incomeSource" value="EmployedTemporary" required> Temporary<br />Employment
                                </label>
                                <label class="btn btn-default" id="Pension">
                                    <input type="radio" name="incomeSource" value="Pension" required> Pension
                                </label>
                                <label class="btn btn-default wrap" id="DisabilityBenefits">
                                    <input type="radio" name="incomeSource" value="DisabilityBenefits" required> Disability<br />Benefits
                                </label>
                                <label class="btn btn-default" id="Benefits">
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
  							<label for="employerName" id="employerName"  class="control-label">Employers Name<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<input type="text" name="employerName" value="" placeholder="" class="form-control" minlength="2" data-requiredif="employerNameRequired" />
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- jobTitle -->
                    <div class="form-group hidden">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="JobTitle"  id="jobTitle" class="control-label">Job Title<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<input type="text" name="JobTitle" value="" placeholder="" class="form-control" />
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- employmentMonths -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="employmentMonth" class="control-label">Time<span class="text-danger">*</span></label>
  						</div>
                        <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default wrap" id="em12">
                                    <input type="radio" name="employmentMonth" value="12" required> Less than<br />1 year
                                </label>
                                <label class="btn btn-default" id="em24">
                                    <input type="radio" name="employmentMonth" value="24" required> 1 - 2
                                </label>
                                <label class="btn btn-default" id="em36">
                                    <input type="radio" name="employmentMonth" value="36" required> 2 - 3
                                </label>
                                <label class="btn btn-default" id="em48">
                                    <input type="radio" name="employmentMonth" value="48" required> 3 - 4
                                </label>
                                <label class="btn btn-default" id="em60">
                                    <input type="radio" name="employmentMonth" value="60" required> 4 - 5
                                </label>
                                <label class="btn btn-default wrap" id="em96">
                                    <input type="radio" name="employmentMonth" value="96" required> More than<br />5 years
                                </label>
                            </div>
                        </div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- bankDirectDeposit -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="bankDirectDeposit" class="control-label">How are you paid?<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<select class="form-control" id="bankDirectDeposit" name="bankDirectDeposit" required>
  								<option value="">Please select</option>
  								<option value="Cash">Cash</option>
  								<option value="Cheque">Cheque</option>
  								<option value="RegionalDirectDeposit">Regional Direct Deposit</option>
  								<option value="NonRegionalDirectDeposit">Non-Regional Direct Deposit</option>
  							</select>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- incomeCycle -->
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
                    <!-- nextPayDate1 -->
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
                    <!-- monthlyIncome -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="monthlyIncome" id="monthlyIncome" class="control-label">Monthly Take Home Pay<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<input type="tel" name="monthlyIncome" value="" placeholder="" class="form-control" min="0" max="15000" required />
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- CombinedMonthlyHouseholdIncome -->
                    <div class="form-group hidden">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="CombinedMonthlyHouseholdIncome" class="control-label">Total Monthly Household Income<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<input type="tel" name="CombinedMonthlyHouseholdIncome" value="" placeholder="" class="form-control" data-customvalidationrule="combinedPayMinIf" data-requiredif="combinedPayRequired" />
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
  					<!-- EOF: Form Section | Employment Details -->

  					<!-- SOF: Form Section | Bank verification -->
  					<div class="form-group section-header">
  						<div class="col-xs-12 text-center">
  							<h3>6. Bank verification</h3>
  							<h4>You require a valid US bank account to be eligible for a loan</h4>
  						</div>
  					</div>
                    <!-- bankName -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="bankName" id=bankName" class="control-label">Bank Name<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<input type="text" name="bankName" value="" placeholder="Enter bank name" class="form-control" id="bankName" required autocomplete="off" />
                <!-- <i id="bankSuggestionsInlineLoadingIcon" class="fa fa-spin fa-spinner input-inline-loading-icon hidden"></i>
                <div id="bankSuggestionsDropdownContainer" class="suggestions-dropdown hidden">
                  <span class="close-btn">&times;</span>
                  <div class="options">
                  </div>
                </div> -->
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
                	<div class="label label-info" role="alert">Enter your bank name to search for a list of banks in the US, then select the appropriate branch to get the routing number automatically.</div>
  						</div>
  					</div>
                    <!-- bankRoutingNumber -->
                    <div class="form-group">
                      <div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
                        <label for="bankRoutingNumber" class="control-label">ABA/Routing Number<span class="text-danger">*</span></label>
                      </div>
                      <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
                        <input type="tel" name="bankRoutingNumber" value="" placeholder="" class="form-control" required minlength="7" maxlength="20" />
                      </div>
                      <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
                        <div class="hidden label label-danger" role="alert"></div>
                      </div>
                    </div>
                    <!-- bankAccountNumber -->
                    <div class="form-group">
                      <div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
                        <label for="bankAccountNumber" class="control-label">Bank Account Number<span class="text-danger">*</span></label>
                      </div>
                      <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
                        <input type="password" name="bankAccountNumber" value="" placeholder="" class="form-control" required />
                      </div>
                      <div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
                        <div class="hidden label label-danger" role="alert"></div>
                        <div class="label label-info" role="alert">100% secure verification only. This is where, if accepted, your loan funds will be sent.</div>
                      </div>
                    </div>
                    <!-- bankAccountType -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="bankAccountType" class="control-label">Bank Account Type<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<select class="form-control" id="bankAccountType" name="bankAccountType" required>
  								<option value="">Please select</option>
  								<option value="Checking">Checking</option>
  								<option value="Savings">Savings</option>
  							</select>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="hidden label label-danger" role="alert"></div>
  						</div>
  					</div>
                    <!-- bankMonthYear -->
                    <div class="form-group">
  						<div class="col-md-3 col-md-offset-1 col-sm-8 col-sm-offset-2 md-text-left">
  							<label for="" id="bankMonthYear" class="control-label">How long ago did you open this bank account?<span class="text-danger">*</span></label>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 input-container">
  							<div class="row">
  								<div class="col-sm-6">
  									<select class="form-control" name="bankYear" id="bankYear" required>
  										<option value="" selected disabled>Select Years</option>
  										<?php for($i = 1; $i <= 100; $i++): ?>
  											<option value="<?= $i; ?>"><?= $i; ?> Years</option>
  										<?php endfor; ?>
  									</select>
  								</div>
  								<div class="col-sm-6">
  									<select class="form-control" name="bankMonth" id="bankMonth" required>
  										<?php for($i = 0; $i <= 12; $i++): ?>
  											<option value="<?= $i; ?>"><?= $i; ?> Months</option>
  										<?php endfor; ?>
  									</select>
  								</div>
  							</div>
  						</div>
  						<div class="col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
  							<div class="label label-info" role="alert">Enter the number of years and months you've owned this bank account for</div>
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
  					<div class="form-group section-header">
  						<div class="col-sm-8 col-sm-offset-2">
  							<div class="checkbox">
  								<label>
  									<input type="checkbox" name="consentFinancial" id="consentFinancial"/> I agree that Amikaro Finance Ltd trusted 3rd party partners listed here, and those providing the category of services detailed in the Privacy Policy may contact me by email(you can unsubscribe at any time).
  								</label>
  								<div class="hidden label label-danger" role="alert"></div>
  							</div>
  						</div>
  					</div>
  					<!-- EOF: Form Section | Your Confirmation -->

  					<!-- SOF: Form Section | Submit -->
  					<div class="form-group section-header">
  						<div class="col-sm-12 text-center">
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
              <h2><?php __('Thanks for applying with Loan Pal'); ?></h2>
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
              <h3><a href="">Click here if you're not redirected within 3 seconds</a></h3>
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

  </main>
