const $ = e => document.querySelector(e)
const $$ = e => document.querySelectorAll(e)
const btns = $$('.btn a');
const popups = $$('.popup');
const [login, signup] = btns;
const [signP, logP] = popups;
const close =  $$('.cross svg');

btns.forEach(btn => btn.addEventListener('click', (e) => popUp(e)));
close.forEach(cross => cross.addEventListener('click', (e) => hidePopup(e)));

function popUp(e) { 
    hide();
    e.target.dataset.key === "log" && logP.classList.add('popupBlock')
    e.target.dataset.key === "sign" && signP.classList.add('popupBlock')
}

function hidePopup(e) {
    hide();
    e.target.dataset.key === "loginCross" && logP.classList.remove('popupBlock')
    e.target.dataset.key === "signupCross" && signP.classList.remove('popupBlock')
}

function hide() {
    popups.forEach(popup => popup.classList.remove('popupBlock'));
}






