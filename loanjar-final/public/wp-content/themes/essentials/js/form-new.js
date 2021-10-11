// Global variables
var checkStatusIntervalID = '';

jQuery(document).ready(function($) {

    // Form error screens close button
    $('.screen .close-btn').click(function() {
        showScreen('form-container');
    });

    // Debugger
    window.onerror = function(error, url, line) {
        $('#error-box').append('<p style="border-bottom: solid 1px black;"><span style="font-weight: bold;">Error:</span> ' + error + '<br/><span style="font-weight: bold;">Line:</span> ' + line + '</p>');
    };


    var timer, // timer required to reset
        timeout = 200; // timer reset in ms

    window.addEventListener("dblclick", function(evt) {
        console.log('asdf');
        timer = setTimeout(function() {
            timer = null;
        }, timeout);
    });
    window.addEventListener("click", function(evt) {
        if (timer) {
            clearTimeout(timer);
            timer = null;
            executeTripleClickFunction();
        }
    });

    // Show form filling progress
    $('#application-form').on('click keyup focusin focusout', function() {
        $('#progress-indicator .percent').css('width', calculateFormFillingProgress() + '%');
    });

    // Prevent accidental submits by hitting the enter button
    $('#application-form').keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode === '13') {
            event.preventDefault();
            event.stopPropagation();
        }
    });

    // Handle form submit
    $('#submit-btn').click(function() {
        $('#application-form').submit();
    });

    // Total monthly household income
    var $maritalStatus = $('[name=maritalStatus]');
    $maritalStatus.change(function() {
        $selected = $('[name=maritalStatus]:checked');
        console.log('Marital status value changed to ' + $selected.val());
        if ($selected.val() === 'Married') {
            $('[name=combined_pay]').parents('.form-group').removeClass('hidden');
        } else {
            $('[name=combined_pay]').parents('.form-group').addClass('hidden');
        }
    });

    // Use mobile number
    $('[name=homePhoneNumber]').focus(function() {
        $(this).parent().find('.use-mobile-number').removeClass('hidden');
    });
    $('[name=workPhoneNumber]').focus(function() {
        $(this).parent().find('.use-mobile-number').removeClass('hidden');
    });
    $('.use-mobile-number').click(function() {
        $(this).parent().find('input').val($('[name=mobilePhoneNumber]').val()).blur();
    });

    // Loan amount
    $('[name=loanAmount]').on('keyup change focusout click', function(e) {
        var amount = Number($(this).val());

        // Disable all options
        $term = $('[name=loanTerms]');
        $term.find('option').prop('disabled', true);

        if (!isNaN(amount)) {
            enable = [];
            if (amount < 1000) {
                enable = [3, 6, 12];
            } else if (amount === 1000) {
                enable = [3, 6, 12, 18, 24, 36];
            } else if (amount > 1000 && amount < 2000) {
                enable = [6, 12, 18, 24, 36];
            } else if (amount >= 2000) {
                enable = [12, 18, 24, 36];
            }
            for (var i = 0; i < enable.length; i++) {
                $('option[value=' + enable[i] + ']').prop('disabled', false);
            }
        }
    });

    debugger
    $('input[type=radio][name=incomeSource]').change(function() {
        if (this.value == 'allot') {
            alert("Allot Thai Gayo Bhai");
        }
        else if (this.value == 'transfer') {
            alert("Transfer Thai Gayo");
        }
    });

        // Employment status
    $('input[type=radio][name=incomeSource]').change(function(e) {
        debugger

        value = $('[name=incomeSource]:checked').val();
        console.log(value)
        debugger
        var display = [];
        var allFields = ['employerName', 'jobTitle', 'employerIndustry'];
        for (var i = 0; i < allFields.length; i++) {
            $field = $('[name=' + allFields[i] + ']');
            $field.prop('required', false);
            $field.parents('.form-group').addClass('hidden');
        }
        switch (value) {
            case 'EmployedFullTime':
            case 'EmployedPartTime':
            case 'EmployedTemporary':
                display = ['employerName', 'employerIndustry', 'jobTitle'];
                break;
            case 'SelfEmployed':
                display = ['jobTitle', 'employerIndustry'];
                break;
            case 'Pension':
                display = [];
                break;
            case 'DisabilityBenefits':
                display = [];
                break;
            case 'Benefits':
                display = [];
                break;
        }
        debugger
        for (var i = 0; i < display.length; i++) {
            $field = $('[name=' + display[i] + ']');
            console.log($field)
            $field.prop('required', true);
            $field.parents('.form-group').removeClass('hidden');
        }
    });

    // DOB field
    var eighteenYearsAgo = new Date();
    eighteenYearsAgo.setFullYear(eighteenYearsAgo.getFullYear() - 18);
    $('[name=dateOfBirth]').datetimepicker({
        format: 'DD/MM/YYYY',
        maxDate: eighteenYearsAgo,
        date: null,
        viewMode: 'years'
    });

    // Next pay date
    var minDate = new Date();
    minDate.setDate(minDate.getDate() + 1);
    var maxDate = new Date();
    maxDate.setDate(maxDate.getDate() + 45);
    $('[name=nextPayDate1]').datetimepicker({
        format: 'DD/MM/YYYY',
        date: null,
        daysOfWeekDisabled: [0, 6],
        minDate: minDate,
        maxDate: maxDate
    });

    // Following pay date
    $('[name=nextPayDate2]').datetimepicker({
        format: 'DD/MM/YYYY',
        date: null,
        daysOfWeekDisabled: [0, 6]
    });

    // Following pay date
    $('[name=nextPayDate1]').on('dp.change', function(e) {
        console.log('Next pay date: ');
        console.log(e.date);
        if (e.date !== false) {
            var minDate = e.date.clone();
            var maxDate = e.date.clone();
            minDate = minDate.add(1, 'days');
            maxDate = maxDate.add(46, 'days');
            $('[name=nextPayDate2]').data('DateTimePicker').minDate(minDate);
            $('[name=nextPayDate2]').data('DateTimePicker').maxDate(maxDate);
        }
    });

    // Next pay date calculator
    var $payFrequency = $('[name=incomeCycle]');
    $payFrequency.change(function() {
        console.log('Pay frequency changed');
        var selectedOption = $payFrequency.val();
        console.log('Selected ' + selectedOption);
        var nextPayDate = '';
        var followingPayDate = '';
        switch (selectedOption) {
            case 'LastDayMonth':
                nextPayDate = getLastWorkingDayOfMonth(1);
                followingPayDate = getLastWorkingDayOfMonth(nextPayDate.month + 1);
                break;
            case 'LastWorkingDayMonth':
                nextPayDate = getLastWorkingDayOfMonth(1);
                followingPayDate = getLastWorkingDayOfMonth(nextPayDate.month + 1);
                break;
            case 'LastMonday':
                nextPayDate = getLastDOWOfMonth(1, 1);
                followingPayDate = getLastDOWOfMonth(nextPayDate.month + 1, 1);
                break;
            case 'LastTuesday':
                nextPayDate = getLastDOWOfMonth(1, 2);
                followingPayDate = getLastDOWOfMonth(nextPayDate.month + 1, 2);
                break;
            case 'LastWednesday':
                nextPayDate = getLastDOWOfMonth(1, 3);
                followingPayDate = getLastDOWOfMonth(nextPayDate.month + 1, 3);
                break;
            case 'LastThursday':
                nextPayDate = getLastDOWOfMonth(1, 4);
                followingPayDate = getLastDOWOfMonth(nextPayDate.month + 1, 4);
                break;
            case 'LastFriday':
                nextPayDate = getLastDOWOfMonth(1, 5);
                followingPayDate = getLastDOWOfMonth(nextPayDate.month + 1, 5);
                break;
        }

        // Set the next and following pay dates
        if (nextPayDate !== '' && followingPayDate !== '') {

            // Set next pay date
            $('[name=nextPayDate1]').data("DateTimePicker").date(nextPayDate.date);

            // Set following pay date
            $('[name=nextPayDate2]').data("DateTimePicker").date(followingPayDate.date);

        } else {

            // Set next pay date
            $('[name=nextPayDate1]').data("DateTimePicker").date(null);

            // Set following pay date
            $('[name=nextPayDate2]').data("DateTimePicker").date(null);

        }

        // Emit change events on both fields
        $('[name=nextPayDate1]').change();
        $('[name=nextPayDate2]').change();
    });
});

