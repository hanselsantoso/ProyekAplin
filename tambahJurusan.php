<?php
    include "function.php";
    if (isset($_REQUEST["action"])) {
        if ($_POST["id"] != "" && $_POST["nama"] != "") {
            $cek = checkJurusan($mysqli, $_POST["id"]);
            if ($cek == 1) {
                $message = "ID tidak boleh sama";
            }
            elseif ($cek == 0) {
                $id = $_POST["id"];
                $nama = $_POST["nama"];
                executeNonQuery($mysqli,"insert into jurusan values('$id','$nama')");
                $message = "Jurusan berhasil ditambah";
            }
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
            <h1>Tambah Jurusan</h1>
            <form action="" method="post">
                <div class="container">
                    <div class="collection">
                        <a href="#!" class="collection-item  red darken-4 white-text">
                            <?php 
                            if (isset($message)) {
                                echo $message;
                            } ?>
                        </a>
                    </div>
                    <div class="input-field">
                    <input id="id" name="id" type="text" class="validate">
                    <label for="id">ID Jurusan</label>
                    </div>
                    <div class="input-field">
                    <input id="Nama" name="nama" type="text" class="validate">
                    <label for="Nama">Nama Jurusan</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
            
        </div>
        </div>
    </div>
    
</body>

</html>