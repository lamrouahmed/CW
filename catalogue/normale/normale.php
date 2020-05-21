<?php
   require_once '/wamp64/www/PFE/core/init.php';
   require_once '/wamp64/www/PFE/catalogue/normale/normale.ins.php';
 ?>

<!DOCTYPE>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed" rel="stylesheet">
  <title>Reservation</title>
</head>

<body>
  <div class="reservation">
  	<div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_3" enable-background="new 0 0 60 120"
                        height="120px" viewBox="0 0 60 120" width="120px">
                        <g>
                            <path
                                d="m27 42c-2.206 0-4-1.794-4-4 0-.553-.447-1-1-1s-1 .447-1 1c0 1.821-1.23 3.344-2.898 3.826l5.486 4.115c.702-1.158 1.962-1.941 3.412-1.941.553 0 1-.447 1-1s-.447-1-1-1zm-5 2.687c-.444-.668-1.019-1.242-1.687-1.687.668-.444 1.242-1.019 1.687-1.687.444.668 1.019 1.242 1.687 1.687-.668.444-1.243 1.019-1.687 1.687z"
                                data-original="#000000" class="active-path" data-old_color="#000000" fill="#fff" />
                            <circle cx="11" cy="53" r="1.687" data-original="#000000" class="active-path"
                                data-old_color="#000000" fill="#fff" />
                            <path d="m9 29h6v2h-6z" data-original="#000000" class="active-path" data-old_color="#000000"
                                fill="#fff" />
                            <path
                                d="m22 49c-.553 0-1-.447-1-1 0-2.206-1.794-4-4-4-.553 0-1-.447-1-1s.447-1 1-1c.385 0 .75-.072 1.102-.174l-2.702-2.026c-.252-.189-.4-.486-.4-.8v-6h-6v6c0 .197-.059.391-.168.555l-5.832 8.748v12.697h24v-12.5l-3.412-2.559c-.365.604-.588 1.303-.588 2.059 0 .553-.447 1-1 1zm-6 5c-2.206 0-4 1.794-4 4 0 .553-.447 1-1 1s-1-.447-1-1c0-2.206-1.794-4-4-4-.553 0-1-.447-1-1s.447-1 1-1c2.206 0 4-1.794 4-4 0-.553.447-1 1-1s1 .447 1 1c0 2.206 1.794 4 4 4 .553 0 1 .447 1 1s-.447 1-1 1z"
                                data-original="#000000" class="active-path" data-old_color="#000000" fill="#fff" />
                            <path
                                d="m11 22v5h2v-3c0-.216.07-.427.2-.6l2.647-3.53 4.238 9.536 1.828-.812-4.263-9.594h3.35v-2h-10.465l-2.667 4h2.132c.553 0 1 .448 1 1z"
                                data-original="#000000" class="active-path" data-old_color="#000000" fill="#fff" />
                            <path
                                d="m38.457 10.117-4.589 6.883h23.132v-10h-12.719c-2.345 0-4.523 1.165-5.824 3.117zm12.25.59-4 4-1.414-1.414 4-4zm-5 0-4 4-1.414-1.414 4-4z"
                                data-original="#000000" class="active-path" data-old_color="#000000" fill="#fff" />
                            <path
                                d="m42.261 3c-2.965 0-5.737 1.458-7.417 3.901l-7.844 11.41v10.689h34v-26zm16.739 20h-6v-2h6zm0-5c0 .552-.447 1-1 1h-26c-.369 0-.708-.203-.882-.528s-.154-.72.05-1.026l5.625-8.438c1.673-2.51 4.472-4.008 7.488-4.008h13.719c.553 0 1 .448 1 1z"
                                data-original="#000000" class="active-path" data-old_color="#000000" fill="#fff" />
                        </g>
                    </svg>
                </div>
    <h2 class="type_lavage">Lavage Normale</h2>
    <form class="reservation-form" method="POST" action=<?php echo escape($_SERVER["PHP_SELF"]);?>>
    	<div class="reservation-form__typeL">
      	<label>Type de lavage</label><br>
      	<select name="type_lavage">
      		<option>Lavage intérieure</option>
      		<option>Lavage extérieure</option>
            <option>Total</option>
      	</select>
      </div>
    	<div class="reservation-form__type">
      	<label>Type de véhicule</label><br>
      	<select name="type_vehicule">
      		<option>Voiture</option>
      		<option>Moto</option>
            <option>Camionnette</option>
            <option>Camion</option>
      	</select>
      </div>
      	<div class="reservation-form__count">
        <label for="count">Nombre de véhicule</label><br>
        <button id="btn-minus" type="button">-</button>
        <input id="count" type="text" name="nombre" value="1">
        <button id="btn-plus" type="button">+</button>
      </div>
      <div class="reservation-form__date">
        <label for="date">La date &amp; l'heure de votre demande</label><br>
        <input id="date" type="text" name="date" value="<?php echo date('Y-m-d'); ?>">
        <span>-</span>
        <input id="time" type="text" name="time" value="<?php echo date("h:i A")?>">
        <input type="hidden" name="position" value="">
         <input type="hidden" name="token" value=<?php echo Token::generate(64); ?>>
      </div>
      <button id="submit" type="submit" name="submit">Confirm</button>
    </form>
  </div>

  <script src="script.js"></script>
</body>

</html>