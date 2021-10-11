var bankSuggestionsAPIURL = '/apply/process/get-bank-suggestions/';
var bankDetailsAPIURL = '/apply/process/get-bank/';
var bankSuggestionsCache = {};
var bankBranchesCache = {};
var $bankSuggestionsDropdown = $('#bankSuggestionsDropdownContainer');
var $bankSuggestionsDropdownOptionsContainer = $bankSuggestionsDropdown.find('.options');
var $bankSuggestionsDropdownCloseButton = $bankSuggestionsDropdown.find('.close-btn');
var $inlineLoadingIcon = $('#bankSuggestionsInlineLoadingIcon');
var overrideLocalSuggestionsCache = false;
var $bankNameInputField = $('#bankName');

// Register event handlers
$bankNameInputField.on('focusin keyup', function(){
	getSuggestions(this);
});

// Core function to fetch bank names from the API
function getSuggestions(field) {

	$field = $(field);
	var name = field.value.trim();
	if(name.length >= 3) {

		// Show the loading icon
		$inlineLoadingIcon.removeClass('hidden');
		
		// Check if the user has searched this term previously, and, if so, display the results from cache
		if(bankSuggestionsCache.hasOwnProperty(name) && !overrideLocalSuggestionsCache) {

			// Already used search term
			showBankSuggestions($field, bankSuggestionsCache[name]);
			$inlineLoadingIcon.addClass('hidden');

		} else {

			// New search term
			$.get({
				url: bankSuggestionsAPIURL + encodeURIComponent(name),
				dataType: 'json',
				success: function(data) {
					if(data.status === true) {

						// Add to local cache
						bankSuggestionsCache[name] = data.data;

						// Show suggestions to user
						showBankSuggestions($field, data.data);

					} else {

						// An error occured, let the user input his bank details manually
					}
				},
				complete: function() {
					$inlineLoadingIcon.addClass('hidden');
				}
			});

		}

	} else if(name.length > 0) {

		// Input at least three characters
		showMessage($field, 'Please type at least 3 characters');

	} else {

		// No input
		hideSuggestionsDropdown();

	}

}

// HTML UI Helper
function showMessage($field, msg) {

	var	html = '<h4>' + msg + '</h4>';

	// Show HTML
	showSuggestionsDropdown();
	$bankSuggestionsDropdownOptionsContainer.html(html);

}

// HTML UI Helper
function showBankSuggestions($field, data) {

	var html = '';

	if(data.length === 0) {

		html += '<h4>No Results</h4>';

	} else {

		// Construct HTML
		html = '<h5>Select Bank:</h5>';
		html += '<ul>';
		for(var i = 0; i < data.length; i++) {
			html += '<li onclick="getBankDetails(\''+data[i]+'\');">' + data[i] + '</li>';
		}
		html += '</ul>';

	}

	// Show HTML
	showSuggestionsDropdown();
	$bankSuggestionsDropdownOptionsContainer.html(html);

}

var bankBranches = [];
function getBankDetails(name) {

	// Check if the user has searched this term previously, and, if so, display the results from cache
	$inlineLoadingIcon.removeClass('hidden');
	$field = $('[name=bank_name]');
	if(bankBranchesCache.hasOwnProperty(name)) {

		// Already used search term
		showBankBranches($field, bankBranchesCache[name]);
		$inlineLoadingIcon.addClass('hidden');

	} else {

		// New search term
		$.get({
			url: bankDetailsAPIURL + encodeURIComponent(name),
			dataType: 'json',
			success: function(data) {
				console.log(data);
				if(data.status === true) {

					bankBranchesCache[name] = data.data;
					showBankBranches($field, data.data);

				} else {

					// An error occured, let the user input his bank details manually

				}
			},
			complete: function() {
				$inlineLoadingIcon.addClass('hidden');
			}
		});

	}

}

function selectBank(index) {
	hideSuggestionsDropdown();
	$('[name=bank_name]').val(bankBranches[index]['BankName']);
	$('[name=sortcode]').val(bankBranches[index]['RoutingNumber']).change();
}

// HTML UI Helper
function showBankBranches($field, data) {

	// Construct HTML
	var html = '<h5>Select Branch:</h5>';
	html += '<ul>';
	bankBranches = data;
	for(var i = 0; i < data.length; i++) {
		html += '<li onclick="selectBank('+i+');">' + data[i]['BankName'] + '<br />' + data[i]['City'] + ', ' + data[i]['StateAbbreviation'] + '</li>';
	}
	html += '</ul>';

	// Show HTML
	showSuggestionsDropdown();
	$bankSuggestionsDropdownOptionsContainer.html(html);

}

function hideSuggestionsDropdown() {
	$bankSuggestionsDropdown.addClass('hidden');
}

function showSuggestionsDropdown() {
	$bankSuggestionsDropdown.removeClass('hidden');
}

// Close suggestions box functionality
$bankSuggestionsDropdownCloseButton.click(function(){
	hideSuggestionsDropdown();
});