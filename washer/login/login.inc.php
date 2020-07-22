<?php

include "../DB/connection.php";

session_start();


    if(isset($_POST["l_login"]))
    {
        if(empty($_POST["l_username"]) || empty($_POST["l_password"]))
        {
            $message = '<label>All fields are required</label>';
        }
        else 
        {
            $query = "SELECT * FROM lavage_mobile WHERE username = :username AND password = :password;";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'username' => $_POST["l_username"],
                    'password' => $_POST["l_password"]
                )
            );
            $count = $statement->rowCount();
            if ($count > 0) 
            {
                $_SESSION["username"] = $_POST["l_username"];
                header("location:/PFE/washer/demandes/index.php");
            }
            else
            {
                $message = '<label>Usermane or password incorrect</label>';
            }
        }
    }

