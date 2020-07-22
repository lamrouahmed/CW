<?php
require_once '../../core/init.php';
require_once '../sideBar/sideBar.php';

$s = new Status();
$d = new LavageMobile(Session::get('username'));
if (Input::exists()) {
  $date = Input::get('date');
  $id = $d->getDemandesY()->demande_id;
  $s->addStatus($id, [
    'u_id' => $d->getDemandesY()->u_id,
    'h_arrive' => $date
  ]);
}

if (Input::exists()) {
  $date = Input::get('date');
  $id = $d->getDemandesY()->demande_id;
  $s->addStatus($id, [
    'u_id' => $d->getDemandesY()->u_id,
    'h_voiture_main' => $date
  ]);
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Progress</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>

<ul class="steps">
  <li class="step step--incomplete step--active">
    <span class="step__icon"></span>
    <span class="step__label">Arrivé</span>
    
  </li>
  <li class="step step--incomplete step--inactive">
    <span class="step__icon"></span>
    <span class="step__label">Voiture en main</span>
  </li>
  <li class="step step--incomplete step--inactive">
    <span class="step__icon"></span>
    <span class="step__label">Fin lavage</span>
  </li>
  <li class="step step--incomplete step--inactive">
    <span class="step__icon"></span>
    <span class="step__label">Voiture rendue</span>
  </li>
</ul>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="./script.js"></script>

</body>
</html>
