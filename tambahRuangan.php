<?php
    include "function.php";
    if (isset($_POST["action"])) {
        if ($_POST["nama"] != "" && $_POST["kapasitas"] != "") {
            $nama = $_POST["nama"];
            $kapasitas = $_POST["kapasitas"];

            $hasil = executeQuery($mysqli,"select max(substr(id_ruangan,3,3)) from ruangan");
            $urutan = (int)$hasil[0][0] + 1;
            $id = "RU".str_pad((string)$urutan, 3, "0", STR_PAD_LEFT);
            executeNonQuery($mysqli,"insert into ruangan values('$id','$nama','$kapasitas')");
            $message = "Ruangan berhasil ditambah";
        } else {
            $message = "Field harus diisi!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "connection.php";
        include "adminNavbar.php";
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
            <div class="container">
                <div class="collection" style="display:<?php if (!isset($message)) {echo "none";}?>">
                    <a href="#!" class="collection-item  
                    <?php 
                    if ($message == "Ruangan berhasil ditambah") {
                        echo "green darken-4";
                    } else {
                        echo "red darken-4";
                    }
                    ?>  white-text">
                        <?php 
                        if (isset($message)) {
                            echo $message;
                        } ?>
                    </a>
                </div>
                <form action="" method="post">
                    <div class="input-field">
                    <input id="Nama" name="nama" type="text" class="validate">
                    <label for="Nama">Nama Ruangan</label>
                    </div>
                    <div class="input-field">
                    <input id="kapasitas" name="kapasitas" type="text" class="validate">
                    <label for="kapasitas">Kapasitas Ruangan</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </form>
                
            </div>
        </div>
        </div>
    </div>
    
</body>

</html>