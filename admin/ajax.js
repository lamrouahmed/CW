const $ = e => document.querySelector(e);
const $$ = e => document.querySelectorAll(e);
const del = $$('.delete');
const upd = $$('.update');
const url = '/PFE/admin/utilisateur/index.php';
const inputSearch = $('.searchInput');
const users = $$('.mid')

del.forEach(btn => btn.addEventListener('click', e => {
  const user = $(`[data-key='${e.currentTarget.dataset.id}']`);
  user.classList.add('deleted');
  setTimeout(() => user.remove(), 500)
  post(e.currentTarget.dataset.action, e.currentTarget.dataset.id, url);
}));
upd.forEach(btn => btn.addEventListener('click', e => {
  post(e.currentTarget.dataset.action, e.currentTarget.dataset.id, url);
}));


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
    if(!node.dataset.search.includes(e.target.value)) {
      nodes[index-1].style.marginBottom="0";

      node.classList.add('filter');
    } else {
      node.classList.remove('filter');
    }
  })
}


