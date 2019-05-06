<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "connection.php";
        include "adminNavbar.php";
        include "function.php";
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
                <div class="input-field">
                    <select>
                        <option value="" disabled selected>Pilih Mata Kuliah</option>
                        <?php
                        $jurusan = executeQuery($mysqli, "SELECT * FROM mata_kuliah"); 
                            foreach ($jurusan as $key => $value) {
                                ?>
                                <option value="<?php echo $value["id_matakuliah"] ?>"> <?php echo $value["nama_matakuliah"]  ?> </option>
                                <?php
                            }
                        ?>
                    </select>
                    <label>Pilih Jurusan</label>
                </div>
                <div class="input-field">
                <input id="Nama" type="text" class="validate">
                <label for="Nama">Nama Mata Kuliah</label>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
        </div>
    </div>
    
</body>

</html>