// n = number of month
// for example, for current month, put n = 1
// for next month put n = 2
function getLastWorkingDayOfMonth(n) {
    var today = new Date();
    var result = new Date(today.getFullYear(), today.getMonth() + n, 0);
    console.log(result);

    // Check if it is a Sunday or a Saturday
    var dayOfWeek = result.getDay();
    var goBackDays = 0;
    if (dayOfWeek == 0)
        goBackDays = 2;
    if (dayOfWeek == 1)
        goBackDays = 1;
    if (goBackDays != 0)
        result.setDate(result.getDate() - goBackDays);

    // Check if the result date is lesser than today
    if (result.getTime() <= today.getTime()) {

        // Get the last date of next month
        result = getLastWorkingDayOfMonth(++n);
        result = result.date;
    }

    console.log(result);
    return { date: result, month: n };
}

// n = number of month
// for example, for current month, put n = 1
// for next month put n = 2
// forDayOfWeek represents which last day of week is wanted
// for Monday, forDayOfWeek = 1
// for Sat, forDayOfWeek = 6
// for Sun, forDayOfWeek = 0
function getLastDOWOfMonth(n, forDayOfWeek) {
    var today = new Date();
    var result = new Date(today.getFullYear(), today.getMonth() + n, 0);
    console.log(result);

    // Check if it is a Sunday or a Saturday
    var dayOfWeek = result.getDay();
    var goBackDays = 0;

    if (dayOfWeek > forDayOfWeek) {
        goBackDays = dayOfWeek - forDayOfWeek;
    } else if (dayOfWeek < forDayOfWeek) {
        goBackDays = 7 - (forDayOfWeek - dayOfWeek);
    }

    if (goBackDays !== 0)
        result.setDate(result.getDate() - goBackDays);

    // Check if the result date is lesser than today
    if (result.getTime() <= today.getTime()) {

        // Get the last Monday of next month
        result = getLastDOWOfMonth(++n, forDayOfWeek);
        result = result.date;
    }

    console.log(goBackDays);
    console.log(result);
    return { date: result, month: n };
}

