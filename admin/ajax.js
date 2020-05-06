const $ = e => document.querySelector(e);
const $$ = e => document.querySelectorAll(e);
const del = $$('.delete');
const upd = $$('.update');
const url = '/PFE/admin/utilisateur/index.php';
const inputSearch = $('.searchInput');
const users = $$('.mid')
const options = $$('.option')
const span = $('.border');
const label = $('.label');
const option = $('.sort');
const optionToggle = $('.sortOptions');
const refresh = $('.refresh');


refresh.addEventListener('click', e => console.log(e.target))

window.addEventListener('click', e => removeBorder(e,'INPUT'))
option.addEventListener('click', () => {
  optionToggle.classList.toggle('sortOptionsVisible')
})

function removeBorder(e, node) {
    if (e.target.nodeName != node) {
        span.classList.remove('clicked')
    } 
}


inputSearch.addEventListener('focus', addBorder);
label.addEventListener('click', addBorder)



function addBorder() {
  span.classList.add('clicked');
}




const sortOptions = {
  id: 0,
  username: 1,
  lastName: 2,
  firstName: 3,
  phone: 4,
  mail: 5,
  date: 6,
  hours: 7
}

del.forEach(btn => btn.addEventListener('click', e => {
  const user = $(`[data-key='${e.currentTarget.dataset.id}']`);
  user.classList.add('deleted');
  setTimeout(() => user.remove(), 500)
  post(e.currentTarget.dataset.action, e.currentTarget.dataset.id, url);
}));
// upd.forEach(btn => btn.addEventListener('click', e => {
//   post(e.currentTarget.dataset.action, e.currentTarget.dataset.id, url);
// }));


function post(action, id, url) {
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
      console.log(body);
    });
}


inputSearch.addEventListener('keyup', e => search(e, users))

function search(e, nodes) {
  nodes.forEach((node, index) => {
    if (!node.dataset.search.trim().includes(e.target.value.toLowerCase())) {
      node.classList.add('filter');
      if (index - 1 >= 0) {
        nodes[index - 1].style.marginBottom = "0"
      };
    } else {
      node.classList.remove('filter');
    }
  })
}


















function sort(nodes, sortBy, orderBy) {
  const array = Array.isArray(nodes) ? nodes : Array.from(nodes)
  array.sort((nodeA, nodeB) => {
    const a = nodeA.dataset.search.split(' ')[sortBy]
    const b = nodeB.dataset.search.split(' ')[sortBy]
    return orderBy > 0 ? a > b : a < b;
  }).forEach((e, i) => {
    e.style.order = `${i}`
  })
}


options.forEach(option => option.addEventListener('click', e => sort(users, e.currentTarget.dataset.sort, 1)));

