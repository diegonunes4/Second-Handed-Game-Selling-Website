<script src="JavaScript/ajax.js" type="text/javascript"></script>
<main>
    <div id="content">

        <?php if (isset($_GET['idVideoJogo'])) { ?>
            <button onclick="backHistory()">Back</button>
            <h1>Edit VideoJogo No.<?php echo $_GET['idVideoJogo']; ?></h1>
            <?php
            require_once(dirname(__FILE__) . "/../messages.php");

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

            <form method="post">

                <label>Titulo: </label>
                <input type="text" name="titulo" value="<?php
                if (isset($videojogo->Titulo)) {
                    echo $videojogo->Titulo;
                }
                ?>"/>
                <br/>

                <label>Preco: </label>
                <input type="number" name="preco" value="<?php
                if (isset($videojogo->Preco)) {
                    echo $videojogo->Preco;
                }
                ?>"/>
                <br/>

                <label>Date: </label>
                <input type="date" name="date" value="<?php
                if (isset($videojogo->Data)) {
                    echo $videojogo->Data;
                }
                ?>"/>
                <br/>

                <label>Pontuacao: </label>
                <input type="text" name="pontuacao" value="<?php
                if (isset($videojogo->Pontuacao)) {
                    echo $videojogo->Pontuacao;
                }
                ?>"/>
                <br/>

                <label>Fabricante: </label>
                <select name="fabricantes">
                    <?php
                    $res = Fabricante::retrieveAll();
                    while ($fabricante = $res->fetch()) {
                        echo "<option value='" . $fabricante->idFabricante . "'>" . $fabricante->Fabricante . "</option>";
                    }
                    ?>
                </select>
                <br/>


                <label>Plataforma: </label>
                <select name="plataformas">
                    <?php
                    $res = Plataforma::retrieveAll();
                    while ($plataforma = $res->fetch()) {
                        echo "<option value='" . $plataforma->idPlataforma . "'>" . $plataforma->Plataforma . "</option>";
                    }
                    ?>
                </select>
                <br/>

                <input type="submit" name="update_videojogo" value="Save Changes" />
                <br/>
                <br/>



            </form>
    </main>


<?php } ?>