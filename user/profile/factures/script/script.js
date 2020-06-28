const $ = e => document.querySelector(e)
const $$ = e => document.querySelectorAll(e)
const popUp = $('.popUp');

popUp.addEventListener('click', () => {
    $('.triangle svg').classList.toggle('svgClicked')
    $('.logout').classList.toggle('displayLog')
})