<?php
if (!UserController::getSessionUserId()) {
    ?>



<main>
        <div class="createElementos">
            <?php
            require_once(dirname(__FILE__) . "/../messages.php");
            ?>
            <form method="post">
                <?php
                require_once(dirname(__FILE__) . "/../messages.php");
                ?>
                <label>Login:</label>
                <input type="text" name="username"/>
                <br/>
                <label>Password:</label>
                <input type="password" name="password"/>
                <br/>
                <button type="submit" name="process-login" value="Login">Login</button>
                <?php
                if (UserController::getSessionUserId()) {
                    header("Location:index.php?page=views/home");
                }
                ?>
                <br/><br/>
                <a href="index.php?page=user/create" id="registo"><strong>Regist Now</strong></a>
                <br/>
                <br/>
            </form>
        </div>
</main>
    <?php
}
?>
