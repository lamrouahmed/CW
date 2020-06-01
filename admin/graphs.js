const $ = e => document.querySelector(e);
const $$ = e => document.querySelectorAll(e);
const days = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
const uStatus = ['offline', 'online']
const globalData = {
    users: {
        labels: days,
        datasets: [{
            label: 'Nombre des comptes cree par jour',
            backgroundColor: 'rgba(234, 106, 134, 0.16)', 
            borderColor: 'rgb(255, 99, 132)',
            data: [0,0,0,0,0,0,0]
        }],

    },
    demandes: {
        labels: days,
        datasets: [{
            label: 'Nombre de demandes par jour',
            backgroundColor: '#f6f8fd',
            borderColor: '#376ade',
            data: [0,0,0,0,0,0,0]
        }]
    },
    status: {
        labels: uStatus,
        datasets: [{
            data: [],
            backgroundColor: [
                "#ff6384",
                "#4bc0c0"
            ]
        }]  
    }
}


const d_chart = createChart($('#d_chart'), 'line', globalData.demandes);
const u_chart = createChart($('#u_chart'), 'line', globalData.users);
const status_chart = createChart($('#pie'), 'doughnut', globalData.status);

get('/PFE/admin/data.php');

setInterval(() => get('/PFE/admin/data.php'), 1000)

function get(url) {
    fetch(url, {
            method: 'get'
        })
        .then(response => response.json())
        .then(body => updateChart(body));
}

function updateChart(data) {
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
    days.forEach(dateP => {
        u_creationDates.forEach(dateC => {
            dateP === dateC && records.users[dateP]++
        })
    });
    let U = [];
    days.forEach(day => U.push(records.users[day]));
    update(u_chart, U);
    users.forEach(user => {
        user.status === "online" && records.status.online++;
        user.status === "offline" && records.status.offline++;
    })


    update(status_chart, [records.status.offline, records.status.online]);











    let d_creationDates = demandes.map(demande => getDayName(new Date(demande.date_demande), 'fr-FR'));

    days.forEach(dateP => {
        d_creationDates.forEach(dateC => {
            dateP === dateC && records.demandes[dateP]++
        })
    });
    let D = [];
    days.forEach(day => D.push(records.demandes[day]));
    update(d_chart, D);






}


function getDayName(date, locale) {
    return date.toLocaleDateString(locale, {
        weekday: 'long'
    });
}








function createChart(node, type, newData) {
    const status_chart = new Chart(node, {
        type: type,
        data : newData
    })
    return status_chart;
}







function update(chart, newData) {
    chart.data.datasets[0].data = newData;
    chart.update();
}