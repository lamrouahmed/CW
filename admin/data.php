<?php
require_once '../core/init.php';
if(Session::exists('admin')) {
    $data = [];
$users = new User();
$demandes = new Demande();

$data += ["users" => $users->getInsensitiveData()->results()];
$data += ["demandes" => $demandes->getDemandes()->results()];



echo json_encode($data);
}

