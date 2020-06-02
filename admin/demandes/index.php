<?php
require_once '../../core/init.php';
require_once '../sideBar/sideBar.php';
$demande = new Demande();
$demandes = $demande->getAll();

if(Input::exists()) {
    $id = Input::get('id');
    $action = Input::get('action');

    if($action === "delete") {
       $demande->delete($id);
    } else if ($action === "accept") {
        $demande->accept($id, [
            "status_demande" => "Y"
        ]);
    } else if ($action === "refuse") {
        $demande->refuse($id, [
            "status_demande" => "N"
        ]);
    }
}
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

        <div class="demandeWrapper">
            <div class="header">
                <div class="void"></div>
                <div class="id_h">#</div>
                <div class="username_h">u_id</div>
                <div class="type_lavage_h">T_lavage</div>
                <div class="type_vehicule_h">T_vehicule</div>
                <div class="nb_vehicules_h">Nb_vehicule</div>
                <div class="date_demande_h">D_demande</div>
                <div class="status_h">Status</div>
                <div class="prix_h">Prix</div>
                <div class="action_h">Action</div>
            </div>
            <?php
        if($demandes->count()) {
            foreach($demandes->results() as $result){
               ?>
            <div class="demande <?php echo $result->status_demande?>" data-key="<?php echo $result->demande_id?>">
                <!-- <div class="img">
                <img src="../../uploads/<?php echo $result->img?>">
                <div class="status <?php echo $result->status?>"></div>
            </div> -->
                <div class="checkBox">
                <input type="checkbox" class="checkB" id="<?php echo $result->demande_id?>">
                    <label for="<?php echo $result->demande_id?>">
                    <svg viewBox="0 0 100 100" class="checkboxSvg">
	            <path class="box" d="M82,89H18c-3.87,0-7-3.13-7-7V18c0-3.87,3.13-7,7-7h64c3.87,0,7,3.13,7,7v64C89,85.87,85.87,89,82,89z"></path>
                <polyline class="check" points="25.5,53.5 39.5,67.5 72.5,34.5 "></polyline>
            </svg>
                    </label>
                </div>
                <div class="id">
                    <p><?php echo $result->demande_id?></p>
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
                <div class="status">
                    <img src="./img/<?php echo $result->status_demande?>.svg">
                </div>
                <div class="prix">
                    <p><?php echo $result->prix?> M.A.D</p>
                </div>
                <div class="btns">
                    <div class="accept" data-action="accept" data-id="<?php echo $result->demande_id?>">
                    <svg height="417pt" viewBox="0 -46 417.81333 417" width="417pt" xmlns="http://www.w3.org/2000/svg"><path d="m159.988281 318.582031c-3.988281 4.011719-9.429687 6.25-15.082031 6.25s-11.09375-2.238281-15.082031-6.25l-120.449219-120.46875c-12.5-12.5-12.5-32.769531 0-45.246093l15.082031-15.085938c12.503907-12.5 32.75-12.5 45.25 0l75.199219 75.203125 203.199219-203.203125c12.503906-12.5 32.769531-12.5 45.25 0l15.082031 15.085938c12.5 12.5 12.5 32.765624 0 45.246093zm0 0" fill="#2196f3"/></svg>
                    </div>
                    <div class="refuse" data-action="refuse" data-id="<?php echo $result->demande_id?>">
                    <svg height="365.696pt" viewBox="0 0 365.696 365.696" width="365.696pt" xmlns="http://www.w3.org/2000/svg"><path d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0"/></svg> </div>
                    <div class="delete" data-action="delete" data-id="<?php echo $result->demande_id?>">
                        <svg data-id="115" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 384 384"
                            style="enable-background:new 0 0 384 384;" xml:space="preserve">

                            <path
                                d="M64,341.333C64,364.907,83.093,384,106.667,384h170.667C300.907,384,320,364.907,320,341.333v-256H64V341.333z">
                            </path>
                            <polygon
                                points="266.667,21.333 245.333,0 138.667,0 117.333,21.333 42.667,21.333 42.667,64 341.333,64 341.333,21.333 			">
                            </polygon>
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


    <script src="./script/script.js" async></script>
</body>

</html>