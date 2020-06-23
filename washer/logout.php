<?php
session_start();
session_destroy();
header("location:/PFE/washer/login/login.php");
?>