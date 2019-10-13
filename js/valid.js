/*global $*/
//REGISTER VALIDATION
var regValidButton = $('.main-content__submit')[0];
var letterNumber = /^[0-9a-zA-Z]+$/;
//vars from forms:
function termsChecked() {
    "use strict";
    if ($('.main-content__input--terms:checked').val()) {
        /*terms.checked*/
        $('.main-content__info-error--terms').text("").fadeOut('fast');
        return true;
    } else {
        $('.main-content__info-error--terms').html("<br />Musisz zaakceptować regulamin").fadeIn('fast');
        return false;
    }
}

function repasswordValid() {
    "use strict";
    if ($('.main-content__input--password').val() !== $('.main-content__input--repassword').val()) {
        $('.main-content__info-error--password').html("<br />Podane hasła nie są identyczne").fadeIn('fast');
        return false;
    } else {
        $('.main-content__info-error--password').text("").fadeOut('fast');
        return true;
    }
}

function loginValid() {
    //min3 max20
    "use strict";
    if ($('.main-content__input--username').val().length > 2 && $('.main-content__input--username').val().length < 21) {
        $('.main-content__info-error--login').text("").fadeOut('fast');
        //no space
        if (letterNumber.test($('#username').val())) {
            $('.main-content__info-error--login').text("").fadeOut('fast');
            return true;
        } else {
            $('.main-content__info-error--login').html("<br />Niedozwolone znaki").fadeIn('fast');
            return false;
        }
    } else {
        $('.main-content__info-error--login').html("<br />Minimum 3 znaki").fadeIn('fast');
        return false;
    }
}

function emailValid() {
    "use strict";
    if ($('.main-content__input--email').val().length > 0) {
        $('.main-content__info-error--email').text("").fadeOut('fast');
        return true;
    } else {
        $('.main-content__info-error--email').html("<br />Email potrzebny w celu weryfikacji").fadeIn('fast');
        return false;
    }
}

function passwordValid() {
    "use strict";
    if ($('.main-content__input--password').val().length > 7 && /\W/.test($('.main-content__input--password').val()) && /[A-Z]/.test($('.main-content__input--password').val()) && /[a-z]/.test($('.main-content__input--password').val())) {
        $('.main-content__info-error--password').text("").fadeOut('fast');
        return true;
    } else {
        $('.main-content__info-error--password').html("<br />Hasło musi zawierać małą i dużą literę <br />min.8 znaków i znak specjalny").fadeIn('fast');
        return false;
    }
}

function validation() {
    //del last data from PHP
    "use strict";
    $('#errorfromPHP').text("");
    //check all
    if (repasswordValid() === true && loginValid() === true && emailValid() === true && passwordValid() === true && termsChecked() === true) {
        regValidButton.type = "submit"; //set register button type submit
        return true;
    } else {
        regValidButton.type = "button"; //set register button type button
        return false;
    }
}
$('.main-content__input').keydown(() => regValidButton.type = 'button'); //if key down in input set submit to button
$('.main-content__input--repassword').keyup(() => repasswordValid()); //if key up check password consistency
$('.main-content__submit--register').mousedown(() => validation()); //on click mouse or-
$('.main-content__submit--register').keydown(() => validation()); //enter do validation function
$('.main-content__input').focus(() => ($('.error').html(''))); //clear errors after focus input
