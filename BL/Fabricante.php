<?php

require_once(dirname(__FILE__) . '/../DAL/FabricanteDAL.php');

class Fabricante {

    public $idFabricante;
    public $Fabricante;

    public function copy($row) {
        $this->idFabricante = $row->idFabricante;
        $this->Fabricante = $row->Fabricante;
    }

    public function create() {
        $res = FabricanteDAL::create($this);
        return($res);
    }

    public function delete() {
        $res = FabricanteDAL::delete($this);
        return($res);
    }

    public function retrieveAll() {
        return(FabricanteDAL::retrieveAll());
    }

    public function retrieveByName() {
        return(FabricanteDAL::retrieveByName($this));
    }

    public function retrieveById() {
        return(FabricanteDAL::retrieveById($this));
    }

    public function update() {
        $res = FabricanteDAL::update($this);
        return($res);
    }

}
