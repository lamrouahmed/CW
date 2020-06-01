<?php
    require_once '/wamp64/www/PFE/core/init.php';

  if(Session::exists('user')) {
    if(Input::exists()) {
        $alerts = [];
        $validate = new Validate();
        $validate->check('POST', [
            "date" => ["name" => "date"],
            "time" => ["name" => "heure"],
            "localisation" => ["name" => "localisation", "exists" => Input::get('vehicule')]
        ]);
      

        if($validate->isValid()) {
            $alerts += ["ok" => "passed"];
            $demande = new Demande();
            $lavage = new Lavage();
            $user = new User();
            $demande->create([
                "u_id" => $user->getData()->u_id,
                "lavage_id" => $lavage->getLavage(Input::get('lavage'))->results()[0]->lavage_id,
                "nb_vehicules" => Input::get('quantite'),
                "type_vehicule" => Input::get('vehicule'),
                "status_demande" => "N",
                "localisation" => Input::get('localisation'),
                "date_demande" => Input::get('date').' '.Input::get('time'),
                "date_ajout" => Config::getDate()
            ]);
        //     $user->create("user", ["last_name" => ucfirst(Input::get("u_last_name")),
        //                        "first_name" => ucfirst(Input::get("u_first_name")),
        //                        "username" => Input::get("u_username"),
        //                        "phone" => Input::get("u_phone"),
        //                        "mail" => Input::get("u_mail"),
        //                        "hash" => Hash::make(Input::get("u_pwd")),
        //                        "password" => Input::get("u_pwd"),
        //                        "location" => "googlemaps.com",
        //                        "created" => Config::getDate(),
        //                        "updated" => Config::getDate(),
        //                        "img" => "user.svg",
        //                        "status" => "online"
  
        // ]);
        




        }
        $alerts += $validate->getErrors();
        echo json_encode($alerts);
    }
  } else {
      Redirect::to('/PFE/user/login/login.php');
  }






