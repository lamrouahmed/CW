<?php
    
    class User {

        private $db;
        private $sessionName;
        private $isLoggedIn;
        private $data;
        public function __construct($user = null)
        {
            $this->db = DB::connect();
            $this->sessionName = Config::get("session/session_name");

            if(!$user) {
                if(Session::exists($this->sessionName)) {
                    $user = Session::get($this->sessionName);
                    $data = $this->db->getOne("u_id", "'".$user."'", "user", ["permission", 0]);
                    if($data->count()) {
                        $this->isLoggedIn = true;
                        $this->data = $data->results()[0];
                    }
                }
            }
        }




        public function create($table, $fields) 
        {
            //  if(!$this->db->insert($table, $fields)) {
            //      throw new Exception("something went wrong during the creation of an account");
            //  } else {
            //      echo "inserted";
            //  }

             $this->db->insert($table, $fields);
        }




        public function login($username = null, $pwd = null) 
        {
            $data = $this->db->getOne("username", "'".$username."'", "user", ["permission", 0]);
            if($data->count()) {
                if(password_verify($pwd,$data->results()[0]->hash)) {
                    $this->data = $data->results()[0];
                    Session::put($this->sessionName, $data->results()[0]->u_id);
                    $this->update("u_id", $data->results()[0]->u_id, "user", [
                        'status' => "online"
                    ]);
                    return true;
                }
            } else {
                  return false;
            }
        } 

        public function update($PK,  $id, string $table, $params = []) {
            $this->db->update($PK, $id, $table, $params);
        }

        public function isLoggedIn() 
        {
            return $this->isLoggedIn;
        }

        public function logout() {
            $this->update("u_id", Session::get($this->sessionName), "user", [
                'status' => "offline"
            ]);
            Session::delete($this->sessionName);
        }

        public function register($username) {
            $data = $this->db->getOne("username", "'".$username."'", "user", ["permission", 0]);
            
            Session::put($this->sessionName, $data->results()[0]->u_id);
        }

        public function getInsensitiveData() {
             return $this->db->query("SELECT u_id, last_name, username, created, status FROM user WHERE permission = 0", [], "SELECT");
        }


         public function getData() {
            return $this->data;
        }

        public function getDemandes() 
        {
            return $this->db->query("SELECT * FROM demande JOIN lavage USING(lavage_id) WHERE u_id = {$this->data->u_id} AND status_demande <> 'D' ", [], "SELECT");
        }

        public function getDemande(int $id) 
        {
            return $this->db->query("SELECT * FROM demande JOIN lavage USING(lavage_id) WHERE u_id = {$this->data->u_id} AND demande_id = {$id}", [], "SELECT");
        }
        public function getFacture(int $id) 
        {
            return $this->db->query("SELECT * FROM facture f JOIN demande d ON (f.demande_id = d.demande_id) JOIN lavage l ON (l.lavage_id = d.lavage_id) WHERE u_id = {$this->data->u_id} AND facture_id = {$id}", [], "SELECT");
        }
        public function getFactures() 
        {
            return $this->db->query("SELECT * FROM facture f JOIN demande d ON (f.demande_id = d.demande_id) JOIN lavage l ON (l.lavage_id = d.lavage_id) WHERE u_id = {$this->data->u_id}", [], "SELECT");
        }
        
        public function getOnline() 
        {
            return $this->db->query("SELECT * FROM user WHERE status = 'online' AND permission = 0", [], "SELECT");
        }
        
        
        public function getOffline() 
        {    
            return $this->db->query("SELECT * FROM user WHERE status = 'offline' AND permission = 0", [], "SELECT");
        }

    }