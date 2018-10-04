
<script src="JavaScript/ajax.js" type="text/javascript"></script>

<main>
    <div id="tables-edit">


        <?php
        if (UserController::isAdminLoggedIn()) {
            ?>

            <div id="videojogo-table">

                <h1>Edit Users</h1>

                <button onclick="backHistory()">Back</button>

                <a href="index.php?page=user/create"><button class="alink">Create User</button></a>

                <br>
                <br>

                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Contribuinte</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php
                    $utilizador = Utilizador::getAll();
                    while ($p = $utilizador->fetch()) {


                        $user = new Utilizador();
                        $user->idUtilizador = $p->idUtilizador;
                        $user->getById();
                        ?>

                        <tr>
                            <?php
                            echo "<td>";
                            echo '<a href="index.php?page=user/profile&idUtilizador=' . $p->idUtilizador . '">' . $p->Username . '</a>';
                            echo "</td>";
                            echo "<td>";
                            echo '<a href="index.php?page=user/profile&idUtilizador=' . $p->idUtilizador . '">' . $p->Email . '</a>';
                            echo "</td>";
                            echo "<td>";
                            echo '<a href="index.php?page=user/profile&idUtilizador=' . $p->idUtilizador . '">' . $p->Contribuinte . '</a>';
                            echo "</td>";
                            echo "<td>";
                            echo '<a href="index.php?page=user/update_user&idUtilizador=' . $p->idUtilizador . '">Update</a>';
                            echo '<br/>';
                            echo '<a href="index.php?page=user/delete&action=delete_user&idUtilizador=' . $p->idUtilizador . '">Delete</a>';
                            echo '<br/>';
                            echo "</td>";
                            ?>
                        </tr>
                        <?php
                    }
                    $utilizador->closeCursor();
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
