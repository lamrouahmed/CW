/* This will let you use the .remove() function later on */
if (!('remove' in Element.prototype)) {
  Element.prototype.remove = function() {
    if (this.parentNode) {
      this.parentNode.removeChild(this);
    }
  };
}

mapboxgl.accessToken = 'pk.eyJ1IjoiaGFuYW5lenl4IiwiYSI6ImNrOWhyMnFmOTB4ODUzbXRiY2lrNnhobGcifQ.F7k8wX-OrgLUNyGLiCsf7w';

var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/streets-v11',
  center: [-7.5898,33.5731],
  zoom: 14
});
map.addControl(new mapboxgl.FullscreenControl());

var carwashs = {
  "type": "FeatureCollection",
  "features": [
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          -7.5800701,
           33.5718397
        ]
      },
      "properties": {
      	"name":"Hami Lavage",
        "phone": "0662241020",
        "address": "196 rue 1",
        "city": "Casablanca",
        "country": "Morocco",
        "postalCode": "20320"
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          -7.5919785,
           33.5730434
        ]
      },
      "properties": {
      	"name":"Lav Auto : Centre esthétique automobile Casablanca",
        "phone": "05229-64586",
        "address": "Hay Erajaa 2, N°96 Had Soualem",
        "city": "Casablanca",
        "country": "Morocco",
        "postalCode": "26402"
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          -7.6131184,
           33.5839128
        ]
      },
      "properties": {
      	"name":"Ghsalni",
        "phone": "0664-645652",
        "address": "N° 220 Magasin N°1, Boulevard de la Résistance",
        "city": "Casablanca",
        "country": "Morocco",
        "postalCode":"20250"
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          -7.61651,
          33.5884252
        ]
      },
      "properties": {
      	"name":"Garage Auto",
        "phone": "0662-125847",
        "address": "Casablanca",
        "city": "Casablanca",
        "country": "Morocco",
        "postalCode": "20250"
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          -7.6038936,
           33.5469455
        ]
      },
      "properties": {
      	"name":"Auto Power",
        "phone": "",
        "address": "Avenue 2 Mars",
        "city": "Casablanca",
        "country": "Morocco",
        "postalCode": ""
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          -7.6038473,
           33.5616619  
        ]
      },
      "properties": {
      	"name":"Anouar Auto Service",
        "address": "3 angle Bd bouchaib doukalli et rue 21 pres souk korea",
        "city": "Casablanca",
        "country": "Morocco",
        "phone":"0676-867008"
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          -7.5946796,
           33.5967654
        ]
      },
      "properties": {
      	"name":"TROCADERO LAVAGE",
        "address": "65, Bd Moulay Ismail N1",
        "phone": "",
        "city": "Casablanca",
        "country": "Morocco",
        "postalCode": "20 300"
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          -7.6463191,
           33.5557599
        ]
      },
      "properties": {
      	"name":"Lavage Tarik",
      	"address":"Casablanca",
        "phone": "05222-09353",
        "city": "Casablanca",
        "country": "Morocco"
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          -7.6146056,
           33.5849766
        ]
      },
      "properties": {
      	"name":"VIREO Car Wash",
        "phone": "05222-62610",
        "address": "Résidence Titrit 2. Rue Hadj Omar Riffi Benjdia",
        "city": "Casablanca",
        "country": "Morocco",
        "postalCode": "20300"
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          -7.6456325,
           33.5740446
        ]
      },
      "properties": {
      	"name":"Lavage Ktiri Auto El Maarif",
        "phone": "0661-303390",
        "address": "Rue des Camélias",
        "city": "Casablanca",
        "country": "Morocco"
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          -7.5964987,
           33.5834916
        ]
      },
      "properties": {
      	"name":"Lavage Ain Borja",
        "phone": "0638-931572",
        "address": "18 george hay lahcen ben ahmed toto ain borja, Rue Rakib Mohamed Al Moussaoui",
        "city": "Casablanca",
        "country": "Morocco",
        "postalCode": "20250"
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          -7.5878735,
           33.5312524
        ]
      },
      "properties": {
      	"name":"Easy Wash",
        "phone": "0690-998818",
        "address": "Casablanca",
        "city": "Casablanca",
        "country": "Morocco",
        "postalCode": "20000"
      }
    },
    {
      "type": "Feature",
      "geometry": {
        "type": "Point",
        "coordinates": [
          -7.6557255,
           33.5313802
        ]
      },
      "properties": {
      	"name":"Lavage Auto a la vapeur",
        "phone": "0770-107854",
        "address": "21Bis Sidi Abderrahmane",
        "city": "Casablanca",
        "country": "Morocco",
        "postalCode": "20250"
      }
  }
  ]
};

