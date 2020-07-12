<?php
require_once '/wamp64/www/PFE/core/init.php';
require_once '/wamp64/www/PFE/user/signup/signup.inc.php';

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
<?php require_once '/wamp64/www/PFE/header/header.html'?>

    <div class="wrapper">
        <div class="logo">
            <img src="./img/user.svg"/>
            <h2 class="title">S'INSCRIRE</h2>
        </div>
        <form method="POST" action=<?php echo escape($_SERVER["PHP_SELF"]);?> class="form">
            <div class="fullName">
                <label class="label">
                    <input class="input" type="text" name="u_last_name" placeholder="Nom" value=<?php echo Input::get('u_last_name')?>>
                    <span class="border"></span>
                    <span class="error"><?php if(isset($errors["u_last_name"])) echo $errors["u_last_name"]?></span>
                </label>
                <label class="label">
                    <input class="input" type="text" name="u_first_name" placeholder="Prénom" value=<?php echo Input::get('u_first_name')?>>
                    <span class="border"></span>
                    <span class="error"><?php if(isset($errors["u_first_name"])) echo $errors["u_first_name"]?></span>

                </label>
            </div>
            <div class="username">
                <label class="label">
                    <input class="input" type="text" name="u_username" placeholder="Nom d'utilisateur" value=<?php echo Input::get('u_username')?>>
                    <span class="border"></span>
                    <span class="error"><?php if(isset($errors["u_username"])) echo $errors["u_username"]?></span>
                </label>
            </div>

            <div class="phone">
                <label class="label">
                    <input class="input" type="tel" name="u_phone" placeholder="Telephone (xx-xx-xx-xx-xx)" value=<?php echo Input::get('u_phone')?>>
                    <span class="border"></span>
                    <span class="error"><?php if(isset($errors["u_phone"])) echo $errors["u_phone"]?></span>

                </label>
            </div>
            <div class="mail">
                <label class="label">
                    <input class="input" type="text" name="u_mail" placeholder="Email" value=<?php echo Input::get('u_mail')?>>
                    <span class="border"></span>
                    <span class="error"><?php if(isset($errors["u_mail"])) echo $errors["u_mail"]?></span>

                </label>
            </div>
 
            <div class="password">
                <label class="label">
                    <input class="input" type="password" name="u_pwd" placeholder="Mot de passe">
                    <span class="border"></span>
                    <span class="error"><?php if(isset($errors["u_pwd"])) echo $errors["u_pwd"] ?></span>
                </label>
                <label class="label">
                    <input class="input" type="password" name="u_pwd_rep" placeholder="Confirmer">
                    <span class="border"></span>
                    <span class="error"><?php if(isset($errors["u_pwd_rep"])) echo $errors["u_pwd_rep"] ?></span>

                </label>
                <input type="hidden" name="position" value="">
                <input type="hidden" name="token" value=<?php echo Token::generate(64); ?>>
            </div>
            <button class="sign" name="u_signup">S'INSCRIRE</button>
        </form>  

        <div class="alreadyMember">
            <h2>Deja inscrit ? <span><a href="../login/login.php">Log in!</a></span></h2>
        </div> 

    </div>

    <script src="./script/script.js"></script>
</body>

</html>