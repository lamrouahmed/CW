<?php
    require_once '/wamp64/www/PFE/core/init.php';

    if(Input::exists()) {
    	$validate = new Validate();
        $validate->check('POST', [
            "lavages" => ["name" => "lavages", "lavages" => Input::get('lavages')],
            "demandes" => ["name" => "demandes", "demandes" => Input::get('demandes')]
        ]);


        if($validate->isValid()) {
            $demande = new Demande();
            $lavage = new Washer();
            $id = $demande->getDemandes(Input::get('demandes'))->results()[0]->demande_id;
            $demande->forward($id, [
                "lavage_mobile_id" => $lavage->getWasher(Input::get('lavages'))->results()[0]->lavage_id
            ]);
        }
    }

    ?>