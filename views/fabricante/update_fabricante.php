<script src="JavaScript/ajax.js" type="text/javascript"></script>

<div id="content">

    <?php if (isset($_GET['idFabricante'])) { ?>
        <h1>Edit Fabricante No.<?php echo $_GET['idFabricante']; ?></h1>

        <button onclick="backHistory()">Back</button>

        <?php
        require_once(dirname(__FILE__) . "/../messages.php");

        $fabricante = new Fabricante();
        $fabricante->idFabricante = $_GET['idFabricante'];
        $fabricante->retrieveById();
        ?>

        <form method="post">

            <label>Fabricante Name: </label>
            <input type="text" name="fab" value="<?php
            if (isset($fabricante->Fabricante)) {
                echo $fabricante->Fabricante;
            }
            ?>"/>
            <br/>


            <input type="submit" name="update_fabricante" value="Save Changes" />

        </form>
</div>
    <?php } ?>