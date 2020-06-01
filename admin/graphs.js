const $ = e => document.querySelector(e);
const $$ = e => document.querySelectorAll(e);
const days = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
const uStatus = ['offline', 'online']
const dStatus = ['acceptee', 'refusee']
const globalData = {
    users: {
        data: {
            labels: days,
            datasets: [{
                label: 'Nombre des comptes cree',
                backgroundColor: 'rgb(250, 224, 229)', 
                borderColor: 'rgb(255, 99, 132)',
                data: [0,0,0,0,0,0,0]
            }],
        },

        options: {
            title: {
                display: true,
                text: 'Frequence de creations des comptes par jour',
                fontSize: 17,
                fontStyle: 400
            }
        }

    },
    demandes: {
        data: {
            labels: days,
            datasets: [{
                label: 'Nombre de demande',
                backgroundColor: '#f6f8fd',
                borderColor: '#376ade',
                data: [0,0,0,0,0,0,0]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Frequence des demandes par jour',
                fontSize: 17,
                fontStyle: 400
            }
        }
    },
    status: {
        data: {
            labels: uStatus,
            datasets: [{
                data: [],
                backgroundColor: [
                    "#ffcd56",
                    "#36a2eb"
                ]
            }]  
        },
        options: {
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                  fontColor: "#000",
                }
            }
        }
    },
    statusDemande: {
        data: {
            labels: dStatus,
            datasets: [{
                data: [],
                backgroundColor: [
                    "#4bc0c0",
                    "#ff9f40"
                ]
            }] 
        },
        options: {
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                  fontColor: "#000",
                }
            }
        }   
    }
}
Chart.defaults.global.defaultFontFamily = "'Montserrat', 'sans-serif'";


const d_chart = createChart($('#d_chart'), 'line', globalData.demandes.data, globalData.demandes.options);
const u_chart = createChart($('#u_chart'), 'line', globalData.users.data, globalData.users.options);
const status_chart = createChart($('#pie'), 'doughnut', globalData.status.data, globalData.status.options);
const d_statusChart = createChart($('#pie2'), 'doughnut', globalData.statusDemande.data, globalData.statusDemande.options);

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
        },
        demande_status:{
            N: 0,
            Y: 0
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


    demandes.forEach(demande => {
        demande.status_demande === "N" && records.demande_status.N++;
        demande.status_demande === "Y" && records.demande_status.Y++;
    })


    update(d_statusChart, [records.demande_status.Y, records.demande_status.N]);


    $('[data-id = users]').textContent = users.length;
    $('[data-id = demandes]').textContent = demandes.length;






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






function createChart(node, type, newData, Options) {
    const status_chart = new Chart(node, {
        type: type,
        data : newData,
        options: Options
    })
    return status_chart;
}







function update(chart, newData) {
    chart.data.datasets[0].data = newData;
    chart.update();
}