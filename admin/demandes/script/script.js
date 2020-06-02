const $ = e => document.querySelector(e);
const $$ = e => document.querySelectorAll(e);
const urls = [
    '/PFE/admin/demandes/index.php',
    '/PFE/admin/demandes/demandesList.php'
]

const demandes = $$('.demande');
const btns = $$('.btns > div');



function post(action, id, url) {
    let formData = new FormData();
    formData.append("action", action);
    formData.append("id", id)
    fetch(url, {
        method: 'post',
        body: formData
      })
      .then( response =>{
         response.text();
      })
  
}

function modify(e, url) {
    const data = e.currentTarget.dataset;
    const parentNode = $(`[data-key = '${data.id}']`);
    const img = parentNode.querySelector('.status img');
    data.action === 'delete' && post('delete', data.id, url);
    data.action === 'accept' && post('accept', data.id, url)  
    data.action === 'refuse' && post('refuse', data.id, url)

    data.action === 'delete' && remove(parentNode, 300) 
    data.action === 'accept' && img.setAttribute('src', './img/Y.svg')
    data.action === 'refuse' && img.setAttribute('src', './img/N.svg')
                  
}

function remove(node, time) {
  node.classList.add('deleteAnimation')
  setTimeout(() => node.remove(), time)
}

btns.forEach(btn => btn.addEventListener('click', e => modify(e, urls[0])));









