<?php

require_once (dirname(__FILE__) . "/UserController.php");
require_once dirname(__FILE__) . '/VideoJogoController.php';
require_once dirname(__FILE__) . '/FabricanteController.php';
require_once dirname(__FILE__) . '/PlataformaController.php';
require_once(dirname(__FILE__) . "/../BL/Carrinho.php");
require_once(dirname(__FILE__) . "/../BL/Fabricante.php");
require_once(dirname(__FILE__) . "/../BL/Pagamento.php");
require_once(dirname(__FILE__) . "/../BL/Plataforma.php");
require_once(dirname(__FILE__) . "/../BL/Utilizador.php");
require_once(dirname(__FILE__) . "/../BL/VideoJogo.php");
require_once(dirname(__FILE__) . "/../BL/VideoJogo_Carrinho.php");

class MainController {

    public static function process() {
        session_start();
        $msg = array();


        $msg = VideoJogoController::process($msg);
        $msg = FabricanteController::process($msg);
        $msg = PlataformaController::process($msg);
        $msg = UserController::process($msg);

        return $msg;
    }

    public static function getMainMenu() {

        $menu = [
            [
                'text' => 'Home',
                'url' => 'index.php',
                'visible' => 'return true;'
            ],
            [
                'text' => 'Products',
                'url' => 'index.php?page=videojogo/videojogo_table',
                'visible' => 'return true;'
            ],
            [
                'text' => 'Producers',
                'url' => 'index.php?page=fabricante',
                'visible' => 'return true;'
            ],
            [
                'text' => 'Administração',
                'url' => 'index.php?page=user/administracao',
                'visible' => 'return UserController::isAdminLoggedIn();'
            ]
        ];
        return ($menu);
    }

    public static function getMenuSuperior() {
        $menu = [
            [
                'text' => 'Login',
                'url' => 'index.php?page=user/login',
                'visible' => 'return !UserController::getSessionUserId();'
            ],
            [
                'text' => 'Logout',
                'url' => 'index.php?logout',
                'visible' => 'return UserController::getSessionUserId();'
            ],
            [
                'text' => 'Help',
                'url' => 'index.php?page=help',
                'visible' => 'return true;'
            ]
        ];
        return ($menu);
    }

    public static function getMainMenu2() {
        if (UserController::getLoggedInUser()) {
            $utilizador = new Utilizador();
            $utilizador->Username = UserController::getLoggedInUser()->Username;
            $utilizador->getById();
        }
        $menu = [
            [
                'text' => 'Home',
                'url' => 'index.php',
                'visible' => 'return true;'
            ],
            [
                'text' => 'Products',
                'url' => 'index.php?page=videojogo/videojogo_table',
                'visible' => 'return true;'
            ],
            [
                'text' => 'Producers',
                'url' => 'index.php?page=fabricante',
                'visible' => 'return true;'
            ],
            [
                'text' => 'Administração',
                'url' => 'index.php?page=user/administracao',
                'visible' => 'return UserController::isAdminLoggedIn();'
            ],
            [
                'text' => $utilizador->Username,
                'url' => 'index.php?page=user/UserProfile',
                'visible' => 'return UserController::getLoggedInUser() ;'
            ]
        ];
        return ($menu);
    }

}
