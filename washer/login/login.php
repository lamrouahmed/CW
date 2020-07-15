<?php
include "login.inc.php";

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
        <div class="headerWrapper">
            <a href="/PFE">
                <div class="headerLogo">
                    <div class="logoImg">
                        <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 524.235 524.235" height="512px" viewBox="0 0 524.235 524.235" width="512px">
                            <g>
                                <path d="m484.721 234.798-36.766-122.554c-8.383-27.949-33.613-46.715-62.778-46.715h-24.766v65.529h24.766l29.489 98.294h-305.097l29.489-98.294h24.765v-65.529h-24.765c-29.165 0-54.395 18.766-62.778 46.715l-36.766 122.554c-23.216 10.089-39.514 33.193-39.514 60.084v131.059c0 18.094 14.671 32.765 32.765 32.765h.002l-.002 32.763c0 18.096 14.669 32.767 32.765 32.767h32.767c18.094 0 32.765-14.671 32.765-32.765l-.014-32.765h262.13l-.002 32.763c0 18.096 14.669 32.767 32.765 32.767h32.767c18.096 0 32.765-14.671 32.765-32.765v-32.763l-.012-.002h.012c18.094 0 32.765-14.671 32.765-32.765v-131.059c-.003-26.891-16.301-49.995-39.517-60.084zm-353.662 141.996c-18.096 0-32.765-14.671-32.765-32.765 0-18.096 14.669-32.765 32.765-32.765s32.765 14.669 32.765 32.765c0 18.095-14.669 32.765-32.765 32.765zm262.118 0c-18.096 0-32.765-14.671-32.765-32.765 0-18.096 14.669-32.765 32.765-32.765s32.765 14.669 32.765 32.765c0 18.095-14.669 32.765-32.765 32.765z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"></path>
                                <path id="path-1_35_" d="m294.883 98.294c18.096 0 32.765-14.671 32.765-32.765-.001-18.096-32.765-65.529-32.765-65.529s-32.765 47.433-32.765 65.529c0 18.095 14.669 32.765 32.765 32.765z" transform="translate(8)" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"></path>
                                <path id="path-1_34_" d="m229.353 163.824c18.096 0 32.765-14.671 32.765-32.765 0-18.096-32.765-65.529-32.765-65.529s-32.765 47.433-32.765 65.529c.001 18.094 14.669 32.765 32.765 32.765z" transform="translate(6 2)" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"></path>
                            </g>
                        </svg>
    
    
                    </div>
                    <h1><span>Car</span>Wash</h1>
                </div>
            </a>
        </div>
        <div class="formWrapper">
            <div class="formHeader">
                <div class="logo">
                <svg height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m61 32a29.018 29.018 0 1 1 -9-20.99 29 29 0 0 1 9 20.99z" fill="#394d5c"/><path d="m50 32a17.434 17.434 0 0 1 -.26 3 17.674 17.674 0 0 1 -2.98 7.28 17.348 17.348 0 0 1 -4.48 4.48 17.674 17.674 0 0 1 -7.28 2.98 17.438 17.438 0 0 1 -6 0 17.674 17.674 0 0 1 -7.28-2.98 17.348 17.348 0 0 1 -4.48-4.48 17.674 17.674 0 0 1 -2.98-7.28 17.438 17.438 0 0 1 0-6 17.674 17.674 0 0 1 2.98-7.28 17.348 17.348 0 0 1 4.48-4.48 17.674 17.674 0 0 1 7.28-2.98 17.438 17.438 0 0 1 6 0 17.674 17.674 0 0 1 7.28 2.98 17.348 17.348 0 0 1 4.48 4.48 17.674 17.674 0 0 1 2.98 7.28 17.434 17.434 0 0 1 .26 3z" fill="#aabece"/><path d="m32 57v-2a22.867 22.867 0 0 0 8.578-1.653l.746 1.856a24.851 24.851 0 0 1 -9.324 1.797z" fill="#7d8d9c"/><path d="m43.53 54.188-.924-1.774c.636-.331 1.267-.7 1.875-1.092l1.086 1.678c-.661.429-1.346.829-2.037 1.188z" fill="#7d8d9c"/><path d="m49.74 35h-10.26l7.28 7.28a17.348 17.348 0 0 1 -4.48 4.48l-7.28-7.28v10.26a17.438 17.438 0 0 1 -6 0v-10.26l-7.28 7.28a17.348 17.348 0 0 1 -4.48-4.48l7.28-7.28h-10.26a17.438 17.438 0 0 1 0-6h10.26l-7.28-7.28a17.348 17.348 0 0 1 4.48-4.48l7.28 7.28v-10.26a17.438 17.438 0 0 1 6 0v10.26l7.28-7.28a17.348 17.348 0 0 1 4.48 4.48l-7.28 7.28h10.26a17.438 17.438 0 0 1 0 6z" fill="#f4f4e6"/><path d="m31 34h2v4h-2z" fill="#aabece"/><g fill="#87cee9"><path d="m52 11.01v11.99a2 2 0 0 1 -4 0v-11a2 2 0 0 0 -4 0v6a2 2 0 0 1 -4 0v-7a2 2 0 0 0 -4 0 2 2 0 0 1 -4 0v-8a28.853 28.853 0 0 1 20 8.01z"/><path d="m14 4a2.992 2.992 0 0 1 2.53 1.4 2.97 2.97 0 0 1 1.47-.4 2.988 2.988 0 0 1 1.959 5.255 2 2 0 1 1 -2.636.661 2.994 2.994 0 0 1 -1.853-1.316 2.97 2.97 0 0 1 -1.47.4 3 3 0 0 1 0-6z"/><circle cx="58" cy="6" r="3"/><circle cx="12" cy="20" r="3"/></g><path d="m31 26h2v4h-2z" fill="#aabece"/><path d="m34 31h4v2h-4z" fill="#aabece"/><path d="m26 31h4v2h-4z" fill="#aabece"/><circle cx="32" cy="32" fill="#394d5c" r="3"/></svg>
                </div>
                <div class="title">
                    <h1>LOGIN</h1>
                </div>
            </div>
            <form class="form" method="POST" action="<?= $_SERVER["PHP_SELF"] ?>">
                <div class="fullName">
                    <label class="label">
                        <input class="input" type="text" name="l_username" value="">
                        <span class="border"></span>
                        <span class="text">Username</span>
                        <span class="error" data-error="l_username"></span>
                    </label>

                </div>
                <div class="info">
                    <label class="label">
                        <input data-check="l_password" class="input" type="password" name="l_password" value="">
                        <span class="border"></span>
                        <span class="text">Password</span>
                        <span class="error" data-error="l_password"></span>
                    </label>
            
                </div>
                
                <input type="hidden" name="token" value="">
                    <label class="sLabel">
                        <span class="error errorB" data-error="error3"><?php if(isset($message)) echo $message ?></span>
                    </label>
                <div class="info">
                    <div class="login">
                        <button type="submit" name="l_login" class="log">LOG IN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>





<script src="./script/script.js" async></script>



    
</body>
</html>