<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CarrinhoDAL
 *
 * @author Jose
 */
class CarrinhoDAL
{
                   
    public static function create($e) {
        $db = DB::getDB();
        $query = "INSERT INTO Carrinho (Quantidade, Status)" . "VALUES (:Quantidade, :Status)";
        $params = [
            ':Quantidade' => $e->Quantidade,
            ':Status' => $e->Status,
        ];
        $res = $db->query($query, $params);
        if ($res) {
            $e->idCarrinho = $db->lastInsertId();
        }
        return($res);
    }    
    
    public static function delete($e) {
        $db = DB::getDB();
        $query = "DELETE FROM Carrinho WHERE idCarrinho = :idCarrinho";
        $params = [
            ':idCarrinho' => $e->idCarrinho
        ];
        $res = $db->query($query, $params);
        return($res);
    }

    public static function retrieveAll() {
        $db = DB::getDB();
        $query = "SELECT * FROM Carrinho";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "Carrinho");
        return($res);
    }

    public static function retrieveByName($e) {
        $db = DB::getDB();
        $query = "SELECT * FROM Carrinho WHERE idCarrinho = :idCarrinho";
        $params = [
            ':idCarrinho' => $e->idCarrinho
        ];
        $res = $db->query($query, $params);
        $res->setFetchMode(PDO::FETCH_CLASS, "Carrinho");
        $row = $res->fetch();
        if ($row) {
            $e->copy($row);
        }
        $res->closeCursor();
        return($row);
    }
}
