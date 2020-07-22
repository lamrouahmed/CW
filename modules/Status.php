<?php
    
    class Status {

        private $db;
        public function __construct($status = null)
        {
            $this->db = DB::connect();
        }


        public function addStatus($id, $params = []) {
            $this->update("lavage_id", $id, "contacte", $params);
        }
}
        ?>