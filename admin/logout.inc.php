<?php
    require_once '/wamp64/www/PFE/core/init.php';


    $admin = new Admin();

if($admin->isLoggedIn()) {
    $admin->logout();
    Redirect::to('/PFE/admin');
}
Redirect::to('/PFE/admin');