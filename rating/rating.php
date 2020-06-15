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

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
     crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>
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
                    <button name="update" class="btn btn-primary">Submit</button>               
                </form>
                <hr>
                <h2>Users Feedback</h2>
                moyenne des avis: <div id="avgrating"></div>

</script>
                <hr>
                <?php
                $query = "SELECT * from user where rating>=3 order by rand() limit 3";
                $stmt = $mysqli->prepare($query);
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
                                <?php echo $row['feedback']; ?> 
                                <br>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

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