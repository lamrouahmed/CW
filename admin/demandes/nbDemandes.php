<?php
require_once '../../core/init.php';

if(Session::exists('admin')){
    $demandes = new Demande();
    $data = [];
    $data += ['totale' => $demandes->getAll()->count()];
    $data += ['pending' => $demandes->getDemandesP()->count()];

    echo(json_encode($data));
    
}