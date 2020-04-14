<?php
session_start();
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'carwash',
        'charset' => 'utf8'
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name' => 'user'
    )
);


date_default_timezone_set("Europe/London");

spl_autoload_register(function ($class) {
    require_once("/wamp64/www/PFE/modules/$class.php");
});

require_once '/wamp64/www/PFE/functions/sanitize.php';
