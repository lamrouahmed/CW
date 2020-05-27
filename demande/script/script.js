const $ = e => document.querySelector(e)
const $$ = e => document.querySelectorAll(e)

const input = $('.input');
const lavage = $$('input[name=lavage]');
const vehicule = $$('input[name=vehicule]');
const quantityModif = $('.btn');
console.log(quantityModif, vehicule, lavage);


lavage.forEach((btn, i) => {
    btn.checked && $$('.lavageLabel')[i].classList.add('checked');

    btn.addEventListener('click', () => {
        $$('.lavageLabel').forEach(label => label.classList.remove('checked'));
        btn.checked && $$('.lavageLabel')[i].classList.add('checked');
    })
})
vehicule.forEach((btn, i) => {
    btn.checked && $$('.vehiculeLabel')[i].classList.add('checked');

    btn.addEventListener('click', () => {
        $$('.vehiculeLabel').forEach(label => label.classList.remove('checked'));
        btn.checked && $$('.vehiculeLabel')[i].classList.add('checked');
    })
})



input.addEventListener('focus', e => {
    $('.border').classList.add('clicked')
})


input.addEventListener('blur', e => {
    $('.border').classList.remove('clicked')
})


