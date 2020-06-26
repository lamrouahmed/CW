<?php
    
    class Facture {

        private $db;
        public function __construct($facture = null)
        {
            $this->db = DB::connect();
        }

        public function create($fields) 
        {
             $this->db->insert("facture", $fields);
        }

        public function getAll() 
        {
            return $this->db->query("SELECT * FROM facture f JOIN demande d ON (f.demande_id = d.demande_id) JOIN lavage l ON (l.lavage_id = d.lavage_id)", [], "SELECT");
        }

        public function delete($id) 
        {
            $this->db->delete("facture_id", $id, "facture");
        }

        public function getFacture($id) 
        {
            return $this->db->query("SELECT * FROM facture WHERE facture_id = {$id}", [], "SELECT");
        }

        
}