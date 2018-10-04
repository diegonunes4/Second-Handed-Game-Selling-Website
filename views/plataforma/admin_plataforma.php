<script src="JavaScript/ajax.js" type="text/javascript"></script>

<main>
    <div id="tables-edit">


        <?php
        if (UserController::isAdminLoggedIn()) {
            ?>

            <div id="plataforma-table">

                <h1>Edit Plataformas</h1>

                <button onclick="backHistory()">Back</button>

                <a href="index.php?page=plataforma/create"><button class="alink">Create Plataforma</button></a>

                <br>
                <br>

                <table>
                    <thead>
                        <tr>
                            <th>ID da Plataforma</th>
                            <th>Plataforma</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php
                    $plataforma = Plataforma::retrieveAll();
                    while ($p = $plataforma->fetch()) {


                        $user = new Plataforma();
                        $user->idPlataforma = $p->idPlataforma;
                        $user->retrieveById();
                        ?>

                        <tr>
                            <?php
                            echo "<td>$p->idPlataforma</td>";
                            echo "<td>$p->Plataforma</td>";
                            echo "<td>";
                            echo '<a href="index.php?page=plataforma/update_plataforma&idPlataforma=' . $p->idPlataforma . '">Update</a>';
                            echo '<br/>';
                            echo '<a href="index.php?page=plataforma/delete&action=deletePlataforma&idPlataforma=' . $p->idPlataforma . '">Delete</a>';
                            echo '<br/>';
                            echo "</td>";
                            ?>
                        </tr>
                        <?php
                    }
                    $plataforma->closeCursor();
                    ?>

                </table>
                <br>
                <br>
            </div>

            <?php
        } else {
            header("Location:index.php?page=Home");
        }
        ?>
    </div>
</main>