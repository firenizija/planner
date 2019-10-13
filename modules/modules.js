/*global $*/

$('.graybg').click(() => {
    if ($('#addEvent').is(':visible')) {
        closeEventText();
    }
    if ($('.add_module_list').is(':visible')) {
        closeModuleList();
    }
})

$('.moduleContainer__add-module').click(() => {
    $('.add_module_list').fadeIn('fast');
    $('.graybg').fadeIn('fast');
    $('body').css('overflow-y', 'hidden');
}); //show add module form

function closeModuleList() {
    $(".graybg").hide();
    $('.add_module_list').hide();
    $('body').css('overflow-y', 'auto');
    visibleAddEvent = false;
}
