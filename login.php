<?php
    if (isset($_POST["login"])) {
        if ($_POST["username"] == "admin" && $_POST["password"]=="admin") {
            header("location:homeAdmin.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "connection.php";
        include "navbar.php";
    ?>
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <div style="text-align: center">
                <h1>Login</h1>
                <div class="container">
                    <div class="input-field">
                    <input id="username" name="username" type="text" class="validate">
                    <label for="username">Username</label>
                    </div>
                    <div class="input-field">
                    <input id="password" name="password"  type="password" class="validate">
                    <label for="password">Password</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="login">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </div>
    </form>
    
    

    
</body>

</html>