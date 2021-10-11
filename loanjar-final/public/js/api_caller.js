class APICaller {

    constructor(apiURL) {
        this._url = apiURL;
        this.cache = {};
        this.overrideCache = false;
    }

    set url(value) {
        this._url = value;
    }

    get url() {
        return this._url;
    }

    set overrideCache(value) {
        this._overrideCache = value;
    }

    call(searchTerm) {

        return new Promise((resolve, reject) => {

            if (this.cache.hasOwnProperty(searchTerm) && !this.overrideCache) {

                resolve(this.cache[searchTerm]);

            } else {

                $.get({
                    context: this,
                    url: this.url + encodeURIComponent(searchTerm),
                    dataType: 'json',
                    success: function(data) {
                        if (data.status === true) {

                            // Add to local cache
                            this.cache[searchTerm] = data.data;
                            resolve(data.data);
                        }
                    }
                });

            }

        });

    }

}

class InputSuggestions {

    constructor(inputElementSelector, apiURL, inputMinLen) {
        this._suggestionsList = [];
        this.DOMElems = {
            $inputElem: $(inputElementSelector),
            $parent: $(inputElementSelector).parent()
        };
        this.inputMinLen = inputMinLen;
        this.htmlTemplates = {
            inlineLoadingIcon: '<i class="fa fa-spin fa-spinner input-inline-loading-icon hidden"></i>',
            dropdown: '<div class="suggestions-dropdown hidden"><span class="close-btn">&times;</span><div class="options"></div><div class="loading-overlay hidden"><i class="fa fa-spin fa-spinner"></i></div></div>'
        };
        this.DOMElems.$inputElem.after(this.htmlTemplates.inlineLoadingIcon);
        this.DOMElems.$inputElem.after(this.htmlTemplates.dropdown);
        this.DOMElems.$loadingIcon = this.DOMElems.$parent.find('.input-inline-loading-icon');
        this.DOMElems.$dropdown = this.DOMElems.$parent.find('.suggestions-dropdown');
        this.DOMElems.$dropdownItemsContainer = this.DOMElems.$parent.find('.suggestions-dropdown .options');
        this.DOMElems.$dropdownLoadingOverlay = this.DOMElems.$parent.find('.suggestions-dropdown .loading-overlay');

        // Register event handlers
        this.DOMElems.$dropdown.find('.close-btn').click(() => this.hideDropdown());
        this.DOMElems.$inputElem.on('keyup', () => this.search());
        this.DOMElems.$dropdownItemsContainer.on('click', 'li', (itemClicked) => this.listItemClickHander(itemClicked));

        // Initialise the APICaller
        this.apiCaller = new APICaller(apiURL);
        this._listItemClickCallback = undefined;
        this._displayItemFunction = undefined;
        this._searchCompleteCallback = undefined;
    }

    get searchCompleteCallback() {
        return this._searchCompleteCallback;
    }

    set searchCompleteCallback(value) {
        this._searchCompleteCallback = value;
    }

    get displayItemFunction() {
        return this._displayItemFunction;
    }

    set displayItemFunction(value) {
        this._displayItemFunction = value;
    }

    get inputField() {
        return this.DOMElems.$inputElem;
    }

    set apiURL(value) {
        this.apiCaller.url = value;
    }

    get apiURL() {
        return this.apiCaller.url;
    }

    set suggestionsList(value) {
        this._suggestionsList = value;
    }

    get suggestionsList() {
        return this._suggestionsList;
    }

    set listItemClickCallback(value) {
        this._listItemClickCallback = value;
    }

    get listItemClickCallback() {
        return this._listItemClickCallback;
    }

    showSuggestions(suggestionsList) {

        if (suggestionsList !== undefined) {
            this.suggestionsList = suggestionsList;
        }

        // Construct HTML
        var html = '';
        html += '<h5>Select Bank:</h5>';
        html += '<ul>';
        for (var i = 0; i < this.suggestionsList.length; i++) {
            if (this.displayItemFunction !== undefined) {
                html += this.displayItemFunction(this.suggestionsList[i]);
            } else {
                html += '<li>' + this.suggestionsList[i] + '</li>';
            }
        }
        html += '</ul>';

        // Show the dropdown
        this.DOMElems.$dropdownItemsContainer.html(html);
        this.DOMElems.$dropdown.removeClass('hidden');
    }

