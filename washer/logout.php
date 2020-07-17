<?php
require_once '/wamp64/www/PFE/core/init.php';

if(Session::exists('username')) Session::delete('username');

header("location:/PFE/washer/login/login.php");
?>