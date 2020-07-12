<?php
    class Redirect {
        public static function to(string $url):void {
            if(is_numeric($url)) {
                switch ($url) {
                    case 404:
                        header('Location: HTTP/1.0 404 not found');
                        include '/wamp64/www/PFE/404/';
                        die();
                    break;
                }
            } else if(is_string($url)){
                switch($url) {
                    case 'demande':
                        header('Location: /PFE/demande/demande.php');
                        die();
                    break;

                    case 'review':
                        header('Location: /PFE/review/review.php');
                        die();
                    break;

                    
                }

              
            }   

            header("Location: {$url}");
            die();
            
        }
    }