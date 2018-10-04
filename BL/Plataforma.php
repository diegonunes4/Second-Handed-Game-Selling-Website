<?php

require_once dirname(__FILE__) . '/../DAL/PlataformaDAL.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Plataforma
 *
 * @author Jose
 */
class Plataforma {

    public $idPlataforma;
    public $Plataforma;

    public function copy($row) {
        $this->idPlataforma = $row->idPlataforma;
        $this->Plataforma = $row->Plataforma;
    }

    public function create() {
        $res = PlataformaDAL::create($this);
        return($res);
    }

    public function delete() {
        $res = PlataformaDAL::delete($this);
        return($res);
    }

    public function retrieveAll() {
        return(PlataformaDAL::retrieveAll());
    }

    public function retrieveByName() {
        return(PlataformaDAL::retrieveByName($this));
    }

    public function retrieveById() {
        return(PlataformaDAL::retrieveById($this));
    }

    public function update() {
        $res = PlataformaDAL::update($this);
        return($res);
    }

}
