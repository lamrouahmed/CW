<?php

    class Config {
        public static function get(string $path = null) {
            if($path) {
                $config = $GLOBALS['config'];
                $path = explode('/', $path);
                return $config[$path[0]][$path[1]];
            }
            return false;
        }


        public static function getDate() {
            return date('Y-m-d H:i:s');
        }


        
    // public function getDate()
    // {
    //     $this->date = 
    //     return $this->date;
    // }
    }


