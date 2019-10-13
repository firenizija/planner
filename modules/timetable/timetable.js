/*global $, loaded, console*/
$(".timetable__link").focusout(function () {
    'use strict';
    loaded();
});
$(".timetable__branchselect").change(function () {
    'use strict';
    $(".timetable__plan").load('https://cors-anywhere.herokuapp.com/' + $('.timetable__link').val() + '/plany/o' + $(".timetable__branchselect").val() + '.html' + ' .tabela');
});
var o = 1;
var branchLast = "";

function loaded() {
    'use strict';
    $("body").append("<div id='branch' style='diplay:none'></div>");
    $("#branch").load('https://cors-anywhere.herokuapp.com/' + $('.timetable__link').val() + '/plany/o' + o + '.html' + ' .tytulnapis', function () {
        var branch = $("#branch").text();
        $('.timetable__branchselect').append($("<option></option>").attr("value", o).text(branch));
        $("#branch").remove();
        o++;
        if (branch !== branchLast) {
            branchLast = branch;
            loaded();
        } else if (branch === branchLast) {
            $(".timetable__branchselect option[value='" + (o - 1) + "']").remove();
            return;
        } else {
            return;
        }
    });
}
