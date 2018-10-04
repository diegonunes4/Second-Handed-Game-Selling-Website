<main>
    <div id="createElementos">
        <div id="regist">
            <h2> Regist User </h2>
            <form method="post">
                <div>
                    <label for="Username">*Username: </label>
                    <input type="text" name="username" id="login"/>
                </div>
                <div>
                    <label for="E-mail">*E-mail:</label>
                    <input type="email" name="email" id="email"/>
                </div>
                 <div>
                    <label for="Contribuinte">*Contribuinte:</label>
                    <input type="number" name="contribuinte" id="contribuinte">
                </div>  
                <div>
                    <label for="Password">*Password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div>
                    <label for="ConfirmPassword">*Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password">
                </div>   
                <div id = "botao">
                    <input class="buttonsubmit" type="submit" name="register" value="Create Account">
                </div>
                <?php
            require_once(dirname(__FILE__) . "/../messages.php");
            ?>
                
            </form>
        </div>
    </div>
</main>

