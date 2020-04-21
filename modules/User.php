<?php
    
    class User {

        private $db;
        private $sessionName;
        private $isLoggedIn;

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
                    Session::put($this->sessionName, $data->results()[0]->u_id);
                    return true;
                }
            } else {
                  return false;
            }
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
            Session::put($this->sessionName, $data->results()[0]->u_id);
        }


    }