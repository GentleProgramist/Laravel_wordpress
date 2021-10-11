$(document).ready(function() {

    // If user jumps from one field to the next to next one
    // validation does not occur on the field jumped
    // Add validation on it
    $('.form-group').on('keydown focusin', function() {
        var $prev = $(this).prevAll('.form-group').not('.section-header').not('.hidden').not('.has-success').not('.has-error').first();
        console.log('Previous');
        console.log($prev);
        if ($prev.length > 0) {
            $prev.find('input,select,button').change();
        }
    });

    // Validate 'type=tel' fields
    var $fields = $('input[type=tel]');
    $.each($fields, function(i, elem) {
        $(elem).on('keyup focusout change', function(e) {
            validateTel(e, $(this));
        });
    });

    // Validate radio groups
    var $radioGroups = $('.btn-group');
    $.each($radioGroups, function(i, elem) {
        $(elem).on('keyup focusout change', function(e) {
            validateRadioGroup(e, $(this));
        });
    });

    // Validate text fields
    var $fields = $('input[type=text]');
    $.each($fields, function(i, elem) {
        $(elem).on('keyup focusout change', function(e) {
            validateText(e, $(this));
        });
    });

    // Validate text fields
    var $fields = $('select');
    $.each($fields, function(i, elem) {
        $(elem).on('keyup focusout change', function(e) {
            validateSelect(e, $(this));
        });
    });

    // Validate email fields
    var $fields = $('input[type=email]');
    $.each($fields, function(i, elem) {
        $(elem).on('keyup focusout change', function(e) {
            validateEmail(e, $(this));
        });
    });

    // Validate date fields
    var $fields = $('input[type=date]');
    $.each($fields, function(i, elem) {
        $(elem).on('keyup focusout change', function(e) {
            validateDate(e, $(this));
        });
    });

    // Validate checkbox fields
    var $fields = $('input[type=checkbox]');
    $.each($fields, function(i, elem) {
        $(elem).on('keyup focusout change', function(e) {
            validateCheckbox(e, $(this));
        });
    });

    // Validate password fields
    var $fields = $('input[type=password]');
    $.each($fields, function(i, elem) {
        $(elem).on('keyup focusout change', function(e) {
            validatePassword(e, $(this));
        });
    });

});

function hideErrorMessage($formGroupParent) {

    var $infoMessageContainer = $formGroupParent.find('.label-info').removeClass('hidden');
    var $errorMessageContainer = $formGroupParent.find('.label-danger');

    $formGroupParent.removeClass('has-error').removeClass('has-success');
    $errorMessageContainer.addClass('hidden');
    $errorMessageContainer.text('');
    $infoMessageContainer.removeClass('hidden');
}

function showErrorMessage($formGroupParent, error) {

    var $infoMessageContainer = $formGroupParent.find('.label-info').removeClass('hidden');
    var $errorMessageContainer = $formGroupParent.find('.label-danger');

    if (error !== '') {

        // Show the error messages
        console.log('Field data not valid. Error: ' + error);
        $formGroupParent.addClass('has-error');
        $infoMessageContainer.addClass('hidden');
        $errorMessageContainer.removeClass('hidden');
        $errorMessageContainer.text(error);

    } else {

        // Show success indicator
        console.log('Field data valid');
        $formGroupParent.addClass('has-success');
        $infoMessageContainer.removeClass('hidden');
    }

    // console.log($formGroupParent)
    // debugger
    // console.log($formGroupParent.data)
    // debugger

    // if ($formGroupParent.data('validatecallback')) {
    //     window[$formGroupParent.data('validatecallback')](error);
    // }
}

