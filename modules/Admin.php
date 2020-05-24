<?php

    class Admin extends User {
        private $db;
        private $sessionName;
        private $isLoggedIn;
        private $data;
        public function __construct($user = null)
        {
            $this->db = DB::connect();
            $this->sessionName = "admin";

            if(!$user) {
                if(Session::exists($this->sessionName)) {
                    $user = Session::get($this->sessionName);
                    $data = $this->db->getOne("u_id", "'".$user."'", "user");
                    if($data->count()) {
                        $this->isLoggedIn = true;
                        $this->data = $data->results()[0];
                    }
                }
            }
        }


        public function login($username = null, $pwd = null) 
        {
            $data = $this->db->getOne("username", "'".$username."'", "user");
            if($data->count()) {
                if(password_verify($pwd,$data->results()[0]->hash)) {
                    $this->data = $data->results()[0];
                    Session::put($this->sessionName, $data->results()[0]->u_id);
                    $this->update("u_id", Session::get($this->sessionName), "user", [
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

        public function logout() {
            $this->update("u_id", Session::get($this->sessionName), "user", [
                'status' => "offline"
            ]);
            Session::delete($this->sessionName);
        }

        public function isLoggedIn() 
        {
            return $this->isLoggedIn;
        }

        
    }