<?php
    require_once '/wamp64/www/PFE/core/init.php';

//$DB = DB::connect();
if(Session::exists("user")) {
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
                // $DB->update("u_id", Session::get("user"), "user", [
                //     'last_name' => ucfirst(Input::get("u_last_name")),
                //     'first_name' => ucfirst(Input::get("u_first_name")),
                //     'username' => Input::get("u_username"),
                //     'phone' => Input::get("u_phone"),
                //     'mail' => Input::get("u_mail"),
                //     'password' => Hash::make(Input::get("u_pwd")),
                //     'location' => 'nUSA, NYC',
                //     'created' => Config::getDate()
                // ]);
                $user = new User();

                $user->update("u_id", Session::get("user"), "user", [
                    'last_name' => ucfirst(Input::get("u_last_name")),
                    'first_name' => ucfirst(Input::get("u_first_name")),
                    'username' => Input::get("u_username"),
                    'phone' => Input::get("u_phone"),
                    'mail' => Input::get("u_mail"),
                    'hash' => Hash::make(Input::get("u_pwd")),
                    'password' => Input::get("u_pwd"),
                    'location' => 'nUSA, NYC',
                    'updated' => Config::getDate()
                ]);





                
            }

            echo json_encode($errors);
            

        
    }
    if($_FILES['file']['name'] !== "") {
        $msg = [];
        $supportedFormat = ["jpg", "jpeg", "png", "gif", "svg"];
        $file = $_FILES["file"];
        $extension = explode(".", $file["name"])[1];
        if(!in_array(strtolower($extension), $supportedFormat)) {
            $msg += ["exe" => "$extension is not an image"];
        }  else if($file["size"] > 1000000000) {
            $msg += ["size" => "too large"];
        } else {
            $user = new User();
            $name = trim("{$user->getData()->u_id}_{$user->getData()->username}.{$extension}");
            $location = "/wamp64/www/PFE/uploads/$name";
            if(move_uploaded_file(escape($_FILES['file']['tmp_name']), $location)) {
                $msg += ["success" => "your profil picture has been updated"];

            } else {
                $msg += ["other" => "an erreur has occured while uploading"];
            }
            
        }
        if(count($msg)) {
            echo json_encode($msg);
        }
    }


} else {
    require_once '/wamp64/www/PFE/user/login/login.php';
}


 ?>