function validateTel(e, $field) {

    // Log
    console.log('Validating field: ');
    console.log($field);

    // Get basic data about the field
    var value = $field.val().trim();
    var error = '';
    var $formGroupParent = $field.parents('.form-group');

    // Hide any current error messages
    hideErrorMessage($formGroupParent);

    // Check for emptiness
    if (value === '') {

        // Field is empty
        var required = $field.prop('required');
        console.log('Required = ' + required);
        if (required) {
            error = 'This field is required';
        }

        // Nothing to validate

    } else {

        // Convert to a number

        if (isNaN(value)) {

            // Is not a valid number
            error = 'Please enter a numeric value';

        } else {

            // Is a valid number
            // Check further
            // Min
            var min = parseInt($field.prop('min'));
            if (!isNaN(min) && value < min) {
                error = 'Please enter a value greater than or equal to ' + min;
            } else {

                // Max
                var max = parseInt($field.prop('max'));
                if (!isNaN(max) && value > max) {
                    error = 'Please enter a value lesser than or equal to ' + max;
                } else {

                    // Step
                    var step = parseInt($field.attr('step'));
                    if (!isNaN(step) && value % step !== 0) {
                        error = 'This should be in multiples of ' + step;
                    } else {

                        // Length
                        var length = parseInt($field.data('length'));
                        if (!isNaN(length) && String(value).length !== length) {
                            error = 'This field should be ' + length + ' characters in length';
                        } else {

                            // Begins with
                            var beginsWith = $field.data('beginswith');
                            var regex = new RegExp('^' + beginsWith);
                            if (beginsWith !== undefined && !regex.test(value)) {
                                error = 'This field should begin with ' + beginsWith;
                            } else {

                                // Minlength
                                var minlength = $field.attr('minlength');
                                if (minlength !== false && value.length < minlength) {
                                    error = 'This should be at least ' + minlength + ' characters in length';
                                } else {

                                    // Maxlength
                                    var maxlength = $field.attr('maxlength');
                                    if (maxlength !== false && value.length > maxlength) {
                                        error = 'This should be less than ' + maxlength + ' characters in length';
                                    } else {

                                        // Begins with any
                                        var beginsWithAny = $field.data('beginswithany');
                                        if (beginsWithAny !== undefined) {
                                            beginsWithAny = beginsWithAny.split(',');
                                            var found = false;
                                            $.each(beginsWithAny, function(i, val) {
                                                var regex = new RegExp('^' + val);
                                                if (regex.test(value)) {
                                                    found = true;
                                                    return false;
                                                }
                                            });
                                            if (!found) {
                                                error = 'This field should begin with any of ' + beginsWithAny.join(', ');
                                            }
                                        }

                                        if (error === '') {

                                            // Required if
                                            var requiredIf = $field.data('requiredif');
                                            if (requiredIf !== undefined && window[requiredIf]() === true && value === '') {
                                                error = 'Required';
                                            }

                                        }

                                    }

                                }

                            }

                        }
                    }

                }

            }

        }

    }

    // Show error message, if any
    showErrorMessage($formGroupParent, error);
}

function validateRadioGroup(e, $groupParent) {

    // Log
    console.log('Validating field: ');
    console.log($groupParent);

    // Get basic data about the field
    var error = '';
    var $formGroupParent = $groupParent.parents('.form-group');
    var $selected = $formGroupParent.find('[type=radio]:checked');

    // Hide any current error messages
    hideErrorMessage($formGroupParent);

    // Validations
    // Check if required
    console.log($selected.length);
    if ($selected.length === 0) {

        var $radios = $groupParent.find('[type=radio]');
        console.log($($radios[0]).prop('required'));
        if ($($radios[0]).prop('required')) {
            error = 'Please select an option';
        }

        // Required if
        if (error === '' && $groupParent.data('requiredif') !== undefined && window[$groupParent.data('requiredif')]() === true) {
            error = 'Please select an option';
        }

    } else {

        // One or the other option is selected
        // Ensure that a disabled option is not selected
        if ($selected.prop('disabled')) {
            error = 'Please select another option';
        }

    }

    // Show error message, if any
    showErrorMessage($formGroupParent, error);
}

