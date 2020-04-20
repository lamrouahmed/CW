<?php
require_once '/wamp64/www/PFE/core/init.php';

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validate->check('post', [
            "u_username" => ["name" => "username"],
            "u_password" => ["name" => "password"]
        ]);
        $user = new User();

        if($validate->isValid() && $user->login(Input::get("u_username"), Input::get("u_password"))) {
            echo "valid";
        } else {
            if($validate->isValid()) {
                $validate->setError("incorrect username or password", "u_error");
            }
            
            $errors = $validate->getErrors();
        }


        // if($validate->isValid()) {
        //     if($user->login(Input::get("u_username"), Input::get("u_password"))) {
        //         echo "valid";
        //     }
        //     $validate->setError("incorrect username or password", "u_error");
        //     $errors = $validate->getErrors();

        // }

    }
}

