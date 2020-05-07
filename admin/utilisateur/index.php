<?php
require_once '/wamp64/www/PFE/core/init.php';
require_once '/wamp64/www/PFE/admin/sideBar/sideBar.html';
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

        <div class="options">
            <div class="sort">
                <span>Sort By</span>
                <div class="sortOptions">
                    <div class="option" data-sort="0">id</div>
                    <div class="option" data-sort="1">username</div>
                    <div class="option" data-sort="2">last name</div>
                    <div class="option" data-sort="3">first name</div>
                    <!-- <div class="option" data-sort="4">phone</div>
                    <div class="option" data-sort="5">mail</div> -->
                    <div class="option" data-sort="6">date </div>
                    <div class="option" data-sort="7">hour </div>
                </div>
            </div>
            <div class="search">
            <label class="label">
                <input type="text" name="search" class="searchInput" placeholder="search...">
                <span class="border"></span>
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
               <g>
                   <path d="M225.474,0C101.151,0,0,101.151,0,225.474c0,124.33,101.151,225.474,225.474,225.474
                       c124.33,0,225.474-101.144,225.474-225.474C450.948,101.151,349.804,0,225.474,0z M225.474,409.323
                       c-101.373,0-183.848-82.475-183.848-183.848S124.101,41.626,225.474,41.626s183.848,82.475,183.848,183.848
                       S326.847,409.323,225.474,409.323z"/>
               </g>
           <g>
               <g>
                   <path d="M505.902,476.472L386.574,357.144c-8.131-8.131-21.299-8.131-29.43,0c-8.131,8.124-8.131,21.306,0,29.43l119.328,119.328
                       c4.065,4.065,9.387,6.098,14.715,6.098c5.321,0,10.649-2.033,14.715-6.098C514.033,497.778,514.033,484.596,505.902,476.472z"/>
               </g>
           </svg>
            </label>
            </div>

            <!-- <div class="refresh" data-action="refresh">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">

		<path d="M356.577,20.47C244.17-27.11,114.517,10.696,45.89,109.82L23.99,93.4C14.28,86.06,0,92.97,0,105.4v150
			c0,11.04,11.57,18.37,21.71,13.42l120-60c9.91-4.97,11.22-18.71,2.28-25.42l-25.6-19.21c48.82-74.16,140.467-87.34,203.137-60.84
			c134.21,56.85,134.01,248.701-0.02,305.421c-85.863,36.352-183.214-4.356-218.557-87.82c-9.67-22.91-36.04-33.62-58.95-23.93
			c-22.95,9.67-33.62,36.12-23.94,58.94c54.26,128.62,205.407,191.23,336.488,135.69C563.958,404.081,563.667,107.95,356.577,20.47z
			"/>


</svg>
            </div> -->
        </div>

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
    <script src="/PFE/admin/ajax.js" async></script>
</body>

</html>