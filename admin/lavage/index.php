<?php
require_once '/wamp64/www/PFE/core/init.php';
require_once '/wamp64/www/PFE/admin/sideBar/sideBar.php';
require_once '/wamp64/www/PFE/admin/lavage/lavage.inc.php';



if(Session::exists(('admin'))) {
  $DB = DB::connect();
$lavages = $DB->getAll('lavage_mobile')->results();

$d = new Demande();
$demandes = $d->getDemandesP()->results();


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
          bottom:0;
        }
      } 
      #searchMap {
        z-index: 10000 !important;
        position: relative;
        right: 50%;
        float: right;
        text-overflow: ellipsis;
        padding: 2px 0px 2px 6px;
        background-color: #fff;
        color: gray;
        font-size: 12pt;
        font-family: Trebuchet MS;
        height:30px;
        width:200px;
        border: 0px solid transparent;
        border-radius: 4px 4px 4px 4px;
        margin:30px 120px 20px 20px;
}

      .marker {
        border: none;
        cursor: pointer;
        height: 36px;
        width: 44px;
        background-image: url(marker2.svg);
        background-color: rgba(0, 0, 0, 0);
      }

      .clearfix { display:block; }
      .clearfix:after {
        content:'.';
        display:block;
        height:0;
        clear:both;
        visibility:hidden;
      }

      /* Marker tweaks */
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


    </style>
  </head>
<body>
    
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
<link
rel="stylesheet"
href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
type="text/css"
/>
<!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
    <style>
      #geocoder-container > div {
        min-width: 50%;
        margin-left: 25%;
      }

      .distance-container {
         position: absolute;
         top: 10px;
         left: 10px;
         z-index: 1;
      }
 
      .distance-container > * {
      background-color: rgba(0, 0, 0, 0.5);
      color: #fff;
      font-size: 11px;
      line-height: 18px;
      display: block;
      margin: 0;
      padding: 5px 10px;
      border-radius: 3px;
}
</style>

     <div id='map'></div>

     <div class="hover">
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">&times;</div>

  <form action=<?php echo escape($_SERVER["PHP_SELF"]);?> method="post">

      <label for="lavages">Choisissez un lavage mobile :</label><br>

        <select id="lavages" name="lavages">
          <?php
          foreach ($lavages as $lavage) {
          ?>

          <option value="<?php $lavage->username ?>"><?php echo $lavage->nom ?></option>

          <?php
        }
        ?>
    </select><br><br>

    <label for="lavages">Choisissez une demande :</label><br>
        <select id="demandes" name="demandes">
          <?php
          foreach ($demandes as $demande) {
          ?>

          <option value="<?php $demande->demande_id ?>"><?php echo $demande->demande_id ?></option>

          <?php
        }
        ?>
    </select><br><br>
    <input type="submit" name="submit" value="Envoyer">
  </form>
      </div>
</div>

<style type="text/css">

  .hover
  {
    background:rgba(0,0,0,.4);
    cursor:pointer;
    display:none;
    height:100%;
    position:fixed;
    text-align:center;
    top:0;
    width:100%;
    z-index:10000;
}
.hover .helper{
    display:inline-block;
    height:100%;
    vertical-align:middle;
}
.hover > div {
    background-color: #fff;
    box-shadow: 10px 10px 60px #555;
    display: inline-block;
    height: auto;
    max-width: 551px;
    min-height: 100px;
    vertical-align: middle;
    width: 60%;
    position: relative;
    border-radius: 8px;
    padding: 15px 5%;
}
.popupCloseButton {
    background-color: #fff;
    border: 3px solid #999;
    border-radius: 50px;
    cursor: pointer;
    display: inline-block;
    font-family: arial;
    font-weight: bold;
    position: absolute;
    top: -20px;
    right: -20px;
    font-size: 25px;
    line-height: 30px;
    width: 30px;
    height: 30px;
    text-align: center;
}
.popupCloseButton:hover {
    background-color: #ccc;
}
.trigger_popup {
    cursor: pointer;
    font-size: 20px;
    margin: 20px;
    display: inline-block;
    font-weight: bold;
}

.hover label
{
    font-size: 20px;
    margin: 20px;
    display: inline-block;
    font-weight: bold;
}

.hover select 
{
    font-size: 13px;
    padding: 10px 8px 10px 14px;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 6px;
    position: relative;
    background: transparent;
    line-height: 1;  
    width: 50%;
    z-index: 10;  
}

.hover input
{
    border: 1px solid #ccc;
    border-radius: 6px;
    line-height: 2;
    font-size: 13px;
}

</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/es6-promise@4.2.4/dist/es6-promise.auto.min.js"></script>
<script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
<script type="module" src="script.js"></script>
</body>
</html>

<?php
} else {
    Redirect::to("/PFE/admin/login.php");
}