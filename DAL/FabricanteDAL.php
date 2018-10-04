<?php

require_once dirname(__FILE__) . '/../DataAbstraction/DB.php';

class FabricanteDAL {

    public static function create($e) {
        $db = DB::getDB();
        $query = "INSERT INTO Fabricante (Fabricante)" . "VALUES (:Fabricante)";
        $params = [
            ':Fabricante' => $e->Fabricante
        ];
        $res = $db->query($query, $params);
        if ($res) {
            $e->idFabricante = $db->lastInsertId();
        }
        return($res);
    }

    public static function delete($e) {
        $db = DB::getDB();
        $query = "DELETE FROM Fabricante WHERE Fabricante = :Fabricante";
        $params = [
            ':Fabricante' => $e->Fabricante
        ];
        $res = $db->query($query, $params);
        return($res);
    }

    public static function retrieveAll() {
        $db = DB::getDB();
        $query = "SELECT * FROM Fabricante";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "Fabricante");
        return($res);
    }

    public static function retrieveByName($e) {
        $db = DB::getDB();
        $query = "SELECT * FROM Fabricante WHERE Fabricante=:Fabricante";
        $params = [
            ':Fabricante' => $e->Fabricante
        ];
        $res = $db->query($query, $params);
        $res->setFetchMode(PDO::FETCH_CLASS, "Fabricante");
        $row = $res->fetch();
        if ($row) {
            $e->copy($row);
        }
        $res->closeCursor();
        return($row);
    }

    public static function retrieveById($e) {
        $db = DB::getDB();
        $query = "SELECT * FROM Fabricante WHERE idFabricante=:idFabricante";
        $params = [
            ':idFabricante' => $e->idFabricante
        ];
        $res = $db->query($query, $params);
        $res->setFetchMode(PDO::FETCH_CLASS, "Fabricante");

        $row = $res->fetch();
        if ($row) {
            $e->copy($row);
        }
        $res->closeCursor();
        return($row);
    }

    public static function update($e) {
        $db = DB::getDB();
        $query = "UPDATE Fabricante SET Fabricante=:Fabricante WHERE idFabricante=:idFabricante";
        $params = [
            ':Fabricante' => $e->Fabricante,
            ':idFabricante' => $e->idFabricante
        ];
        $res = $db->query($query, $params);
        return($res);
    }

}