function submitFormUS() {

    $form = $('#form-container form');
    var countryCode = $form.attr('data-countrycode');
    // var transaction_id = $form.attr('transaction_id');

    let params = {};
    window.location.search.slice(1).split('&').forEach(elm => {
        if (elm === '') return;
        let spl = elm.split('=');
        const d = decodeURIComponent;
        params[d(spl[0])] = (spl.length >= 2 ? d(spl[1]) : true);
    });

    // do what you like with the input
    transaction_id = $('<input type="hidden" name="transaction_id"/>').val(params.transaction_id ?? '');
    aff_sub = $('<input type="hidden" name="aff_sub"/>').val(params.aff_sub ?? '');
    aff_sub2 = $('<input type="hidden" name="aff_sub2"/>').val(params.aff_sub2 ?? '');
    aff_sub3 = $('<input type="hidden" name="aff_sub3"/>').val(params.aff_sub3 ?? '');
    aff_sub4 = $('<input type="hidden" name="aff_sub4"/>').val(params.aff_sub4 ?? '');
    aff_sub5 = $('<input type="hidden" name="aff_sub5"/>').val(params.aff_sub5 ?? '');

    // append to the form
    $form.append(transaction_id);
    $form.append(aff_sub);
    $form.append(aff_sub2);
    $form.append(aff_sub3);
    $form.append(aff_sub4);
    $form.append(aff_sub5);

    var newData = $form.find('input, select').filter(function () {
        return ((!!this.value) && (!!this.name));
    }).serialize();
    console.log(newData)


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Show the loading screen
    showScreen('loading-screen');
    // Submit the form
    $.post({
        url: $form.prop('action'),
        data: newData,
        dataType: 'json',
        timeout: 250000,
        success: function(data) {
            console.log(data)
            debugger
            switch (data.status) {
                case 'unknown':
                    showScreen('error-screen');
                    break;

                // Validation errors returned by my-loans
                case 'validation_errors':
                    showScreen('form-container');
                    showValidationErrors(data.errors);
                    break;

                // Validation errors returned by u-ping
                case 'form_validation_errors':
                    showScreen('form-container');
                    showValidationErrors(data.field_errors);
                    break;

                // Database errors returned by u-ping
                case 'database_errors':
                    showScreen('database-error-screen');
                    break;


                case 'pending':
                    var Pingid = data.check_status_id;
                    if (data.RedirectURL !== '') {
                        showScreen('redirecting-screen');
                        $('#redirecting-screen a').prop('href', data.RedirectURL);
                        if (facebookPixelId !== '') { fbq('track', 'RedirectToBuyer', { leadID: leadid }); }
                        window.location.href = data.RedirectURL;
                    }
                    checkStatusUS(countryCode, Pingid);
                    break;

                default:
                    showScreen('unhandled-error-screen');
                    break;
            }
        },
        error: function() {
            showScreen('network-error-screen');
        },
        complete: function() {

            setTimeout(function() {

            }, 400);
        }
    });
};

