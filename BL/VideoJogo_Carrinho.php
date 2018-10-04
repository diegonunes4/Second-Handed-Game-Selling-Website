<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VideoJogo_Carrinho
 *
 * @author Jose
 */
class VideoJogo_Carrinho {
                       
    public $VideoJogo_idVideoJogo;
    public $Carrinho_idCarrinho;
    
    public function copy($row) {
        $this->VideoJogo_idVideoJogo = $row->VideoJogo_idVideoJogo;
        $this->Carrinho_idCarrinho = $row->Carrinho_idCarrinho;
    }

    public function create() {
        $res = VideoJogo_CarrinhoDAL::create($this);
        return($res);
    }

    public function delete() {
        $res = VideoJogo_CarrinhoDAL::delete($this);
        return($res);
    }

    public function retrieveAll() {
        return(VideoJogo_CarrinhoDAL::retrieveAll());
    }

    public function retrieveByName() {
        return(VideoJogo_CarrinhoDAL::retrieveByName($this));
    }
}
