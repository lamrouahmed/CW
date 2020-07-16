<?php
require_once '/wamp64/www/PFE/core/init.php';

if (Session::exists("user")) {
        $user = new User();
        echo(json_encode($user->getDemandesY()->results()));
    
}