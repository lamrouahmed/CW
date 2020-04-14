<?php

class DB {
    private static $instance = null;
    private $query;
    private $error = false;
    private $count = 0;
    private $results;
    private  $pdo;
    private $date;


    public function getDate()
    {
        $this->date = date('Y-m-d H:i:s');
        return $this->date;
    }



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
     * @param $stmt => sql statement
     * @param array $params => tab contains the value to evaluate
     * @param string $query
     * @return DB
     * @example DB::connect()
     *             ->query("SELECT * FROM user WHERE username = ?", array('med2000'));
     *
     *
     */

    public function query($stmt, $params = [], string $query = 'SELECT'):DB
    {
        $this->error = false;
        if($this->query = $this->pdo->prepare($stmt)) {
            if(count($params)) {
                $index = 1;
                foreach ($params as $key => $param) {
                    $this->query->bindValue($index, $param);
                    $index++;
                }
            }
            if($this->query->execute() &&($query == 'SELECT')) {
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
     * @param $PK
     * @param int $id
     * @param string $table
     * @return DB
     * @example  DB::connect->getOne("uid", 1, "user");
     *
     */

    public function getOne($PK, int $id, string $table) 
    {
        return $this->query("SELECT * FROM {$table} WHERE {$PK} = {$id}");
    }


    public function delete($PK ,int $id, string $table):void 
    {
    $this->query("DELETE FROM {$table} WHERE {$PK} = {$id}",[] ,'DELETE');
    }

    public function insert($table, $params = [])
    {
        $this->error = false;

        $columns = array_keys($params);
        $value = array_values($params);
        $stmt = implode("`,`", $columns);
        $values = "";
        foreach ($params as $param) {
            $values.= "?,";
        }
        $values = rtrim($values, ",");
        $sql = "INSERT INTO {$table} (`{$stmt}`) VALUES ({$values})";
        $this->query($sql, $value, 'INSERT');
    }

    public function update($PK, int $id, string $table, $params = []) {
        $this->error = false;
        //$value = array_values($params);
        $set = "";
        foreach ($params as $key => $value) {
            $set.= "{$key} = ?, ";
        }
        $set = rtrim($set, ", ");
        $sql = "UPDATE {$table} SET {$set} WHERE {$PK} = {$id}";
        $this->query($sql, $params, 'UPDATE');
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