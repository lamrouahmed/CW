<?php
require_once '/wamp64/www/PFE/core/init.php';
require_once '/wamp64/www/PFE/modules/vendor/autoload.php';
if(Session::exists('user')) {
    if(Input::exists()) {
        $user = new User();
        $id = Input::get('id');
        $facture = $user->getFacture($id);
        $mpdf = new \Mpdf\Mpdf(['default_font' => 'montserrat']);
        $mpdf->SetDisplayMode('fullpage');
        $html = '
                    <div style="width:100%; background-color:#1a1f22; text-align:center">
                        <h1 style="color:white; width:100%; text-align:center;">Car<b>Wash</b></h1>
                    </div>
                ';
        
    
    
    
    

        $mpdf->WriteHTML($html);
    
        $output = $mpdf->Output('facture.pdf', 'I');
        
    }

} else {
    Redirect::to('/PFE');
}