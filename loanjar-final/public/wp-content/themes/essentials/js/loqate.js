// Map form fields
var fields = {
	UK: [
	{ element: "autofill_address", field: "", mode: pca.fieldMode.SEARCH },
	{ element: "postcode", field: "PostalCode", mode: pca.fieldMode.POPULATE },
	{ element: "house", field: "BuildingNumber", mode: pca.fieldMode.POPULATE },
	{ element: "address1", field: "Street", mode: pca.fieldMode.POPULATE },
	{ element: "address2", field: "District", mode: pca.fieldMode.POPULATE },
	{ element: "town", field: "City", mode: pca.fieldMode.POPULATE },
	{ element: "county", field: "Province", mode: pca.fieldMode.POPULATE }
	],
	US: [
	{ element: "autofill_address", field: "", mode: pca.fieldMode.SEARCH },
	{ element: "postcode", field: "PostalCode", mode: pca.fieldMode.POPULATE },
	{ element: "house", field: "BuildingNumber", mode: pca.fieldMode.POPULATE },
	{ element: "address1", field: "Street", mode: pca.fieldMode.POPULATE },
	{ element: "town", field: "City", mode: pca.fieldMode.POPULATE },
	{ element: "county", field: "Province", mode: pca.fieldMode.POPULATE }
	]
};

// Config API object
var options = {
	UK: {
		key: "GA96-YA97-BA62-RP78",
		search: { countries: "GBR" },
		culture: 'en_GB'
	},
	US: {
		key: "DU95-KW21-PJ77-ZG22",
		search: { countries: "USA" },
		culture: 'en_US'
	}	
};

var loqateControl;
var countryCode;
var populatedOnce = false;
$(document).ready(function(){

	// Set country code
	if($('#main-form').data('countrycode') == 'us')
		countryCode = 'US';
	else
		countryCode = 'UK';

	// Initialise control
	loqateControl = new pca.Address(fields[countryCode], options[countryCode]);

	// Listen for the populate event
	loqateControl.listen("populate", function(address, variations) {

		console.log('Populating address...');
		populatedOnce = true;
		console.log(address);

		// Concatenate house name and house number
		var house = ((address.BuildingNumber.trim() !== '') ? address.BuildingNumber : '') + ((address.BuildingNumber.trim() !== '' && address.BuildingName.trim() !== '') ? ', ' : '') + ((address.BuildingName.trim() !== '') ? address.BuildingName : '');
		if(house === '') {
			if(address.Company !== '') {
				house = address.Company;
			} else if(address.FormattedLine1 !== '')
				house = address.FormattedLine1;
		}
		$('#house').val(house);

		// Street
		var street = address.Street;
		if(street === '') {
			if(house !== address.FormattedLine1 && address.FormattedLine1 !== '')
				street = address.FormattedLine1;
			else
				street = address.FormattedLine2;
		}
		$('#address1').val(street);

		// Postcode formatting
		address.PostalCode = address.PostalCode.replace(' ', '');
		address.PostalCode = address.PostalCode.replace('-', '');

		if(countryCode === 'US') {
			address.PostalCode = address.PostalCode.substring(0,5);
			$('#postcode').val(address.PostalCode);
		}
		console.log(address.PostalCode);
		
		// Validate fields on populate
		forceValidateAddressFields();

  });
});

function forceValidateAddressFields() {

	console.log('Force address fields validation');

	$.each(fields[countryCode], function(i, elem) {
		$elem = $('[name=' + elem.element + ']');
		$elem.change();
	});

	toggleAutoFillMissingFieldsMessage();
}

function toggleAutoFillMissingFieldsMessage() {

	// Works only if the auto fill populate has executed at least once
	if(populatedOnce) {
		var validationErrors = false;
		$.each(fields[countryCode], function(i, elem) {
			$elem = $('[name=' + elem.element + ']');
			if($elem.parents('.form-group').hasClass('has-error')) {
				validationErrors = true;
			}
		});

		var $elem = $('#autofill_address').parents('.form-group').find('.alert-danger');
		if(validationErrors) {
			$elem.prev('.alert-info').addClass('hidden');
			$elem.text('One or more required fields could not be filled automatically. Please fill them manually to complete your address.').removeClass('hidden');
		} else {
			$elem.addClass('hidden');
			$elem.prev('.alert-info').removeClass('hidden');
		}
		}
}