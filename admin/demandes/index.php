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
    <div class="Wrapper">
    <div class="header">
            <div class="id">#</div>
            <div class="username">username</div>
            <div class="type_lavage">Type lavage</div>
            <div class="type_vehicule">Type vehicule</div>
            <div class="nb_vehicules">Nombre vehicule</div>
            <div class="date_demande">Date de demande</div>
            <div class="prix">Prix</div>
            <div class="action">action</div>
    </div>
    <div class="demandeWrapper">
    <?php
        if($demandes->count()) {
            foreach($demandes->results() as $result){
               ?>
    <div class="demande">
            <div class="img">
                <img src="../../uploads/<?php echo $result->img?>">
                <div class="status <?php echo $result->status?>"></div>
            </div>
            <div class="id">
                <p><?php echo $result->u_id?></p>
            </div>
            <div class="username">
                <p><?php echo $result->username?></p>
            </div>
            <div class="lavage">
                <p><?php echo $result->type_lavage?></p>
            </div>
            <div class="vehicule">
                <p><?php echo $result->type_vehicule?></p>
            </div>
            <div class="nbVehicule">
                <p><?php echo $result->nb_vehicules?></p>
            </div>
            <div class="dateDemande">
                <p><?php echo $result->date_demande?></p>
            </div>
            <div class="prix">
                <p><?php echo $result->prix?> M.A.D</p>
            </div>
            <div class="btns">
                <div class="accepter" data-action="accept">
                <svg height="417pt" viewBox="0 -46 417.81333 417" width="417pt" xmlns="http://www.w3.org/2000/svg"><path d="m159.988281 318.582031c-3.988281 4.011719-9.429687 6.25-15.082031 6.25s-11.09375-2.238281-15.082031-6.25l-120.449219-120.46875c-12.5-12.5-12.5-32.769531 0-45.246093l15.082031-15.085938c12.503907-12.5 32.75-12.5 45.25 0l75.199219 75.203125 203.199219-203.203125c12.503906-12.5 32.769531-12.5 45.25 0l15.082031 15.085938c12.5 12.5 12.5 32.765624 0 45.246093zm0 0" fill="#2196f3"/></svg>
                </div>
                <div class="refuser" data-action="refuse">
                <svg height="365pt" viewBox="0 0 365.71733 365" width="365pt" xmlns="http://www.w3.org/2000/svg"><g fill="#f44336"><path d="m356.339844 296.347656-286.613282-286.613281c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503906-12.5 32.769532 0 45.25l286.613281 286.613282c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082032c12.523438-12.480468 12.523438-32.75.019532-45.25zm0 0"/><path d="m295.988281 9.734375-286.613281 286.613281c-12.5 12.5-12.5 32.769532 0 45.25l15.082031 15.082032c12.503907 12.5 32.769531 12.5 45.25 0l286.632813-286.59375c12.503906-12.5 12.503906-32.765626 0-45.246094l-15.082032-15.082032c-12.5-12.523437-32.765624-12.523437-45.269531-.023437zm0 0"/></g></svg>
                </div>
                <div class="supprimer" data-action="delete">
                <svg  data-id="115" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve">

<path d="M64,341.333C64,364.907,83.093,384,106.667,384h170.667C300.907,384,320,364.907,320,341.333v-256H64V341.333z"></path>
<polygon points="266.667,21.333 245.333,0 138.667,0 117.333,21.333 42.667,21.333 42.667,64 341.333,64 341.333,21.333 			"></polygon>
</svg>
                </div>
            </div>
        </div>
           

<?php
      }
    }
?>
    </div>
 
    </div>

        
    
</body>
</html>




