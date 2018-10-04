
<main>
    <div id="content">

        <div id="middle">
            <div id="colleft_products">
                <h2>VideoJogos Page</h2>
                <h3>Search by:</h3>
                <br/>

                <form method="post">
                    <label>Score</label><br/>
                    <select name="pontuacao">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>

                    <input type="submit" name="search_pontuacao" value="Go" />

                </form>

                <form method="post">
                    <label>Price </label><br/>
                    <select name="price">
                        <option value="1">Lower First</option>
                        <option value="2">Higher First</option>
                    </select>

                    <input type="submit" name="search_price" value="Go" />

                </form>


            </div>
            <br>
            <div id="tables-edit">
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
                    $videojogos = VideoJogo::retrieveAll();

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
        </div>
    </div>


</main>