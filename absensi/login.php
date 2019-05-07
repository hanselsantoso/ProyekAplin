<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "connection.php";
        include "navbar.php";
        include "function.php";

        
    ?>
</head>
<body>
    <div class="container">
        <div style="text-align: center">
            <h1>Login</h1>
            <div class="container">
                <div class="input-field">
                <input id="nama" type="text" class="validate" name="nama">
                <label for="Nama">Username</label>
                </div>
                <div class="input-field">
                <input id="password" type="text" class="validate" name="password">
                <label for="Password">Password</label>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </div>
    

    
</body>

</html>