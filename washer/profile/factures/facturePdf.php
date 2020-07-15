<?php
require_once '/wamp64/www/PFE/core/init.php';
require_once '/wamp64/www/PFE/modules/vendor/autoload.php';
if(Session::exists('user')) {
    if(Input::exists()) {
        $user = new User();
        $id = Input::get('id');
        $facture = $user->getFacture($id)->results()[0];
        $nomComplet = $user->getData()->last_name. " " .$user->getData()->first_name;
        $localisation = $facture->localisation;
        $typeLavage = $facture->type_lavage;
        $typeVehicule = $facture->type_vehicule;
        $nbVehicules = $facture->nb_vehicules;
        $prix = $nbVehicules * $facture->prix;
        $mpdf = new \Mpdf\Mpdf(['default_font' => 'montserrat']);
        $mpdf->SetDisplayMode('fullpage');
        $html = "
                    <div style='width:100%; background-color:#1a1f22; text-align:center; height: 60px; padding-top:1px;'>
                        <h1 style='color:white; width:100%; text-align:center; font-size: 40px;'>Car<b>Wash</b></h1>
                    </div>
                    <div>
                        <p style='height: 50px;'><span style='font-size:23px;'><b style='font-size: 25px;'>Nom complet</b>: $nomComplet</span></p>
                        <p style='height: 50px;'><span style='font-size:23px;'><b style='font-size: 25px;'>Localisation</b>: $localisation</span></p>
                        <p style='height: 50px;'><span style='font-size:23px;'><b style='font-size: 25px;'>Type lavage</b>: $typeLavage</span></p>
                        <p style='height: 50px;'><span style='font-size:23px;'><b style='font-size: 25px;'>Type vehicule</b>: $typeVehicule</span></p>
                        <p style='height: 50px;'><span style='font-size:23px;'><b style='font-size: 25px;'>Nombre de vehicule</b>: $nomComplet</span></p>
                        <p style='height: 50px; float:right; margin-left:350px;'><span style='font-size:50px;'><b style='font-size: 25px;'>Prix totale:</b> $prix <span style='font-size: 30px'><b>M.A.D</b></span></span></pan>
                    </div>
                ";

                
        
    
    
    
    

        $mpdf->WriteHTML($html);
    
        $output = $mpdf->Output('facture.pdf', 'I');
        
    }

} else {
    Redirect::to('/PFE');
}