function submitFormUK() {

    $form = $('#form-container form');
    var countryCode = $form.attr('data-countrycode');

    // Show the loading screen
    showScreen('loading-screen');


    // Submit the form
    $.post({
        url: $form.prop('action'),
        data: $form.serialize(),
        dataType: 'json',
        timeout: 250000,
        success: function(data) {
            console.log(data)
            switch (data.status) {
                case 'unknown':
                    showScreen('error-screen');
                    break;

                // Validation errors returned by my-loans
                case 'validation_errors':
                    showScreen('form-container');
                    showValidationErrors(data.errors);
                    break;

                // Validation errors returned by u-ping
                case 'form_validation_errors':
                    showScreen('form-container');
                    showValidationErrors(data.field_errors);
                    break;

                // Database errors returned by u-ping
                case 'database_errors':
                    showScreen('database-error-screen');
                    break;


                case 'success':
                    var Pingid = data.check_status_id;
                    if (data.RedirectURL !== '') {
                        showScreen('redirecting-screen');
                        $('#redirecting-screen a').prop('href', data.RedirectURL);
                        if (facebookPixelId !== '') { fbq('track', 'RedirectToBuyer', { leadID: leadid }); }
                        window.location.href = data.RedirectURL;
                    }
                    checkStatusUK(countryCode, Pingid);
                    break;

                default:
                    showScreen('unhandled-error-screen');
                    break;
            }
        },
        error: function() {
            showScreen('network-error-screen');
        },
        complete: function() {

            setTimeout(function() {

            }, 400);
        }
    });
}

function showScreen(id) {
    $('.screen').addClass('hidden');
    $('#' + id).removeClass('hidden');
}

function showValidationErrors(errors) {
    $.each(errors, function(key, val) {
        $field = $('[name=' + key + ']');
        $parent = $field.parents('.form-group');
        $errorMessageContainer = $parent.find('.label-danger');
        $errorMessageContainer.text(val).removeClass('hidden');
        $parent.addClass('has-error');
    });

    // Scroll to the first validation error
    var $firstElementWithError = $($('.form-group.has-error')[0]);
    if ($firstElementWithError.length > 0) {
        console.log('Validation errors found on submit');
        $([document.documentElement, document.body]).animate({
            scrollTop: $firstElementWithError.offset().top
        }, 400);
    }
}

