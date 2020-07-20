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
            return $this->db->query("SELECT * FROM demande JOIN lavage USING(lavage_id) WHERE u_id = {$this->data->u_id} AND status_demande <> 'D' ", [], "SELECT");
        }

        public function addDemande($id) {
            $this->update("lavage_id", Session::get($this->sessionName), "lavage_mobile", [
                'demande_id' => $id
            ]);
        }
    }