<?php
require_once '/wamp64/www/PFE/core/init.php';
require_once '/wamp64/www/PFE/modules/vendor/autoload.php';
if(Session::exists('user')) {
    if(Input::exists()) {
        $user = new User();
        $id = Input::get('id');
        $facture = $user->getFacture($id);
        $a = new \Mpdf\Mpdf();
        $html = '
                <p>Car Wash</p>
                <p>username'. $user->getData()->last_name .'</p>'
        ;
    
    
    
    
    
        $a->WriteHTML($html);
    
        $output = $a->Output('facture.pdf', 'I');
        
    }

} else {
    Redirect::to('/PFE');
}