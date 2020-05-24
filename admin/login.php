<?php
require_once '/wamp64/www/PFE/core/init.php';
require_once '/wamp64/www/PFE/admin/login.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
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
                 <svg id="Layer_3" enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m33 52h23c3.314 0 6-2.686 6-6v-14.797c0-2.523-1.578-4.777-3.95-5.639l-15.386-5.595c-1.687-.613-3.01-1.949-3.607-3.642l-3.644-10.324c-.847-2.399-3.114-4.003-5.658-4.003h-17.755c-3.314 0-6 2.686-6 6v21" fill="#4d5d7a"/><path d="m32 48h23c1.657 0 3-1.343 3-3v-12.838c0-1.291-.826-2.438-2.051-2.846l-17.557-5.852c-.878-.293-1.572-.975-1.88-1.848l-4.806-13.614c-.423-1.2-1.557-2.002-2.829-2.002h-15.877c-1.657 0-3 1.343-3 3v22" fill="#8892a0"/><g fill="#4d5d7a"><path d="m13 6h2v12h-2z"/><path d="m13 22h2v10h-2z"/><path d="m19 6h2v7h-2z"/><path d="m19 17h2v16h-2z"/><path d="m25 6h2v16h-2z"/><path d="m25 26h2v5h-2z"/><path d="m31 14h2v15h-2z"/><path d="m37 25h2v3h-2z"/><path d="m37 39h2v9h-2z"/><path d="m43 35h2v13h-2z"/><path d="m43 25h2v6h-2z"/><path d="m49 27h2v11h-2z"/><path d="m49 42h2v6h-2z"/></g><path d="m11 60.067c-.395.219-.782.454-1.16.706l-.68.453c-.756.505-1.645.774-2.554.774-2.544 0-4.606-2.062-4.606-4.606 0-.909.269-1.798.774-2.555l.73-1.096c1.627-2.44 2.496-5.309 2.496-8.243 0-2.934-.869-5.803-2.496-8.244l-.73-1.096c-.505-.756-.774-1.645-.774-2.554 0-2.544 2.062-4.606 4.606-4.606.909 0 1.798.269 2.555.774l.68.453c2.711 1.808 5.899 2.773 9.159 2.773 3.26 0 6.448-.965 9.16-2.773l.68-.453c.756-.505 1.645-.774 2.554-.774 2.544 0 4.606 2.062 4.606 4.606 0 .909-.269 1.798-.773 2.555l-.73 1.096c-1.628 2.44-2.497 5.309-2.497 8.243 0 2.934.869 5.803 2.496 8.244l.73 1.096c.505.756.774 1.645.774 2.554 0 2.544-2.062 4.606-4.606 4.606-.909 0-1.798-.269-2.555-.773l-.68-.453c-1.427-.951-2.985-1.669-4.617-2.136" fill="#f5cf88"/><path d="m28.16 30.227.68-.453c.756-.505 1.645-.774 2.554-.774 2.544 0 4.606 2.062 4.606 4.606 0 .909-.269 1.798-.773 2.555l-.73 1.096c-1.628 2.44-2.497 5.309-2.497 8.243s.869 5.803 2.496 8.244l.159.239c-13.139-.345-23.655-8.709-23.655-18.983 0-1.307.171-2.583.495-3.816 2.317 1.183 4.885 1.816 7.505 1.816 3.26 0 6.448-.965 9.16-2.773z" fill="#fadfb2"/><path d="m11 62v-4l-2-2v-11c0-1.105.895-2 2-2 1.105 0 2 .895 2 2v-4c0-1.105.895-2 2-2 1.105 0 2 .895 2 2v-2c0-1.105.895-2 2-2 1.105 0 2 .895 2 2v2c0-1.105.895-2 2-2 1.105 0 2 .895 2 2v10c0-1.105.895-2 2-2 1.105 0 2 .895 2 2v4l-6 4v3" fill="#efbe9a"/><path d="m24 51h2v2h-2z" fill="#db9b7c"/><path d="m20 41h2v7h-2z" fill="#db9b7c"/><path d="m16 41h2v7h-2z" fill="#db9b7c"/><path d="m12 45h2v3h-2z" fill="#db9b7c"/></svg>
                </div>
                <div class="title">
                    <h1>LOGIN</h1>
                </div>
            </div>
            <form class="form" method="POST" action=<?php echo escape($_SERVER["PHP_SELF"]);?> >
                <div class="fullName">
                    <label class="label">
                        <input data-check="a_username" class="input" type="text" name="a_username" value="">
                        <span class="border"></span>
                        <span class="text">Username</span>
                        <span class="error" data-error="a_username"></span>
                    </label>

                </div>
                <div class="info">
                    <label class="label">
                        <input data-check="a_pwd" class="input" type="password" name="a_pwd" value="">
                        <span class="border"></span>
                        <span class="text">Password</span>
                        <span class="error" data-error="a_pwd"></span>
                    </label>
                </div>
                <div class="info infoE">
                <span class="gene"></span>
</div>
                <div class="info">
                    <div class="login">
                        <button type="submit" name="a_login" class="log">LOG IN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>









    <script src="./script.js"></script>
</body>
</html>