function validateText(e, $field) {

    // Log
    console.log('Validating field: ');
    console.log($field);

    // Get basic data about the field
    var value = $field.val().trim();
    var error = '';
    var $formGroupParent = $field.parents('.form-group');

    // Hide any current error messages
    hideErrorMessage($formGroupParent);

    // Check for emptiness
    if (value === '') {

        // Field is empty
        var required = $field.prop('required');
        console.log('Required = ' + required);
        if (required) {
            error = 'This field is required';
        }

        // Nothing to validate

    } else {

        // Minlength
        var minlength = $field.attr('minlength');
        if (minlength !== false && value.length < minlength) {
            error = 'This should be at least ' + minlength + ' characters in length';
        } else {

            // Maxlength
            var maxlength = $field.attr('maxlength');
            if (maxlength !== false && value.length > maxlength) {
                error = 'This should be less than ' + maxlength + ' characters in length';
            } else {

                // Regex match
                var regex = $field.data('validateregex');
                if (regex !== undefined) {
                    regex = new RegExp(regex, 'g');
                    if (value.match(regex) === null) {
                        error = $field.data('validateregexerrormessage');
                    }
                }

                if (error == '') {

                    // Required if
                    var requiredIf = $field.data('requiredif');
                    if (requiredIf !== undefined && window[requiredIf]() === true && value === '') {
                        error = 'Required';
                    } else {

                        // Differs from
                        var differsFrom = $field.data('differsfrom');
                        if (differsFrom !== undefined && value === $('[name=' + differsFrom + ']').val()) {
                            error = 'This field can not have the same value as the ' + differsFrom.replace('_', ' ') + ' field';
                        }

                    }

                }

            }

        }

    }

    // Show error message, if any
    showErrorMessage($formGroupParent, error);
}

function validateSelect(e, $field) {

    // Log
    console.log('Validating field: ');
    console.log($field);

    // Get basic data about the field
    var value = $field.find('option:selected').val().trim();
    var error = '';
    var $formGroupParent = $field.parents('.form-group');

    // Hide any current error messages
    hideErrorMessage($formGroupParent);

    // Check for emptiness
    if (value === '') {

        // Field is empty
        var required = $field.prop('required');
        console.log('Required = ' + required);
        if (required) {
            error = 'This field is required';
        }

        // Nothing to validate

    } else {

        // A disabled option should not be selected
        if ($field.find('option:selected').prop('disabled')) {
            error = 'Please select another option';
        }

    }

    // Show error message, if any
    showErrorMessage($formGroupParent, error);
}

function validateEmail(e, $field) {

    // Log
    console.log('Validating field: ');
    console.log($field);

    // Get basic data about the field
    var value = $field.val().trim();
    var error = '';
    var $formGroupParent = $field.parents('.form-group');

    // Hide any current error messages
    hideErrorMessage($formGroupParent);

    // Check for emptiness
    if (value === '') {

        // Field is empty
        var required = $field.prop('required');
        console.log('Required = ' + required);
        if (required) {
            error = 'This field is required';
        }

        // Nothing to validate

    } else {

        // Regex
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!re.test(String(value).toLowerCase())) {
            error = 'Please enter a valid email address';
        }

    }

    // Show error message, if any
    showErrorMessage($formGroupParent, error);
}

function validateDate(e, $field) {

    // Log
    console.log('Validating field: ');
    console.log($field);

    // Get basic data about the field
    var value = $field.val().trim();
    var error = '';
    var $formGroupParent = $field.parents('.form-group');

    // Get date details
    var parts = value.split('/');
    var dd = parts[0];
    var mm = parts[1];
    var yyyy = parts[2];

    // Hide any current error messages
    hideErrorMessage($formGroupParent);

    // Check for emptiness
    if (value === '') {

        // Field is empty
        var required = $field.prop('required');
        console.log('Required = ' + required);
        if (required) {
            error = 'This field is required';
        }

        // Nothing to validate

    } else {

        // Max date
        var max = $field.prop('max');
        var currentDate = new Date(yyyy + '-' + mm + '-' + dd);
        var maxDate = new Date(max);
        if (currentDate.getTime() > maxDate.getTime()) {
            var parts = max.split('-');
            error = 'Please enter a date lesser than or equal to ' + parts[2] + '/' + parts[1] + '/' + parts[0];
        }

    }

    // Show error message, if any
    showErrorMessage($formGroupParent, error);
}

