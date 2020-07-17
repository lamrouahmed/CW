<?php
require_once '/wamp64/www/PFE/core/init.php';

if(isset($_SESSION["username"])) {
    require_once './sideBar/sideBar.php';
    $lavage = new LavageMobile($_SESSION["username"]);
    var_dump($lavage)
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