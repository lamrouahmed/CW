const $ = e => document.querySelector(e)
const $$ = e => document.querySelectorAll(e)


const triangle = $('.triangle');

triangle.addEventListener('click', () => {
    $('.triangle svg').classList.toggle('svgClicked')
    $('.logout').classList.toggle('displayLog')
})