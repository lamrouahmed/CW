const $ = e => document.querySelector(e)
const $$ = e => document.querySelectorAll(e)
const labels = $$('.label');
const spans = $$('.border');
const hamburger = $('.hamburger');
const nav = $('.nav');
const inputs = $$('.input');

labels.forEach((label, index) => label.addEventListener('click', () => addBorder(index)))
inputs.forEach((input, index) => input.addEventListener('focus', () => addBorder(index)))

window.addEventListener('click', e => removeBorder(e,'INPUT'))


function removeBorder(e, node) {
    if (e.target.nodeName != node) {
        spans.forEach(span => span.classList.remove('clicked'))
    } 
}
function addBorder(index) {
    spans.forEach(span => span.classList.remove('clicked'))
    spans[index].classList.add('clicked');

}