const $ = e => document.querySelector(e)
const $$ = e => document.querySelectorAll(e)
const labels = $$('.sLabel');
const spans = $$('.border');
const hamburger = $('.hamburger');
const nav = $('.nav');

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


// function googleTranslateElementInit() {
//     new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
//   }







// hamburger.addEventListener('click',toggleBurger);


// function toggleBurger() {
//     hamburger.classList.toggle('cross');
//     nav.classList.toggle('navBlock')
// }
