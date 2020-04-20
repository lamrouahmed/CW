const $ = e => document.querySelector(e)
const $$ = e => document.querySelectorAll(e)
const labels = $$('.sLabel');
const spans = $$('.border');
const hamburger = $('.hamburger');
const nav = $('.nav');
const inputs = $$('.input');
const errors = $$('.error');
const generalError = $('.errorB');

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


// function googleTranslateElementInit() {
//     new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
//   }

//errors.forEach(error => console.log(error.textContent.length));

function errorDisplay(errors, className, inputs, optionalError) {
    errors.forEach((error, index) => {
        if(error.textContent.length !== 0) {
            index < inputs.length && inputs[index].classList.add(className)
        } else {
            index < inputs.length && inputs[index].classList.remove(className)
        }
    })
    
    optionalError.textContent.length !== 0 && inputs.forEach(input => input.classList.add(className));
}

errorDisplay(errors, "errorTrue", inputs, generalError);
// hamburger.addEventListener('click',toggleBurger);


// function toggleBurger() {
//     hamburger.classList.toggle('cross');
//     nav.classList.toggle('navBlock')
// }
