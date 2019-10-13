/*global $*/
function switchForm(status) {
    if (status == "login") {
        $('.main-content__form--register').fadeOut(80, () => {
            $('.main-content__form--login').fadeIn('fast');
            //location.href = '';
        });
    }
    if (status == "register") {
        $('.main-content__form--login').fadeOut(80, () => {
            $('.main-content__form--register').fadeIn('fast');
            //location.href = '';
        });
    }
    console.log(status);
}

$('.header__button--login').click(() => switchForm("login"));
$('.header__button--register').click(() => switchForm("register"));

//Switch when register success/login fail
if (registerSuccessful == true) {
    $('.main-content__info').html("<br />Rejestracja przebiegła pomyślnie!");
    switchForm("login");
}
if (incorrectLoginData == true) {
    switchForm("register");
}
$('body').fadeIn('1000'); //Transition in page (default hidden in index-style.css) EXPORT THIS!
