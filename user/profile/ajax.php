<?php
    require_once '/wamp64/www/PFE/core/init.php';


    if(Input::exists()) {
        
        $validate = new Validate();
        $validate->check('post', [
            "u_last_name" => ["min" => 2, "max" => 15, "name" => "last name"],
            "u_first_name" => ["min" => 2, "max" => 15, "name" => "first name"],
            "u_username" => ["min" => 2, "max" => 20,"unique" => "user", "name" => "username"],
            "u_phone" => ["regexp" => "/^0(6|7)-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}$/", "name" => "phone number"],
            "u_mail" => ["mail" => true, "name" => "mail"],
            "u_pwd" => ["min" => 8, "name" => "password"]
        ]);

        $errors = $validate->getErrors();


        echo json_encode($errors);
    }
 ?>