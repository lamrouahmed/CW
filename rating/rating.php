<?php
    require_once '/wamp64/www/PFE/core/init.php';
error_reporting(0);



    if(Session::exists("user")) { 
        $user = new User();
        
?>



<?php
$mysqli = mysqli_connect ('127.0.0.1','root','','carwash');

if(isset( $_POST['rating'] )){
    $rating =$_POST['rating'];
    $feedback =$_POST['feedback'];
    
    $errors = array();

    if(empty($rating)){
        $errors['rating'] = "Etoile Nécessaire";
    }

  /*  if(empty($mail)){
        $errors['mail'] = "Email Nécessaire" ;
    }*/

    if (count($errors)==0){
        if(isset($_POST['update'])){
       //$user = new User(); where u_id = ".$user->getData()->u_id."
        $id = $user->getData()->u_id  ;
        $query = " UPDATE user set rating = '$_POST[rating]' , feedback ='$_POST[feedback]' where u_id = '$id' " ;
        $stmt = $mysqli->prepare($query);  
        //$stmt->bind_param( $rating, $feedback );
        $stmt->execute();
        $msg="<div class='alert alert-success'> Rating Successfully Added </div>";
        //$stmt->close();
        }
    }
    
}

    function getAverageRating(){
        global $mysqli;
        $query = "select avg(rating) as avg from user where rating >0";
        $stmt = $mysqli->prepare($query);
        if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
        $row = $result->fetch_assoc();
            return $row['avg'];
            
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>rating</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
     crossorigin="anonymous">
    <link rel="stylesheet" href="./jquery.rateyo.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>


<div class="headerWrapper">
        <a href="/PFE">
            <div class="headerLogo">
                <div class="logoImg">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Capa_1" enable-background="new 0 0 524.235 524.235"
                        height="512px" viewBox="0 0 524.235 524.235" width="512px">

                        <path
                            d="m484.721 234.798-36.766-122.554c-8.383-27.949-33.613-46.715-62.778-46.715h-24.766v65.529h24.766l29.489 98.294h-305.097l29.489-98.294h24.765v-65.529h-24.765c-29.165 0-54.395 18.766-62.778 46.715l-36.766 122.554c-23.216 10.089-39.514 33.193-39.514 60.084v131.059c0 18.094 14.671 32.765 32.765 32.765h.002l-.002 32.763c0 18.096 14.669 32.767 32.765 32.767h32.767c18.094 0 32.765-14.671 32.765-32.765l-.014-32.765h262.13l-.002 32.763c0 18.096 14.669 32.767 32.765 32.767h32.767c18.096 0 32.765-14.671 32.765-32.765v-32.763l-.012-.002h.012c18.094 0 32.765-14.671 32.765-32.765v-131.059c-.003-26.891-16.301-49.995-39.517-60.084zm-353.662 141.996c-18.096 0-32.765-14.671-32.765-32.765 0-18.096 14.669-32.765 32.765-32.765s32.765 14.669 32.765 32.765c0 18.095-14.669 32.765-32.765 32.765zm262.118 0c-18.096 0-32.765-14.671-32.765-32.765 0-18.096 14.669-32.765 32.765-32.765s32.765 14.669 32.765 32.765c0 18.095-14.669 32.765-32.765 32.765z"
                            data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF">
                        </path>
                        <path id="path-1_35_"
                            d="m294.883 98.294c18.096 0 32.765-14.671 32.765-32.765-.001-18.096-32.765-65.529-32.765-65.529s-32.765 47.433-32.765 65.529c0 18.095 14.669 32.765 32.765 32.765z"
                            transform="translate(8)" data-original="#000000" class="active-path"
                            data-old_color="#000000" fill="#FFFFFF"></path>
                        <path id="path-1_34_"
                            d="m229.353 163.824c18.096 0 32.765-14.671 32.765-32.765 0-18.096-32.765-65.529-32.765-65.529s-32.765 47.433-32.765 65.529c.001 18.094 14.669 32.765 32.765 32.765z"
                            transform="translate(6 2)" data-original="#000000" class="active-path"
                            data-old_color="#000000" fill="#FFFFFF"></path>

                    </svg>


                </div>
                <h1><span>Car</span>Wash</h1>
            </div>
        </a>
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <br><br>
                    <h2>Merci de donner votre avis <?php echo $user->getData()->username  ; ?> </h2> <hr>

                        <?php 
                            if(isset($msg)){echo $msg;}

                        ?>

                <form action="" method="post" class="form" >
                   <div class="form-group">
                      <label for="">Rating</label>
                        <div id="rateYo"></div>
                    </div>
                    <p class="text-danger"><?php if(isset($errors['rating'])) echo $errors['rating']; ?></p>
             <!--       <div class="form-group">
                     <label class="label"></label>
                      <input type="email" name="mail" id="" class="input" placeholder="Email"  value="" >
                      <p class="text-danger">   <?php // if(isset($errors['mail'])) echo $errors['mail']; ?></p>
                    </div>   -->
                   <div class="form-group">
                    <label class="label"></label>
                      <input type="text" name="feedback" class="input" placeholder="Feedback/Commentaire">
                      <input type="hidden" name="rating" id="rating">
                    </div>
                    <button name="update" class="log">Submit</button>               
                </form>
                <hr>
                <h2>Users Feedback</h2>
                moyenne des avis: <div id="avgrating"></div>

</script>
                <hr>
                <?php
                $query = "SELECT * from user where rating IS NOT NULL order by rating desc";
                $stmt = $mysqli->prepare($query);
                $mysqli->query("SET NAMES utf8");
                if($stmt->execute()){
                    $result = $stmt->get_result();
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                ?>
                            <div class="media">
                            <div class="media-left">
                                <a href="#">
                                <img class="media-object" src="/PFE/uploads/<?php echo $row['img']?>" alt="img" height="64px" width="64pix" >
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"> <div class="rateYo-<?php echo $row['u_id'];?>" > </div> </h4>
                                <script>
                                        $(function () {
                                    
                                        $(".rateYo-<?php echo $row['u_id'];?>").rateYo({
                                            readOnly:true,
                                            rating:<?php echo $row['rating'];?>,
                                        });

                                    });
                                    </script>
                                <p class="comment"><?php echo $row['feedback']; ?></p> 
                                
                                by: <i><?php echo $row['username']; ?></i>
                                
                            </div>
                            </div>
                <?php  
                        }
                    }
                }
                ?>
                    <br><br>
        </div>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
crossorigin="anonymous"></script>
<script src="jquery.rateyo.js"></script>

<script>
    $(function () {
 
      $("#rateYo").rateYo({
      fullStar:true,
      onSet:function(rating,rateYoInstence){
          $("#rating").val(rating)
      }
    
      });

      $("#avgrating").rateYo({
        readOnly:true, 
        rating:'<?php echo getAverageRating(); ?>'
    
      });

 });
</script>


</body>
</html>


    <?php } else {
        Redirect::to("/PFE/user/login/login.php");
    }
?>