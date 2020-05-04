
const links = $$('.navItem a');
const loc = window.location.pathname;


links.forEach(link => {
    link.getAttribute('href') === loc && link.classList.add('active');
})





