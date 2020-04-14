<?php
require_once '/wamp64/www/PFE/core/init.php';
//$form_filter = array(
    //'u_first_name'   =>  FILTER_SANITIZE_STRING,
    //'u_last_name'    =>  FILTER_SANITIZE_STRING,
    //'u_mail'         =>  FILTER_SANITIZE_EMAIL,
  //  'u_phone'        =>  FILTER_SANITIZE_NUMBER_INT,
//);

$users = DB::connect();

/*$users->insert('user', [
    'last_name' => 'lamrouah',
    'first_name' => 'mohamed',
    'username' => 'zedzazedzeddsf',
    'phone' => '0677051944',
    'mail' => 'lamrouahmed@gmail.com',
    'password' => 'pwd',
    'location' => 'USA, NYC',
    'created' => $users->getDate()
]);



$users->update("u_id", 44, "user",[
    'last_name' => 'nlamrouah',
    'first_name' => 'nmohamed',
    'username' => 'nzedzazedzeddsf',
    'phone' => 'n0677051944',
    'mail' => 'nlamrouahmed@gmail.com',
    'password' => 'npwd',
    'location' => 'nUSA, NYC',
    'created' => $users->getDate()
]);




*/
$users->delete("u_id", 44, "user");




//if($users->count()) {
  //  echo $users->count();
    //foreach ($users->results() as $user) {
      //  echo $user->username;
  //  }
//} else {
  //  echo "no users";
//}