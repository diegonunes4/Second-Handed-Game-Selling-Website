<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VideoJogo_CarrinhoDAL
 *
 * @author Jose
 */
class VideoJogo_CarrinhoDAL
{
    
    public static function create($e) {
        $db = DB::getDB();
        $query = "INSERT INTO VideoJogo (VideoJogo_idVideoJogo, Carrinho_idCarrinho)" . "VALUES (:VideoJogo_idVideoJogo, :Carrinho_idCarrinho)";
        $params = [
            ':VideoJogo_Carrinho' => $e->VideoJogo_Carrinho,
            ':VideoJogo_idVideoJogo' => $e->VideoJogo_idVideoJogo,
            ':Carrinho_idCarrinho' => $e->Carrinho_idCarrinho
        ];
        $res = $db->query($query, $params);
        if ($res) {
            $e->idVideoJogo_Carrinho = $db->lastInsertId();
        }
        return($res);
    }

    public static function delete($e) {
        $db = DB::getDB();
        $query = "DELETE FROM VideoJogo_Carrinho WHERE VideoJogo_Carrinho = :VideoJogo_Carrinho";
        $params = [
            ':VideoJogo_Carrinho' => $e->VideoJogo_Carrinho
        ];
        $res = $db->query($query, $params);
        return($res);
    }

    public static function retrieveAll() {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo_Carrinho";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo_Carrinho");
        return($res);
    }

    public static function retrieveByName($e) {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo_Carrinho WHERE VideoJogo_Carrinho=:VideoJogo_Carrinho";
        $params = [
            ':VideoJogo_Carrinho' => $e->VideoJogo_Carrinho
        ];
        $res = $db->query($query, $params);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo_Carrinho");
        $row = $res->fetch();
        if ($row) {
            $e->copy($row);
        }
        $res->closeCursor();
        return($row);
    }
}
