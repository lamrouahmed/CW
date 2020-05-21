<?php 
  require_once '/wamp64/www/PFE/core/init.php';

  
    $user = new User();
    if($user->isLoggedIn()) {
      

       if(Input::exists()) {
          

        $demande = new Demande();

                      $demande->create("demande", [
                               "u_id" => 1,
                               "prix" => 300*Input::get("nombre"),
                               "status" => ("Non terminée"),
                               "localisation" => "googlemaps.com",
                               "date_demande" => Config::getDate()
  
        ]); 

        $lavage = new Lavage();
   
                      $lavage->create("lavage", [
                               "type_lavage" => "Lavage Complet",
                               "type" => Input::get("type_vehicule"),
                               "nb_vehicule" => Input::get("nombre"),
                               "prix" => 300*Input::get("nombre")
  
        ]);

                      Redirect::to('/PFE/catalogue/success/success.html');

        }




   }    
         else {
          Redirect::to('/PFE/user/login/login.php');
         }




 ?>