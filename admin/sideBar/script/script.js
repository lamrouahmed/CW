const $ = e => document.querySelector(e);
const $$ = e => document.querySelectorAll(e);
const links = $$('.navItem a');
const loc = window.location.pathname;

links.forEach(link => {
    link.getAttribute('href') === loc && link.classList.add('active');
})