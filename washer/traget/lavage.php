<?php
require_once '/wamp64/www/PFE/core/init.php';

if(isset($_SESSION["username"])) {
    $lavage = new LavageMobile($_SESSION["username"]);
    echo(json_encode($lavage->getData()));

}