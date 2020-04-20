<?php
    
    class User {

        private $db;
        private $sessionName;

        public function __construct()
        {
            $this->db = DB::connect();
            $this->sessionName = Config::get("session/session_name");
        }


        public function create($table, $fields) {
            //  if(!$this->db->insert($table, $fields)) {
            //      throw new Exception("something went wrong during the creation of an account");
            //  } else {
            //      echo "inserted";
            //  }

             $this->db->insert($table, $fields);
        }




        public function login($username = null, $pwd = null) {
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
    }