<?php
require_once '/wamp64/www/PFE/core/init.php';

if (Session::exists("user")) {
    if (Input::exists()) {
        $alerts = [];
        $user = new User();
        $validate = new Validate();
        $validate->check("POST", [
            "u_last_name" => ["name" => "last name"],
            "u_card_number" => ["name" => "card number", "credit_card" => Input::get('u_card_number')],
            "u_expiration" => ["name" => "expiration date", "expiry" => Input::get('u_expiration')],
            "u_cvv" => ["name" => "cvv", "cvv" => Input::get('u_cvv')]
        ]);

        if($validate->isValid()) {
            $facture = new Facture();
            $facture->create(
                [
                    "demande_id" => Session::get('pay'),
                    "date_paiement" => Config::getDate()
                ]
            );
            $alerts = json_encode(["ok" => "passed"]);
            Session::delete('pay');
        } else {
            $alerts = json_encode($validate->getErrors());
        }

        echo $alerts;
    }
}