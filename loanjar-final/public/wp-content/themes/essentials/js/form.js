var logger = {
    log: [],
    add: function(eventName, eventDescription) {
        this.log.push({
            timestamp: new Date(),
            eventName: eventName,
            eventDescription: eventDescription
        });
        $('#checkStatusLog').val(JSON.stringify(this.log));
    }
};

// Global variables
var checkStatusIntervalID = '';
var iframeLoadURL = '';

// Prevent tab from closing
window.onbeforeunload = function(e) {
    e = e || window.event;

    // For IE and Firefox prior to version 4
    if (e) {
        e.returnValue = 'Sure?';
    }

    // For Safari
    return 'Sure?';
};

function copyText(elemId) {
    /* Get the text field */
    var copyText = document.getElementById(elemId);

    /* Select the text field */
    copyText.select();

    /* Copy the text inside the text field */
    document.execCommand("copy");
}

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

// Debugger
window.onerror = function(error, url, line) {
    $('#errorLog').val($('#errorLog').val() + 'Error: ' + error + "\nURL: " + url + "\nLine: " + line + "\n\n");
};

function generateError() {
    z = x + y;
}


// Global variables
var performNextCheckStatusRequest = true;
var countCheckStatusRequests = 0;
var checkStatusRequestId = '';
var clientCheckStatusPrevResponseReceivedAt = '';
var affiliateCheckStatusPrevResponseReceivedAt = '';
var affiliateCheckStatusPrevResponseIssuedAt = '';
var redirectURL = '';
var leadId = '';
var countryCode = '';
var transaction_id = '';
var oid = '';

