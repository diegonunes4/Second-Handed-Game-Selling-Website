<?php
if (UserController::getSessionUserId()) {
    ?>

<script src="JavaScript/ajax.js" type="text/javascript"></script>


    <link href="CSS/CSS_UserProfile/estilos_profile_desktop.css" rel="stylesheet" type="text/css"/>
    <main>
        <div id="content">
                    <h1> VideoJogo Page </h1>
                    <button onclick="backHistory()">Back</button>
                    <?php
                    require_once(dirname(__FILE__) . "/../../BL/Utilizador.php");
                    require_once(dirname(__FILE__) . "/../../Controllers/UserController.php");
                    $videojogo = new VideoJogo();
                    $videojogo->idVideoJogo = $_GET['idVideoJogo'];
                    $videojogo->retrieveById();

                    $fabricante = new Fabricante();
                    $fabricante->idFabricante = $videojogo->Fabricante_idFabricante;
                    $fabricante->retrieveById();

                    $plataforma = new Plataforma();
                    $plataforma->idPlataforma = $videojogo->Plataforma_idPlataforma;
                    $plataforma->retrieveById();
                    ?>
                    <div id="name_bar">
                        <?php
                        echo "<p> Título: {$videojogo->Titulo}</p>";
                        ?>
                    </div>
                    <div id="content2">
                        <?php
                        echo "<p>Preço: {$videojogo->Preco}€</p>";
                        echo "<p>Data de Lançamento: {$videojogo->Data}</p>";
                        echo "<p>Pontuação(0-10): {$videojogo->Pontuacao}</p>";
                        echo "<p>Fabricante: {$fabricante->Fabricante} </p>";
                        echo "<p> Plataforma: {$plataforma->Plataforma} </p>";
                        if (UserController::isAdminLoggedIn() || UserController::getLoggedInUser()->idUtilizador == $videojogo->Utilizador_idUtilizador) {
                            echo '<a href="index.php?page=videojogo/update_videojogo&idVideoJogo=' . $videojogo->idVideoJogo . '">[Edit VideoJogo]</a>';
                        }
                        ?>
                        <br>
                        <br>
                    </div>
        </div>
    </main>

    <?php
} else {
    header("Location:index.php?page=user/create");
}
?> 