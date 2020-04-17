<?php
    
    class Token {

        public static function generate($length) {
                $token = "";
                $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
                $codeAlphabet.= "0123456789";
                $max = strlen($codeAlphabet);
           
               for ($i=0; $i < $length; $i++) {
                   $token .= $codeAlphabet[random_int(0, $max-1)];
               }
           
               return Session::put(Config::get('session/token_name') ,$token);
           
        }


        public static function check($token) {
            $tokenName = Config::get('session/token_name');

            if(Session::exists($tokenName) && $token === $tokenName) {
                Session::delete($tokenName);
                return true;
            }
            return false;
        }
    }