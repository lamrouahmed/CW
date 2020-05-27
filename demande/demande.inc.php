<?php
    require_once '/wamp64/www/PFE/core/init.php';

    if(Input::exists()) {
        $demande = new Demande();
        echo json_encode($_POST);
    }






