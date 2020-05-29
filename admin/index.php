<?php
require_once '../core/init.php';
if(Session::exists("admin")) {
        require_once './sideBar/sideBar.php';
    } else {
        Redirect::to("/PFE/admin/login.php");
    }
?>