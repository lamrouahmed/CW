<?php
session_start();

if(isset($_SESSION["username"])) {
    require_once './sideBar/sideBar.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

</body>
</html>

<?php
} else {
    header("location:/PFE/washer/login/login.php");
}
?>