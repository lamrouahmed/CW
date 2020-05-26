const $ = e => document.querySelector(e)
const $$ = e => document.querySelectorAll(e)

const input = $('.input');


input.addEventListener('focus', e => {
    $('.border').classList.add('clicked')
})


input.addEventListener('blur', e => {
    $('.border').classList.remove('clicked')
})


console.log('ze');