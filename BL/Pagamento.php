<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pagamento
 *
 * @author Jose
 */
class Pagamento {
               
    public $idPagamento;
    public $Tipo;
    public $Utilizador_idUtilizador;
    
    public function copy($row) {
        $this->idPagamento = $row->idPagamento;
        $this->Tipo = $row->Tipo;
        $this->Utilizador_idUtilizador = $row->Utilizador_idUtilizador;        
    }

    public function create() {
        $res = PagamentoDAL::create($this);
        return($res);
    }

    public function delete() {
        $res = PagamentoDAL::delete($this);
        return($res);
    }

    public function retrieveAll() {
        return(PagamentoDAL::retrieveAll());
    }

    public function retrieveByName() {
        return(PagamentoDAL::retrieveByName($this));
    }
}
