const $ = e => document.querySelector(e)
const $$ = e => document.querySelectorAll(e)

const inputs = $$('.input');
const submit = $('.log');


inputs.forEach((input, index) => input.addEventListener('focus', e => {
    $$('.text')[index].classList.add('focus');
    $$('.border')[index].classList.add('clicked')
    e.currentTarget.type !== "password" && e.currentTarget.setSelectionRange(0,e.currentTarget.value.length); 
    if(e.currentTarget.classList.contains('textarea') && e.currentTarget.value.trim() === "") {
        e.currentTarget.setSelectionRange(0,0); 
    }


}))  


inputs.forEach((input, index) => input.addEventListener('blur', e => {
    e.currentTarget.value.trim() === '' &&  $$('.text')[index].classList.remove('focus');
    $$('.border')[index].classList.remove('clicked')
}))

inputs.forEach((input, index) => {
    input.value.trim() === '' ?  $$('.text')[index].classList.remove('focus') : $$('.text')[index].classList.add('focus');
})

submit.addEventListener('click', e => {
    e.preventDefault();
    post('/PFE/admin/login.inc.php', $('.form'), '/PFE/admin');
})









  function post(url, form, redirect) {
    let formData = new FormData(form);
    fetch(url, {
        method: 'post',
        body: formData
      })
      .then(function (response) {
        return response.json();
      })
      .then(function (body) {
        body.ok && (window.location = redirect);
        
        $$('.error').forEach((error, index) => {
             

          if(body[error.dataset.error]) {
              $$('.input')[index].classList.add('errorTrue')
              error.textContent = `${body[error.dataset.error]}`
          } else {
              error.textContent = ""
              $$('.input')[index].classList.remove('errorTrue')
              body.ok && ($('.alerts').textContent = body.ok);
          }

          if(body["u_error"]) {
            $('body').classList.add('bodyE');
            $('.gene').textContent = body["u_error"];
            setTimeout(() => $('body').classList.remove('bodyE'), 1000)
            $('.gene').classList.add('geneBlock');
          }
      })
      });
  }