var performNextCheckStatusRequest = true;

function checkStatus(countryCode, leadid) {
    console.log('inside checkStatus()')
    var transaction_id = $("input[name=transaction_id]").val();
    var oid = $("input[name=oid]").val();
    $.get({
        url: 'check-status/' + countryCode + '/' + leadid + '/',
        fieldsType: 'json',
        timeout: 2000,
        cache: false,
        success: function(data) {
            console.log(data)
            performNextCheckStatusRequest = false;
            switch (data.status) {
                case 'success':
                    if (data.hasOwnProperty('redirectURL') && data.redirectURL !== undefined && data.redirectURL.trim() !== '') {
                        showScreen('redirecting-screen');
                        $('#redirecting-screen a').prop('href', data.redirectURL);
                        if (facebookPixelId !== '') { fbq('track', 'RedirectToBuyer', { leadID: leadid }); }
                        window.location.href = data.redirectURL;
                    } else {
                        showScreen('error-screen');
                    }
                    break;

                case 'pending':
                    performNextCheckStatusRequest = true;
                    // showScreen('progress-screen');
                    $('#progress-screen').removeClass('hidden');
                    $('#progress-screen .progress-bar').prop('aria-valuenow', data.progress).css('width', data.progress + '%').text(data.progress + '% Complete');
                    break;

                case 'rejected':
                    showScreen('rejected-screen');
                    break;

                case 'error':
                    showScreen('error-error-screen');
                    break;
            }
        },
        complete: function() {
            if (performNextCheckStatusRequest) {
                checkStatus(leadid, countryCode);
            }
        }
    });
}

function checkStatusUK(countryCode, leadid) {
    console.log('inside checkStatusUK()')
    var transaction_id = $("input[name=transaction_id]").val();
    var oid = $("input[name=oid]").val();
    $.get({
        url: 'check-status/' + countryCode + '/' + leadid,
        fieldsType: 'json',
        timeout: 2000,
        cache: false,
        success: function(data) {
            console.log(data)
            if (data.status === 'success') {
                if (data.RedirectURL !== 'undefined') {
                    showScreen('redirecting-screen');
                    $('#redirecting-screen a').prop('href', data.RedirectURL);
                    if (facebookPixelId !== '') { fbq('track', 'RedirectToBuyer', { leadID: leadid }); }
                    window.location.href = data.RedirectURL;
                    performNextCheckStatusRequest = false;
                } else {
                    showScreen('unhandled-error-screen');
                    performNextCheckStatusRequest = false;
                }
            } else if (data.status === 'rejected') {
                showScreen('progress-screen');
                var PercentageComplete = data.PercentageComplete;
                if (PercentageComplete !== '100') {
                    $('#progress-screen').removeClass('hidden');
                    $('#progress-screen .progress-bar').prop('aria-valuenow', PercentageComplete).css('width', PercentageComplete + '%').text(PercentageComplete + '% Complete');
                } else if (data.LanderFound === '' && PercentageComplete === '100') {
                    showScreen('rejected-screen');
                    performNextCheckStatusRequest = false;
                }
            } else {
                showScreen('unhandled-error-screen');
            }
        },
        complete: function() {
            if (performNextCheckStatusRequest) {
                // sleep(2)
                checkStatusUK(countryCode, leadid);
            }
        }
    });
}

