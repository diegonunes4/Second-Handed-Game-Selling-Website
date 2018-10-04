<?php

class DB {

    private $conn;
    private static $instance = null;
 
    private function __construct() {
        try {
            $this->conn = new PDO("mysql:dbname=trabalhodw;host=localhost;charset=UTF8", "utilizadordw", "utilizadordw");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function __destruct() {
        if (self::$instance != null) {
            $this->conn = null;
            self::$instance = null;
        }
    }
    

    public static function getDB() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return(self::$instance);
    }

    public function query($query, $params = []) {
        $statement = $this->conn->prepare($query);
        $statement->execute($params);
        return ($statement);
    }

    public function lastInsertId() {
        return($this->conn->lastInsertId());
    }

}
