<script src="JavaScript/ajax.js" type="text/javascript"></script>

<main>
    <div id="tables-edit">


        <?php
        if (UserController::isAdminLoggedIn()) {
            ?>


                <h1>Edit Videojogo</h1>

                <button onclick="backHistory()">Back</button>

                <a href="index.php?page=videojogo/create"><button class="alink">Create Product</button></a>

                <br>
                <br>

                <table>
                    <thead>
                        <tr>
                            <th>VideoJogo Nº</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php
                    $videojogo = VideoJogo::retrieveAll();
                    while ($p = $videojogo->fetch()) {


                        $user = new Utilizador();
                        $user->Utilizador_idUtilizador = $p->Utilizador_idUtilizador;
                        $user->getById();
                        ?>

                        <tr>
                            <?php
                            echo "<td>";
                            echo '<a href="index.php?page=videojogo/videojogo_page&idVideoJogo=' . $p->idVideoJogo . '">' . $p->idVideoJogo . '</a>';
                            echo "</td>";
                            echo "<td>";
                            echo '<a href="index.php?page=videojogo/videojogo_page&idVideoJogo=' . $p->idVideoJogo . '">' . $p->Titulo . '</a>';
                            echo "</td>";
                            echo "<td>";
                            echo '<a href="index.php?page=videojogo/videojogo_page&idVideoJogo=' . $p->idVideoJogo . '">' . $p->Preco . '</a>';
                            echo "</td>";
                            echo "<td>";
                            echo '<a href="index.php?page=videojogo/update_videojogo&idVideoJogo=' . $p->idVideoJogo . '">Update</a>';
                            echo '<br/>';
                            echo '<a href="index.php?page=videojogo/delete&action=deleteVideoJogo&idVideoJogo=' . $p->idVideoJogo . '">Delete</a>';
                            echo '<br/>';
                            echo "</td>";
                            ?>
                        </tr>
                        <?php
                    }
                    $videojogo->closeCursor();
                    ?>

                </table>
                <br>
                <br>

            <?php
        } else {
            header("Location:index.php?page=Home");
        }
        ?>
    </div>
</main>
