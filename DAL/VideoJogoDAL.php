<?php

require_once dirname(__FILE__) . '/../DataAbstraction/DB.php';

class VideoJogoDAL {

    public static function create($e) {
        $db = DB::getDB();
        $query = "INSERT INTO VideoJogo (Titulo, Preco, Data, Pontuacao, Fabricante_idFabricante, Plataforma_idPlataforma, Utilizador_idUtilizador)" . "VALUES (:Titulo, :Preco, :Data, :Pontuacao, :Fabricante_idFabricante, :Plataforma_idPlataforma, :Utilizador_idUtilizador)";
        $params = [
            ':Titulo' => $e->Titulo,
            ':Preco' => $e->Preco,
            ':Data' => $e->Data,
            ':Pontuacao' => $e->Pontuacao,
            ':Fabricante_idFabricante' => $e->Fabricante_idFabricante,
            ':Plataforma_idPlataforma' => $e->Plataforma_idPlataforma,
            ':Utilizador_idUtilizador' => $e->Utilizador_idUtilizador
        ];
        $res = $db->query($query, $params);
        if ($res) {
            $e->idVideoJogo = $db->lastInsertId();
        }
        return($res);
    }

    public static function delete($e) {
        $db = DB::getDB();
        $query = "DELETE FROM VideoJogo WHERE idVideoJogo = :idVideoJogo";
        $params = [
            ':idVideoJogo' => $e->idVideoJogo
        ];
        $res = $db->query($query, $params);
        return($res);
    }

    public static function retrieveAll() {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");
        return($res);
    }

    public static function retrieveByName($e) {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo WHERE Titulo=:Titulo";
        $params = [
            ':Titulo' => $e->Titulo
        ];
        $res = $db->query($query, $params);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");
        $row = $res->fetch();
        if ($row) {
            $e->copy($row);
        }
        $res->closeCursor();
        return($row);
    }

    public static function retrieveById($e) {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo WHERE idVideoJogo=:idVideoJogo";
        $params = [
            ':idVideoJogo' => $e->idVideoJogo
        ];
        $res = $db->query($query, $params);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");

        $row = $res->fetch();
        if ($row) {
            $e->copy($row);
        }
        $res->closeCursor();
        return($row);
    }

    public static function update($e) {
        $db = DB::getDB();
        $query = "UPDATE VideoJogo SET Titulo=:Titulo, Preco=:Preco, Data=:Data, Pontuacao=:Pontuacao, Fabricante_idFabricante=:Fabricante_idFabricante, Plataforma_idPlataforma=:Plataforma_idPlataforma, Utilizador_idUtilizador=:Utilizador_idUtilizador WHERE idVideoJogo=:idVideoJogo";
        $params = [
            ':idVideoJogo' => $e->idVideoJogo,
            ':Titulo' => $e->Titulo,
            ':Preco' => $e->Preco,
            ':Data' => $e->Data,
            ':Pontuacao' => $e->Pontuacao,
            ':Fabricante_idFabricante' => $e->Fabricante_idFabricante,
            ':Plataforma_idPlataforma' => $e->Plataforma_idPlataforma,
            ':Utilizador_idUtilizador' => $e->Utilizador_idUtilizador
        ];
        $res = $db->query($query, $params);
        return($res);
    }

    public static function retrieveByFab($e) {
        $db = DB::getDB();
        $query = "SELECT Fabricante FROM Fabricante WHERE Fabricante_idFabricante=:idFabricante";
        $params = [
            ':Fabricante' => $e->Fabricante,
            ':Fabricante_idFabricante' => $e->Fabricante_idFabricante
        ];
        $res = $db->query($query, $params);
        return($res);
    }

    public static function searchPriceLower() {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo ORDER BY Preco ASC";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");

        return($res);
    }

    public static function searchPriceHigher() {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo ORDER BY Preco DESC";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");

        return($res);
    }

    public static function getByPontuacao1() {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo WHERE Pontuacao = 1";

        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");

        return($res);
    }

    public static function getByPontuacao2() {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo WHERE Pontuacao = 2";

        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");

        return($res);
    }

    public static function getByPontuacao3() {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo WHERE Pontuacao = 3";

        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");

        return($res);
    }

    public static function getByPontuacao4() {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo WHERE Pontuacao = 4";

        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");

        return($res);
    }

    public static function getByPontuacao5() {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo WHERE Pontuacao = 5";

        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");

        return($res);
    }

    public static function getByPontuacao6() {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo WHERE Pontuacao = 6";

        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");

        return($res);
    }

    public static function getByPontuacao7() {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo WHERE Pontuacao = 7";

        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");

        return($res);
    }

    public static function getByPontuacao8() {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo WHERE Pontuacao = 8";

        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");

        return($res);
    }

    public static function getByPontuacao9() {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo WHERE Pontuacao = 9";

        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");

        return($res);
    }

    public static function getByPontuacao10() {
        $db = DB::getDB();
        $query = "SELECT * FROM VideoJogo WHERE Pontuacao = 10";

        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");

        return($res);
    }

    public static function getSearch($search) {
        $db = DB::getDB();

        $user = new Utilizador();
        $user->Username = VideoJogoController::processSearch();
        $user->getByName();

        $query = "SELECT * FROM VideoJogo WHERE Titulo like '%$search%' OR Pontuacao like '%$search%'";

        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");

        return($res);
    }

    public function getLastVideoJogos() {

        $db = DB::getDB();

        $query = "SELECT * FROM VideoJogo GROUP BY idVideoJogo DESC LIMIT 5";

        $res = $db->query($query);

        $res->setFetchMode(PDO::FETCH_CLASS, "VideoJogo");

        return ($res);
    }

}
