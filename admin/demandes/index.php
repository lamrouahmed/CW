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

        <div class="info">
            <div class="stats">
                <div class="totalDemandes">
                    <div class="title">
                        Total Demandes
                    </div>
                    <div class="text">
                        0
                    </div>
                </div>
                <div class="demandes_r">
                    <div class="title">
                        Demandes refusees
                    </div>
                    <div class="text">
                        0
                    </div>
                </div>
                <div class="demandes_a">
                    <div class="title">
                        Demandes acceptees
                    </div>
                    <div class="text">
                        0
                    </div>
                </div>
            </div>

        </div>


        <div class="demandeWrapper">
            <div class="actions">
                <div class="checkBox_h">
                    <input type="checkbox" class="checkB_h" id="-1">
                    <label class="label_h" for="-1">
                        <svg viewBox="0 0 100 100" class="checkboxSvg_h">
                            <path class="box"
                                d="M82,89H18c-3.87,0-7-3.13-7-7V18c0-3.87,3.13-7,7-7h64c3.87,0,7,3.13,7,7v64C89,85.87,85.87,89,82,89z">
                            </path>
                            <polyline class="check" points="25.5,53.5 39.5,67.5 72.5,34.5 "></polyline>
                        </svg>
                    </label>
                </div>
                <div class="btns_h">
                    <div class="accept_h">
                        <svg height="417pt" viewBox="0 -46 417.81333 417" width="417pt"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m159.988281 318.582031c-3.988281 4.011719-9.429687 6.25-15.082031 6.25s-11.09375-2.238281-15.082031-6.25l-120.449219-120.46875c-12.5-12.5-12.5-32.769531 0-45.246093l15.082031-15.085938c12.503907-12.5 32.75-12.5 45.25 0l75.199219 75.203125 203.199219-203.203125c12.503906-12.5 32.769531-12.5 45.25 0l15.082031 15.085938c12.5 12.5 12.5 32.765624 0 45.246093zm0 0"
                                fill="#2196f3" /></svg>
                    </div>
                    <div class="refuse_h" data-action="refuse">
                        <svg height="365.696pt" viewBox="0 0 365.696 365.696" width="365.696pt"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0" />
                        </svg> </div>
                    <div class="delete_h" data-action="delete">
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
                <div class="searchContainer">
                    <input type="text" class="search">
                    <div class="searchSvg">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 511.999 511.999"
                            style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">

                            <path
                                d="M508.874,478.708L360.142,329.976c28.21-34.827,45.191-79.103,45.191-127.309c0-111.75-90.917-202.667-202.667-202.667    S0,90.917,0,202.667s90.917,202.667,202.667,202.667c48.206,0,92.482-16.982,127.309-45.191l148.732,148.732    c4.167,4.165,10.919,4.165,15.086,0l15.081-15.082C513.04,489.627,513.04,482.873,508.874,478.708z M202.667,362.667    c-88.229,0-160-71.771-160-160s71.771-160,160-160s160,71.771,160,160S290.896,362.667,202.667,362.667z" />

                    </div>
                </div>
            </div>


            <div class="header">

                <div class="void"></div>
                <div class="id_h">#</div>
                <div class="username_h">username</div>
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
            <div class="demande <?php echo $result->status_demande?>" data-key="<?php echo $result->demande_id?>"
                data-search="<?php echo "$result->demande_id $result->username $result->type_lavage $result->type_vehicule $result->nb_vehicules $result->date_demande"?>">

                <input type="checkbox" class="checkB" id="<?php echo $result->demande_id?>"
                    data-check="<?php echo $result->demande_id?>">

                <div class="checkBox">
                    <label class="label" for="<?php echo $result->demande_id?>"
                        data-for="<?php echo $result->demande_id?>">
                        <svg viewBox="0 0 100 100" class="checkboxSvg" ">
	            <path class=" box"
                            d="M82,89H18c-3.87,0-7-3.13-7-7V18c0-3.87,3.13-7,7-7h64c3.87,0,7,3.13,7,7v64C89,85.87,85.87,89,82,89z">
                            </path>
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
                    <p><?php echo $result->prix * $result->nb_vehicules?> M.A.D</p>
                </div>
                <div class="btns">
                    <div class="accept" data-action="accept" data-id="<?php echo $result->demande_id?>">
                        <svg height="417pt" viewBox="0 -46 417.81333 417" width="417pt"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m159.988281 318.582031c-3.988281 4.011719-9.429687 6.25-15.082031 6.25s-11.09375-2.238281-15.082031-6.25l-120.449219-120.46875c-12.5-12.5-12.5-32.769531 0-45.246093l15.082031-15.085938c12.503907-12.5 32.75-12.5 45.25 0l75.199219 75.203125 203.199219-203.203125c12.503906-12.5 32.769531-12.5 45.25 0l15.082031 15.085938c12.5 12.5 12.5 32.765624 0 45.246093zm0 0"
                                fill="#2196f3" /></svg>
                    </div>
                    <div class="refuse" data-action="refuse" data-id="<?php echo $result->demande_id?>">
                        <svg height="365.696pt" viewBox="0 0 365.696 365.696" width="365.696pt"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0" />
                        </svg> </div>
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


        <div class="bg">
            <div class="popupContainer">
                <div class="point">
                    <div class="Text">
                        <p>Supprimer</p>
                    </div>
                    <div class="cross">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492 492"
                            style="enable-background:new 0 0 492 492;" xml:space="preserve">
                            <g>
                                <g>
                                    <path
                                        d="M300.188,246L484.14,62.04c5.06-5.064,7.852-11.82,7.86-19.024c0-7.208-2.792-13.972-7.86-19.028L468.02,7.872    c-5.068-5.076-11.824-7.856-19.036-7.856c-7.2,0-13.956,2.78-19.024,7.856L246.008,191.82L62.048,7.872    c-5.06-5.076-11.82-7.856-19.028-7.856c-7.2,0-13.96,2.78-19.02,7.856L7.872,23.988c-10.496,10.496-10.496,27.568,0,38.052    L191.828,246L7.872,429.952c-5.064,5.072-7.852,11.828-7.852,19.032c0,7.204,2.788,13.96,7.852,19.028l16.124,16.116    c5.06,5.072,11.824,7.856,19.02,7.856c7.208,0,13.968-2.784,19.028-7.856l183.96-183.952l183.952,183.952    c5.068,5.072,11.824,7.856,19.024,7.856h0.008c7.204,0,13.96-2.784,19.028-7.856l16.12-16.116    c5.06-5.064,7.852-11.824,7.852-19.028c0-7.204-2.792-13.96-7.852-19.028L300.188,246z" />
                                </g>
                            </g>
                    </div>
                </div>
                <div class="mid">
                    <div class="bigText">
                        <p>Vous êtes sure ?</p>
                    </div>
                </div>
                <div class="anchor">
                    <div class="annuler">
                        <button class="Btn">ANNULER</button>
                    </div>
                    <div class="ok">
                        <button class="Btn">OUI</button>
                    </div>
                </div>
            </div>
        </div>


    </div>




    <script src="./script/script.js" async></script>
</body>

</html>