    showMessage(message) {

        var html = '<h4>' + message + '</h4>';
        this.DOMElems.$dropdownItemsContainer.html(html);
        this.DOMElems.$dropdown.removeClass('hidden');

    }

    hideDropdown() {
        this.DOMElems.$dropdown.addClass('hidden');
    }

    search(searchTermOverride) {
        var searchTerm = this.DOMElems.$inputElem.val().trim();
        if (searchTermOverride !== undefined) {
            searchTerm = searchTermOverride;
        }
        if (this.inputMinLen === undefined || searchTerm.length >= this.inputMinLen) {
            this.showLoader()
                .apiCaller
                .call(searchTerm)
                .then(this.showSuggestions.bind(this))
                .finally(this.searchComplete.bind(this));
        } else if (this.inputMinLen !== undefined && searchTerm.length > 0) {
            this.showMessage('Enter at least ' + this.inputMinLen + ' characters')
        } else if (this.inputMinLen === undefined && searchTerm.length > 0) {
            this.showMessage('Begin typing to see suggestions')
        } else {
            this.hideDropdown();
        }
    }

    showLoader() {
        this.DOMElems.$loadingIcon.removeClass('hidden');
        this.DOMElems.$dropdownLoadingOverlay.removeClass('hidden');
        return this;
    }

    hideLoader() {
        this.DOMElems.$loadingIcon.addClass('hidden');
        this.DOMElems.$dropdownLoadingOverlay.addClass('hidden');
        return this;
    }

    searchComplete() {
        if (this.searchCompleteCallback !== undefined) {
            this.searchCompleteCallback();
        }
        this.hideLoader();
    }

    listItemClickHander(e) {
        var $target = $(e.target);
        if (this.listItemClickCallback !== undefined) {
            this.listItemClickCallback(e);
        }
    }

}

// Initialise bank name suggestions
var bankNameSuggestions = new InputSuggestions('#bankName', '/apply/process/get-bank-suggestions/', 3);

bankNameSuggestions.listItemClickCallback = function(e) {
    var $target = $(e.target);
    if ($target.data('routingnumber')) {
        selectBank($target);
        bankNameSuggestions.hideDropdown();
    } else {
        bankNameSuggestions.apiURL = '/apply/process/get-bank/';
        bankNameSuggestions.displayItemFunction = displayItem_BankBranchSuggestions;
        bankNameSuggestions.searchCompleteCallback = resetBankBranchesToBankSuggestions;
        bankNameSuggestions.search($(e.target).text());
    }
}

function displayItem_BankBranchSuggestions(item) {
    var html = '<li data-routingnumber="' + item.RoutingNumber + '" data-bankname="' + item.BankName + '">';
    html += item.BankName;
    html += '<br />';
    html += item.City;
    html += ', ';
    html += item.StateAbbreviation;
    return html;
    html += '</li>';
}

var $sortcodeField = $('[name=sortcode]');
var $bankNameField = $('#bankName');

function selectBank($caller) {
    $sortcodeField.val($caller.data('routingnumber')).change();
    $bankNameField.val($caller.data('bankname')).change();
}

function resetBankBranchesToBankSuggestions() {
    bankNameSuggestions.apiURL = '/apply/process/get-bank-suggestions/';
    bankNameSuggestions.displayItemFunction = undefined;
    bankNameSuggestions.searchCompleteCallback = undefined;
}

// Initialize address suggestions
var addressSuggestions = new InputSuggestions('#postcode', '/apply/process/get-address-suggestions/', 5);
addressSuggestions.displayItemFunction = displayItem_AddressSuggestions;

var $cityField = $('[name=town]');
var $stateField = $('[name=county]');

function selectAddress($caller) {
    $cityField.val($caller.data('city')).change();
    $stateField.val($caller.data('state')).change();
}

addressSuggestions.listItemClickCallback = function(e) {
    var $target = $(e.target);
    selectAddress($target);
    addressSuggestions.hideDropdown();
}

function displayItem_AddressSuggestions(item) {
    var html = '<li data-city="' + item.City + '" data-county="' + item.County + '" data-state="' + item.StateAbbreviation + '">';
    html += item.City;
    html += ', ';
    html += item.County;
    html += ', ';
    html += item.StateAbbreviation;
    html += '</li>';
    return html;
}