function validateCheckbox(e, $field) {

    // Log
    console.log('Validating field: ');
    console.log($field);

    // Get basic data about the field
    var error = '';
    var selected = $field.prop('checked');
    var $formGroupParent = $field.parents('.form-group');

    // Hide any current error messages
    hideErrorMessage($formGroupParent);

    // Field is required
    var required = $field.prop('required');
    console.log('Required = ' + required);
    if (required && !selected) {
        error = 'This field is required';
    }

    // Show error message, if any
    showErrorMessage($formGroupParent, error);
}

function validatePassword(e, $field) {

    // Log
    console.log('Validating field: ');
    console.log($field);

    // Get basic data about the field
    var value = $field.val().trim();
    var error = '';
    var $formGroupParent = $field.parents('.form-group');

    // Hide any current error messages
    hideErrorMessage($formGroupParent);

    // Check for emptiness
    if (value === '') {

        // Field is empty
        var required = $field.prop('required');
        console.log('Required = ' + required);
        if (required) {
            error = 'This field is required';
        }

        // Nothing to validate

    } else {

        // Check for minlenth, maxlength and data-length
        // Minlength
        var minlength = $field.attr('minlength');
        if (minlength !== false && value.length < minlength) {
            error = 'This should be at least ' + minlength + ' characters in length';
        } else {

            // Maxlength
            var maxlength = $field.attr('maxlength');
            if (maxlength !== false && value.length > maxlength) {
                error = 'This should be maximum ' + maxlength + ' characters in length';
            } else {

                // Add more validation rules here

            }
        }

    }

    // Show error message, if any
    showErrorMessage($formGroupParent, error);
}

function validateForm(e) {

    e.preventDefault();



    // Validate 'type=tel' fields
    var $fields = $('input[type=tel]');
    $.each($fields, function(i, elem) {
        validateTel(e, $(this));
    });

    // Validate radio groups
    var $radioGroups = $('.btn-group');
    $.each($radioGroups, function(i, elem) {
        validateRadioGroup(e, $(this));
    });

    // Validate text fields
    var $fields = $('input[type=text]');
    $.each($fields, function(i, elem) {
        validateText(e, $(this));
    });

    // Validate text fields
    var $fields = $('select');
    $.each($fields, function(i, elem) {
        validateSelect(e, $(this));
    });

    // Validate email fields
    var $fields = $('input[type=email]');
    $.each($fields, function(i, elem) {
        validateEmail(e, $(this));
    });

    // Validate date fields
    var $fields = $('input[type=date]');
    $.each($fields, function(i, elem) {
        validateDate(e, $(this));
    });

    // Validate checkbox fields
    var $fields = $('input[type=checkbox]');
    $.each($fields, function(i, elem) {
        validateCheckbox(e, $(this));
    });

    // Validate password fields
    var $fields = $('input[type=password]');
    $.each($fields, function(i, elem) {
        validatePassword(e, $(this));
    });

    // Scroll to the first field with error
    var $firstElementWithError = $($('.form-group.has-error')[0]);
    if ($firstElementWithError.length > 0) {
        console.log('Validation errors found on submit');
        $([document.documentElement, document.body]).animate({
            scrollTop: $firstElementWithError.offset().top
        }, 400);
    } else {

        // Form valid, can submit
        console.log('Form is valid. Submitting.');
        if ($('#application-form').data('countrycode') === 'us')
            submitFormUS();
        else
            submitFormUK();
        return false;

        // Form valid, can submit
        // console.log('Form is valid. Submitting.');
        // submitForm();
    }

    e.preventDefault();
    return false;
}

function employerNameRequired() {
    switch ($('[name=incomeSource]:checked').val()) {
        case 'SelfEmployed':
        case 'Pension':
        case 'DisabilityBenefits':
        case 'Benefits':
            break;

        default:
            return true;
            break;
    }

    return false;
}

function employerIndustryRequired() {
    switch ($('[name=primaryincome]:checked').val()) {
        case 'Pension':
        case 'DisabilityBenefits':
        case 'Benefits':
            break;

        default:
            return true;
            break;
    }

    return false;
}

function combinedPayRequired() {
    return ($('[name=marital_status]:checked').val() == 'Married');
}
