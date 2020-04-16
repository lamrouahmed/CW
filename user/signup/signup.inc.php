<?php
require_once '/wamp64/www/PFE/core/init.php';
//$form_filter = array(
    //'u_first_name'   =>  FILTER_SANITIZE_STRING,
    //'u_last_name'    =>  FILTER_SANITIZE_STRING,
    //'u_mail'         =>  FILTER_SANITIZE_EMAIL,
  //  'u_phone'        =>  FILTER_SANITIZE_NUMBER_INT,
//);

$users = DB::connect();



/*


$users->insert('user', [
  'last_name' => 'lamrouah',
  'first_name' => 'mohamed',
  'username' => 'FFFF',
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
//$users->delete("u_id", 44, "user");




//if($users->count()) {
  //  echo $users->count();
    //foreach ($users->results() as $user) {
      //  echo $user->username;
  //  }
//} else {
  //  echo "no users";

if(Input::exists()) {
    $validate = new Validate();
    $validate->check('post', [
        "u_last_name" => ["min" => 2, "max" => 15, "name" => "last name"],
        "u_first_name" => ["min" => 2, "max" => 15, "name" => "first name"],
        "u_username" => ["min" => 2, "max" => 20,"unique" => "user", "name" => "username"],
        "u_phone" => ["regexp" => "/^0(6|7)-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}$/", "name" => "phone number"],
        "u_mail" => ["mail" => true, "name" => "mail"],
        "u_pwd" => ["min" => 8, "name" => "password"],
        "u_pwd_rep" => ["match" => "password", "name" => "confirm password"]
    ]);

    if($validate->isValid()) {
        $user = new User();
      /** 
       * 
       * 
       *                  $user->create("user", ["last_name" => Input::get("u_last_name"),
                               "first_name" => Input::get("u_first_name"),
                               "username" => Input::get("u_username"),
                               "phone" => Input::get("u_phone"),
                               "mail" => Input::get("u_mail"),
                               "password" => Hash::make(Input::get("u_pwd")),
                               "location" => "googlemaps.com",
                               "created" => $users->getDate()

        ]);
       * 
       * 
      */

  
    } else {
      
        $errors = $validate->getErrors();
        
    }
}
