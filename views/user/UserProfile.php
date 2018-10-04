<?php
if (UserController::getSessionUserId()) {
    ?>


    <link href="CSS/CSS_UserProfile/estilos_profile_desktop.css" rel="stylesheet" type="text/css"/>
    <main>
                <div id="wrapper">
                    <h1> User Profile: </h1>
                    <?php
                    require_once(dirname(__FILE__) . "/../../BL/Utilizador.php");
                    require_once(dirname(__FILE__) . "/../../Controllers/UserController.php");
                    $user = new Utilizador();
                    $user->idUtilizador = UserController::getLoggedInUser()->idUtilizador;
                    $user->getById();
                    ?>
                        <?php
                        echo "<p> Username: {$user->Username}</p>";
                        ?>
                        <?php
                        echo "<p>E-mail: {$user->Email}</p>";
                        echo "<p>Contribuinte: {$user->Contribuinte}</p>";
                        if (UserController::isAdminLoggedIn() || UserController::getLoggedInUser()->idUtilizador == $user->idUtilizador) {
                            echo ' <a href="index.php?page=user/edit_profile">[Edit Profile]</a>';
                        }
                        ?>
                    </div>
    </main>

    <?php
} else {
    header("Location:index.php?page=user/create");
}
?> 