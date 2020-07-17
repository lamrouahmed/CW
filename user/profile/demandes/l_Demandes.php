<?php
require_once '/wamp64/www/PFE/core/init.php';

if (Session::exists("user"))
{   
    $alerts = [];
    $user = new User();
    $demandes = $user->getDemandes()
        ->results();
        
        
            $demandes = $user->getDemandes()
        ->results();
        
        
    foreach ($demandes as $demande)
    {

?>
                    <div class="demande <?php echo $demande->status_demande ?>" id="d_<?php echo $demande->demande_id?>" data-url="<?php echo $demande->demande_id?>">
                        <div class="demande_1">
                            <div class="demande_id">
                                <p><?php echo $demande->demande_id ?></p>
                            </div>
                            <div class="vehicule">
                                <img src="./img/<?php echo $demande->type_vehicule ?>.svg" alt="">
                            </div>
                            <div class="demandeInfo">
                                <div class="lavage">
                                    <p>Lavage <span><?php echo $demande->type_lavage ?></span></p>
                                </div>
                                <div class="nbVehicule">
                                    <p><span><?php echo $demande->nb_vehicules ?> </span>
                                        <?php echo $demande->type_vehicule ?>(s)</p>
                                </div>
                                <div class="localisation">
                                    <p><?php echo $demande->localisation ?></p>
                                </div>
                            </div>


                        </div>
                        <div class="demande_2">
                            <div class="payment">
                                <div class="img">
                                    <img src="./img/pay.svg" alt="">
                                </div>
                            </div>
                            <div class="price">
                                <p><?php echo $demande->prix * $demande->nb_vehicules ?><span>M.A.D</span></p>
                            </div>
                            <div class="btns">







                                <?php
        if ($demande->status_demande === "N")
        {
?>
                                <div class="delete" data-action="delete" data-id="<?php echo $demande->demande_id?>">
                                    <svg id="Capa_1" enable-background="new 0 0 515.556 515.556" height="512"
                                        viewBox="0 0 515.556 515.556" width="512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m64.444 451.111c0 35.526 28.902 64.444 64.444 64.444h257.778c35.542 0 64.444-28.918 64.444-64.444v-322.222h-386.666z"></path>
                                        <path
                                            d="m322.222 32.222v-32.222h-128.889v32.222h-161.111v64.444h451.111v-64.444z"></path>
                                    </svg>
                                </div>


                                <?php
        }
        else if ($demande->status_demande === "Y")
        {
?>

                                <div class="pay" data-action="pay" data-class="D"
                                    data-id="<?php echo $demande->demande_id?>">
                                    <svg id="Layer_1" enable-background="new 0 0 511.334 511.334" height="512"
                                        viewBox="0 0 511.334 511.334" width="512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m0 224.667v132.333c0 38.108 30.892 69 69 69h373.334c38.108 0 69-30.892 69-69v-132.333c0-6.627-5.373-12-12-12h-487.334c-6.627 0-12 5.373-12 12zm127.667 84h-32c-11.598 0-21-9.402-21-21s9.402-21 21-21h32c11.598 0 21 9.402 21 21s-9.402 21-21 21z"></path>
                                        <path
                                            d="m511.334 158.667v-4.333c0-38.108-30.892-69-69-69h-373.334c-38.108 0-69 30.892-69 69v4.333c0 6.627 5.373 12 12 12h487.334c6.627 0 12-5.373 12-12z"></path>
                                    </svg>
                                </div>

                                <div class="delete" data-action="delete" data-id="<?php echo $demande->demande_id?>">
                                    <svg id="Capa_1" enable-background="new 0 0 515.556 515.556" height="512"
                                        viewBox="0 0 515.556 515.556" width="512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m64.444 451.111c0 35.526 28.902 64.444 64.444 64.444h257.778c35.542 0 64.444-28.918 64.444-64.444v-322.222h-386.666z"></path>
                                        <path
                                            d="m322.222 32.222v-32.222h-128.889v32.222h-161.111v64.444h451.111v-64.444z"></path>
                                    </svg>
                                </div>

                                <?php
        }
        else if ($demande->status_demande === "Pending")
        {

?>
                                <div class="cancel" data-action="cancel" data-class="P"
                                    data-id="<?php echo $demande->demande_id?>">
                                    <svg height="365.696pt" viewBox="0 0 365.696 365.696" width="365.696pt"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0"></path>
                                    </svg>
                                </div>
                                <?php
        }
        else if ($demande->status_demande === "Paid")
        {
?>
                                  <div class="delete" data-action="delete" data-id="<?php echo $demande->demande_id?>">
                                    <svg id="Capa_1" enable-background="new 0 0 515.556 515.556" height="512"
                                        viewBox="0 0 515.556 515.556" width="512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m64.444 451.111c0 35.526 28.902 64.444 64.444 64.444h257.778c35.542 0 64.444-28.918 64.444-64.444v-322.222h-386.666z"></path>
                                        <path
                                            d="m322.222 32.222v-32.222h-128.889v32.222h-161.111v64.444h451.111v-64.444z"></path>
                                    </svg>
                                </div>

                                <?php
        } else if($demande->status_demande === "Canceled") 
        {
?>
                                <div class="delete" data-action="delete" data-id="<?php echo $demande->demande_id?>">
                                    <svg id="Capa_1" enable-background="new 0 0 515.556 515.556" height="512"
                                        viewBox="0 0 515.556 515.556" width="512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m64.444 451.111c0 35.526 28.902 64.444 64.444 64.444h257.778c35.542 0 64.444-28.918 64.444-64.444v-322.222h-386.666z"></path>
                                        <path
                                            d="m322.222 32.222v-32.222h-128.889v32.222h-161.111v64.444h451.111v-64.444z"></path>
                                    </svg>
                                </div>
                                <?php }?>
                            </div>
                        </div>

                        <div class="date">
                            <p><?php echo $demande->date_ajout ?></p>
                        </div>
                    </div>


                    <?php
    } 

?>



<?php
}

?>