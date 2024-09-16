"use strict";

var setting = function () {

    var setupCheckboxToggle = function ($checkbox, $textarea) {
        $textarea.prop('disabled', !$checkbox.prop('checked'));

        $checkbox.change(function () {
            $textarea.prop('disabled', !$(this).prop('checked'));
        });
    };

    var editValidation = function () {
        const $checkboxAddCredit = $('#formrow-customCheck');
        const $textareaAddCredit = $('#add_credit');
        setupCheckboxToggle($checkboxAddCredit, $textareaAddCredit);

        const $checkboxAddDeposit1 = $('#formrow-customCheckDeposit');
        const $textareaAddDeposit1 = $('#add_deposit');
        setupCheckboxToggle($checkboxAddDeposit1, $textareaAddDeposit1);

        const $checkboxAddSchedule = $('#formrow-customCheckSchedule');
        const $textareaAddSchedule = $('#add_schedule');
        setupCheckboxToggle($checkboxAddSchedule, $textareaAddSchedule);

        const $checkboxCancelSchedule = $('#formrow-customCheckCancelSchedule');
        const $textareaCancelSchedule = $('#cancel_schedule');
        setupCheckboxToggle($checkboxCancelSchedule, $textareaCancelSchedule);

        const $checkboxDaysExpire = $('#formrow-customCheckDaysExpire');
        const $textareaDaysExpire = $('#days_expire');
        setupCheckboxToggle($checkboxDaysExpire, $textareaDaysExpire);

        const $checkboxDataExpire = $('#formrow-customCheckDataExpire');
        const $textareaDataExpire = $('#data_expire');
        setupCheckboxToggle($checkboxDataExpire, $textareaDataExpire);

        const $checkboxCreateUser = $('#formrow-customCheckCreateUser');
        const $textareaCreateUser = $('#create_user');
        setupCheckboxToggle($checkboxCreateUser, $textareaCreateUser);

        const $checkboxPaymentNotification = $('#formrow-customCheckPaymentNotification');
        const $textareaPaymentNotification = $('#payment_notification');
        setupCheckboxToggle($checkboxPaymentNotification, $textareaPaymentNotification);

        const $checkboxOnAutorenew = $('#formrow-customCheckOnAutorenew');
        const $textareaOnAutorenew = $('#on_autorenew');
        setupCheckboxToggle($checkboxOnAutorenew, $textareaOnAutorenew);

        const $checkboxOnSchedule = $('#formrow-customCheckOnSchedule');
        const $textareaOnSchedule = $('#on_schedule');
        setupCheckboxToggle($checkboxOnSchedule, $textareaOnSchedule);

        const $checkboxUsernamePassword = $('#formrow-customCheckUsernamePassword');
        const $textareaUsernamePassword = $('#username_password');
        setupCheckboxToggle($checkboxUsernamePassword, $textareaUsernamePassword);

        const $checkboxOTP = $('#formrow-customCheckOTP');
        const $textareaOTP = $('#otp');
        setupCheckboxToggle($checkboxOTP, $textareaOTP);

        // Repeat the pattern for other checkboxes and textareas
    };

    return {
        edit: function () {
            editValidation();
        },
    };
}();