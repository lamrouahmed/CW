<?php
    require_once '/wamp64/www/PFE/core/init.php';



    if(Session::exists("username")) { 

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

        <?php require_once '../sideBar/sideBar.php';?>

    <div class="wrapper">
    
        <div class="imgContainer">
            <img src="/PFE/uploads/" alt="img" class="upload" onerror="this.src='/PFE/uploads/user.svg'">
            <label class="file_label" >
                <div class="modify">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 383.947 383.947"
                    style="enable-background:new 0 0 383.947 383.947;" xml:space="preserve">
                    <polygon fill="#FFF" points="0,303.947 0,383.947 80,383.947 316.053,147.893 236.053,67.893 			" />
                    <path fill="#FFF" d="M377.707,56.053L327.893,6.24c-8.32-8.32-21.867-8.32-30.187,0l-39.04,39.04l80,80l39.04-39.04
        C386.027,77.92,386.027,64.373,377.707,56.053z" />
                </svg>
                </div>
                <input type="file" name="file" id="file">
            </label>
        </div>
        <div class="formContainer">
            <form class="form">
              
                <div class="info">
                    <label class="label">
                        <input data-check="u_username" class="input" type="text" name="u_username" value="">
                        <span class="border"></span>
                        <span class="text">Nom d'utilisateur</span>
                        <span class="error" data-error="u_username"></span>

                    </label>


                    <label class="label">
                        <input data-check="u_phone" class="input" type="tel" name="u_phone" value="">
                        <span class="border"></span>
                        <span class="text">Nom Lavage</span>
                        <span class="error" data-error="u_phone"></span>


                    </label>
                </div>
                <div class="info">
                    <label class="label">
                        <input data-check="u_mail" class="input" type="text" name="u_mail" value="">
                        <span class="border"></span>
                        <span class="text">Telephone</span>
                        <span class="error" data-error="u_mail"></span>


                    </label>

                    <label class="label ">
                        <input data-check="u_pwd" class="input pwd" type="password" name="u_pwd" value="">
                        <span class="border"></span>
                        <span class="text">Mot de passe</span>
                        <div class="show"></div>
                        <span class="error" data-error="u_pwd"></span>

                    </label>

                </div>

                <div class="addresse">


                    <label class="label">
                        <textarea class="input textarea" name="addresse" cols="30" rows="5">
                    </textarea> 
                    <span class="border"></span>
                        <span class="text ">Addresse</span>

                    </label>
                </div>
            </form>
        </div>
    </div>
    <div class="svg">
        
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#273036" fill-opacity="1" d="M0,224L48,224C96,224,192,224,288,240C384,256,480,288,576,304C672,320,768,320,864,309.3C960,299,1056,277,1152,250.7C1248,224,1344,192,1392,176L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </div>

    <div class="alerts"></div>

    <script src="./script/script.js"></script>
</body>

</html>
    <?php } else {
        Redirect::to("/PFE/washer/login/login.php");
    }
?>

