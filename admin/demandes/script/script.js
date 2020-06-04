const $ = e => document.querySelector(e);
const $$ = e => document.querySelectorAll(e);
const urls = [
    '/PFE/admin/demandes/index.php',
    '/PFE/admin/demandes/demandesList.php'
]


const labels = $$('.label');

const cross = $('.cross');
const cancel = $('.annuler');
const ok = $('.ok');

let demandes = $$('.demande');
const btns = $$('.btns > div');
const inputSearch = $('.search');


const RemoveAll = $('.delete_h');
const AcceptAll = $('.accept_h');
const RefuseAll = $('.refuse_h');



const Remove = $$('.delete');
const Accept = $$('.accept');
const Refuse = $$('.refuse');

const actionAll = $$('.stats > div');


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




AcceptAll.addEventListener('click', () => acceptAll($$('.checkB'), urls[0]));
RefuseAll.addEventListener('click', () => refuseAll($$('.checkB'), urls[0]));
RemoveAll.addEventListener('click', showPopUp);



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
  demandes = $$('.demande');

}

function acceptAll(checkBoxes, url) {
  Array.from(checkBoxes).filter(checkbox => checkbox.checked).forEach(checked => accept(checked.dataset.check, $(`[data-key = '${checked.dataset.check}']`) ,url));
}

function refuseAll(checkBoxes, url) {
  Array.from(checkBoxes).filter(checkbox => checkbox.checked).forEach(checked => refuse(checked.dataset.check, $(`[data-key = '${checked.dataset.check}']`) ,url));
}

function removeAll(checkBoxes, url, time) {
   Array.from(checkBoxes).filter(checkbox => checkbox.checked).forEach((checked) => {
      remove(checked.dataset.check, $(`[data-key = '${checked.dataset.check}']`) ,url, time)
  });

  demandes = $$('.demande');
}



cross.addEventListener('click', hidePopUp)
cancel.addEventListener('click', hidePopUp)

ok.addEventListener('click', () => {
  hidePopUp()
  removeAll($$('.checkB'), urls[0], 300)
  demandes = $$('.demande');
  $('.btns_h').style.display = 'none';

  $('.checkboxSvg_h').classList.remove('checked')
  $('.checkB_h').checked=false;

})

function hidePopUp() {
  $('.bg').classList.remove('showPopUp')
}
function showPopUp() {
  $('.bg').classList.add('showPopUp')
}

$('.bg').addEventListener('click', e => {
  e.currentTarget === e.target && hidePopUp();
})






labels.forEach((label, i) => label.addEventListener('click', e => {
  if(!document.getElementById(`${label.getAttribute('for')}`).checked)  {
    label.querySelector('.checkboxSvg').classList.add('checked')
    $('.btns_h').style.display = 'flex';
  };
  if(document.getElementById(`${label.getAttribute('for')}`).checked) {
    label.querySelector('.checkboxSvg').classList.remove('checked')
    if(Array.from($$('.checkB')).filter(check => check.checked).length === 1) $('.btns_h').style.display = 'none';
  }
}))


$('.label_h').addEventListener('click', () => checkAll($$('.checkB')));



function checkAll(checkBoxes) {
  if(!$('.checkB_h').checked) { 
    $('.checkboxSvg_h').classList.add('checked')
    checkBoxes.forEach((checkBox) => {
      checkBox.checked = true;
      $(`[data-for='${checkBox.dataset.check}'] svg`).classList.add('checked');
    })

    $('.btns_h').style.display = 'flex';


  } else if($('.checkB_h').checked){
    $('.checkboxSvg_h').classList.remove('checked')
    checkBoxes.forEach((checkBox) => {
      checkBox.checked = false;
      $(`[data-for='${checkBox.dataset.check}'] svg`).classList.remove('checked');
    })
    $('.btns_h').style.display = 'none';

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