<?php
    require_once '/wamp64/www/PFE/core/init.php';
$user = new User();

$DB = DB::connect();
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
            if(!$validate->isValid()) {
                $errors = $validate->getErrors();
            } else {
                $errors = ["ok" => "les info on ete mis a jour"];
                $DB->update("u_id", Session::get("user"), "user", [
                    'last_name' => ucfirst(Input::get("u_last_name")),
                    'first_name' => ucfirst(Input::get("u_first_name")),
                    'username' => Input::get("u_username"),
                    'phone' => Input::get("u_phone"),
                    'mail' => Input::get("u_mail"),
                    'password' => Hash::make(Input::get("u_pwd")),
                    'location' => 'nUSA, NYC',
                    'created' => Config::getDate()
                ]);





                
            }

            echo json_encode($errors);


        
    }


 ?>