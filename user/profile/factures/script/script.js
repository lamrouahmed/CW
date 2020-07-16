const $ = e => document.querySelector(e)
const $$ = e => document.querySelectorAll(e)
const popUp = $('.popUp');
const url = '/PFE/user/profile/factures/facturePdf.php';
const downloadPdf = $$('.download');
const bell = $('.notifications > svg')
const notifications = $('.notif > p');
const audio = document.querySelector('.audio');

popUp.addEventListener('click', () => {
    $('.triangle svg').classList.toggle('svgClicked')
    $('.logout').classList.toggle('displayLog')
    factures.forEach(facture => facture.classList.toggle('factureBlur'))

})

getRandomInt = max => Math.floor(Math.random() * Math.floor(max))
const classes = ['A', 'B', 'C', 'D', 'E']
let color = '';

const factures = $$('.facture');

factures.forEach(facture => {
    // color = classes[getRandomInt(classes.length)]
    facture.classList.add(`${classes[getRandomInt(classes.length)]}`)
})
// downloadPdf.forEach(btn => btn.addEventListener('click', e => download(e.currentTarget.dataset.id, url)))


// function download(id, url) {
//     const formData = new FormData();
//     formData.append("id", id)
//     fetch(url, {
//         method: 'post',
//         body: formData
//     })
//     .then(response => response.text())
//     .then(body => console.log(body));
// }




function get(url, dataType) {
    fetch(url, {
      method: 'get'  
    })
    .then(response => {
        if(dataType === 'json')  {return response.json()}
        if(dataType === 'text')  {return response.text()}
    })
    .then(data => {

        if(dataType === 'json') {
            
         if(data.length > parseInt(notifications.textContent)) {
            audio.play();
        }
           
       
        notifications.textContent = data.length;
        }
        
        if(dataType === 'text') {
            let dataLength = data.replace(/\s/g,'').length;
            let htmlLength = $('.alertContent').innerHTML.replace(/\s/g,'').length;
           
            if(dataLength !== htmlLength) {
                $('.alertContent').innerHTML = data;
            }

        }

    })
}






bell.addEventListener('click', () => {
    $('.alert').classList.toggle('bellDisplay')
    factures.forEach(facture => facture.classList.toggle('factureBlur'))
})



get('/PFE/user/profile/notifications.php', 'json')

get('/PFE/user/profile/notificationsList.php', 'text')

setInterval(() => get('/PFE/user/profile/notifications.php', 'json'), 1000)
setInterval(() => get('/PFE/user/profile/notificationsList.php', 'text'), 1000)