<?php

require_once dirname(__FILE__) . '/../BL/Plataforma.php';

class PlataformaController {

    public static function process($msg) {
        if (isset($_POST['form-plataforma'])) {
            PlataformaController::createPlataforma($msg);
        }
        if (isset($_GET['action']) && $_GET['action'] == 'deletePlataforma') {
            $msg = self::deletePlataforma($msg);
        }
        if (isset($_POST['update_plataforma'])) {
            $msg = self::updatePlataforma($msg);
        }
    }

    public static function createPlataforma($msg) {
        $plataforma = new Plataforma();
        $plataforma->Plataforma = $_POST['Plataforma'];
        if($res = $plataforma->create()){
            header("Location:index.php?page=plataforma/admin_plataforma");
            $msg['info'][] = "Succesfully created";
        }
        return($msg);
    }

    public static function updatePlataforma($msg) {

        if (isset($_GET['idPlataforma'])) {

            $idPlataforma = $_GET['idPlataforma'];
            $p = $_POST['plataf'];

            $plat = new Plataforma();
            $plat->idPlataforma = $idPlataforma;
            $plat->Plataforma = $p;



            if ($plat->update()) {
                header("Location:index.php?page=plataforma/admin_plataforma");
                $msg['info'][] = "Succesfully updated";
            }
        }

        return $msg;
    }

    public static function deletePlataforma($msg) {

        if (isset($_GET['idPlataforma'])) {
            $product = new Plataforma();
            $product->idPlataforma = $_GET['idPlataforma'];
            $product->retrieveById();
            if ($product->delete()) {
                header("Location:index.php?page=plataforma/admin_plataforma");
                return $msg;
            }
        }
    }

}
