<?php
require_once '/wamp64/www/PFE/core/init.php';
    if(Session::exists("admin")) {
        require_once '/wamp64/www/PFE/admin/sideBar/sideBar.html';
    } else {
        Redirect::to("/PFE/admin/login.php");
    }
?>