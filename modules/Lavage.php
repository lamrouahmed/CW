<?php
    
    class Lavage {

        private $db;
        public function __construct($lavage = null)
        {
            $this->db = DB::connect();
        }

     
        public function getLavage(string $typeLavage) {
            return $this->db->getOne("type_lavage", "'".$typeLavage."'", "lavage");
        }


}


