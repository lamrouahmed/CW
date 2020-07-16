

const links = document.querySelectorAll('.navItem a');
const loc = window.location.pathname;
let notifications = $('.notif > p')
const audio = $('.audio');

links.forEach(link => {
    link.getAttribute('href') === loc && link.classList.add('active');
})




function get(url) {
    fetch(url, {
        method: 'get'
      })
      .then(response => response.json())
      .then(data => {
       
        if(data.pending !== 0) {
          $('.notif > p').textContent = data.pending;
          $('.notif').style.display = 'flex';
        } else {
          $('.notif').style.display = 'none';
        }
        notifications = $('.notif > p')
        let dataP = data.pending;
        if((data.pending > parseInt(notifications.innerText)) && data.pending!== undefined) {
            audio.play();
        }
      })
  }
  get('/PFE/admin/demandes/nbDemandes.php');
  
  
  setInterval(() => get('/PFE/admin/demandes/nbDemandes.php'), 1000)