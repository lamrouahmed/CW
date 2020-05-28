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

        public function getAll() {
            return $this->db->query("SELECT * FROM user u JOIN demande d ON (d.u_id = u.u_id) JOIN lavage l ON (l.lavage_id = d.lavage_id) ", [], "SELECT");
        }

    
}