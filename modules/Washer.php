<?php
    
    class Washer {

        private $db;
        public function __construct($washer = null)
        {
            $this->db = DB::connect();
        }

        public function create($fields) 
        {
            //  if(!$this->db->insert($table, $fields)) {
            //      throw new Exception("something went wrong during the creation of an account");
            //  } else {
            //      echo "inserted";
            //  }

             $this->db->insert("lavage_mobile", $fields);
        }

     
        public function getWashers()
        {
            return $this->db->query("SELECT * FROM lavage_mobile", [], "SELECT");
        }



}

?>