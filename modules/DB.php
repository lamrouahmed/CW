<?php

class DB {
    private static $instance = null;
    private $query;
    private $error = false;
    private $count = 0;
    private $results;
    private  $pdo;



    private function __construct()
    {
        try {
        $this->pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db') .';charset=' .Config::get('mysql/charset'), Config::get('mysql/username'), Config::get('mysql/password'), [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * connect to the database
     *
     * @return DB
     */

    public static function connect(): DB
    {
        if(!isset(self::$instance)) {
            self::$instance = new DB();
        }
        return self::$instance;
    }


    /**
     *@example DB::connect()
     *             ->query("SELECT * FROM user WHERE username = ?", array('s', 'med2000'));
     *
     *
     * @param $stmt   => sql statement
     * @param array $params => tab contains the value to evaluate
     * @return DB
     */

    public function query($stmt, $params = array()):DB
    {
        $this->error = false;
        if($this->query = $this->pdo->prepare($stmt)) {
            if(count($params)) {
                foreach ($params as $key => $param) {
                    $this->query->bindValue($key, $param);
                }
            }
            if($this->query->execute()) {
                $this->results = $this->query->fetchAll(); // we already set the default to FETCH_OBJ while instantiating so there is no need to pass it as a parameter
                $this->count = $this->query->rowCount();
            } else {
                $this->error = true;
            }
        }

        return $this;
    }

    /**
     * @param string $table
     * @return DB
     */

    public function getAll(string $table) {
        return $this->query("SELECT * FROM {$table}");
    }


    /**
     * @example  DB::connect
     *
     * @param $tabid => NAME OF THE PRIMARY COLUMN
     * @param $userid
     * @param string $table
     * @return DB
     */

    public function getUser($tabid, $userid, string $table) {
        return $this->query("SELECT * FROM {$table} WHERE {$tabid} = {$userid}");
    }


    /**
     * @return array
     *
     */
    public function results():array
    {   return $this->results;
    }


    /**
     *
     * @return bool
     */
    public function error():bool
    {
        return $this->error;
    }


    /**
     *
     * @return int
     */
    public function count():int
    {
        return $this->count;
    }
}