/**
       * Assign a unique id to each carwash. You'll use this `id`
       * later to associate each point on the map with a listing
       * in the sidebar.
      */
      carwashs.features.forEach(function(carwash, i){
        carwash.properties.id = i;
      });

      /**
       * Wait until the map loads to make changes to the map.
      */
      map.on('load', function (e) {
        
        map.addSource("places", {
          "type": "geojson",
          "data": carwashs
        });

        /**
         * Add all the things to the page:
         * - The location listings on the side of the page
         * - The markers onto the map
        */
        buildLocationList(carwashs);
        addMarkers();
      });

      /**
       * Add a marker to the map for every store listing.
      **/
      function addMarkers() {
        /* For each feature in the GeoJSON object above: */
        carwashs.features.forEach(function(marker) {
          /* Create a div element for the marker. */
          var el = document.createElement('div');
          /* Assign a unique `id` to the marker. */
          el.id = "marker-" + marker.properties.id;
          /* Assign the `marker` class to each marker for styling. */
          el.className = 'marker';
          
          /**
           * Create a marker using the div element
           * defined above and add it to the map.
          **/
          new mapboxgl.Marker(el, { offset: [0, -23] })
            .setLngLat(marker.geometry.coordinates)
            .addTo(map);

          /**
           * Listen to the element and when it is clicked, do three things:
           * 1. Fly to the point
           * 2. Close all other popups and display popup for clicked store
           * 3. Highlight listing in sidebar (and remove highlight for all other listings)
          **/
          el.addEventListener('click', function(e){
            /* Fly to the point */
            flyToWashers(marker);
            /* Close all other popups and display popup for clicked carwash */
            createPopUp(marker);
            /* Highlight listing in sidebar */
            var activeItem = document.getElementsByClassName('active');
            e.stopPropagation();
            if (activeItem[0]) {
              activeItem[0].classList.remove('active');
            }
            var listing = document.getElementById('listing-' + marker.properties.id);
            listing.classList.add('active');
          });
        });
      }

      /**
       * Add a listing for each carwash to the sidebar.
      **/
      function buildLocationList(data) {
        data.features.forEach(function(carwash, i){
          /**
           * Create a shortcut for `carwash.properties`,
           * which will be used several times below.
          **/
          var prop = carwash.properties;

          /* Add a new listing section to the sidebar. */
          var listings = document.getElementById('listings');
          var listing = listings.appendChild(document.createElement('div'));
          /* Assign a unique `id` to the listing. */
          listing.id = "listing-" + prop.id;
          /* Assign the `item` class to each listing for styling. */
          listing.className = 'item';
           
           var names = listing.appendChild(document.createElement('n'));
           names.innerHTML = prop.name;

          /* Add the link to the individual listing created above. */
          var link = listing.appendChild(document.createElement('a'));
          link.href = '#';
          link.className = 'title';
          link.id = "link-" + prop.id;
          link.innerHTML = prop.address;

          /* Add details to the individual listing. */
          var details = listing.appendChild(document.createElement('div'));
          details.innerHTML = prop.city;
         
          details.innerHTML = prop.phone;
          

          /**
           * Listen to the element and when it is clicked, do four things:
           * 1. Update the `currentFeature` to the carwash associated with the clicked link
           * 2. Fly to the point
           * 3. Close all other popups and display popup for clicked carwash
           * 4. Highlight listing in sidebar (and remove highlight for all other listings)
          **/
          link.addEventListener('click', function(e){
            for (var i=0; i < data.features.length; i++) {
              if (this.id === "link-" + data.features[i].properties.id) {
                var clickedListing = data.features[i];
                flyToWashers(clickedListing);
                createPopUp(clickedListing);
              }
            }
            var activeItem = document.getElementsByClassName('active');
            if (activeItem[0]) {
              activeItem[0].classList.remove('active');
            }
            this.parentNode.classList.add('active');
          });
        });
      }

      /**
       * Use Mapbox GL JS's `flyTo` to move the camera smoothly
       * a given center point.
      **/
      function flyToWashers(currentFeature) {
        map.flyTo({
          center: currentFeature.geometry.coordinates,
          zoom: 15
        });
      }

      /**
       * Create a Mapbox GL JS `Popup`.
      **/
      function createPopUp(currentFeature) {
        var popUps = document.getElementsByClassName('mapboxgl-popup');
        if (popUps[0]) popUps[0].remove();
        var popup = new mapboxgl.Popup({closeOnClick: false})
          .setLngLat(currentFeature.geometry.coordinates)
          .setHTML('<h2>' + currentFeature.properties.name + '</h2>' + '<h3>' + currentFeature.properties.phone + '</h3>' +
            '<h4>' + currentFeature.properties.address + '</h4>')
          .addTo(map);
      }