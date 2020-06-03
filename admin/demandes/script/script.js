const $ = e => document.querySelector(e);
const $$ = e => document.querySelectorAll(e);
const urls = [
    '/PFE/admin/demandes/index.php',
    '/PFE/admin/demandes/demandesList.php'
]

const demandes = $$('.demande');
const btns = $$('.btns > div');
const inputSearch = $('.search');

const Remove = $$('.delete');
const Accept = $$('.accept');
const Refuse = $$('.refuse');


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

// function modify(e, url) {
//     const data = e.currentTarget.dataset;
//     const parentNode = $(`[data-key = '${data.id}']`);
//     const img = parentNode.querySelector('.status img');
//     data.action === 'delete' && post('delete', data.id, url);
//     data.action === 'accept' && post('accept', data.id, url)  
//     data.action === 'refuse' && post('refuse', data.id, url)

//     data.action === 'delete' && remove(parentNode, 300) 
//     data.action === 'accept' && img.setAttribute('src', './img/Y.svg')
//     data.action === 'refuse' && img.setAttribute('src', './img/N.svg')
                  
// }

// function remove(node, time) {
//   node.classList.add('deleteAnimation')
//   setTimeout(() => node.remove(), time)
// }

// btns.forEach(btn => btn.addEventListener('click', e => modify(e, urls[0])));
Accept.forEach(btn => btn.addEventListener('click', e => accept(e.currentTarget.dataset.id, $(`[data-key = '${e.currentTarget.dataset.id}']`), urls[0])));
Refuse.forEach(btn => btn.addEventListener('click', e => refuse(e.currentTarget.dataset.id, $(`[data-key = '${e.currentTarget.dataset.id}']`), urls[0])));
Remove.forEach(btn => btn.addEventListener('click', e => remove(e.currentTarget.dataset.id, $(`[data-key = '${e.currentTarget.dataset.id}']`), urls[0], 300)));



function accept(id, demande, url) {
  const img = demande.querySelector('.status img');
  post('accept', id, url)
  img.setAttribute('src', './img/Y.svg')
}
function refuse(id, demande, url) {
  const img = demande.querySelector('.status img');
  post('refuse', id, url)
  img.setAttribute('src', './img/N.svg')
}
function remove(id, demande, url, time) {
  post('delete', id, url)
  demande.classList.add('deleteAnimation')
  setTimeout(() => demande.remove(), time)
}












$$('.label').forEach((label, i) => label.addEventListener('click', e => {
  !($$('.checkB')[i].checked) && $$('.checkboxSvg')[i].classList.add('checked');
  ($$('.checkB')[i].checked) && $$('.checkboxSvg')[i].classList.remove('checked');
}))


$('.label_h').addEventListener('click', () => checkAll($$('.checkB')));



function checkAll(checkBoxes) {
  if(!$('.checkB_h').checked) { 
    $('.checkboxSvg_h').classList.add('checked')
    checkBoxes.forEach((checkBox, i) => {
      checkBox.checked = true;
      $$('.checkboxSvg')[i].classList.add('checked');
    })
  
  } else if($('.checkB_h').checked){
    $('.checkboxSvg_h').classList.remove('checked')
    checkBoxes.forEach((checkBox, i) => {
      checkBox.checked = false;
      $$('.checkboxSvg')[i].classList.remove('checked');
    })
  }

}








demandes.forEach((demande, index) => {
  demande.style.animation = `startup ${index+3}00ms ease-in-out forwards`

})







inputSearch.addEventListener('keyup', e => search(e, demandes))

function search(e, nodes) {
  nodes.forEach((node) => {
    console.log(node.dataset.search.trim())
    if (!node.dataset.search.trim().includes(e.target.value)) {
      node.classList.add('filter');
    } else {
      node.classList.remove('filter');
    }
  })
}