<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carrinho
 *
 * @author Jose
 */
class Carrinho {
                           
    public $idCarrinho;
    public $Quantidade;
    public $Status;
    
    public function copy($row) {
        $this->Quantidade = $row->Quantidade;
        $this->idCarrinho = $row->idCarrinho;
        $this->Status = $row->Status;
    }

    public function create() {
        $res = CarrinhoDAL::create($this);
        return($res);
    }

    public function delete() {
        $res = CarrinhoDAL::delete($this);
        return($res);
    }

    public function retrieveAll() {
        return(CarrinhoDAL::retrieveAll());
    }

    public function retrieveByName() {
        return(CarrinhoDAL::retrieveByName($this));
    }
}
