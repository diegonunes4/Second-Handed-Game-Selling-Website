<script src="JavaScript/ajax.js" type="text/javascript"></script>

<?php
if (UserController::getSessionUserId()) {
    ?>

    <main>
        <div id="content">
                <button onclick="backHistory()">Back</button>
                <h1>Edit User Profile (@<?php echo UserController::getLoggedInUser()->Username; ?>)</h1>



                <?php
                require_once(dirname(__FILE__) . "/../messages.php");
                ?>

                <form method="post">

                    <label>Username: </label>
                    <input type="text" name="username" value="<?php
                    if (isset(UserController::getLoggedInUser()->Username)) {
                        echo UserController::getLoggedInUser()->Username;
                    }
                    ?>"/>
                    <br/>

                    <label>Email: </label>
                    <input type="email" name="email" value="<?php
                    if (isset(UserController::getLoggedInUser()->Email)) {
                        echo UserController::getLoggedInUser()->Email;
                    }
                    ?>"/>
                    <br/>

                    <label>Contribuinte: </label>
                    <input type="number" name="contribuinte" value="<?php
                    if (isset(UserController::getLoggedInUser()->Contribuinte)) {
                        echo UserController::getLoggedInUser()->Contribuinte;
                    }
                    ?>"/>
                    <br/>

                    <input type="submit" name="update_profile" value="Save Changes" />
                    <br/>
                    <br/>
                </form>

                <form method="post">
                    <label>Password: </label>
                    <input type="password" name="password"/>
                    <br/>
                    <label for="ConfirmPassword">Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password">
                    <br/>
                    <input type="submit" name="edit-password" value="Update Password" />
                    <br/>
                    <br/>
                </form>

            </div>
        </main>
        <?php
    } else {
        header("Location:index.php?page=user/login");
    }
    ?>