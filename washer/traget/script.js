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
  zoom: 10
});

var nav = new mapboxgl.NavigationControl();
map.addControl(nav, 'bottom-right');

        // Add geolocate control to the map.
        map.addControl(
           new mapboxgl.GeolocateControl({
              positionOptions: {
              enableHighAccuracy: true
              },
            trackUserLocation: true
            })
           
         
     );

map.addControl(
  new MapboxDirections({
    accessToken: mapboxgl.accessToken
  }),
  'top-left'
);