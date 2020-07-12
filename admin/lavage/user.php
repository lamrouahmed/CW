<?php
require_once '../../core/init.php';

$demande = new Demande();
$P = $demande->getDemandesP();

$clients = $P->results();

echo json_encode($clients);

?>