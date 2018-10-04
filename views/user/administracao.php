<main>
<div id="content">

    <?php
    if (UserController::isAdminLoggedIn()) {
        ?>

        <h1>Administração</h1>

        <ul class="management">
            <li><a href="index.php?page=videojogo/admin_videojogo"><i class="fa-pencil"></i>Edit Videojogos</a></li>
            <br/>
            <br/>
            <li><a href="index.php?page=plataforma/admin_plataforma"><i class="fa-pencil"></i>Edit Plataformas</a></li>
            <br/>
            <br/>
            <li><a href="index.php?page=user/admin_user"><i class="fa-pencil"></i>Edit Utilizadores</a></li>
            <br/>
            <br/>
            <li><a href="index.php?page=fabricante/admin_fabricante"><i class="fa-pencil"></i>Edit Fabricante</a></li>
        </ul>
        <?php
    } else {
        header("Location:index.php?page=Home");
    }
    ?>

</div>
</main>
