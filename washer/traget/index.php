<?php
require_once '../../core/init.php';
require_once '../sideBar/sideBar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Carwashs</title>
	<meta name='robots' content='noindex, nofollow'>
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no"/>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet'>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.9.1/mapbox-gl.css' rel='stylesheet' />
	<title>Document</title>
	<style>
    	body {
          margin: 0;
          padding: 0;
        }
      #map {
        position:absolute;
        width:92%;
        height: 90%;
        left: 8%;
        top:10%;
        bottom:0;
      }
      .popupClient .mapboxgl-popup-content {
        width: 60px;
        background-color: #6f6b6b;
      }

      .mapboxgl-popup {
        padding-bottom: 50px;
      }

      .mapboxgl-popup-close-button {
        display: all;
      }
      .mapboxgl-popup-content {
        font:400 15px/22px 'Source Sans Pro', 'Helvetica Neue', Sans-serif;
        padding:0;
        width:180px;
      }
      .mapboxgl-popup-content-wrapper {
        padding:1%;
      }
      .mapboxgl-popup-content h2,h3 {
        background:#c3c3c3;
        color:#fff;
        margin:0;
        display:block;
        padding:10px;
        border-radius:3px 3px 0 0;
        font-weight:700;
        margin-top:-15px;
      }
      .mapboxgl-popup-content
      {
        cursor: pointer;
      }

      .mapboxgl-popup-content h4 {
        margin:0;
        display:block;
        padding: 10px 10px 10px 10px;
        font-weight:400;
      }

      .mapboxgl-popup-content div {
        padding:10px;
      }

      .mapboxgl-container .leaflet-marker-icon {
        cursor:pointer;
      }

      .mapboxgl-popup-anchor-top > .mapboxgl-popup-content {
        margin-top: 15px;
      }

      .mapboxgl-popup-anchor-top > .mapboxgl-popup-tip {
        border-bottom-color: #91c949;
      }

      .name 
      {
        cursor: pointer;
      }
      @media (min-width: 200px) and (max-width: 1200px) {
        #map {
          position:absolute;
          width:100%;
          height: 80%;
          left: 0;
          top:10%;
          bottom: 0;
        }
      }
  </style>
</head>
<body>
	<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.0.2/mapbox-gl-directions.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.0.2/mapbox-gl-directions.css"type="text/css"/>

    <div id='map'>Map</div>

</div>
<script src="https://unpkg.com/es6-promise@4.2.4/dist/es6-promise.auto.min.js"></script>
<script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
<script type="module" src="script.js"></script>

</body>
</html>