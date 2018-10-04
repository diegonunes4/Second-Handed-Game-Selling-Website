<?php

require_once dirname(__FILE__) . '/../DataAbstraction/DB.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UtilizadorDAL
 *
 * @author Jose
 */
class UtilizadorDAL {

    public static function Admin() {
        $db = DB::getDB();
        $query = "SELECT * FROM Utilizador WHERE admin=1";

        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "Utilizador");

        return($res->fetchColumn());
    }

    public static function create($e) {
        $db = DB::getDB();
        $query = "INSERT INTO Utilizador (Username, Email, Password, Admin, Contribuinte)" . "VALUES (:Username, :Email, SHA1(:Password), :Admin, :Contribuinte)";
        $params = [
            ':Username' => $e->Username,
            ':Email' => $e->Email,
            ':Password' => $e->Password,
            ':Admin' => $e->Admin,
            ':Contribuinte' => $e->Contribuinte
        ];
        $res = $db->query($query, $params);
        if ($res) {
            $e->idUtilizador = $db->lastInsertId();
        }
        return($res);
    }

    public static function update($e) {
        $db = DB::getDB();
        $query = "UPDATE Utilizador SET Username=:Username, Email=:Email, Contribuinte=:Contribuinte WHERE idUtilizador=:idUtilizador";
        $params = [
            ':Username' => $e->Username,
            ':Email' => $e->Email,
            ':Contribuinte' => $e->Contribuinte,
            ':idUtilizador' => UserController::getLoggedInUser()->idUtilizador
        ];
        $res = $db->query($query, $params);

        return($res);
    }

    public static function updateAdmin($e) {
        $db = DB::getDB();
        $query = "UPDATE Utilizador SET Username=:Username, Email=:Email, Password=SHA1(:Password), Contribuinte=:Contribuinte WHERE idUtilizador=:idUtilizador";
        $params = [
            ':Username' => $e->Username,
            ':Email' => $e->Email,
            ':Password' => $e->Password,
            ':Contribuinte' => $e->Contribuinte,
            ':idUtilizador' => $e->idUtilizador
        ];

        $res = $db->query($query, $params);

        return($res);
    }

    public static function updatePassword($e) {
        $db = DB::getDB();
        $query = "UPDATE Utilizador SET Password=SHA1(:Password) WHERE idUtilizador=:idUtilizador";
        $params = [
            ':Password' => $e->Password,
            ':idUtilizador' => UserController::getLoggedInUser()->idUtilizador
        ];
        $res = $db->query($query, $params);

        return($res);
    }

    public static function delete($e) {
        $db = DB::getDB();
        $query = "DELETE FROM Utilizador WHERE idUtilizador = :idUtilizador";
        $params = [
            ':idUtilizador' => $e->idUtilizador
        ];
        $res = $db->query($query, $params);
        return($res);
    }

    public static function getAll() {
        $db = DB::getDB();
        $query = "SELECT * FROM Utilizador";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "Utilizador");
        return($res);
    }

    public static function getByName($e) {
        $db = DB::getDB();
        $query = "SELECT * FROM Utilizador WHERE Username=:Username";
        $params = [
            ':Username' => $e->Username
        ];
        $res = $db->query($query, $params);
        $res->setFetchMode(PDO::FETCH_CLASS, "Utilizador");
        $row = $res->fetch();
        if ($row) {
            $e->copy($row);
        }
        $res->closeCursor();
        return($row);
    }
    
       public static function getByEmail($e) {
        $db = DB::getDB();
        $query = "SELECT * FROM Utilizador WHERE Email=:Email";
        $params = [
            ':Email' => $e->Email
        ];
        $res = $db->query($query, $params);
        $res->setFetchMode(PDO::FETCH_CLASS, "Utilizador");

        $row = $res->fetch();
        if ($row) {
            $e->copy($row);
        }
        $res->closeCursor();
        return($row);
    }

    public static function getById($e) {
        $db = DB::getDB();
        $query = "SELECT * FROM Utilizador WHERE idUtilizador=:idUtilizador";
         $params = [
            ':idUtilizador' => $e->idUtilizador
        ];
        $res = $db->query($query, $params);
        $res->setFetchMode(PDO::FETCH_CLASS, "Utilizador");
        $row = $res->fetch();
        if ($row) {
            $e->copy($row);
        }
        $res->closeCursor();
        return($row);
    }
    

    public static function getByLoginAndPassword($e) {
        $db = DB::getDB();
        $query = "SELECT * FROM Utilizador WHERE Username = :Username AND Password = SHA1(:Password)";
         $params = [
            ':Username' => $e->Username,
            ':Password' => $e->Password
        ];
        $res = $db->query($query, $params);
        $res->setFetchMode(PDO::FETCH_CLASS, "Utilizador");
        $row = $res->fetch();
        if ($row) {
            $e->copy($row);
        }
        $res->closeCursor();
        return($row);
    }

}
