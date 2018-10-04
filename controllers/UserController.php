<?php

require_once(dirname(__FILE__) . '/../BL/Utilizador.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author DiegoNunes
 */
class UserController {

    public static function process($msg) {

        if (Utilizador::Admin() == 0) {
            $msg = self::CreateAdmin($msg);
        }


        if (isset($_POST['register'])) {
            $msg = self::processRegistration($msg);
        }

        if (isset($_POST['update_profile'])) {
            $msg = self::processUpdate($msg);
        }
        if (isset($_POST['edit-password'])) {
            $msg = self::processUpdatePassword($msg);
        }


        if (isset($_POST['update_user']) && UserController::isAdminLoggedIn()) {
            $msg = self::processUpdateAdmin($msg);
        }


        if (isset($_GET['action']) && $_GET['action'] == 'delete_user' && UserController::isAdminLoggedIn()) {
            $msg = self::deleteUser($msg);
        }

        if (isset($_POST['process-login'])) {
            $msg = self::processLogin($msg);
        } else if (isset($_GET['logout'])) {
            $msg = self::logout($msg);
        }

        if (isset($_POST['update_profile'])) {
            $msg = self::processUpdate($msg);
        }

        return $msg;
    }

    public static function processRegistration($msg) {


        $Username = $_POST['username'];
        $Email = $_POST['email'];
        $Password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $Contribuinte = $_POST['contribuinte'];



        $error = false;


        if ($Username == null || $Email == null || $Password == null || $confirm_password == null || $Contribuinte == null) {
            $msg['error'][] = "Fields marked with * are required! Try again 😃	";
            $error = true;
        }
        if ($Password != $confirm_password) {
            $msg['error'][] = "Passwords must match! 😉";
            $error = true;
        }

        $user = new Utilizador();

        $user->Admin = 0;
        $user->Username = $Username;
        $user->Email = $Email;

        if ($user->getByEmail()) {
            $msg['error'][] = "Email already in use! 😕";
            $error = true;
        }
        if ($user->getByName()) {
            $msg['error'][] = "Username already in use! We feel sorry 😔";
            $error = true;
        }
        if ($error == true) {
            return $msg;
        }


        $user->Password = $Password;
        $user->Contribuinte = $Contribuinte;
        if ($user->create()) {
            $msg['info'][] = "Succesfully registered! 😎";
        }

        return $msg;
    }

    public static function processLogin($msg) {

        $Username = $_POST['username'];
        $Password = $_POST['password'];
        $user = new Utilizador();
        $user->Username = $Username;
        $user->Password = $Password;
        if ($user->getByLoginAndPassword()) {
            $msg['info'][] = "User logged in!";
            self::setSessionUserId($user);
            header("Location:index.php?page=home");
        } else {
            $msg['error'][] = "Login or password is invalid";
        }
        return $msg;
    }

    public static function processUpdate($msg) {

        $user_name = $_POST['username'];
        $emai = $_POST['email'];
        $contr = $_POST['contribuinte'];
        $idUser = self::getLoggedInUser()->idUtilizador;

        $user = new Utilizador();
        $user->idUtilizador = $idUser;

        $user->Username = $user_name;
        $user->Email = $emai;
        $user->Contribuinte = $contr;

        if ($user->update()) {
            $msg['info'][] = "Succesfully updated";
        }

        return $msg;
    }

    public static function processUpdateAdmin($msg) {

        if (isset($_GET['idUtilizador'])) {

            $idUtilizador = $_GET['idUtilizador'];
            $user_name = $_POST['username'];
            $pass = $_POST['password'];
            $email = $_POST['email'];
            $contribuinte = $_POST['contribuinte'];

            $user = new Utilizador();
            $user->idUtilizador = $idUtilizador;
            $user->Password = $pass;
            $user->Username = $user_name;
            $user->Email = $email;
            $user->Contribuinte = $contribuinte;

            if ($user->update()) {
                $msg['info'][] = "Succesfully updated";
                header("Location:index.php?page=user/admin_user");
            }

            return $msg;
        }
    }

    public static function processUpdatePassword($msg) {

        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $idUser = self::getLoggedInUser();

        $error = false;

        $user = new Utilizador();
        $user->idUtilizador = $idUser;
        $user->Password = $password;

        if ($password != $confirm_password) {
            $msg['error'][] = "Passwords must match";
            $error = true;
        }

        if ($user->updatePassword()) {
            $msg['info'][] = "Succesfully updated";
        }

        return $msg;
    }

    public static function deleteUser($msg) {

        if (isset($_GET['idUtilizador'])) {

            $user = new Utilizador();
            $user->idUtilizador = $_GET['idUtilizador'];
            if ($user->delete()) {
                header("Location:index.php?page=user/admin_user");
                $msg['info'][] = "User {$user->idUtilizador} was deleted.";
            } else {
                header("Location:index.php?page=user/admin_user");
                $msg['error'][] = "An error occurred while deleting user {$user->idUtilizador}.";
            }
        }
        return $msg;
    }

    public static function CreateAdmin($msg) {
        $user = new Utilizador();
        $user->Username = 'admin';
        $user->Contribuinte = '165987456';
        $user->Email = 'admin@itgaming.com';
        $user->Password = 'admin';
        $user->createAdmin();
    }

    public static function logout($msg) {
        $_SESSION = array();

        if (ini_get("session-user_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
        }

        session_destroy();
        $msg['info'][] = "Utilizador logged out";
        return $msg;
    }

    public static function setSessionUserId($idUser) {
        $_SESSION['idUser'] = $idUser;
    }

    public static function getSessionUserId() {
        return isset($_SESSION['idUser']) ? $_SESSION['idUser'] : null;
    }

    public static function isAdminLoggedIn() {
        $user = self::getLoggedInUser();
        return ($user && $user->isAdmin());
    }

    public static function getLoggedInUser() {
        if ($user = self::getSessionUserId()) {
            return $user->getById();
        } else {
            return null;
        }
    }

}
