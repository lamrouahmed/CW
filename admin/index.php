<?php
require_once '../core/init.php';
if(Session::exists("admin")) {
    require_once './sideBar/sideBar.php';
?>








<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/charts.css">

        <title>Document</title>
    </head>
    <body>
        <div class="usersContainer">
        <canvas id="myChart" width="600" height="300"></canvas>
        </div>
    </body>
    <script src="./chart.js"></script>
    <script src="./graphs.js"></script>
    </html>

<?php
} else {
    Redirect::to("/PFE/admin/login.php");
}
?>