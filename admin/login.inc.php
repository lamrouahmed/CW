<?php
    require_once '/wamp64/www/PFE/core/init.php';


if(!Session::exists("admin")) {
    if(Input::exists()) {
        $validate = new Validate();
        $validate->check("POST", [
            "a_username" => ["name" => "username"],
            "a_pwd" => ["name" => "password"]
        ]);
        $admin = new Admin();
        if($validate->isValid() && $admin->login(Input::get("a_username"), Input::get("a_pwd"))) {
            Redirect::to('/PFE/admin');
        } else {
            if($validate->isValid()) {
                $validate->setError("incorrect username or password", "u_error");
            }
            
            $errors = $validate->getErrors();
        }
    }
} else {
    Redirect::to("/PFE/admin");
}