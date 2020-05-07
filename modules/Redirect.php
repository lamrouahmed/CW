<?php
    class Redirect {
        public static function to(string $url):void {
            if(is_numeric($url)) {
                switch ($url) {
                    case 404:
                        header('Location: HTTP/1.0 404 not found');
                        include '/wamp64/www/PFE/includes/errors/404.html';
                        die();
                    break;
                }
            }
            header("Location: {$url}");
            die();
        }
    }