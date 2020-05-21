<?php
   require_once '/wamp64/www/PFE/core/init.php';
   require_once '/wamp64/www/PFE/catalogue/complet/complet.inc.php';
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
                                d="m17 47c-3.309 0-6 2.691-6 6s2.691 6 6 6 6-2.691 6-6-2.691-6-6-6zm0 10c-2.206 0-4-1.794-4-4s1.794-4 4-4 4 1.794 4 4-1.794 4-4 4z"
                                data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFF" />
                            <circle cx="17" cy="53" r="2" data-original="#000000" class="active-path"
                                data-old_color="#000000" fill="#FFF" />
                            <circle cx="47" cy="53" r="2" data-original="#000000" class="active-path"
                                data-old_color="#000000" fill="#FFF" />
                            <path
                                d="m47 47c-3.309 0-6 2.691-6 6s2.691 6 6 6 6-2.691 6-6-2.691-6-6-6zm0 10c-2.206 0-4-1.794-4-4s1.794-4 4-4 4 1.794 4 4-1.794 4-4 4z"
                                data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFF" />
                            <path d="m34 37v-8h-4.438c-.652 0-1.265.319-1.638.853l-5.003 7.147z" data-original="#000000"
                                class="active-path" data-old_color="#000000" fill="#FFF" />
                            <path d="m3.004 44c0 .014-.004.028-.004.042v1.958h2v-2z" data-original="#000000"
                                class="active-path" data-old_color="#000000" fill="#FFF" />
                            <path d="m42.076 29.853c-.373-.534-.986-.853-1.638-.853h-4.438v8h11.079z"
                                data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFF" />
                            <path d="m61 48v-6.382l-2-1v7.382z" data-original="#000000" class="active-path"
                                data-old_color="#000000" fill="#FFF" />
                            <path
                                d="m4.25 21.571c-.829-1.747-1.25-3.621-1.25-5.571 0-7.168 5.832-13 13-13 3.076 0 5.979 1.057 8.308 3h-3.308v2h5c.552 0 1-.448 1-1v-5h-2v2.019c-2.582-1.95-5.701-3.019-9-3.019-8.271 0-15 6.729-15 15 0 2.249.486 4.412 1.444 6.429z"
                                data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFF" />
                            <path
                                d="m15 23c.035 0 .07-.002.105-.005.339-.036.636-.242.789-.547l6-12-1.789-.895-5.301 10.602-3.024-3.779-1.562 1.249 4 5c.192.238.48.375.782.375z"
                                data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFF" />
                            <circle cx="39" cy="7" r="5" data-original="#000000" class="active-path"
                                data-old_color="#000000" fill="#FFF" />
                            <circle cx="57" cy="7" r="5" data-original="#000000" class="active-path"
                                data-old_color="#000000" fill="#FFF" />
                            <circle cx="51" cy="17" r="5" data-original="#000000" class="active-path"
                                data-old_color="#000000" fill="#FFF" />
                            <path
                                d="m16 29c-3.076 0-5.979-1.057-8.308-3h3.308v-2h-5c-.552 0-1 .448-1 1v5h2v-2.019c2.582 1.95 5.701 3.019 9 3.019 2.685 0 5.202-.718 7.384-1.959l-6.592 8.569c-.145.188-.351.318-.583.368l-10.047 2.153c-1.11.238-2.03.94-2.587 1.869h2.425c.552 0 1 .448 1 1v4c0 .552-.448 1-1 1h-3v3c0 .551.449 1 1 1h5.069c.495-3.94 3.859-7 7.931-7s7.436 3.06 7.931 7h14.139c.495-3.94 3.859-7 7.931-7s7.436 3.06 7.931 7h5.068c.551 0 1-.449 1-1v-1h-3c-.552 0-1-.448-1-1v-9.382l-3.447-1.724c-.135-.068-.253-.165-.345-.285l-8.199-10.658c-.94-1.222-2.422-1.951-3.964-1.951h-12.09c-.364 0-.724.044-1.074.122 1.947-2.531 3.119-5.689 3.119-9.122 0-2.249-.486-4.412-1.444-6.429l-1.807.858c.83 1.747 1.251 3.621 1.251 5.571 0 7.168-5.832 13-13 13zm20 14h-4v-2h4zm14 0h-4v-2h4zm-20.438-16h10.876c1.305 0 2.53.638 3.277 1.707l6.104 8.72c.214.305.24.704.068 1.035-.172.33-.514.538-.887.538h-28c-.373 0-.715-.208-.887-.538-.172-.331-.146-.73.068-1.035l6.104-8.72c.747-1.069 1.972-1.707 3.277-1.707z"
                                data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFF" />
                        </g>
                    </svg>

                </div>
    <h2 class="type_lavage">Lavage Complet</h2>
    <form class="reservation-form" method="post" action=<?php echo escape($_SERVER["PHP_SELF"]);?>>
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
      <button id="submit" type="submit">Confirm</button>
    </form>
  </div>

  <script src="script.js"></script>
</body>

</html>