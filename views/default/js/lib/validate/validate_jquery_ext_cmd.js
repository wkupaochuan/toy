define(function(require, exports, module) {
    var FormValidator = require('./validate.js');

    function setFailMsgForView(element, message) {
        $(element).closest('.validate_item')
            .removeClass('validate_success')
            .addClass('validate_fail')
            .find('.validate_error').text(message);
    }

    function setSuccessForView(element) {
        $(element).closest('.validate_item')
            .removeClass('validate_fail')
            .addClass('validate_success');
    }

    function i18n(validator) {
        $.extend(validator.messages, {
            required: '%s项不能为空',
            matches: '%s field does not match the %s field.',
            "default": '%s field is still set to default, please change.',
            valid_email: 'The %s field must contain a valid email address.',
            valid_emails: 'The %s field must contain all valid email addresses.',
            min_length: '%s项不能少于%s个字',
            max_length: '%s项不能超过%s个字',
            exact_length: 'The %s field must be exactly %s characters in length.',
            greater_than: '%s必须大于%s.',
            less_than: '%s必须小于%s.',
            alpha: 'The %s field must only contain alphabetical characters.',
            alpha_numeric: 'The %s field must only contain alpha-numeric characters.',
            alpha_dash: 'The %s field must only contain alpha-numeric characters, underscores, and dashes.',
            numeric: '%s项必须为数字',
            integer: 'The %s field must contain an integer.',
            decimal: '%s项必须是数字.',
            is_natural: 'The %s field must contain only positive numbers.',
            is_natural_no_zero: 'The %s field must contain a number greater than zero.',
            valid_ip: 'The %s field must contain a valid IP.',
            valid_base64: 'The %s field must contain a base64 string.',
            valid_credit_card: 'The %s field must contain a valid credit card number.',
            is_file_type: 'The %s field must contain only %s files.',
            valid_url: ' %s不是合法的url',
            min: '%s不小于%s.',
            max: '%s不大于%s.',
            money: '%s的小数位不能多于2位'
        });
    }

    function validate(validator) {
        validator._validateForm();
        $.each(validator.fields, function(index, field) {
            var error;
            $.each(validator.errors, function(i, err) {
                if (err.element === field.element) {
                    error = err;
                    return false;
                }
            });

            if (error) {
                setFailMsgForView(field.element, error.message);
            } else {
                setSuccessForView(field.element);
            }
        });
        return validator.errors;
    }

    function valid(validator) {
        return validate(validator).length <= 0;
    }

    FormValidator.prototype._hooks.max = function(field, param) {
        if (!$.isNumerice(field.value)) {
            return false;
        }

        return (parseFloat(field.value) <= parseFloat(param));
    };
    FormValidator.prototype._hooks.min = function(field, param) {
        if (!$.isNumeric(field.value)) {
            return false;
        }

        return (parseFloat(field.value) >= parseFloat(param));
    };

    FormValidator.prototype._hooks.money = function (field, param) {
        var reg = /^-?\d+\.?\d{0,2}$/;
        return reg.test(field.value);
    };

    $.fn.formValidate = function(settings) {
        var $form = this, validator;

        if (typeof settings === 'string') {
            validator = $form.data('form_validate');
            if (validator) {
                if ('validate' === settings) {
                    if (arguments[1]) {
                        return validateField(arguments[1]);
                    } else {
                        return validate(validator);
                    }
                } else if ('valid' === settings) {
                    return valid(validator);
                } else if ('addRule' === settings) {
                    addRule(arguments[1], arguments[2]);
                } else if ('removeRule' === settings) {
                    removeRule(arguments[1], arguments[2]);
                } else if ('reset' === settings) {
                    reset();
                } else if ('setFailMsgForView' === settings) {
                    setFailMsgForView(arguments[1], arguments[2]);
                } else if ('setSuccessForView' === settings) {
                    setSuccessForView(arguments[1]);
                }
            }

            return;
        }

        validator = new FormValidator($form.get(0), settings.fields, function(errors, event) {

        });

        i18n(validator);

        $.each(settings.fields, function(index, field) {
            if (field.messages) {
                $.each(field.messages, function(ruleName, msg) {
                    validator.messages[field.name + '.' + ruleName] = msg;
                });
            }
        });

        function ruleNameEquals(prevRule, nextRule) {
            return prevRule.replace(/\[.*\]/, '') === nextRule.replace(/\[.*\]/, '');
        }

        function removeRule(fieldName, rule) {
            var field = validator.fields[fieldName];
            if (field) {
                field.rules = $.grep(field.rules.split('|'), function (r) {
                    return !ruleNameEquals(r, rule);
                }).join('|');
                validateField(fieldName);
            }
        }

        function addRule(fieldName, rule) {
            var field = validator.fields[fieldName];
            if (field) {
                var rules = $.grep(field.rules.split('|'), function (r) {
                    return !ruleNameEquals(r, rule);
                });

                rules.push(rule);

                field.rules = rules.join('|');

                validateField(fieldName);
            }
        }

        function validateField(name) {
            var field = validator.fields[name];
            if (field) {
                var element = field.element || $form.find('[name="' + name + '"]');
                validator._validateForm();
                var error1 = $.grep(validator.errors, function(error2) {
                    return error2.name === $(element).attr('name');
                })[0];
                if (error1) {
                    setFailMsgForView(element, error1.message);
                    return error1;
                } else {
                    setSuccessForView(element);
                }
            }
        }


        function reset() {
            $form.find('.validate_item').removeClass('validate_fail').removeClass('validate_success');
        }

        function processFieldActive() {
            $(this).closest('.validate_item')
                .removeClass('validate_fail')
                .removeClass('validate_success');
        }

        $form.on('blur', 'input,textarea', function () {
            validateField($(this).attr('name'));
        });

        $form.on('change', 'select,input[type=radio],input[type=checkbox]', function () {
            validateField($(this).attr('name'));
        });

        $form.on('focus', 'input,textarea', processFieldActive);

        $form.data('form_validate', validator);

        return validator;
    };
});