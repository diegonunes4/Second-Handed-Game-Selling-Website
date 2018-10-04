<?php
require_once dirname(__FILE__) . '/../DataAbstraction/DB.php';

class PlataformaDAL
{
           
    public static function create($e) {
        $db = DB::getDB();
        $query = "INSERT INTO Plataforma (Plataforma)" . "VALUES (:Plataforma)";
        $params = [
            ':Plataforma' => $e->Plataforma
        ];
        $res = $db->query($query, $params);
        if ($res) {
            $e->idPlataforma = $db->lastInsertId();
        }
        return($res);
    }

    public static function delete($e) {
        $db = DB::getDB();
        $query = "DELETE FROM Plataforma WHERE Plataforma = :Plataforma";
        $params = [
            ':Plataforma' => $e->Plataforma
        ];
        $res = $db->query($query, $params);
        return($res);
    }
    
        public static function update($e) {
        $db = DB::getDB();
        $query = "UPDATE Plataforma SET Plataforma=:Plataforma WHERE idPlataforma=:idPlataforma";
        $params = [
            ':Plataforma' => $e->Plataforma,
            ':idPlataforma' => $e->idPlataforma
        ];
        $res = $db->query($query, $params);
        return($res);
    }

    public static function retrieveAll() {
        $db = DB::getDB();
        $query = "SELECT * FROM Plataforma";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "Plataforma");
        return($res);
    }

    public static function retrieveByName($e) {
        $db = DB::getDB();
        $query = "SELECT * FROM Plataforma WHERE Plataforma=:Plataforma";
        $params = [
            ':Plataforma' => $e->Plataforma
        ];
        $res = $db->query($query, $params);
        $res->setFetchMode(PDO::FETCH_CLASS, "Plataforma");
        $row = $res->fetch();
        if ($row) {
            $e->copy($row);
        }
        $res->closeCursor();
        return($row);
    }
    
            public static function retrieveById($e) {
        $db = DB::getDB();
        $query = "SELECT * FROM Plataforma WHERE idPlataforma=:idPlataforma";
        $params = [
            ':idPlataforma' => $e->idPlataforma
        ];
        $res = $db->query($query, $params);
        $res->setFetchMode(PDO::FETCH_CLASS, "Plataforma");

        $row = $res->fetch();
        if ($row) {
            $e->copy($row);
        }
        $res->closeCursor();
        return($row);
    }
    
    
}
