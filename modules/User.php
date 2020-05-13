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
                    $data = $this->db->getOne("u_id", "'".$user."'", "user");
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
            $data = $this->db->getOne("username", "'".$username."'", "user");
            if($data->count()) {
                if(password_verify($pwd,$data->results()[0]->password)) {
                    $this->data = $data->results()[0];
                    Session::put($this->sessionName, $data->results()[0]->u_id);
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
            Session::delete($this->sessionName);
        }

        public function register($username) {
            $data = $this->db->getOne("username", "'".$username."'", "user");
            
            Session::put($this->sessionName, $data->results()->u_id);
        }


        public function getData() {
            return $this->data;
        }


    }