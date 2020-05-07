<?php

    class Hash {

        public static function make($pwd) {
            return password_hash($pwd, PASSWORD_DEFAULT);
        }


  
    }  