<?php
    
    class LavageMobile {

        private $db;
        private $sessionName;
        private $isLoggedIn;
        private $data;
        public function __construct($username)
        {
            $this->db = DB::connect();
            $this->sessionName = Session::get('username');

            
                if(Session::exists('username')) {
                    $user = Session::get('username');
                    $data = $this->db->getOne("username", "'".$user."'", "lavage_mobile");
                    if($data->count()) {
                        $this->isLoggedIn = true;
                        $this->data = $data->results()[0];
                    }
                }
            }


        public function getLavageMobile(string $nom) {
            return $this->db->getOne("nom", "'".$nom."'", "lavage_mobile");
        }


        public function getAll() {
            return $this->db->query("SELECT * FROM lavage_mobile", [], "SELECT");
        }






     

        public function update($PK,  $id, string $table, $params = []) {
            $this->db->update($PK, $id, $table, $params);
        }

        public function isLoggedIn() 
        {
            return $this->isLoggedIn;
        }

       

        


         public function getData() {
            return $this->data;
        }

        public function getDemandes() 
        {
            return $this->db->query("SELECT * FROM demande d JOIN lavage l ON(l.lavage_id = d.lavage_mobile_id) JOIN user u ON (u.u_id = d.u_id) WHERE d.status_demande <> 'D' ", [], "SELECT");
        }

        public function getDemandesY() 
        {
            return $this->db->query("SELECT * FROM demande d JOIN lavage l ON (l.lavage_id = d.lavage_mobile_id) WHERE d.status_demande = 'Y' ", [], "SELECT");
        }

        public function getDemandesN() 
        {
            return $this->db->query("SELECT * FROM demande d JOIN lavage l ON (l.lavage_id = d.lavage_mobile_id) WHERE d.status_demande = 'N' ", [], "SELECT");
        }

        public function getDemandesP() 
        {
            return $this->db->query("SELECT * FROM demande d JOIN lavage l ON (l.lavage_id = d.lavage_mobile_id) WHERE d.status_demande = 'Pending' ", [], "SELECT");
        }

        public function addDemande($l_id, $d_id) {
            $this->update("lavage_id", $l_id, "lavage_mobile", [
                'demande_id' => $d_id
            ]);
        }
    }
    