const $ = e => document.querySelector(e);
const $$ = e => document.querySelectorAll(e);
const urls = [
    '/PFE/admin/demandes/index.php',
    '/PFE/admin/demandes/demandesList.php'
]

const demandes = $$('.demande');
const btns = $$('.btns > div');



function post(action, id, url, render = false) {
    let formData = new FormData();
    formData.append("action", action);
    formData.append("id", id)
    fetch(url, {
        method: 'post',
        body: formData
      })
      .then(function (response) {
        return response.text();
      })
      .then(function (body) {
        render ? render.innerHTML = body : console.log(body);
      });
}

function modify(e, url) {
    const data = e.currentTarget.dataset;
    data.action === 'delete' && post('delete', data.id, url);
    data.action === 'accept' && post('accept', data.id, url);
    data.action === 'refuse' && post('refuse', data.id, url);
}

btns.forEach(btn => btn.addEventListener('click', e => modify(e, urls[0])));



