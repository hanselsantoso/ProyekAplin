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
            $('.datepicker').datepicker({format : 'dddd, dd-mm-yyyy'});
        });
    </script>
    <div class="row">
        <?php include "adminDashboard.php" ?>
        <div class="col s10">
        <div style="text-align: center">
            <h1>Tambah Kelas</h1>
            <form action="" method="post">
                <div class="container">
                    <div class="input-field">
                        <select name="matkul">
                            <option value="" disabled selected>Pilih Mata Kuliah</option>
                            <?php
                            $listIdMK = [];
                            $jurusan = executeQuery($mysqli, "SELECT * FROM mata_kuliah"); 
                                foreach ($jurusan as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value["id_matakuliah"] ?>"> <?php echo $value["nama_matakuliah"]  ?> </option>
                                    <?php
                                    $listIdMK[] = $value["id_matakuliah"];
                                }
                            ?>
                        </select>
                        <label>Pilih Mata Kuliah</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <!-- <select name="hari">
                            <option value="" disabled selected>Pilih Hari</option>
                            <option value="1">Senin</option>
                            <option value="1">Selasa</option>
                            <option value="1">Rabu</option>
                            <option value="1">Kamis</option>
                            <option value="1">Jumat</option>
                            </select>
                            <label>Pilih Hari</label> -->

                            <input type="text" class="datepicker" name="tglAwal">
                            <label for="">Pilih tanggal</label>
                        </div>
                        <div class="input-field col s6">
                            <select name="jam">
                            <option value="" disabled selected>2 SKS</option>
                            <option value="08:00-09:40">08:00-09:40</option>
                            <option value="10:30-12:10">10:30-12:10</option>
                            <option value="13:00-14:40">13:00-14:40</option>
                            <option value="15:30-17:10">15:30-17:10</option>
                            <option value="" disabled selected>3 SKS</option>
                            <option value="08:00-10:30">08:00-10:30</option>
                            <option value="10:30-13:00">10:30-13:00</option>
                            <option value="13:00-15:30">13:00-15:30</option>
                            <option value="15:30-18:00">15:30-18:00</option>
                            </select>
                            <label>Pilih Jadwal Kuliah</label>
                        </div>
                    </div>
                            
                    <div class="input-field">
                        <select name="dosen">
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
                        <select name="ruang">
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
                </form>
        </div>
        </div>
    </div>
    
</body>
</html>

<?php
    if (isset($_POST["action"])) {
        $mk = $_POST["matkul"];
        $tgl = $_POST["tglAwal"];
        $jam = $_POST["jam"];
        $dosen = $_POST["dosen"];
        $ruang = $_POST["ruang"];

        $dtgl = explode(", ", $tgl);
        $djam = explode("-", $jam);
        var_dump($mk);
        var_dump($dtgl);
        var_dump($djam);
        var_dump($dosen);
        var_dump($ruang);
    }
?>