function checkStatusUS(countryCode, leadid) {
    console.log('inside checkStatusUS()')
    // var transaction_id = $("input[name=transaction_id]").val();
    // console.log(transaction_id);
    // var oid = $("input[name=oid]").val();
    // var PercentageComplete = data.PercentageComplete;
    // showScreen('progress-screen');
    // $('#progress-screen').removeClass('hidden');
    // $('#progress-screen .progress-bar').prop('aria-valuenow', PercentageComplete).css('width', PercentageComplete + '%').text(PercentageComplete + '% Complete');
    //     console.log(data.status)
    //     debugger
    //     if (data.status === 'success') {
    //
    //         if (data.RedirectURL !== 'undefined') {
    //             showScreen('redirecting-screen');
    //             $('#redirecting-screen a').prop('href', data.RedirectURL);
    //             if (facebookPixelId !== '') { fbq('track', 'RedirectToBuyer', { leadID: leadid }); }
    //             window.location.href = data.RedirectURL;
    //             performNextCheckStatusRequest = false;
    //         } else {
    //             showScreen('unhandled-error-screen');
    //             performNextCheckStatusRequest = false;
    //         }
    //     }
    //     // if (data.status === 'pending') {
    //     //     // showScreen('progress-screen');
    //     //     // $('#progress-screen').removeClass('hidden');
    //     //     // $('#progress-screen .progress-bar').prop('aria-valuenow', PercentageComplete).css('width', PercentageComplete + '%').text(PercentageComplete + '% Complete');
    //     //     // showScreen('progress-screen');
    //     //     performNextCheckStatusRequest = true;
    //     //
    //     // }
    //     if (data.RedirectURL === '' && PercentageComplete === '100') {
    //         showScreen('rejected-screen');
    //         performNextCheckStatusRequest = false;
    //     } else {
    //         showScreen('unhandled-error-screen');
    //     }
    // },

    $.get({
        url: 'check-status/' + countryCode + '/' + leadid,
        fieldsType: 'json',
        timeout: 3000,
        cache: false,
        success: function(data) {
            var PercentageComplete = data.PercentageComplete;
            // console.log(data)
            // debugger

            if (data.status === 'success') {

                if (data.RedirectURL !== 'undefined') {
                    showScreen('redirecting-screen');
                    $('#redirecting-screen a').prop('href', data.RedirectURL);
                    if (facebookPixelId !== '') {
                        fbq('track', 'RedirectToBuyer', {leadID: leadid});
                    }
                    window.location.href = data.RedirectURL;
                    performNextCheckStatusRequest = false;
                } else {
                    showScreen('unhandled-error-screen');
                    performNextCheckStatusRequest = false;
                }
            } else if (data.status === 'pending') {
                showScreen('progress-screen');
                if (PercentageComplete !== '100') {
                    $('#progress-screen').removeClass('hidden');
                    $('#progress-screen .progress-bar').prop('aria-valuenow', PercentageComplete).css('width', PercentageComplete + '%').text(PercentageComplete + '% Complete');
                }
            } else if (data.status === 'rejected' && PercentageComplete === '100') {
                showScreen('rejected-screen');
                performNextCheckStatusRequest = false;
            } else {
                showScreen('unhandled-error-screen');
            }
        },

        complete: function() {
            if (performNextCheckStatusRequest) {
                checkStatusUS(countryCode, leadid);
            }
        }
    });
}

// Returns the percentage of fields filled in the form
// Currently works only for fields enclosed in bootstrap .form-group class element
// Counts only one field per form group
// Does not count hidden fields
// Does not count fields having a validation error (.has-error)
// Counts only fields that have a validation success class (.has-success)
function calculateFormFillingProgress() {

    // All form-groups
    var totalFields = $('#application-form .form-group:not(.hidden):not(.section-header)').length;
    var filledFields = $('#application-form .form-group.has-success:not(.hidden):not(.section-header)').length;

    // Return percentage
    return (filledFields * 100) / totalFields;

}

function executeTripleClickFunction() {
    if ($('#error-box').css('display') == 'block') {
        $('#error-box').css('display', 'none');
    } else {
        $('#error-box').css('display', 'block');
    }
}
