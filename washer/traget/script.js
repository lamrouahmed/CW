import "https://api.tiles.mapbox.com/mapbox-gl-js/v1.9.1/mapbox-gl.js";

/* This will let you use the .remove() function later on */
if (!('remove' in Element.prototype)) {
  Element.prototype.remove = function() {
    if (this.parentNode) {
      this.parentNode.removeChild(this);
    }
  };
}

mapboxgl.accessToken = 'pk.eyJ1IjoiaGFuYW5lenl4IiwiYSI6ImNrOWhyMnFmOTB4ODUzbXRiY2lrNnhobGcifQ.F7k8wX-OrgLUNyGLiCsf7w';


mapboxgl.setRTLTextPlugin('https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
	null,
	true // Lazy load the plugin
);

var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/streets-v11',
  center: [-7.598665473632815,33.54199495197828],
  zoom: 11
});

var nav = new mapboxgl.NavigationControl();
map.addControl(nav, 'bottom-right');

        // Add geolocate control to the map.
        
var loc = new mapboxgl.GeolocateControl({
    positionOptions: {
      enableHighAccuracy: true
    },
    trackUserLocation: true
});
           
         
map.addControl(loc);

map.addControl(
  new MapboxDirections({
    accessToken: mapboxgl.accessToken
  }),
  'top-left'
);

   var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });

fetch("./demandes.php")
      .then(response => response.json())
      .then(data => { 
        const clients = data;
        console.log(clients);

          clients.forEach(client => {
          const clientId  = client.demande_id;
          const Place = clients.find(client => client.demande_id === clientId);
          const loc = client.localisation;
          console.log(loc);
         


            mapboxClient.geocoding
            .forwardGeocode({
            query: loc,
            autocomplete: false,
            limit: 1
          })
            .send()
            .then(function(response) {
              if (
                response &&
                response.body &&
                response.body.features &&
                response.body.features.length
                ) {
                var feature = response.body.features[0];

                new mapboxgl.Marker({color: 'red' }) 
              .setLngLat(feature.center)
              .addTo(map);

            var popupId = new mapboxgl.Popup({closeOnClick: false})
              .setLngLat(feature.center)
              .setHTML('<h2>' + client.demande_id + '</h2>')
              .addTo(map);

              popupId.addClassName('popupClient');
            }
        });
          });
        });

/*$('.mapboxgl-ctrl-geolocate').on('click', function(){
$('#mapbox-directions-origin-input:input[type=text]').attr("value", 'Sidi Moumen');

});
*/
var position;
loc.on('geolocate', function(e){
  var lon = e.coords.longitude;
  var lat = e.coords.latitude;
  position = [lon, lat];
  console.log("'rferf")

});

$('#mapbox-directions-origin-input').on('click', function(){
  $('input[type=text]').attr('value', position);
  console.log("'rferf")
});

let [start, end] = document.querySelectorAll('input[type=text]');


function get(url) {
  fetch(url, {
    method : 'get'
  }).then(response => response.json())
  .then(data => start.value = `${data.longtitude.slice(0,8)},${data.latitude.slice(0,8)}`)
}

setTimeout(() => get('/PFE/washer/traget/lavage.php'), 4000)

    