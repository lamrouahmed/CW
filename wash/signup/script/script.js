const $ = e => document.querySelector(e)
const $$ = e => document.querySelectorAll(e)
const labels = $$('.label');
const spans = $$('.border');
const hamburger = $('.hamburger');
const nav = $('.nav');
const next = $('.next a');
const parts = $$('.form > div');
const [part1, part2] = parts;


next.addEventListener('click', nextStep);

labels.forEach((label, index) => label.addEventListener('click', () => addBorder(index)))

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

function nextStep() {
    console.log(part1, part2);

    part1.style.display = "none";
    part2.style.display = "block";
}