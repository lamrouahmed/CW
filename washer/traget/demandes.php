<?php
require_once '../../core/init.php';


if(isset($_SESSION["username"])) {
$demande = new LavageMobile(Session::get('username'));
$d = $demande->getDemandesP();

$clients = $d->results();

echo json_encode($clients);

}

?>