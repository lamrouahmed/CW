<?php
    require_once '/wamp64/www/PFE/core/init.php';

$alerts = [];

if(!Session::exists("admin")) {
    if(Input::exists()) {
        $validate = new Validate();
        $validate->check("POST", [
            "a_username" => ["name" => "username"],
            "a_pwd" => ["name" => "password"]
        ]);
        $admin = new Admin();
        if($validate->isValid() && $admin->login(Input::get("a_username"), Input::get("a_pwd"))) {
            $alerts = json_encode(["ok" => "passed"]);
        } else {
            if($validate->isValid()) {
                $validate->setError("mot de passe ou username incorrecte", "u_error");
            }
            
            $alerts = json_encode($validate->getErrors());
           
        }

        echo $alerts;

    }


} else {
    Redirect::to("/PFE/admin");
}

