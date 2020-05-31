const $ = e => document.querySelector(e);
const $$ = e => document.querySelectorAll(e);

get('/PFE/admin/data.php');


function get(url) {
    fetch(url, {
            method: 'get'
        })
        .then(response => response.json())
        .then(body => createChart(body));
}

function createChart(data) {
    let creationDates = data.users.map(user => getDayName(new Date(user.created), 'fr-FR'));
    let records = {
        lundi : 0,
        mardi : 0,
        mercredi : 0,
        jeudi : 0,
        vendredi : 0,
        samedi : 0,
        dimanche : 0
    }
    days = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
    days.forEach(dateP => {
        creationDates.forEach(dateC => {
            dateP === dateC && records[dateP]++
    })
    });
    let D = [];
    days.forEach(day => D.push(records[day]));
    const canvas = $('#myChart').getContext('2d');
    const chart = new Chart(canvas, {

        type: 'line',

        data: {
            labels: days,
            datasets: [{
                label: 'Nombre des utilisateurs',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: D
            }]
        },
        responsive: true,
        // Configuration options go here
        options: {}
    });
}


function getDayName(date, locale)
{
    return date.toLocaleDateString(locale, { weekday: 'long' });        
}

var day = getDayName(new Date(), "fr-FR");
