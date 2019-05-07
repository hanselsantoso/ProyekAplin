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
                $iRuangan = $_REQUEST['nama'];
                // executeNonQuery($mysqli,"insert into ruangan (id_ruangan,nama_ruangan) values('','$iRuangan')");
                insertRuangan($mysqli,$iRuangan);
            }    
        }


    ?>
</head>
<body>
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
    <div class="row">
        <?php include "adminDashboard.php" ?>
        <div class="col s10">
        <div style="text-align: center">
            <h1>Tambah Ruangan</h1>
            <form action="" method="post">
                <div class="container">
                    <div class="input-field">
                    <input id="nama" type="text" class="validate" name="nama">
                    <label for="Nama">Nama Ruangan</label>
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