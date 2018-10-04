<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
require_once(dirname(__FILE__) . "/controllers/MainController.php");
$msg = MainController::process();

require_once(dirname(__FILE__) . "/BL/Carrinho.php");
require_once(dirname(__FILE__) . "/BL/Fabricante.php");
require_once(dirname(__FILE__) . "/BL/Pagamento.php");
require_once(dirname(__FILE__) . "/BL/Plataforma.php");
require_once(dirname(__FILE__) . "/BL/Utilizador.php");
require_once(dirname(__FILE__) . "/BL/VideoJogo.php");
require_once(dirname(__FILE__) . "/BL/VideoJogo_Carrinho.php");
?>


<html>
    <head>
        <title>ITGaming</title>
        <link href="CSS/estilos.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body>

        <div class="page">
            <header class="page">
                <div id="navigationcontainer" >
                    <ul>
                        <?php
                        $menu = MainController::getMenuSuperior();
                        foreach ($menu as $item) {
                            if (eval($item['visible'])) {
                                echo '<li><a href="' . $item['url'] . '">' . $item['text'] . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                    <div>
                        <a href="index.php?page=home">  <img id="logo" src="CSS/IMG/ITGamingLogo.png" alt="Logotipo ITGaming"/></a>
                    </div>
                    <div class="search">
                        <form method="post" action="index.php?page=videojogo/videojogo_search">
                            <input class="lupa" type="image" src="CSS/IMG/Lupa(20x20).png"/>
                            <input class="border_bar" type="search" name="search" placeholder="Search"/>
                        </form>
                    </div> 
                </div>


            </header>

            <section id="colleft">
                <nav>
                    <ul>
                        <?php
                        if (UserController::getLoggedInUser()) {
                            $menu = MainController::getMainMenu2();
                            foreach ($menu as $item) {
                                if (eval($item['visible'])) {
                                    echo '<li><a href="' . $item['url'] . '">' . $item['text'] . '</a></li>';
                                }
                            }
                        } else {
                            $menu = MainController::getMainMenu();
                            foreach ($menu as $item) {
                                if (eval($item['visible'])) {
                                    echo '<li><a href="' . $item['url'] . '">' . $item['text'] . '</a></li>';
                                }
                            }
                        }
                        ?>
                    </ul>
                </nav>
            </section>

            <div id="middle">
                <?php
                $file = "home.php";
                if (isset($_GET['page'])) {
                    $f = $_GET['page'] . ".php";
                    if (file_exists("views/$f")) {
                        $file = $f;
                    }
                }
                require_once("views/$file");
                ?>
            </div>

            <footer class="page"> 

                <div>
                    <p class="left"><img id="payments" src="CSS/IMG/payments.png" alt="PaymentsMethod"/></p>

                    <p class="right">Email: service@itgaming.com<br/>
                        Phone: +351255721698<br/>
                        Work days 12:00 - 20:00<br/>
                        Weekend 12:00 - 18:00</p>
                    <p class="centered">ITGaming LTD <br/>
                        Porto, Portugal<br/>
                        4580-007<br/>
                        All Rights Reserved. © 2011-2017</p>
                </div>

            </footer>

        </div>
    </body>
</html>