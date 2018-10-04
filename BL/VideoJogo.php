<?php

require_once(dirname(__FILE__) . '/../DAL/VideoJogoDAL.php');

class VideoJogo {

    public $idVideoJogo;
    public $Titulo;
    public $Preco;
    public $Data;
    public $Pontuacao;
    public $Fabricante_idFabricante;
    public $Plataforma_idPlataforma;
    public $Utilizador_idUtilizador;

    public function copy($row) {
        $this->idVideoJogo = $row->idVideoJogo;
        $this->Titulo = $row->Titulo; 
        $this->Preco = $row->Preco;
        $this->Data = $row->Data;
        $this->Pontuacao = $row->Pontuacao;
        $this->Fabricante_idFabricante = $row->Fabricante_idFabricante;
        $this->Plataforma_idPlataforma = $row->Plataforma_idPlataforma;
 
 
    }

    public function create() {
        $res = VideoJogoDAL::create($this);
        return($res);
    }

    public function delete() {
        $res = VideoJogoDAL::delete($this);
        return($res);
    }

    public function retrieveAll() {
        return(VideoJogoDAL::retrieveAll());
    }

    public function retrieveByName() {
        return(VideoJogoDAL::retrieveByName($this));
    }
    
       public function retrieveById() {
        return(VideoJogoDAL::retrieveById($this));
    }

    public function validate($msg) {

        if ($this->Preco == '') {
            $msg['error'][] = "Price field is required.";
        } else {
            if ($this->Preco <= 0) {
                $msg['error'][] = "Price must be higher than 0(zero).";
            } else {
                if ($this->Titulo == '') {
                    $msg['error'][] = "Name field is required.";
                } else {
                    $msg[][] = '';
                    return true;
                }
            }
        }
    }
    
        public function update() {
        $res = VideoJogoDAL::update($this);
        return($res);
    }
    
    public function retrieveByFab($fab){
        $res= VideoJogoDAL::retrieveByFab($fab);
        return($res);
    }
    
        public function searchPriceLower() {
        $res = VideoJogoDAL::searchPriceLower();
        return($res);
    }

    public function searchPriceHigher() {
        $res = VideoJogoDAL::searchPriceHigher();
        return($res);
    }
    
       public function getByPontuacao1() {
        return(VideoJogoDAL::GetByPontuacao1());
    }
    
       public function getByPontuacao2() {
        return(VideoJogoDAL::GetByPontuacao2());
    }
    
       public function getByPontuacao3() {
        return(VideoJogoDAL::GetByPontuacao3());
    }
    
       public function getByPontuacao4() {
        return(VideoJogoDAL::GetByPontuacao4());
    }
    
       public function getByPontuacao5() {
        return(VideoJogoDAL::GetByPontuacao5());
    }
    
       public function getByPontuacao6() {
       return(VideoJogoDAL::GetByPontuacao6());
    }
    
       public function getByPontuacao7() {
       return(VideoJogoDAL::GetByPontuacao7());
    }
    
       public function getByPontuacao8() {
        return(VideoJogoDAL::GetByPontuacao8());
    }
    
       public function getByPontuacao9() {
       return(VideoJogoDAL::GetByPontuacao9());
    }
    
       public function getByPontuacao10() {
       return(VideoJogoDAL::GetByPontuacao10());
    }
    
        public function getSearch($search) {
        return(VideoJogoDAL::getSearch($search));
    }
    
        public function getLastVideoJogos() {
        return(VideoJogoDAL::getLastVideoJogos());
    }
}
