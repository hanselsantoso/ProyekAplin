<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "connection.php";
        include "adminNavbar.php";
        include "function.php";

        if (isset($_REQUEST['action'])) 
        {
            if ($_REQUEST['action'] == "register") {
                $iNama = $_REQUEST['nama'];
                $iPassword = $_REQUEST['password'];
                executeNonQuery($mysqli,"insert into dosen (nama,password) values('$iNama','$iPassword')");
            }    
        }
    ?>
</head>
<body>

    <div class="row">
        <?php include "adminDashboard.php" ?>
        <div class="col s10">
        <div style="text-align: center">
            <h1>Register Dosen</h1>
            <form action="" method="post">
                <div class="container">
                    <div class="input-field">
                    <input id="Nama" type="text" class="validate" name="nama">
                    <label for="Nama">Nama</label>
                    </div>
                    <div class="input-field">
                    <input id="Password" type="text" class="validate" name="password">
                    <label for="Password">Password</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action" value="register">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
        </div>
    </div>
    
</body>

</html>