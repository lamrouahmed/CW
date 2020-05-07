<?php
require_once '/wamp64/www/PFE/core/init.php';


$user = new User();

if($user->isLoggedIn()) {
    $user->logout();
    Redirect::to('../');
}
Redirect::to('../');
