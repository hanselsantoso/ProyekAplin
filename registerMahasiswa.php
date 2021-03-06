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
                if (isset($_POST["jurusan"]) && $_REQUEST['nama'] != "" && $_REQUEST['password'] != "") {
                    $iJurusan = $_REQUEST['jurusan'];
                    $hasil = executeQuery($mysqli, "SELECT COUNT(nrp) FROM mahasiswa WHERE nrp like '%$iJurusan%'"); 
                    $jumlah = $hasil[0][0] + 1;
                    $nrp = $iJurusan.str_pad((string)$jumlah, 4, "0", STR_PAD_LEFT);
                    $iNama = $_REQUEST['nama'];
                    $iPassword = $_REQUEST['password'];
                    executeNonQuery($mysqli,"insert into mahasiswa (nrp,id_jurusan,nama,password) values('$nrp','$iJurusan','$iNama','$iPassword')");
                    $message ="Berhasil insert";
                } else {
                    $message = "Field harus diisi!";
                }
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
            <h1>Register Mahasiswa</h1>
            <?php
            if (isset($message)) {
                echo ("<a class='collection-item'>Alan</a>");
            }
            ?>
            <form action="" method="post">
                <div class="container">
                    <div class="collection" style="display:<?php if (!isset($message)) {echo "none";}?>">
                        <a href="#!" class="collection-item
                        <?php 
                        if ($message == "Berhasil insert") {
                            echo "green darken-4";
                        } else {
                            echo "red darken-4";
                        }
                        ?> white-text">
                            <?php 
                            if (isset($message)) {
                                echo $message;
                            } ?>
                        </a>
                    </div>
                    <div class="input-field">
                        <select name="jurusan">
                        <option value="" disabled selected>Pilih Jurusan</option>
                        <?php
                            $jurusan = executeQuery($mysqli, "SELECT  * FROM jurusan"); 
                            foreach ($jurusan as $key => $value) {?>
                            <tr>
                            <option value="<?php echo($value["id_jurusan"]); ?>"><?php echo($value["nama_jurusan"]); ?></option>
                            </tr>
                            <?php }
                        ?>
                        </select>
                        <label>Pilih Jurusan</label>
                    </div>
                    <div class="input-field">
                    <input id="nama" type="text" class="validate" name="nama">
                    <label for="Nama">Nama</label>
                    </div>
                    <div class="input-field">
                    <input id="password" type="password" class="validate" name="password">
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