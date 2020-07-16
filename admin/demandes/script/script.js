const $ = e => document.querySelector(e);
const $$ = e => document.querySelectorAll(e);


const colorArray = [
  '#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6',
  '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
  '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A',
  '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
  '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC',
  '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
  '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680',
  '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
  '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3',
  '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'
];


getRandomInt = max => Math.floor(Math.random() * Math.floor(max))

// .box {
//   fill: rgb(0, 124, 226);
//   stroke: rgb(0, 124, 226);
//   stroke-width: 10px;
// }



const urls = [
  '/PFE/admin/demandes/index.php',
  '/PFE/admin/demandes/demandesList.php'
]


let labels = $$('.label');
let stats = $('.stats');

let cross = $('.cross');
let cancel = $('.annuler');
let ok = $('.ok');

let demandes = $$('.demande');
let btns = $$('.btns > div');
let inputSearch = $('.search');


let RemoveAll = $('.delete_h');
let AcceptAll = $('.accept_h');
let RefuseAll = $('.refuse_h');



let Remove = $$('.delete');
let Accept = $$('.accept');
let Refuse = $$('.refuse');

let actionAll = $$('.stats > div');


function post(action, id, url) {
  let formData = new FormData();
  formData.append("action", action);
  formData.append("id", id)
  fetch(url, {
      method: 'post',
      body: formData
    })
    .then(response => {
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
  demande.classList.remove('N');
  demande.classList.add('Y');
  stats.querySelector('.demandes_a .text').textContent = $$('.Y').length;
  stats.querySelector('.demandes_r .text').textContent = $$('.N').length;

}

function refuse(id, demande, url) {
  const img = demande.querySelector('.status img');
  post('refuse', id, url)
  img.setAttribute('src', './img/N.svg')
  demande.classList.remove('Y');
  demande.classList.add('N');
  stats.querySelector('.demandes_r .text').textContent = $$('.N').length;
  stats.querySelector('.demandes_a .text').textContent = $$('.Y').length;

}

function remove(id, demande, url, time) {
  post('delete', id, url)
  demande.classList.add('deleteAnimation')
  setTimeout(() => {
    demande.remove()
    demandes = $$('.demande')
    stats.querySelector('.totalDemandes .text').textContent = demandes.length;
    stats.querySelector('.demandes_r .text').textContent = $$('.N').length;
    stats.querySelector('.demandes_a .text').textContent = $$('.Y').length;
  }, time)



}

function acceptAll(checkBoxes, url) {
  Array.from(checkBoxes).filter(checkbox => checkbox.checked).forEach(checked => accept(checked.dataset.check, $(`[data-key = '${checked.dataset.check}']`), url));
}

function refuseAll(checkBoxes, url) {
  Array.from(checkBoxes).filter(checkbox => checkbox.checked).forEach(checked => refuse(checked.dataset.check, $(`[data-key = '${checked.dataset.check}']`), url));
}

function removeAll(checkBoxes, url, time) {
  Array.from(checkBoxes).filter(checkbox => checkbox.checked).forEach((checked) => {
    remove(checked.dataset.check, $(`[data-key = '${checked.dataset.check}']`), url, time)
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
  $('.checkB_h').checked = false;

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
  if (!document.getElementById(`${label.getAttribute('for')}`).checked) {
    label.querySelector('.checkboxSvg').classList.add('checked')
    label.querySelector('.checkboxSvg path').style.fill = '#007ce2'
    label.querySelector('.checkboxSvg path').style.stroke = '#007ce2'
    $('.btns_h').style.display = 'flex';
  };
  if (document.getElementById(`${label.getAttribute('for')}`).checked) {
    label.querySelector('.checkboxSvg').classList.remove('checked')
    label.querySelector('.checkboxSvg path').style.fill = '#FFF'
    label.querySelector('.checkboxSvg path').style.stroke = '#c0c2c4'

    if (Array.from($$('.checkB')).filter(check => check.checked).length === 1) $('.btns_h').style.display = 'none';
  }
}))


$('.label_h').addEventListener('click', () => checkAll($$('.checkB')));



function checkAll(checkBoxes) {
  let color;
  if (!$('.checkB_h').checked) {
    $('.checkboxSvg_h').classList.add('checked')
    checkBoxes.forEach((checkBox) => {
      color = colorArray[getRandomInt(colorArray.length)];
      checkBox.checked = true;
      $(`[data-for='${checkBox.dataset.check}'] svg`).classList.add('checked');
      $(`[data-for='${checkBox.dataset.check}'] svg path`).style.fill = color
      $(`[data-for='${checkBox.dataset.check}'] svg path`).style.stroke = color
    })

    $('.btns_h').style.display = 'flex';


  } else if ($('.checkB_h').checked) {
    $('.checkboxSvg_h').classList.remove('checked')
    checkBoxes.forEach((checkBox) => {
      checkBox.checked = false;
      $(`[data-for='${checkBox.dataset.check}'] svg`).classList.remove('checked');

      $(`[data-for='${checkBox.dataset.check}'] svg path`).style.fill = '#FFF'
      $(`[data-for='${checkBox.dataset.check}'] svg path`).style.stroke = '#c0c2c4'
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





function get(url, dataType) {
  fetch(url, {
      method: 'get'
    })
    .then(response => {
      if (dataType === 'json') {
        return response.json()
      }
      if (dataType === 'text') {
        return response.text()
      }
    })
    .then(data => {

      if (dataType === 'json') {

        //  if(data.length > parseInt(notifications.textContent)) {
        //     audio.play();
        // }
        if(data.pending !== 0) {
          $('.notif > p').textContent = data.pending;
          $('.notif').style.display = 'flex';
        } else {
          $('.notif').style.display = 'none';
        }

        // notifications.textContent = data.length;
        if (data.totale > $$('.demande').length) {
          get('/PFE/admin/demandes/demandesList.php', 'text');






        }
      }

      if (dataType === 'text') {
        $('.demandes').innerHTML = data;

        labels = $$('.label');
        stats = $('.stats');

        cross = $('.cross');
        cancel = $('.annuler');
        ok = $('.ok');

        demandes = $$('.demande');
        btns = $$('.btns > div');
        inputSearch = $('.search');


        RemoveAll = $('.delete_h');
        AcceptAll = $('.accept_h');
        RefuseAll = $('.refuse_h');



        Remove = $$('.delete');
        Accept = $$('.accept');
        Refuse = $$('.refuse');

        actionAll = $$('.stats > div');
        
        labels.forEach((label, i) => label.addEventListener('click', e => {
          if (!document.getElementById(`${label.getAttribute('for')}`).checked) {
            label.querySelector('.checkboxSvg').classList.add('checked')
            label.querySelector('.checkboxSvg path').style.fill = '#007ce2'
            label.querySelector('.checkboxSvg path').style.stroke = '#007ce2'
            $('.btns_h').style.display = 'flex';
          };
          if (document.getElementById(`${label.getAttribute('for')}`).checked) {
            label.querySelector('.checkboxSvg').classList.remove('checked')
            label.querySelector('.checkboxSvg path').style.fill = '#FFF'
            label.querySelector('.checkboxSvg path').style.stroke = '#c0c2c4'

            if (Array.from($$('.checkB')).filter(check => check.checked).length === 1) $('.btns_h').style.display = 'none';
          }
        }))


        $('.label_h').addEventListener('click', () => checkAll($$('.checkB')));



        $('.bg').addEventListener('click', e => {
          e.currentTarget === e.target && hidePopUp();
        })





        cross.addEventListener('click', hidePopUp)
        cancel.addEventListener('click', hidePopUp)

        ok.addEventListener('click', () => {
          hidePopUp()
          removeAll($$('.checkB'), urls[0], 300)
          demandes = $$('.demande');
          $('.btns_h').style.display = 'none';

          $('.checkboxSvg_h').classList.remove('checked')
          $('.checkB_h').checked = false;

        })





        Accept.forEach(btn => btn.addEventListener('click', e => accept(e.currentTarget.dataset.id, $(`[data-key = '${e.currentTarget.dataset.id}']`), urls[0])));
        Refuse.forEach(btn => btn.addEventListener('click', e => refuse(e.currentTarget.dataset.id, $(`[data-key = '${e.currentTarget.dataset.id}']`), urls[0])));
        Remove.forEach(btn => btn.addEventListener('click', e => remove(e.currentTarget.dataset.id, $(`[data-key = '${e.currentTarget.dataset.id}']`), urls[0], 300)));




        AcceptAll.addEventListener('click', () => acceptAll($$('.checkB'), urls[0]));
        RefuseAll.addEventListener('click', () => refuseAll($$('.checkB'), urls[0]));
        RemoveAll.addEventListener('click', showPopUp);


       
      }

    })
}
get('/PFE/admin/demandes/nbDemandes.php', 'json');


setInterval(() => get('/PFE/admin/demandes/nbDemandes.php', 'json'), 1000)