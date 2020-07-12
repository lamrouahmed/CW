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
<script type="module" src="script.js"></script>

</body>
</html>