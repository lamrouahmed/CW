<?php
require_once '../../core/init.php';
if(Session::exists("admin")) {
    require_once '../sideBar/sideBar.php';
    $DB = DB::connect();



if(Input::exists()) {
$id = Input::get('id');
$action = Input::get('action');

if($action === "delete") {
    $DB->delete("u_id", $id, "user");
    if($_SESSION['user'] === $id) {
        Session::delete(Config::get("session/session_name"));
    }
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
        <div class="info">
            <div class="stats">
                <div class="totalUsers">
                    <div class="title">
                        Nb utilisateurs
                    </div>
                    <div class="text">
                        4 </div>
                </div>
                <div class="OnlineUsres">
                    <div class="title">
                        Utilisateurs connectee
                    </div>
                    <div class="text">
                        1 </div>
                </div>
                <div class="OfflineUsers">
                    <div class="title">
                    Utilisateurs deconnecte
                    </div>
                    <div class="text">
                        1 </div>
                </div>
            </div>



        </div>
        <div class="options">
            <div class="sort">
                <span>Sort By
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.011 512.011"
                        style="enable-background:new 0 0 512.011 512.011;" xml:space="preserve">

                        <path
                            d="M505.755,123.592c-8.341-8.341-21.824-8.341-30.165,0L256.005,343.176L36.421,123.592c-8.341-8.341-21.824-8.341-30.165,0    s-8.341,21.824,0,30.165l234.667,234.667c4.16,4.16,9.621,6.251,15.083,6.251c5.462,0,10.923-2.091,15.083-6.251l234.667-234.667    C514.096,145.416,514.096,131.933,505.755,123.592z" />

                    </svg>
                </span>

                <div class="sortOptions">
                    <div class="option" data-sort="1">username</div>
                    <div class="option" data-sort="2">last name</div>
                    <!-- <div class="option" data-sort="4">phone</div>
                    <div class="option" data-sort="5">mail</div> -->
                    <div class="option" data-sort="6">date </div>
                </div>
            </div>

            <div class="refresh" data-action="refresh">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                    style="enable-background:new 0 0 512 512;" xml:space="preserve">

                    <path d="M356.577,20.47C244.17-27.11,114.517,10.696,45.89,109.82L23.99,93.4C14.28,86.06,0,92.97,0,105.4v150
                        c0,11.04,11.57,18.37,21.71,13.42l120-60c9.91-4.97,11.22-18.71,2.28-25.42l-25.6-19.21c48.82-74.16,140.467-87.34,203.137-60.84
                        c134.21,56.85,134.01,248.701-0.02,305.421c-85.863,36.352-183.214-4.356-218.557-87.82c-9.67-22.91-36.04-33.62-58.95-23.93
                        c-22.95,9.67-33.62,36.12-23.94,58.94c54.26,128.62,205.407,191.23,336.488,135.69C563.958,404.081,563.667,107.95,356.577,20.47z
                        " />


                </svg>
            </div>
            <div class="search">
                <input type="text" name="search" class="searchInput">
                <div class="searchSvg">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 511.999 511.999"
                        style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">

                        <path
                            d="M508.874,478.708L360.142,329.976c28.21-34.827,45.191-79.103,45.191-127.309c0-111.75-90.917-202.667-202.667-202.667    S0,90.917,0,202.667s90.917,202.667,202.667,202.667c48.206,0,92.482-16.982,127.309-45.191l148.732,148.732    c4.167,4.165,10.919,4.165,15.086,0l15.081-15.082C513.04,489.627,513.04,482.873,508.874,478.708z M202.667,362.667    c-88.229,0-160-71.771-160-160s71.771-160,160-160s160,71.771,160,160S290.896,362.667,202.667,362.667z">
                        </path>

                    </svg>
                </div>
            </div>


        </div>

        <div class="top">
            <!-- <div class="id">#</div> -->

            <div class="void"></div>
            <div class="uid">username</div>
            <div class="id">Last Name</div>
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
    <script src="/PFE/admin/ajax.js" async></script>
</body>

</html>
<?php
} else {
    Redirect::to("/PFE/admin/login.php");
}
?>