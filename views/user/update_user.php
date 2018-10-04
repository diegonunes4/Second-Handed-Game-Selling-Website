<script src="JavaScript/ajax.js" type="text/javascript"></script>
<main>
    <div id="content">

        <?php if (isset($_GET['idUtilizador'])) { ?>
            <button onclick="backHistory()">Back</button>
            <h1>Edit Utilizador No.<?php echo $_GET['idUtilizador']; ?></h1>
            <?php
            require_once(dirname(__FILE__) . "/../messages.php");

            $utilizador = new Utilizador();
            $utilizador->idUtilizador = $_GET['idUtilizador'];
            $utilizador->getById();
            ?>

            <form method="post">

                <label>Username: </label>
                <input type="text" name="username" value="<?php
                if (isset($utilizador->Username)) {
                    echo $utilizador->Username;
                }
                ?>"/>
                <br/>

                <label>Email: </label>
                <input type="email" name="email" value="<?php
                          if (isset($utilizador->Email)) {
                              echo $utilizador->Email;
                          }
                          ?>"/>
                <br/>

                <label>Password: </label>
                <input type="password" name="password" value="<?php
                if (isset($utilizador->Password)) {
                    echo $utilizador->Password;
                }
                ?>"/>
                <br/>

                <label>Contribuinte: </label>
                <input type="number" name="contribuinte" value="<?php
                if (isset($utilizador->Contribuinte)) {
                    echo $utilizador->Contribuinte;
                }
                ?>"/>
                <br/>

                <input type="submit" name="update_user" value="Save Changes" />
                <br/>
                <br/>



            </form>
    </div>
    </main>


<?php } ?>