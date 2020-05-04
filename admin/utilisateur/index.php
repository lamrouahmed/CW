<?php
require_once '/wamp64/www/PFE/core/init.php';
require_once '/wamp64/www/PFE/admin/sideBar/sideBar.html';
$DB = DB::connect();



if(Input::exists()) {
    $id = Input::get('id');
$action = Input::get('action');

if($action === "delete") {
    echo "deleted";
    $DB->delete("u_id", $id, "user");
}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <div class="top">
            <div class="id">#</div>
            <div class="uid">username</div>
            <div class="id">Full Name</div>
            <div class="tel">Phone</div>
            <div class="mail">Email</div>
            <div class="joined">Created</div>
            <div class="action">action</div>
        </div>

        <div class="content">
<?php         require_once '/wamp64/www/PFE/admin/utilisateur/usersList.php';
?>
       


        </div>
    </div>
    <script src="/PFE/admin/ajax.js"></script>
</body>

</html>