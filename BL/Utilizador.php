<?php

require_once dirname(__FILE__) . '/../DAL/UtilizadorDAL.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilizador
 *
 * @author Jose
 */
class Utilizador {

    public $idUtilizador;
    public $Username;
    public $Email;
    public $Password;
    public $Tipo;
    public $Contribuinte;
    public $admin;

    public function copy($row) {
        $this->idUtilizador = $row->idUtilizador;
        $this->Username = $row->Username;
        $this->Email = $row->Email;
        $this->Password = $row->Password;
        $this->Tipo = $row->Tipo;
        $this->Contribuinte = $row->Contribuinte;
        $this->Admin = $row->Admin;
    }

    public function create() {
        $res = false;
        $this->admin = false;
        if (!UtilizadorDAL::getByName($this)) {
            $res = UtilizadorDAL::create($this);
        }
        return($res);
    }

    public function createAdmin() {

        $res = false;
        $this->admin = true;
        if (!UtilizadorDAL::getByName($this)) {
            $res = UtilizadorDAL::create($this);
        }
        return($res);
    }

    public function Admin() {
        $res = UtilizadorDAL::Admin();
        return($res);
    }

    public function update() {
        $res = UtilizadorDAL::updateAdmin($this);
        return($res);
    }

    public function updatePassword() {
        $res = UtilizadorDAL::updatePassword($this);
        return($res);
    }

    public function updateAdmin() {
        $res = UtilizadorDAL::updateAdmin($this);
        return($res);
    }

    public function delete() {
        $res = UtilizadorDAL::delete($this);
        return($res);
    }

    public function getAll() {
        return(UtilizadorDAL::getAll());
    }

    public function getByName() {
        return(UtilizadorDAL::getByName($this));
    }

    public function getById() {
        return(UtilizadorDAL::getById($this));
    }

    public function getByLoginAndPassword() {
        return(UtilizadorDAL::getByLoginAndPassword($this));
    }
    
    public function getByEmail() {
        return(UtilizadorDAL::getByEmail($this));
    }

    public function isAdmin() {
        return $this->Admin;
    }

}