jQuery(document).ready(function($) {

    // Form error screens close button
    $('.screen .close-btn').click(function() {
        showScreen('form-container');
    });


    // Show form filling progress
    $('#application-form').on('click keyup focusin focusout', function() {
        $('#progress-indicator .percent').css('width', calculateFormFillingProgress() + '%');
    });

    // Prevent accidental submits by hitting the enter button
    $('#application-form').keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            event.preventDefault();
            event.stopPropagation();
        }
    });

    // Handle form submit
    $('#submit-btn, .retry-submit').click(function() {
        $('#application-form').submit();
    });

    // Total monthly household income
    var $maritalStatus = $('[name=marital_status]');
    $maritalStatus.change(function() {
        $selected = $('[name=marital_status]:checked');
        console.log('Marital status value changed to ' + $selected.val());
        if ($selected.val() == 'Married') {
            $('[name=combined_pay]').parents('.form-group').removeClass('hidden');
        } else {
            $('[name=combined_pay]').parents('.form-group').addClass('hidden');
        }
    });

    // Use mobile number
    $('[name=homephone]').focus(function() {
        $(this).parent().find('.use-mobile-number').removeClass('hidden');
    });
    $('[name=employerphone]').focus(function() {
        $(this).parent().find('.use-mobile-number').removeClass('hidden');
    });
    $('.use-mobile-number').click(function() {
        $(this).parent().find('input').val($('[name=mobile]').val()).change().blur();
    });

    // Loan amount
    $('[name=loan_amount]').on('keyup change focusout click', function(e) {
        var amount = Number($(this).val());

        // Disable all options
        $term = $('[name=term]');
        $term.find('option').prop('disabled', true);

        if (!isNaN(amount)) {
            enable = [];
            if (amount < 1000) {
                enable = [3, 6, 12];
            } else if (amount == 1000) {
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

    // Employment status
    $('[name=primaryincome]').change(function(e) {
        value = $('[name=primaryincome]:checked').val();
        var display = [];
        var allFields = ['employername', 'job_title', 'industry'];
        for (var i = 0; i < allFields.length; i++) {
            $field = $('[name=' + allFields[i] + ']');
            $field.prop('required', false);
            $field.parents('.form-group').addClass('hidden');
        }
        switch (value) {
            case 'EmployedFullTime':
            case 'EmployedPartTime':
            case 'EmployedTemporary':
                display = ['employername', 'industry', 'job_title'];
                break;
            case 'SelfEmployed':
                display = ['job_title', 'industry'];
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
    $('[name=dob]').datetimepicker({
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
    $('[name=nextpaydate]').datetimepicker({
        format: 'DD/MM/YYYY',
        date: null,
        daysOfWeekDisabled: [0, 6],
        minDate: minDate,
        maxDate: maxDate
    });

    // Following pay date
    $('[name=followingpaydate]').datetimepicker({
        format: 'DD/MM/YYYY',
        date: null,
        daysOfWeekDisabled: [0, 6]
    });

    // Following pay date
    $('[name=nextpaydate]').on('dp.change', function(e) {
        console.log('Next pay date: ');
        console.log(e.date);
        if (e.date !== false) {
            var minDate = e.date.clone();
            var maxDate = e.date.clone();
            minDate = minDate.add(1, 'days');
            maxDate = maxDate.add(46, 'days');
            $('[name=followingpaydate]').data('DateTimePicker').minDate(minDate);
            $('[name=followingpaydate]').data('DateTimePicker').maxDate(maxDate);
        }
    });

    // Next pay date calculator
    var $payFrequency = $('[name=payfrequency]');
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
            $('[name=nextpaydate]').data("DateTimePicker").date(nextPayDate.date);

            // Set following pay date
            $('[name=followingpaydate]').data("DateTimePicker").date(followingPayDate.date);

        } else {

            // Set next pay date
            $('[name=nextpaydate]').data("DateTimePicker").date(null);

            // Set following pay date
            $('[name=followingpaydate]').data("DateTimePicker").date(null);

        }

        // Emit change events on both fields
        $('[name=nextpaydate]').change();
        $('[name=followingpaydate]').change();
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

function submitForm() {

    $form = $('#form-container form');

    // Show the loading screen
    showScreen('loading-screen');
    // console.log(123)


    // Add timestamps to the form
    $form.find('[name=submit_timestamp]').val(Date.now());
    showFakeProgressBar = true;
    fakeProgressBarCounter = 0;
    var fakeProgressBarInterval = setInterval(fakeProgressBar, 5000);
    // Submit the form
    $.post({
        url: $form.prop('action'),
        data: $form.serialize(),
        dataType: 'json',
        timeout: 250000,
        success: function(data) {
            console.log(data)
            showFakeProgressBar = false;
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
                    // TODO : Handle the request to redirect.
                    fakeProgressBarCounter = 42;
                    var Pingid = data.Leadid;
                    if (Pingid === undefined) {
                        Pingid = -1;
                    }
                    leadId = Pingid;

                    checkStatusRequestId = data.check_status_id;
                    clientCheckStatusPrevResponseReceivedAt = Date.now();
                    affiliateCheckStatusPrevResponseReceivedAt = data.response_affiliate_received_at;
                    affiliateCheckStatusPrevResponseIssuedAt = data.response_affiliate_issued_at;

                    if (data.RedirectURL !== '') {
                        redirect(data.RedirectURL, leadId);
                    }
                    clearInterval(fakeProgressBarInterval);
                    countryCode = $form.data('countrycode');
                    leadId = Pingid;
                    transaction_id = $("input[name=transaction_id]").val();
                    oid = $("input[name=oid]").val()
                    checkStatus();
                    break;

                default:
                    showScreen('unhandled-error-screen');
                    break;
            }
        },
        error: function() {
            showFakeProgressBar = false;
            showScreen('network-error-screen');
        },
        complete: function() {

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

function checkStatus() {
    leadid = leadId;
    logger.add('CheckStatus_INIT', {
        count: countCheckStatusRequests,
        params: {
            leadId: leadid,
            countryCode: countryCode
        }
    });
    countCheckStatusRequests++;

    $.post({
        url: 'check-status/' + countryCode,
        data: {
            'leadid': leadid,
            'transaction_id': transaction_id,
            'oid': oid,
            'start': Date.now(),
            'id': checkStatusRequestId,
            'prev_response_client_received_at': clientCheckStatusPrevResponseReceivedAt,
            'prev_response_affiliate_received_at': affiliateCheckStatusPrevResponseReceivedAt,
            'prev_response_affiliate_issued_at': affiliateCheckStatusPrevResponseIssuedAt
        },
        fieldsType: 'json',
        success: function(data) {
            logger.add('CheckStatus_SUCCESS', data);
            checkStatusRequestId = data.check_status_id;
            clientCheckStatusPrevResponseReceivedAt = Date.now();
            affiliateCheckStatusPrevResponseReceivedAt = data.response_affiliate_received_at;
            affiliateCheckStatusPrevResponseIssuedAt = data.response_affiliate_issued_at;
            console.log(data);
            if (data.status === 'success') {
                if (data.RedirectURL != 'undefined') {
                    redirectURL = data.RedirectURL;
                    leadId = leadid;
                    if (data.load_iframe != false) {
                        iframeLoadURL = data.load_iframe;
                    }
                    sendLastCheckStatusData('redirect', redirectURL, leadId);
                    performNextCheckStatusRequest = false;
                }
            } else if (data.status === 'rejected') {
                showScreen('progress-screen');
                if (countCheckStatusRequests === 1) {
                    rotateText();
                }
                var PercentageComplete = data.PercentageComplete;
                if (PercentageComplete != '100') {
                    $('#progress-bar-success').prop('aria-valuenow', PercentageComplete).css('width', PercentageComplete + '%').text(PercentageComplete + '% Complete');
                } else if (data.LanderFound == '' && PercentageComplete == '100') {
                    sendLastCheckStatusData();
                    showScreen('rejected-screen');
                    window.onbeforeunload = null;
                    performNextCheckStatusRequest = false;
                }
            }
        },
        error: function(xhr, status, error) {
            logger.add('CheckStatus_ERROR', xhr.responseText);
        },
        complete: function() {
            if (performNextCheckStatusRequest) {
                logger.add('CheckStatus_SETIMEOUT', 5000);
                setTimeout(function() {
                    checkStatus();
                }, 5000);
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

// function executeTripleClickFunction() {
//     if ($('#error-box').css('display') == 'block') {
//         $('#error-box').css('display', 'none');
//     } else {
//         $('#error-box').css('display', 'block');
//     }
// }

function closeWhiteBox() {
    $('#error-box').css('display', 'none');
}

var automaticRedirect = true;

function stopAutomaticRedirect(caller) {
    $(caller).text('Stopped!');
    automaticRedirect = false;
}


// function redirect() {
function redirect(redirectURL, leadId) {

    showScreen('redirecting-screen');
    window.onbeforeunload = null;
    // redirectURL = redirectURL + '/' + checkStatusRequestId + '/' + affiliateCheckStatusPrevResponseReceivedAt + '/' + affiliateCheckStatusPrevResponseIssuedAt + '/' + clientCheckStatusPrevResponseReceivedAt + '/' + Date.now();
    $('#redirecting-screen a').prop('href', redirectURL);

    // Facebook pixel fire
    if (facebookPixelId !== '') {
        fbq('track', 'RedirectToBuyer', { leadID: leadId });
    }

    // iFrame pixel fire
    if (iframeLoadURL !== '') {
        $('body').prepend('<iframe src="' + iframeLoadURL + '" width="1" height="1" frameborder="0"></iframe>');
    }

    // Redirect
    if (automaticRedirect)
        window.location.href = redirectURL;
}

(function($) {

    $.fn.typeWrite = function(s) {
        var o = { content: $(this).text(), delay: 50, t: this, i: 0 };
        if (s) {
            $.extend(o, s);
        }
        o.t.text('');
        var i = setInterval(function() {
            o.t.text(o.t.text() + o.content.charAt(o.i++));
            if (o.i == o.content.length) {
                clearInterval(i);
            }
        }, o.delay);
        return o.t;
    };
})(jQuery);

var rotatingTexts = [
    'Finding you the best loan. This may take up to 2 minutes...',
    'Searching for the best lenders for your application...',
    'Your application is progressing...',
    'Please do not close/reload the page while we search for the best lenders...',
    'This is taking longer than usual. Please do not close/reload the page...'
];
var rotatingTextId = 0;
var showFakeProgressBar = true;
var fakeProgressBarCounter = 0;

function fakeProgressBar() {
    if (showFakeProgressBar) {
        if (fakeProgressBarCounter === 0) {
            showScreen('progress-screen');
            rotateText();
        } else {
            var percentage = (100 / (210 / 5) * (fakeProgressBarCounter + 1)).toFixed(2);
            $('#progress-bar-success').prop('aria-valuenow', percentage).css('width', percentage + '%').text(percentage + '% Complete');
        }
        fakeProgressBarCounter++;
    }
}

function rotateText() {
    $elem = $('#rotatingText');
    $elem.text('');
    if (rotatingTextId >= rotatingTexts.length) {
        rotatingTextId = 0;
    }
    $elem.text(rotatingTexts[rotatingTextId++]);
    $elem.css('font-size', '32px');
    $elem.css('font-size', '34px');
    // $elem.typeWrite({content: rotatingTexts[rotatingTextId++]});
    setTimeout(rotateText, 20000);
}

if (!Date.now) {
    Date.now = function() {
        return new Date().getTime();
    }
}

function sendLastCheckStatusData(callback, redirectURL, leadid) {
    $.post({
        url: 'last-check-status/' + countryCode,
        data: {
            'leadid': leadid,
            'transaction_id': transaction_id,
            'oid': oid,
            'start': Date.now(),
            'id': checkStatusRequestId,
            'prev_response_client_received_at': clientCheckStatusPrevResponseReceivedAt,
            'prev_response_affiliate_received_at': affiliateCheckStatusPrevResponseReceivedAt,
            'prev_response_affiliate_issued_at': affiliateCheckStatusPrevResponseIssuedAt
        },
        fieldsType: 'json',
        success: function(data) {},
        error: function() {

        },
        complete: function() {
            if (callback !== undefined)
                window[callback](redirectURL, leadid);
        }
    });
}
