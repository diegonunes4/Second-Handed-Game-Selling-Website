            <div id="tables-edit">
                <h1>Search results for "<?php echo VideoJogoController::processSearch(); ?>"</h1>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Score</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <?php
                    $videojogos = VideoJogo::getSearch(VideoJogoController::processSearch());

                    while ($p = $videojogos->fetch()) {

                        $user = new Utilizador();
                        $user->idUtilizador = $p->Utilizador_idUtilizador;
                        $user->getById();
                        ?>

                        <tr>
                            <?php
                            echo "<td>";
                            echo '<a href="index.php?page=videojogo/videojogo_page&idVideoJogo=' . $p->idVideoJogo . '">';
                            echo '</a>';
                            echo "</td>";
                            echo "<td>";
                            if (UserController::getLoggedInUser()) {
                                echo '<a href="index.php?page=videojogo/videojogo_page&idVideoJogo=' . $p->idVideoJogo . '">' . $p->Titulo . '</a>';
                            } else {
                                echo "{$p->Titulo}";
                            }
                            echo "</td>";
                            echo "<td>{$p->Data}</td>";
                            echo "<td>{$p->Pontuacao}</td>";
                            echo "<td>{$p->Preco}</td>";
                            ?>
                        </tr>
                        <?php
                    }
                    $videojogos->closeCursor();
                    ?>

                </table>
                <br>
                <br>
            </div>