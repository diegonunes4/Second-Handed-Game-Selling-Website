<?php

require_once dirname(__FILE__) . '/../BL/VideoJogo.php';

class VideoJogoController {

    public static function process($msg) {
        if (isset($_POST['form-videojogo'])) {
            VideoJogoController::createVideoJogo($msg);
        }
        if (isset($_POST['update_videojogo'])) {
            $msg = self::updateVideoJogo($msg);
        }

        if (isset($_GET['action']) && $_GET['action'] == 'deleteVideoJogo') {
            $msg = self::deleteVideoJogo($msg);
        }
        if (isset($_POST['search_fab'])) {
            $msg = self::processSearchFab($msg);
        }
        if (isset($_POST['price'])) {
            $msg = self::processSearchPrice($msg);
        }
        if (isset($_POST['uploadImage'])) {
            $msg = self::processVideoJogoImage($msg);
        }

        if (isset($_POST['search_pontuacao'])) {
            $msg = self::processSearchPont($msg);
        }

        if (isset($_POST['search'])) {
            $msg = self::processSearch($msg);
        }
    }

    public static function createVideoJogo($msg) {


        $videojogo = new VideoJogo();

        $videojogo->Titulo = $_POST['Titulo'];
        $videojogo->Preco = $_POST['Preco'];
        $videojogo->Data = $_POST['Data'];
        $videojogo->Pontuacao = $_POST['Pontuacao'];
        $videojogo->Fabricante_idFabricante = $_POST['fabricantes'];
        $videojogo->Plataforma_idPlataforma = $_POST['plataformas'];
        $videojogo->Utilizador_idUtilizador = UserController::getLoggedInUser()->idUtilizador;

        $res_validate = $videojogo->validate($msg);

        if ($res_validate) {
            $res = $videojogo->create();
            $msg['success'] = "VideoJogo created with success<br/>";
            header("Location:index.php?page=videojogo/admin_videojogo");
        } else {
            $msg['error'] = "VideoJogo already exists<br/>";
        }
        return($msg);
    }

    public static function updateVideoJogo($msg) {


        if (isset($_GET['idVideoJogo'])) {

            $idVideoJogo = $_GET['idVideoJogo'];
            $Titulo = $_POST['titulo'];
            $Data = $_POST['date'];
            $Preco = $_POST['preco'];
            $Pontuacao = $_POST['pontuacao'];
            $idUtilizador = UserController::getLoggedInUser()->idUtilizador;
            $fabricante = $_POST['fabricantes'];
            $plataforma = $_POST['plataformas'];



            $product = new VideoJogo();
            $product->idVideoJogo = $idVideoJogo;

            $product_aux = new VideoJogo();
            $product_aux->idVideoJogo = $idVideoJogo;
            $product_aux->retrieveById();
            if (UserController::isAdminLoggedIn() || UserController::getLoggedInUser()->idUtilizador == $product_aux->Utilizador_idUtilizador) {


                $product->Titulo = $Titulo;
                $product->Preco = $Preco;
                $product->Data = $Data;
                $product->Pontuacao = $Pontuacao;
                $product->Utilizador_idUtilizador = $idUtilizador;
                $product->Fabricante_idFabricante = $fabricante;
                $product->Plataforma_idPlataforma = $plataforma;




                if ($product->update()) {
                    header("Location:index.php?page=videojogo/admin_videojogo");
                    $msg['info'][] = "Succesfully updated";
                }
            }
        }

        return $msg;
    }

    public static function deleteVideoJogo($msg) {

        if (isset($_GET['idVideoJogo'])) {
            $product = new VideoJogo();
            $product->idVideoJogo = $_GET['idVideoJogo'];
            $product->retrieveById();
            if ($product->delete()) {
                header("Location:index.php?page=videojogo/admin_videojogo");
            } else {
                $msg['error'][] = "An error occurred while deleting product {$product->idVideoJogo}.";
            }
        }
        return $msg;
    }

    public static function processSearchFab() {

        $fab = $_POST['fab'];
        VideoJogo::retrievebyFab($fab);
    }

    public static function processSearchPrice() {

        $price = $_POST['price'];

        if ($price == 1) {
            header("Location:index.php?page=videojogo/videojogo_price_lower");
        }
        if ($price == 2) {
            header("Location:index.php?page=videojogo/videojogo_price_higher");
        }
    }

    public static function processVideoJogoImage($msg) {

        $product = new VideoJogo();
        $product->idVideoJogo = $_GET['idVideoJogo'];
        $product->retrieveById();
//        if (UserController::isAdminLoggedIn() || UserController::getLoggedInUser()->idUtilizador == $product->Utilizador_idUtilizador) {

        if (isset($_GET['idVideoJogo'])) {

            $id = $_GET['idVideoJogo'];
            $target_path = "uploads/videojogo/";
            $target_path = $target_path . $id . '.' . basename($_FILES['uploadedfile']['type']);
            $error = 0;
            $imageType = pathinfo($target_path, PATHINFO_EXTENSION);


            if ($imageType != "png") {
                $msg['error'][] = "Error: only PNG files are allowed.";
                $error = 1;
            }
            if ($error == 0) {
                if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
                    $msg['info'][] = "The file " . basename($_FILES['uploadedfile']['name']) .
                            " has been uploaded";
                }
            }
        }
        return $msg;
    }

    public static function processSearchPont() {

        $pont = $_POST['pontuacao'];

        if ($pont == 1) {
            header("Location:index.php?page=videojogo/pontuacao1");
        }
        if ($pont == 2) {
            header("Location:index.php?page=videojogo/pontuacao2");
        }
        if ($pont == 3) {
            header("Location:index.php?page=videojogo/pontuacao3");
        }
        if ($pont == 4) {
            header("Location:index.php?page=videojogo/pontuacao4");
        }
        if ($pont == 5) {
            header("Location:index.php?page=videojogo/pontuacao5");
        }
        if ($pont == 6) {
            header("Location:index.php?page=videojogo/pontuacao6");
        }
        if ($pont == 7) {
            header("Location:index.php?page=videojogo/pontuacao7");
        }
        if ($pont == 8) {
            header("Location:index.php?page=videojogo/pontuacao8");
        }
        if ($pont == 9) {
            header("Location:index.php?page=videojogo/pontuacao9");
        }
        if ($pont == 10) {
            header("Location:index.php?page=videojogo/pontuacao10");
        }
    }

    public static function processSearch() {

        $search = $_POST['search'];

        return $search;
    }

}
