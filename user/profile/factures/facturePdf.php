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
                    <div style="width:100%; background-color:#1a1f22; text-align:center">
                        <p style="color:white; width:100%; text-align:center">Car<b>Wash</b></p>
                    </div>
                ';
        
    
    
    
    

        $a->WriteHTML($html);
    
        $output = $a->Output('facture.pdf', 'I');
        
    }

} else {
    Redirect::to('/PFE');
}