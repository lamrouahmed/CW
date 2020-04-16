<?php
    
    class Token {

        public static function get($length) {
                $token = "";
                $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
                $codeAlphabet.= "0123456789";
                $max = strlen($codeAlphabet);
           
               for ($i=0; $i < $length; $i++) {
                   $token .= $codeAlphabet[random_int(0, $max-1)];
               }
           
               return $token;
           
        }
    }