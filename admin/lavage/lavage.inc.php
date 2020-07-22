<?php
    require_once '/wamp64/www/PFE/core/init.php';


    if(Session::exists(('admin'))) {
    if(Input::exists()) {
        if(Input::get('submit')){
        $id = Input::get('demandes');
        $l = new LavageMobile(Session::get('username'));
        $lav = $l->getLavageMobile(Input::get("lavages"))->results()[0]->lavage_id;
        $l->addDemande($lav, $id);
        $demande = new Demande();
        $demande->forward($id, [
            "lavage_mobile_id" => $lav 
        ]);

    }
  }
    
            
    

    } else {
    Redirect::to("/PFE/admin/login.php");
}


    

    ?>