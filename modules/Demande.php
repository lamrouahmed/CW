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

        public function delete($id) {
            $this->db->delete("demande_id", $id, "demande");
        }

        public function accept($id, $params = []) {
            $this->db->update("demande_id", $id, "demande", $params);
        }
        
        public function refuse($id, $params = []) {
            $this->db->update("demande_id", $id, "demande", $params);
        }

        public function uDelete($id, $params = []) {
            $this->db->update("demande_id", $id, "demande", $params);
        }
        public function cancel($id, $params = []) {
            $this->db->update("demande_id", $id, "demande", $params);
        }
        public function getDemandes() {
            return $this->db->query("SELECT * FROM demande", [], "SELECT");
        }
        public function getDemandesN() {
            return $this->db->query("SELECT * FROM demande WHERE status_demande='N'", [], "SELECT");
        }
        public function getDemandesY() {
            return $this->db->query("SELECT * FROM demande WHERE status_demande='Y'", [], "SELECT");
        }

        
}