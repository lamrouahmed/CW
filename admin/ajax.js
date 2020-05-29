let loaded = false;


const $ = e => document.querySelector(e);
const $$ = e => document.querySelectorAll(e);
let del = $$('.delete');
const upd = $$('.update');
// const url = '/PFE/admin/utilisateur/index.php';
// const url2 = '/PFE/admin/utilisateur/usersList.php'


const urls = [
  '/PFE/admin/utilisateur/index.php',
  '/PFE/admin/utilisateur/usersList.php'
]
const inputSearch = $('.searchInput');
let users = $$('.mid')
const options = $$('.option')
const span = $('.border');
const label = $('.label');
const option = $('.sort');
const optionToggle = $('.sortOptions');
const refresh = $('.refresh');



window.addEventListener('click', e => removeBorder(e,'INPUT'))
option.addEventListener('click', () => {
  optionToggle.classList.toggle('sortOptionsVisible')
})

function removeBorder(e, node) {
    if (e.target.nodeName != node) {
        span.classList.remove('clicked')
    } 
}

// users.forEach((user, index) => {
//   user.style.animation = `startup ${index+2}00ms ease-in-out forwards`

// })

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



  






// upd.forEach(btn => btn.addEventListener('click', e => {
//   post(e.currentTarget.dataset.action, e.currentTarget.dataset.id, url);
// }));


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






refresh.addEventListener('click', () => {
  get(urls[1],$('.content'))
})





//06-76-76-56-98


function get(url, render) {
  fetch(url, {
    method: 'post'  
  })
  .then(function (response) {
    return response.text();
  })
  .then(function (body) {
    render.innerHTML = body;
  }).then(() => {
      users = $$('.mid');
      del = $$('.delete');
      del.forEach(btn => btn.addEventListener('click', e => remove(e)));

    });
}

del.forEach(btn => btn.addEventListener('click', e => remove(e)));


function remove(e) {
  const user = $(`[data-key='${e.currentTarget.dataset.id}']`);
  user.style.animation = "delete 500ms ease-in-out forwards"
  setTimeout(() => user.remove(), 500)
  
  post(e.currentTarget.dataset.action, e.currentTarget.dataset.id, urls[0]);
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

