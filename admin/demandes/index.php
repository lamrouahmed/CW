<?php
require_once '/wamp64/www/PFE/core/init.php';
require_once '/wamp64/www/PFE/admin/sideBar/sideBar.html';
$demande = new Demande();
$demandes = $demande->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="demandeWrapper">
    <?php
        if($demandes->count()) {
            foreach($demandes->results() as $result) {
                ?>

                <div class="demande">
                    <div class="top">
                        <div class="id">
                            <p><?php echo $result->demande_id?></p>
                        </div>
                        <div class="user">
                        <div class="img">
                            <img src="/PFE/uploads/<?php echo $result->img?>">
                        </div>
                        <div class="username">
                            <p><?php echo $result->username?></p>
                        </div>
                        </div>
                    </div>
                    <div class="mid">
                        <div class="demandeInfo">
                            <div class="lavage">
                                <p><span>Type lavage:</span> <?php echo $result->type_lavage?></p>
                            </div>
                            <div class="vehicule">
                                <p><span>Type de vehicule:</span> <?php echo $result->type_vehicule?></p>
                            </div>
                            <div class="nbVehicule">
                                <p><span>Nombre de vehicule:</span> <?php echo $result->nb_vehicules?></p>
                            </div>
                            <div class="prix">
                                <img src="./img/money.svg">
                                <p><span>Prix:</span> <?php echo $result->prix * $result->nb_vehicules?> M.A.D</p>
                            </div>
                            <div class="localisation">
                                <img src="./img/place.svg"/>
                                <p><span>Localisation:</span> <?php echo $result->localisation?></p>
                            </div>
                            <div class="dateLivraison">
                                <img src="./img/fast.svg">
                                <p><span>Date de livraison:</span> <?php echo $result->date_demande?></p>
                            </div>
                            <div class="dateDemande">
                                <img src="./img/clock.svg">
                                <p><span>Date de demande:</span> <?php echo $result->date_ajout?></p>
                            </div>
                        </div>
                    </div>
                    <div class="bottom"></div>
                </div>

<?php
        }
    }
?>
    </div>

        
    
</body>
</html>




