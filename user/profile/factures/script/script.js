const $ = e => document.querySelector(e)
const $$ = e => document.querySelectorAll(e)
const popUp = $('.popUp');
const url = '/PFE/user/profile/factures/facturePdf.php';
const downloadPdf = $$('.download');
popUp.addEventListener('click', () => {
    $('.triangle svg').classList.toggle('svgClicked')
    $('.logout').classList.toggle('displayLog')
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