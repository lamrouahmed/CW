<?php
    require_once '/wamp64/www/PFE/core/init.php';




    if(Session::exists("user")) { 
        $user = new User();

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
    <header>
        <section class="header_1">
            <div class="logo">
                <h2>Car<b>Wash</b></h2>
            </div>
            <div class="userInfo">
                <div class="notifications">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                        style="enable-background:new 0 0 512 512;" xml:space="preserve">

                        <path d="M467.812,431.851l-36.629-61.056c-16.917-28.181-25.856-60.459-25.856-93.312V224c0-67.52-45.056-124.629-106.667-143.04
			V42.667C298.66,19.136,279.524,0,255.993,0s-42.667,19.136-42.667,42.667V80.96C151.716,99.371,106.66,156.48,106.66,224v53.483
			c0,32.853-8.939,65.109-25.835,93.291l-36.629,61.056c-1.984,3.307-2.027,7.403-0.128,10.752c1.899,3.349,5.419,5.419,9.259,5.419
			H458.66c3.84,0,7.381-2.069,9.28-5.397C469.839,439.275,469.775,435.136,467.812,431.851z" />

                        <path
                            d="M188.815,469.333C200.847,494.464,226.319,512,255.993,512s55.147-17.536,67.179-42.667H188.815z" />

                    </svg>
                </div>
                <div class="disconnect">
                    <p class="username"><span>Welcome, </span><?php echo $user->getData()->username; ?></p>
                    <div class="triangle">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 491.996 491.996"
                            style="enable-background:new 0 0 491.996 491.996;" xml:space="preserve">

                            <path d="M484.132,124.986l-16.116-16.228c-5.072-5.068-11.82-7.86-19.032-7.86c-7.208,0-13.964,2.792-19.036,7.86l-183.84,183.848
			L62.056,108.554c-5.064-5.068-11.82-7.856-19.028-7.856s-13.968,2.788-19.036,7.856l-16.12,16.128
			c-10.496,10.488-10.496,27.572,0,38.06l219.136,219.924c5.064,5.064,11.812,8.632,19.084,8.632h0.084
			c7.212,0,13.96-3.572,19.024-8.632l218.932-219.328c5.072-5.064,7.856-12.016,7.864-19.224
			C491.996,136.902,489.204,130.046,484.132,124.986z" />


                        </svg>

                    </div>
                    <div class="img">
                        <img src="/PFE/uploads/<?php echo $user->getData()->img?>" alt="img" class="upload">
                    </div>
                    <div class="logout">
                        <a href="#">Log out</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section class="header_2">
            <div class="title">
                <h4>Account Settings</h4>
            </div>


            <div class="right">
                <div class="profile">
                    <p>Profile</p>
                </div>
                <div class="billing">
                    <p>Billing</p>
                </div>
                <div class="notifs">
                    <p>Notifications</p>
                </div>
            </div>
        </section> -->
    </header>


    <div class="wrapper">
    
        <div class="imgContainer">
            <img src="/PFE/uploads/<?php echo $user->getData()->img?>" alt="img" class="upload">
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
                <div class="fullName">
                    <label class="label">
                        <input data-check="u_last_name" class="input" type="text" name="u_last_name" value="<?php echo $user->getData()->last_name;?>">
                        <span class="border"></span>
                        <span class="text">Last Name</span>
                        <span class="error" data-error="u_last_name"></span>
                    </label>
                    <label class="label">
                        <input data-check="u_first_name" class="input" type="text" name="u_first_name" value="<?php echo $user->getData()->first_name;?>">
                        <span class="border"></span>
                        <span class="text">First Name</span>
                        <span class="error" data-error="u_first_name"></span>

                    </label>
                </div>
                <div class="info">
                    <label class="label">
                        <input data-check="u_username" class="input" type="text" name="u_username" value="<?php echo $user->getData()->username;?>">
                        <span class="border"></span>
                        <span class="text">Username</span>
                        <span class="error" data-error="u_username"></span>

                    </label>


                    <label class="label">
                        <input data-check="u_phone" class="input" type="tel" name="u_phone" value="<?php echo $user->getData()->phone;?>">
                        <span class="border"></span>
                        <span class="text">Phone</span>
                        <span class="error" data-error="u_phone"></span>


                    </label>
                </div>
                <div class="info">
                    <label class="label">
                        <input data-check="u_mail" class="input" type="text" name="u_mail" value="<?php echo $user->getData()->mail;?>">
                        <span class="border"></span>
                        <span class="text">Email</span>
                        <span class="error" data-error="u_mail"></span>


                    </label>

                    <label class="label ">
                        <input data-check="u_pwd" class="input pwd" type="password" name="u_pwd" value="<?php 
                        echo $user->getData()->password;
                        
                        ?>">
                        <span class="border"></span>
                        <span class="text">Password</span>
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








    <!-- <div class="wrapper">
        <div class="point">
            <div class="image">
                <img src="./img/user.svg" alt="user_img">
            </div>
            <div class="fullName"><span>Mohamed Lamrouah</span></div>
            <div class="mail"><span>lamrouahmed@gmail.com</span></div>
        </div>

        <div class="mid">
            <div class="phone"></div>
            <div class="username"></div>
            <div class=""></div>
        </div>
    </div> -->

    <div class="alerts"></div>

    <script src="./script/script.js"></script>
</body>

</html>
    <?php } else {
        Redirect::to("/PFE/user/login/login.php");
    }
?>

