<script src="JavaScript/ajax.js" type="text/javascript"></script>
<link href="CSS/CSS_UserProfile/estilos_profile_desktop.css" rel="stylesheet" type="text/css"/>
<main>
    <div id="content">
        <h1>User Profile</h1>
        <button onclick="backHistory()">Back</button>

        <?php
        require_once(dirname(__FILE__) . "/../../BL/Utilizador.php");
        require_once(dirname(__FILE__) . "/../../Controllers/UserController.php");
        $user = new Utilizador();
        $user->idUtilizador = $_GET['idUtilizador'];
        $user->getById();
        ?>
        <div id="middle">
            <div id="name_bar">

            </div>
            <div id="wrapper">
                <div id="content2">
                    <?php
                    $user->idUtilizador = UserController::getLoggedInUser()->idUtilizador;
                    echo "<p>Username: {$user->Username}</p>";
                    echo "<p>E-mail: {$user->Email}</p>";
                    echo "<p>Contribuinte: {$user->Contribuinte}</p>";
                    ?> 


                </div>
                <?php
                 if (UserController::getLoggedInUser()->idUtilizador == $user->idUtilizador) {
                    echo ' <a href="index.php?page=user/edit_profile">[Edit Profile]</a>';
                }
                ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</main>