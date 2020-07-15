<?php
require_once '/wamp64/www/PFE/core/init.php';

if (Session::exists("user")) {
        $demandes = new Demande();
        echo(json_encode($demandes->getDemandesY()->results()));
    
}