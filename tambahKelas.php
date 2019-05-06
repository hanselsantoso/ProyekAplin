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
            <h1>Tambah Kelas</h1>
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
                    <label>Pilih Mata Kuliah</label>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select>
                        <option value="" disabled selected>Pilih Hari</option>
                        <option value="1">Senin</option>
                        <option value="1">Selasa</option>
                        <option value="1">Rabu</option>
                        <option value="1">Kamis</option>
                        <option value="1">Jumat</option>
                        </select>
                        <label>Pilih Hari</label>
                    </div>
                    <div class="input-field col s6">
                        <select>
                        <option value="" disabled selected>Pilih Jadwal Kuliah</option>
                        <option value="1">08.00-10.30</option>
                        <option value="2">10.30-13.00</option>
                        <option value="3">13.00-15.30</option>
                        <option value="3">15.30-18.00</option>
                        </select>
                        <label>Pilih Jadwal Kuliah</label>
                    </div>
                </div>
                
                <div class="input-field">
                    <select>
                        <option value="" disabled selected>Pilih Dosen</option>
                        <?php
                        $dosen = executeQuery($mysqli, "SELECT * FROM dosen"); 
                            foreach ($dosen as $key => $value) {
                                ?>
                                <option value="<?php echo $value["id_dosen"] ?>"> <?php echo $value["nama"]  ?> </option>
                                <?php
                            }
                        ?>
                    </select>
                    <label>Pilih Dosen Pengajar</label>
                </div>
                <div class="input-field">
                    <select>
                        <option value="" disabled selected>Pilih Ruangan</option>
                        <?php
                        $ruangan = executeQuery($mysqli, "SELECT * FROM ruangan"); 
                            foreach ($ruangan as $key => $value) {
                                ?>
                                <option value="<?php echo $value["id_ruangan"] ?>"> <?php echo $value["nama_ruangan"]  ?> </option>
                                <?php
                            }
                        ?>
                    </select>
                    <label>Pilih Ruangan</label>
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