

const links = document.querySelectorAll('.navItem a');
const loc = window.location.pathname;
let notifications = document.querySelector('.notif > p')

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
          document.querySelector('.notif > p').textContent = data.pending;
          document.querySelector('.notif').style.display = 'flex';
        } else {
          document.querySelector('.notif').style.display = 'none';
        }
        notifications = document.querySelector('.notif > p')
        let dataP = data.pending;
        if((data.pending > parseInt(notifications.innerText)) && data.pending!== undefined) {
            audio.play();
        }
      })
  }
  get('/PFE/admin/demandes/nbDemandes.php');
  
  
  setInterval(() => get('/PFE/admin/demandes/nbDemandes.php'), 1000)