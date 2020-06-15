<?php
require_once '/wamp64/www/PFE/core/init.php';
require_once '/wamp64/www/PFE/user/login/login.inc.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="../../header/css/style.css">
    <title>Document</title>
</head>

<body>
    <!-- <header>
        <div class="mobileNav">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="nav">
                <ul class="navList">
                    <li class="navItem"><a href="#" class="navLink">TEXT</a></li>
                    <li class="navItem"><a href="#" class="navLink">TEXT</a></li>
                    <li class="navItem"><a href="#" class="navLink">HELP CENTER</a></li>
                    <li class="navItem"><a href="#" class="navLink">ABOUT</a></li>
                </ul>
            </nav>
        </div>
    </header> -->
    <?php require_once '/wamp64/www/PFE/header/header.html'?>

    <div class="wrapper">
        <!-- <div class="imgContainer">
            
        </div> -->
        <div class="container">
            <div class="logo">
                <img src="./img/user.svg" />
                <h2 class="brand">LOGIN</h2>
            </div>
            <div class="form">
                <form method="POST" action=<?php echo escape($_SERVER["PHP_SELF"]);?> >
                    <label class="sLabel">
                        <input class="input" type="text" name="u_username" placeholder="Username" value=<?php echo Input::get("u_username") ?>>
                        <span class="border"></span>
                        <span class="error" data-error="error1"><?php if(isset($errors["u_username"])) echo $errors["u_username"]?></span>
                    </label>
                    <label class="sLabel">
                        <input class="input" type="password" name="u_password" placeholder="Password">
                        <span class="border"></span>
                        <span class="error" data-error="error2"><?php if(isset($errors["u_password"])) echo $errors["u_password"]?></span>
                    </label>
                    <input type="hidden" name="token" value= <?php echo Token::generate(64)?>>
                    <label class="sLabel">
                        <span class="error errorB" data-error="error3"><?php if(isset($errors["u_error"])) echo $errors["u_error"]?></span>
                    </label>
                    <button type="submit" class="log" name="u_login">LOG IN</button>
                </form>
            </div>
            <div class="notMem">
                <h2>Not a member ? <span><a href="../signup/signup.php">SignUp now!</a></span></h2>
            </div>
        </div>
        <!-- <div id="google_translate_element"></div> -->
    </div>
</body>
<!-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>  -->
<script src="./script/script.js" async></script>

</html>