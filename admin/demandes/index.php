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
                <div class="id_h">#</div>
                <div class="username_h">username</div>
                <div class="type_lavage_h">Type lavage</div>
                <div class="type_vehicule_h">Type vehicule</div>
                <div class="nb_vehicules_h">Nombre vehicule</div>
                <div class="date_demande_h">Date de demande</div>
                <div class="prix_h">Prix</div>
                <div class="status_h">Status</div>
                <div class="action_h">action</div>
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
                        <svg height="458pt" viewBox="0 -49 458.672 458" width="458pt"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m180.398438 338.90625c-3.988282 4.011719-9.429688 6.25-15.082032 6.25s-11.09375-2.238281-15.082031-6.25l-120.449219-120.46875c-12.5-12.5-12.5-32.769531 0-45.25l15.085938-15.082031c12.5-12.5 32.746094-12.5 45.246094 0l75.199218 75.203125 203.199219-203.203125c12.503906-12.5 32.769531-12.5 45.25 0l15.082031 15.082031c12.5 12.503906 12.5 32.769531 0 45.25zm0 0"
                                fill="#2196f3" />
                            <path class="stroke"
                                d="m165.316406 361.15625c-9.984375 0-19.347656-3.882812-26.386718-10.921875l-128-128.019531c-14.574219-14.570313-14.574219-38.230469 0-52.800782l30.164062-30.167968c14.550781-14.546875 38.25-14.546875 52.800781 0l71.421875 71.445312 199.445313-199.445312c14.550781-14.546875 38.25-14.546875 52.800781 0l30.164062 30.167968c7.0625 7.039063 10.945313 16.425782 10.945313 26.386719 0 9.964844-3.882813 19.351563-10.945313 26.390625l-256 256.023438c-7.058593 7.058594-16.425781 10.941406-26.410156 10.941406zm15.082032-22.226562h.214843zm-112.914063-178.605469c-1.367187 0-2.730469.511719-3.777344 1.558593l-30.164062 30.164063c-2.09375 2.089844-2.09375 5.460937 0 7.554687l128 128.019532c2.003906 2.003906 5.546875 2.003906 7.550781 0l256-256.019532c2.089844-2.09375 2.089844-5.464843 0-7.554687l-30.164062-30.164063c-2.09375-2.089843-5.464844-2.089843-7.554688 0l-210.75 210.75c-6.25 6.253907-16.386719 6.253907-22.636719 0l-82.75-82.75c-1.023437-1.046874-2.367187-1.558593-3.753906-1.558593zm0 0" />
                            </svg>
                    </div>
                    <div class="refuse" data-action="refuse" data-id="<?php echo $result->demande_id?>">
                        <svg height="376.49067pt" viewBox="0 0 376.49067 376.49067" width="376.49067pt"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m361.726562 301.375-286.613281-286.613281c-12.5-12.5-32.765625-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503906-12.5 32.769531 0 45.25l286.613281 286.613281c12.503906 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.523438-12.480469 12.523438-32.746094.019531-45.25zm0 0"
                                fill="#f44336" />
                            <path
                                d="m301.375 14.761719-286.613281 286.613281c-12.5 12.503906-12.5 32.769531 0 45.25l15.082031 15.082031c12.503906 12.5 32.769531 12.5 45.25 0l286.632812-286.59375c12.503907-12.5 12.503907-32.765625 0-45.246093l-15.082031-15.082032c-12.5-12.523437-32.765625-12.523437-45.269531-.023437zm0 0"
                                fill="#f44336" />
                            <path class="stroke"
                                d="m316.457031 376.46875c-9.554687 0-19.132812-3.648438-26.429687-10.921875l-101.78125-101.761719-101.761719 101.761719c-14.632813 14.589844-38.335937 14.589844-52.90625 0l-22.632813-22.636719c-14.570312-14.570312-14.59375-38.3125-.023437-52.882812l101.78125-101.78125-101.757813-101.761719c-14.59375-14.589844-14.59375-38.335937 0-52.90625l22.632813-22.632813c14.570313-14.570312 38.292969-14.59375 52.886719-.023437l101.78125 101.804687 101.757812-101.78125c14.636719-14.59375 38.335938-14.59375 52.90625 0l22.636719 22.632813c14.589844 14.59375 14.589844 38.335937 0 52.90625l-101.761719 101.761719 101.761719 101.757812s.019531 0 .019531.023438c14.570313 14.589844 14.550782 38.335937-.019531 52.882812l-22.636719 22.636719c-7.292968 7.273437-16.871094 10.921875-26.453125 10.921875zm-128.210937-151.316406c4.09375 0 8.191406 1.558594 11.304687 4.691406l113.066407 113.066406c2.09375 2.09375 5.589843 2.09375 7.660156 0l22.632812-22.632812c2.09375-2.089844 2.070313-5.589844-.019531-7.679688l-113.046875-113.046875c-6.25-6.25-6.25-16.382812 0-22.632812l113.066406-113.066407c2.09375-2.089843 2.09375-5.589843 0-7.660156l-22.632812-22.613281c-2.089844-2.089844-5.566406-2.070313-7.679688.023437l-113.046875 113.066407c-5.992187 5.992187-16.617187 5.992187-22.632812 0l-113.046875-113.089844c-2.089844-2.089844-5.589844-2.089844-7.65625 0l-22.636719 22.636719c-2.089844 2.089844-2.089844 5.585937 0 7.65625l113.066406 113.066406c6.25 6.25 6.25 16.386719 0 22.636719l-113.066406 113.066406c-2.070313 2.089844-2.089844 5.589844 0 7.65625l22.636719 22.636719c2.089844 2.089844 5.566406 2.070312 7.679687-.023438l113.042969-113.042968c3.117188-3.136719 7.210938-4.714844 11.308594-4.714844zm0 0" />
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

    </div>


    <script src="./script/script.js" async></script>
</body>

</html>