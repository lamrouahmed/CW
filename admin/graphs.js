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
    const {users,demandes} = data;
    let u_creationDates = users.map(user => getDayName(new Date(user.created), 'fr-FR'));
    let records = {
        users: {
            lundi: 0,
            mardi: 0,
            mercredi: 0,
            jeudi: 0,
            vendredi: 0,
            samedi: 0,
            dimanche: 0
        },
        demandes: {
            lundi: 0,
            mardi: 0,
            mercredi: 0,
            jeudi: 0,
            vendredi: 0,
            samedi: 0,
            dimanche: 0
        },
        status: {
            offline: 0,
            online: 0
        }
    }
    days = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
    days.forEach(dateP => {
        u_creationDates.forEach(dateC => {
            dateP === dateC && records.users[dateP]++
        })
    });
    let U = [];
    days.forEach(day => U.push(records.users[day]));
    const usersChart = $('#u_chart').getContext('2d');
    const u_chart = new Chart(usersChart, {

        type: 'line',

        data: {
            labels: days,
            datasets: [{
                label: 'Nombre des comptes cree par jour',
                backgroundColor: 'rgba(234, 106, 134, 0.16)', 
                borderColor: 'rgb(255, 99, 132)',
                data: U
            }]
        },
        responsive: true,
        options: {}
    });
    const pie = $('#pie').getContext('2d');
    users.forEach(user => {
        user.status === "online" && records.status.online++;
        user.status === "offline" && records.status.offline++;
    })
    const status_chart = new Chart(pie, {
        type: 'doughnut',
        data : {
            datasets: [{
                data: [records.status.offline, records.status.online],
                backgroundColor: [
                    "#ff6384",
                    "#4bc0c0"
                ]
            }],

            labels: [
                'Offline',
                'Online'
            ]
        },
        options: {

        }
    })















    let d_creationDates = demandes.map(demande => getDayName(new Date(demande.date_demande), 'fr-FR'));
    const demandesChart = $('#d_chart').getContext('2d');

    days.forEach(dateP => {
        d_creationDates.forEach(dateC => {
            dateP === dateC && records.demandes[dateP]++
        })
    });
    let D = [];
    days.forEach(day => D.push(records.demandes[day]));
    const d_chart = new Chart(demandesChart, {

        type: 'line',

        data: {
            labels: days,
            datasets: [{
                label: 'Nombre de demandes par jour',
                backgroundColor: '#f6f8fd',
                borderColor: '#376ade',
                data: D
            }]
        },
        responsive: true,
        options: {}
    });




    


}


function getDayName(date, locale) {
    return date.toLocaleDateString(locale, {
        weekday: 'long'
    });
}




function addData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
    });
    chart.update();
}

function removeData(chart) {
    chart.data.labels.pop();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
    chart.update();
}