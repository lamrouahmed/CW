<?php
    
    class Review {


        
        public static function getThree() 
        {   
            return DB::connect()->query("SELECT username, last_name, first_name, rating, feedback, img FROM user WHERE rating IS NOT NULL AND feedback > '' LIMIT 3" , [], "SELECT")->results();
        }
        public static function getAll() 
        {   
            return DB::connect()->query("SELECT username, last_name, first_name, rating, feedback, img FROM user WHERE rating IS NOT NULL AND feedback > ''" , [], "SELECT")->results();
        }

        
}