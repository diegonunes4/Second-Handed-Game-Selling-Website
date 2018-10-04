<main>
    <div>
        <h3>DESTAQUES</h3>

        <div class="img">
            <img src="CSS/IMG/deal.jpg" alt="Destaques" height="300" width="700"/>
        </div>

        <h3>PROMOÇÕES</h3>

        <div class="ImagensPromocoes">
            <div class="imgPromocoes">
                <img src="CSS/IMG/battleground.jpg" alt="PlayerUnknown's Battleground" height="200" width="140"/>
                <p class="descricaoimagens">Desde 25,75€</p>
            </div>

            <div class="imgPromocoes">
                <img src="CSS/IMG/cs.jpg" alt="CS: Global Offensive"  height="200" width="140"/>
                <p class="descricaoimagens">Desde 9,40€</p>
            </div>

            <div class="imgPromocoes">
                <img src="CSS/IMG/gta.jpg" alt="GTA V" height="200" width="140"/>
                <p class="descricaoimagens">Desde 25,75€</p>                             
            </div>

        </div>

        <div id="tables-edit">
            <h2>Last Added VideoGames </h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <?php
                $videojogos = VideoJogo::getLastVideoJogos();

                while ($p = $videojogos->fetch()) {

                    $user = new Utilizador();
                    $user->idUtilizador = $p->Utilizador_idUtilizador;
                    $user->getById();
                    ?>

                    <tr>
                        <?php
                        echo "<td>";
                        if (UserController::getLoggedInUser()) {
                            echo '<a href="index.php?page=videojogo/videojogo_page&idVideoJogo=' . $p->idVideoJogo . '">' . $p->Titulo . '</a>';
                        } else {
                            echo "{$p->Titulo}";
                        }
                        echo "</td>";
                        echo "<td>{$p->Preco}€</td>";
                        echo "<td>{$p->Pontuacao}</td>";
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
</main>