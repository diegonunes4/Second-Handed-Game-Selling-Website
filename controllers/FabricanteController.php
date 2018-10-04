<?php

require_once dirname(__FILE__) . '/../BL/Fabricante.php';

class FabricanteController {

    public static function process($msg) {
        if (isset($_POST['form-fabricante'])) {
            FabricanteController::createFabricante($msg);
        }
        if (isset($_GET['action']) && $_GET['action'] == 'deleteFabricante') {
            $msg = self::deleteFabricante($msg);
        }
                if (isset($_POST['update_fabricante'])) {
            $msg = self::updateFabricante($msg);
        }
    }

    public static function createFabricante($msg) {
        $fabricante = new Fabricante();
        $fabricante->Fabricante = $_POST['Fabricante'];
        
        if($fabricante->create()){
            header("Location:index.php?page=fabricante/admin_fabricante");
        }
        return($msg);
    }

    public static function deleteFabricante($msg) {

        if (isset($_GET['idFabricante'])) {
            $product = new Fabricante();
            $product->idFabricante = $_GET['idFabricante'];
            $product->retrieveById();
            if ($product->delete()) {
                header("Location:index.php?page=fabricante/admin_fabricante");
                return $msg;
            }
        }
    }
    
        public static function updateFabricante($msg) {

        if (isset($_GET['idFabricante'])) {

            $idFabricante = $_GET['idFabricante'];
            $p = $_POST['fab'];

            $plat = new Fabricante();
            $plat->idFabricante = $idFabricante;
            $plat->Fabricante = $p;



            if ($plat->update()) {
                header("Location:index.php?page=fabricante/admin_fabricante");
                $msg['info'][] = "Succesfully updated";
            }
        }

        return $msg;
    }

}
