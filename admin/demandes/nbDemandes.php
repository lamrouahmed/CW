<?php
require_once '../../core/init.php';

if(Session::exists('admin')){
    $demandes = new Demande();
    echo(json_encode($demandes->getAll()->count()));
}