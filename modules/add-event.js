/*global $, currentMonth, currentYear, document*/
var visibleAddEvent = false;
document.write('<div id="addEvent" class="addEventForm row">\
							<span class="col-12"><span class="fa fa-window-close closeEventForm" title="Zamknij" onclick="closeEventText();"></span></span>\
							<span id="title-text" class="col-12">Dodaj wydarzenie do planu</span><br />\
							<form class="col-12" action="events.php" method="POST">\
								Nazwa:<br /><input type="text" name="NameEvent"><br />\
								Grupa:<br /><input type="text" name="GroupEvent"><br />\
								Kolor:<br /><input type="color" name="ColorEvent"><br />\
								Typ:<br /><input type="text" name="TypeEvent"><br />\
								Data:<br /><input type="date" name="DateEvent" id="dateEvent"><br />\
								Czas:<br /><input type="time" name="timeEvent"><br />\
								<input type="submit" name="sendEvent" value="Zapisz">\
							</form>\
						</div>\
			');

function addEventText(ev) {
    'use strict';
    console.log(ev);
    if (visibleAddEvent === false) {
        let idDay = ev.path[1].id;
        $("#addEvent").fadeIn('fast');
        $(".graybg").fadeIn('fast');
        visibleAddEvent = true;
        $('#dateEvent').val(currentYear + '-' + ('0' + (currentMonth + 1)).slice(-2) + '-' + ('0' + (idDay)).slice(-2)); //set value data input
        $('body').css('overflow-y', 'hidden');
    } else {
        $("#addEvent").hide();
        $(".graybg").hide();
        $('body').css('overflow-y', 'auto');
        visibleAddEvent = false;
    }
}

//close
function closeEventText() {
    'use strict';
    $(".graybg").hide();
    $("#addEvent").hide();
    $('body').css('overflow-y', 'auto');
    visibleAddEvent = false;
}
