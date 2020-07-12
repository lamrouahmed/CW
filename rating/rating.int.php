<?php
    require_once '/wamp64/www/PFE/core/init.php';

  if(Session::exists('user')) {
    Redirect::to('\PFE\rating\rating.php');
    }
  else {
      Redirect::to('/PFE/user/login/login.php');
  }
  ?>
