<?php
    require_once '/wamp64/www/PFE/core/init.php';
    $lavage = new Lavage();
    echo(json_encode($lavage->getAll()->results()));