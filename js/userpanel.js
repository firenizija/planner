/*global $*/
$('.header__user').mouseenter(() => $('.header__user-option ').show());
$('.header__user').mouseleave(() => $('.header__user-option ').hide());
$('.header__user').click(() => $('.header__user-option ').toggle());
$('body').fadeIn('fast');
