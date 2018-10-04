<script src="JavaScript/ajax.js" type="text/javascript"></script>

<main>


        <?php
        if (UserController::isAdminLoggedIn()) {
            ?>
      
            <div id="tables-edit">
                <h1>Edit Fabricantes</h1>

                <button onclick="backHistory()">Back</button>

                <a href="index.php?page=fabricante/create"><button class="alink">Create Fabricante</button></a>

                <br>
                <br>

                <table>
                    <thead>
                        <tr>
                            <th>ID do Fabricante</th>
                            <th>Fabricante</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php
                    $fabricante = Fabricante::retrieveAll();
                    while ($p = $fabricante ->fetch()) {


                        $user = new Fabricante ();
                        $user->idFabricante = $p->idFabricante;
                        $user->retrieveById();
                        ?>

                        <tr>
                            <?php
                            echo "<td>$p->idFabricante</td>";
                            echo "<td>$p->Fabricante</td>";
                            echo "<td>";
                            echo '<a href="index.php?page=fabricante/update_fabricante&idFabricante=' . $p->idFabricante . '">Update</a>';
                            echo '<br/>';
                            echo '<a href="index.php?page=fabricante/delete&action=deleteFabricante&idFabricante=' . $p->idFabricante . '">Delete</a>';
                            echo '<br/>';
                            echo "</td>";
                            ?>
                        </tr>
                        <?php
                    }
                    $fabricante ->closeCursor();
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
</main>