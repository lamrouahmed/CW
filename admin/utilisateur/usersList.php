<?php
require_once '/wamp64/www/PFE/core/init.php';

$DB = DB::connect();
$results = $DB->getAll("user", ["permission", 0])->results();
?>

<!DOCTYPE html>
<html lang="en">
<body>
<?php foreach($results as $result) {

?>
<input type="checkbox" name="check" class="checkInput" id="<?php echo $result->u_id?>">
<label for="<?php echo $result->u_id?>" class="mid" data-key="<?php echo $result->u_id; ?>" data-search="<?php echo "$result->u_id $result->username $result->last_name $result->first_name $result->phone $result->mail $result->created"?>" >
<svg viewBox="0 0 100 100" class="checkbox">
	            <path class="box" d="M82,89H18c-3.87,0-7-3.13-7-7V18c0-3.87,3.13-7,7-7h64c3.87,0,7,3.13,7,7v64C89,85.87,85.87,89,82,89z"/>
                <polyline class="check" points="25.5,53.5 39.5,67.5 72.5,34.5 "/>
            </svg>
<div class="user">
    <div class="p_img">
    <img src="/PFE/uploads/<?php echo $result->img?>" onerror="this.src='/PFE/uploads/user.svg'">
    <div class="<?php echo $result->status?> status"></div>
    </div>
    <!-- <div class="p_id"><?php echo $result->u_id; ?></div> -->
    <div class="p_uid"><?php echo $result->username ?></div>
    <div class="p_name"><?php echo $result->last_name. " " . $result->first_name ?></div>
    <div class="p_tel"><?php echo $result->phone ?></div>
    <div class="p_mail"><?php echo $result->mail?></div>
    <div class="p_joined"><?php echo explode(" ", $result->created)[0]?></div>
    <div class="action">
        <a>
            <svg class="delete" data-action="delete" data-id="<?php echo $result->u_id ;?>" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 384 384"
                    style="enable-background:new 0 0 384 384;" xml:space="preserve">

                    <path
                        d="M64,341.333C64,364.907,83.093,384,106.667,384h170.667C300.907,384,320,364.907,320,341.333v-256H64V341.333z" />
                    <polygon
                        points="266.667,21.333 245.333,0 138.667,0 117.333,21.333 42.667,21.333 42.667,64 341.333,64 341.333,21.333 			" />
            </a>
            <a>
                <svg class="update" data-action="update" data-id="<?php echo $result->u_id ;?>" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 383.947 383.947"
                    style="enable-background:new 0 0 383.947 383.947;" xml:space="preserve">
                    <polygon points="0,303.947 0,383.947 80,383.947 316.053,147.893 236.053,67.893 			" />
                    <path d="M377.707,56.053L327.893,6.24c-8.32-8.32-21.867-8.32-30.187,0l-39.04,39.04l80,80l39.04-39.04
        C386.027,77.92,386.027,64.373,377.707,56.053z" />
                </svg>
                </a>
    </div>
</div>
</label>

<?php } ?>

</body>
</html>