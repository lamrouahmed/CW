<?php
require_once '/wamp64/www/PFE/core/init.php';

if(Session::exists('user')) {
    $demandes = new Demande();

        foreach ($demandes->getDemandesY()->results() as $demande) {
        
    ?>

    <a href="/PFE/user/profile/demandes/demandes.php#<?php echo $demande->demande_id?>">
        <div class="Alert">
            <div class="image">
                <img src="./img/<?php echo $demande->type_vehicule?>.svg" alt="">
            </div>
            <div class="txt">
                <p class="inf">Demande <?php echo $demande->demande_id?> est acceptée</p>
                <p class="time"><?php echo explode(' ', $demande->date_maj)[1]?></p>
            </div>
        </div>
    </a>

    <?php
        }
        }
    ?>
