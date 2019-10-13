let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();
let selectYear = document.getElementById("year");
let selectMonth = document.getElementById("month");
let nextPreviousMonth = 0;
let nextPreviousYear = 0;
let months = ["Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"];
var daysInMonthForId;

let monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);
daysId();
eventCheck();

function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
    daysId();
    eventCheck();
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
    daysId();
    eventCheck();
}

function todayButton() {
    currentYear = today.getFullYear();
    currentMonth = today.getMonth();
    showCalendar(currentMonth, currentYear);
    daysId();
    eventCheck();
}

function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
    daysId();
    eventCheck();
}

function showCalendar(month, year) {
    let firstDay = (new Date(year, month)).getDay() - 1;
    let daysInMonth = 32 - new Date(year, month, 32).getDate();
    daysInMonthForId = daysInMonth;

    let tbl = document.getElementById("calendar-body"); // body of the calendar

    // clearing all previous cells
    tbl.innerHTML = "";

    // filing data about month and in the page via DOM.
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;

    // creating all cells
    let date = 1;
    for (let i = 0; i < 6; i++) {
        // creates a table row
        let row = document.createElement("tr");

        //creating individual cells, filing them up with data.
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {
                let cell = document.createElement("td");
                let cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
            } else if (date > daysInMonth) {
                break;
            } else {
                let cell = document.createElement("td");
                cell.classList.add("days");
                let cellText = document.createTextNode(date);
                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.classList.add("today");
                } // color today's date
                cell.appendChild(cellText);
                row.appendChild(cell);
                date++;
            }


        }

        tbl.appendChild(row); // appending each row into calendar body.
    }
    //add option on hover
    $(".days").hover(
        function () {
            $(this).append($("<span class='fa fa-plus addEventButton' title='Dodaj wydarzenie' onclick='addEventText(event);'></span>"));
        },
        function () {
            $(this).find("span:last").remove();
        }
    );
}

function eventCheck() {
    //get events
    /*  tab[]
    [0]:Name
    [1]:Group
    [2]:Color
    [3]:Type
    [4]:hour
    [5]:minute
    [6]:day
    [7]:month
    [8]:year
    */
    var eventsNumber = events[(events.length - 1)] / 2;
    var j = 0;
    var tab = [0];
    for (eventsNumber; eventsNumber > 0; eventsNumber--) {
        for (var i = 0; i < 9; i++) {
            tab[i] = [events[i + j]];
        }
        if (parseInt(tab[7]) == (currentMonth + 1) && parseInt(tab[8]) == currentYear) {
            var day = "#" + parseInt(tab[6]);
            $(day).append("<span class='tag fa fa-tag' style='color:" + tab[2] + ";'><span class='eventData'>" + tab[0] + "<br/>" + tab[1] + "<br/>" + tab[4] + ":" + tab[5] + "</span></span>");
        }
        j += 9;
    }
}

function daysId() {
    for (var i = 0; i < daysInMonthForId; i++) {
        document.getElementsByClassName("days")[i].id = i + 1;
    }
}
