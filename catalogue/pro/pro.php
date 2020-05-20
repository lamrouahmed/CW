<?php
   require_once '/wamp64/www/PFE/core/init.php';
   require_once '/wamp64/www/PFE/catalogue/pro/pro.inc.php';
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
                        height="120px" viewBox="0 0 60 120" width="120px" class="hovered-paths">
                        <g>
                            <path
                                d="m23 10v-6c0-.552.448-1 1-1h16c.552 0 1 .448 1 1v6c0 .552-.448 1-1 1h-16c-.552 0-1-.448-1-1zm4 3h10v2h-10zm-15.02 17.951 2.268-9.639c.315-1.339 1.483-2.276 2.852-2.307-.065.322-.1.655-.1.995v5h2v-5c0-1.654 1.346-3 3-3h20c1.654 0 3 1.346 3 3v5h2v-5c0-.34-.035-.673-.101-.994 1.37.031 2.537.968 2.852 2.308l2.268 9.639c.65 2.763.98 5.604.98 8.442 0 1.996-.548 3.932-1.576 5.633-1.611.133-3.12.803-4.299 1.948-1.175 1.14-1.893 2.614-2.076 4.214-1.019-.592-2.098-1.074-3.22-1.43-.54-3.581-.828-7.221-.828-10.843v-19.917h-2v19.917c0 3.448.256 6.911.734 10.328-.901-.158-1.816-.245-2.734-.245h-10c-.918 0-1.833.087-2.734.245.478-3.417.734-6.88.734-10.328v-19.917h-2v19.917c0 3.622-.288 7.262-.83 10.843-1.122.356-2.201.838-3.22 1.43-.183-1.6-.901-3.075-2.076-4.214-1.18-1.144-2.671-1.806-4.296-1.944-1.03-1.703-1.578-3.64-1.578-5.637 0-2.839.33-5.68.98-8.444zm45.02 23.887c0 .663-.106 1.319-.315 1.948-.841 2.521-3.191 4.214-5.847 4.214h-37.676c-2.656 0-5.006-1.693-5.846-4.213-.21-.63-.316-1.286-.316-1.949v-2.586c0-2.814 2.174-5.169 4.846-5.249 1.362-.045 2.657.459 3.636 1.408.979.95 1.518 2.225 1.518 3.589v2c0 2.757 2.243 5 5 5h2v-2h-2c-1.654 0-3-1.346-3-3v-.476c2.336-1.625 5.153-2.524 8-2.524h10c2.847 0 5.664.899 8 2.524v.476c0 1.654-1.346 3-3 3h-2v2h2c2.757 0 5-2.243 5-5v-2c0-1.364.539-2.639 1.519-3.589.979-.949 2.279-1.451 3.636-1.408 2.671.08 4.845 2.435 4.845 5.249z"
                                data-original="#000000" class="hovered-path active-path" data-old_color="#000000"
                                fill="#FFFFFF" />
                            <path
                                d="m52 7c2.761 0 5 2.239 5 5 0-2.761 2.239-5 5-5-2.761 0-5-2.239-5-5 0 2.761-2.239 5-5 5z"
                                data-original="#000000" class="hovered-path active-path" data-old_color="#000000"
                                fill="#FFFFFF" />
                            <path
                                d="m2 16c2.761 0 5 2.239 5 5 0-2.761 2.239-5 5-5-2.761 0-5-2.239-5-5 0 2.761-2.239 5-5 5z"
                                data-original="#000000" class="hovered-path active-path" data-old_color="#000000"
                                fill="#FFFFFF" />
                        </g>
                    </svg>
                </div>
    <h2 class="type_lavage">Lavage Pro</h2>
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