<?php
require_once '/wamp64/www/PFE/core/init.php';
//error_reporting(0);
//$DB = DB::connect();
if (Session::exists("user")) {
    if (Input::exists()) {
        $user = new User();

        $validate = new Validate();
        $validate->check('post', [
            "u_last_name" => ["min" => 2, "max" => 15, "name" => "last name"],
            "u_first_name" => ["min" => 2, "max" => 15, "name" => "first name"],
            "u_username" => ["min" => 2, "max" => 20, "update" => $user->getData()->u_id, "name" => "username"],
            "u_phone" => ["regexp" => "/^0(6|7)-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}$/", "name" => "phone number"],
            "u_mail" => ["mail" => true, "name" => "mail"],
            "u_pwd" => ["min" => 8, "name" => "password"]
        ]);
        if (!$validate->isValid()) {
            $errors = $validate->getErrors();
        } else {
            $errors = ["ok" => "les info on ete mis a jour"];
            $errors += ["username" => $user->getData()->username];

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


    if (isset($_FILES['file'])) {
        if ($_FILES['file']['name'] != "") {
            $msg = [];
            $supportedFormat = ["jpg", "jpeg", "png", "gif", "svg"];
            $file = $_FILES["file"];
            $test = explode(".", $file["name"]);
            $extension = end($test);



            // if(!in_array(strtolower($extension), $supportedFormat)) {
            //     $msg += ["exe" => "file format is not supported"];
            // }  else if($file["size"] > 5392158) {
            //     $msg += ["size" => "file size must be < 5MB"];
            // } else {
            //     $user = new User(); 
            //     $id = uniqid();
            //     $name = trim("{$user->getData()->username}_{$id}.{$extension}");
            //     $location = "/wamp64/www/PFE/uploads/$name";
            //     if(move_uploaded_file(escape($_FILES['file']['tmp_name']), $location)) {
            //         $msg += ["success" => "your profil picture has been updated"];
            //         $msg += ["location" => "/PFE/uploads/$name"];
            //         $user->update("u_id", Session::get("user"), "user", [
            //             'img' => $name
            //         ]);

            //     } else {
            //         $msg += ["other" => "an error has occured while uploading"];
            //     }

            // }

            if (in_array(strtolower($extension), $supportedFormat)) {
                if ($file['error'] === 0) {
                    if ($file['size'] < 5392158) {
                        $user = new User();
                        $id = uniqid();
                        $name = trim("{$user->getData()->username}_{$id}.{$extension}");
                        $location = "/wamp64/www/PFE/uploads/$name";
                        if (move_uploaded_file(escape($_FILES['file']['tmp_name']), $location)) {
                            $msg += ["success" => "your profil picture has been updated"];
                            $msg += ["location" => "/PFE/uploads/$name"];
                            $user ->update("u_id", Session::get("user"), "user", [
                                'img' => $name
                            ]);
                        }
                    } else {
                        $msg += ["size" => "image size must be less than 5MB"];
                    }
                } else {
                    $msg += ["other" => "an error has occured while uploading"];
                }
            } else {
                $msg += ["exe" => "image format is not supported"];
            }

            if (count($msg)) {
                echo json_encode($msg);
            }
        }
    }


} else {
    require_once '/wamp64/www/PFE/user/login/login.php';
}


?>