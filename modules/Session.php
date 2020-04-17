<?php
    class Session {

        public static function put($name, $value) 
        {
            return $_SESSION[$name] = $value;
        } 


        public static function get($name)
        {
            return $_SESSION[$name];
        }


        public static function exists($name):bool
        {
            return (isset($_SESSION[$name])) ? true : false;
        }

        public static function delete($name):void 
        {
            if (self::exists($name)) unset($_SESSION[$name]);
        }
    
    }