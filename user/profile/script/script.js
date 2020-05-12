const $ = e => document.querySelector(e)
const $$ = e => document.querySelectorAll(e)


const triangle = $('.triangle');
const inputs = $$('.input');

triangle.addEventListener('click', () => {
    $('.triangle svg').classList.toggle('svgClicked')
    $('.logout').classList.toggle('displayLog')
})

inputs.forEach((input, index) => input.addEventListener('focus', e => {
    $$('.text')[index].classList.add('focus');
    $$('.border')[index].classList.add('clicked')
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