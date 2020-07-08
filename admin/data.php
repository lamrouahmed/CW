<?php
require_once '../core/init.php';
if(Session::exists('admin')) {
    $data = [];
$users = new User();
$demandes = new Demande();
$factures = new Facture();

$data += ["users" => $users->getInsensitiveData()->results()];
$data += ["demandes" => $demandes->getDemandes()->results()];
$data += ["totale" => $factures->getTotale()->results()];
$data += ["lavages" => DB::connect()->query("SELECT COUNT('lavage_id') as lavages FROM lavage_mobile")->results()];



echo json_encode($data);
}

