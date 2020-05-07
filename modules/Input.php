<?php

    class Input {

        public static function exists($type = 'post'):bool
        {
            switch ($type) {
                case 'post':
                    return (!empty($_POST)) ? true : false;
                break;

                case 'get':
                    return (!empty($_GET)) ? true : false;
                break;

                default:
                    return false;
                break;
            }
        }

        public static function get($inputName):string
        {
            
            if (isset($_POST[$inputName])) return escape($_POST[$inputName]);
            else if(isset($_GET[$inputName])) return escape($_GET[$inputName]);
            return '';
        }
    }