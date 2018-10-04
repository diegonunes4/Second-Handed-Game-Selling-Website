<script src="JavaScript/ajax.js" type="text/javascript"></script>

<div id="content">

    <?php if (isset($_GET['idPlataforma'])) { ?>
        <h1>Edit Plataforma No.<?php echo $_GET['idPlataforma']; ?></h1>

        <button onclick="backHistory()">Back</button>

        <?php
        require_once(dirname(__FILE__) . "/../messages.php");

        $plataforma = new Plataforma();
        $plataforma->idPlataforma = $_GET['idPlataforma'];
        $plataforma->retrieveById();
        ?>

        <form method="post">

            <label>Plataforma Name: </label>
            <input type="text" name="plataf" value="<?php
            if (isset($plataforma->Plataforma)) {
                echo $plataforma->Plataforma;
            }
            ?>"/>
            <br/>


            <input type="submit" name="update_plataforma" value="Save Changes" />

        </form>
</div>
    <?php } ?>