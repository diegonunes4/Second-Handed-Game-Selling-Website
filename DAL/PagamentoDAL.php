<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PagamentoDAL
 *
 * @author Jose
 */
class PagamentoDAL
{
    
    public static function create($e) {
        $db = DB::getDB();
        $query = "INSERT INTO Pagamento (Tipo, Utilizador_idUtilizador)" . "VALUES (:Tipo, :Utilizador_idUtilizador)";
        $params = [
            ':Tipo' => $e->Tipo,
            ':idUtilizador' => $e->Utilizador_idUtilizador
        ];
        $res = $db->query($query, $params);
        if ($res) {
            $e->idPagamento = $db->lastInsertId();
        }
        return($res);
    }

    public static function delete($e) {
        $db = DB::getDB();
        $query = "DELETE FROM Pagamento WHERE idPagamento = :idPagamento";
        $params = [
            ':idPagamento' => $e->idPagamento
        ];
        $res = $db->query($query, $params);
        return($res);
    }

    public static function retrieveAll() {
        $db = DB::getDB();
        $query = "SELECT * FROM Pagamento";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "Pagamento");
        return($res);
    }

    public static function retrieveByName($e) {
        $db = DB::getDB();
        $query = "SELECT * FROM Pagamento WHERE idPagamento = :idPagamento";
        $params = [
            ':idPagamento' => $e->idPagamento
        ];
        $res = $db->query($query, $params);
        $res->setFetchMode(PDO::FETCH_CLASS, "Pagamento");
        $row = $res->fetch();
        if ($row) {
            $e->copy($row);
        }
        $res->closeCursor();
        return($row);
    }
}
