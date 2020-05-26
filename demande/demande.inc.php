<?php 
  require_once '/wamp64/www/PFE/core/init.php';
$boi = 'bi';
  $type = Input::get('type');
    $user = new User();
    if($user->isLoggedIn()) {
      

       if(Input::exists()) {
        $lavage = new Lavage();
        $demande = new Demande();
          if($lavage->getLavage($type)->count() && Input::get("submit")) {
            $demande->create("demande", [
              "u_id" => $user->getData()->u_id,
              "lavage_id" => $lavage->getLavage(ucfirst($type))->results()[0]->lavage_id,
              "status" => "Non terminée",
              "localisation" => "googlemaps.com",
              "date_demande" => Config::getDate(),
              "nb_vehicules" => Input::get("nombre")

]); 
          }







        }




   }    
         else {
          Redirect::to('/PFE/user/login/login.php');
         }




 ?>