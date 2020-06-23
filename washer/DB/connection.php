<?php

$host = "localhost";
$user = "root";
$pwd ="";
$database = "carwash";
$message = "";

try 
{
    $connect = new PDO("mysql:host=$host; dbname=$database", $user, $pwd);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEception $error)
{
    $message = $error->getMessage();
}
