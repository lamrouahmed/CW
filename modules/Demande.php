<?php
    
    class Demande {

        private $db;
        public function __construct($demande = null)
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

             $this->db->insert("demande", $fields);
        }

    
}