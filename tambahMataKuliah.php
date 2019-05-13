<?php
    include "function.php";
    if (isset($_POST["action"])) {
        if (isset($_POST["jurusan"]) && $_POST["nama"] != "") {
            $hasil = executeQuery($mysqli, "SELECT max(substr(id_matakuliah,3,3)) FROM mata_kuliah"); 
            $jumlah = (int)$hasil[0][0] + 1;
            $id_matkul = "MK".str_pad((string)$jumlah, 3, "0", STR_PAD_LEFT);
            $nama = $_POST["nama"];
            $jurusan = $_POST["jurusan"];
            $sks = $_POST["sks"];
            executeNonQuery($mysqli,"insert into mata_kuliah values('$id_matkul','$jurusan','$nama', $sks)");
            $message = "Jurusan berhasil ditambah";
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
            <h1>Tambah Mata Kuliah</h1>
            <div class="container">
                <div class="collection">
                    <a href="#!" class="collection-item 
                        <?php 
                        if ($message == "Jurusan berhasil ditambah") {
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
                <form action="" method="post">
                    <div class="input-field">
                        <select name="jurusan">
                            <option value="" disabled selected>Pilih Jurusan</option>
                            <?php
                            $jurusan = executeQuery($mysqli, "SELECT * FROM jurusan"); 
                                foreach ($jurusan as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value["id_jurusan"] ?>"> <?php echo $value["nama_jurusan"]  ?> </option>
                                    <?php
                                }
                            ?>
                        </select>
                        <label>Pilih Jurusan</label>
                    </div>
                        <div class="input-field">
                            <input id="Nama" name="nama" type="text" class="validate">
                            <label for="Nama">Nama Mata Kuliah</label>
                        </div>
                        <div class="input-field">
                            <select name="sks" id="">
                                <option value="" disabled selected>Pilih SKS</option>
                                <option value="2">2 SKS</option>
                                <option value="3">3 SKS</option>
                            </select>
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