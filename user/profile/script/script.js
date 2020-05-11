const $ = e => document.querySelector(e)
const $$ = e => document.querySelectorAll(e)


const triangle = $('.triangle');
const inputs = $$('.input');

triangle.addEventListener('click', () => {
    $('.triangle svg').classList.toggle('svgClicked')
    $('.logout').classList.toggle('displayLog')
})

inputs.forEach((input, index) => input.addEventListener('focus', () => {
    $$('.text')[index].classList.add('focus');
    $$('.border')[index].classList.add('clicked')
}))

inputs.forEach((input, index) => input.addEventListener('blur', e => {
    e.currentTarget.value.trim() === '' &&  $$('.text')[index].classList.remove('focus');
    $$('.border')[index].classList.remove('clicked')
}))

inputs.forEach((input, index) => {
    input.value.trim() === '' ?  $$('.text')[index].classList.remove('focus') : $$('.text')[index].classList.add('focus');
})