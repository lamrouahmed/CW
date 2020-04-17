<?php
    
    class User {

        private $db;

        public function __construct()
        {
            $this->db = DB::connect();
        }


        public function create($table, $fields) {
            //  if(!$this->db->insert($table, $fields)) {
            //      throw new Exception("something went wrong during the creation of an account");
            //  } else {
            //      echo "inserted";
            //  }

             $this->db->insert($table, $fields);
        }
    }