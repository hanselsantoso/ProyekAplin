<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "connection.php";
        include "adminNavbar.php";
        include "function.php";

        if (isset($_POST["matkul"])) {
            if ($_POST["matkul"] != "") {
                $jsks =executeQuery($mysqli, "select sks from mata_kuliah where id_matakuliah = '$_POST[matkul]'");
                $tambahwaktu = $jsks[0][0] * 50;
            }
        }
    ?>
</head>
<body>
    <script>
        $(document).ready(function(){
            $('select').formSelect();
            $('.datepicker').datepicker({format : 'dddd, dd mmmm yyyy'});
        });
    </script>
    <div class="row">
        <?php include "adminDashboard.php" ?>
        <div class="col s10">
        <div style="text-align: center">
            <h1>Tambah Kelas</h1>
            <div class="collection" style="display:<?php if (!isset($message)) {echo "none";}?>">
                <a href="#!" class="collection-item  red darken-4 white-text">
                    <?php 
                    if (isset($message)) {
                        echo $message;
                    } ?>
                </a>
            </div>
            <form action="" method="post">
                <div class="container">
                    <div class="input-field">
                        <form action="" method="post">
                        <select name="jurus" id="">
                            <option value="" disabled selected>Pilih Jurusan</option>
                            <?php
                                $jurus = executeQuery($mysqli, "select * from jurusan");
                                foreach($jurus as $key =>$value){
                                    ?>
                                    <option value="<?php echo $value["id_jurusan"] ?>"><?php echo $value["nama_jurusan"] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                        <button type="submit">pilih jurusan</button>
                        </form>
                    </div>
                    <div class="input-field">
                        <select name="matkul">
                            <option value="" disabled selected>Pilih Mata Kuliah</option>
                            <?php
                            if (isset($_POST["jurus"])) {
                                $jurusan = executeQuery($mysqli, "SELECT * FROM mata_kuliah WHERE id_jurusan='$_POST[jurus]'"); 
                                foreach ($jurusan as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value["id_matakuliah"] ?>"> <?php echo $value["nama_matakuliah"]  ?> </option>
                                    <?php
                                }
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
                            <label for="">Pilih Jadwal Mulai</label>
                        </div>
                        <div class="input-field col s6">
                            <select name="jam">
                                <option value="08:00">08:00</option>
                                <option value="10:30">10:30</option>
                                <option value="13:00">13:00</option>
                                <option value="15:30">15:30</option>
                            </select>
                            <label>Jam Mulai Kuliah</label>
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
        $jamakhir = date('H:i', strtotime($jam. '+'. (string)$tambahwaktu. ' minutes'));
        $prosestanggal = strtotime($dtgl[1]);
        $tanggal = date('Y-m-d', $prosestanggal);
        $tanggal2 = date('Y-m-d', strtotime($dtgl[1]. '+ 7 days'));
        $tanggal3 = date('Y-m-d', strtotime($dtgl[1]. '+ 14 days'));
        $tanggal4 = date('Y-m-d', strtotime($dtgl[1]. '+ 21 days'));
        $tanggal5 = date('Y-m-d', strtotime($dtgl[1]. '+ 28 days'));
        $tanggal6 = date('Y-m-d', strtotime($dtgl[1]. '+ 35 days'));
        $tanggal7 = date('Y-m-d', strtotime($dtgl[1]. '+ 42 days'));
        $tanggal8 = date('Y-m-d', strtotime($dtgl[1]. '+ 49 days'));
        $tanggal9 = date('Y-m-d', strtotime($dtgl[1]. '+ 56 days'));
        $tanggal10 = date('Y-m-d', strtotime($dtgl[1]. '+ 63 days'));
        $tanggal11 = date('Y-m-d', strtotime($dtgl[1]. '+ 70 days'));
        $tanggal12 = date('Y-m-d', strtotime($dtgl[1]. '+ 77 days'));
        $tanggal13 = date('Y-m-d', strtotime($dtgl[1]. '+ 84 days'));
        $tanggal14 = date('Y-m-d', strtotime($dtgl[1]. '+ 91 days'));
        $hari = date('N',$prosestanggal);

        $hitungkelas = executeQuery($mysqli,"select max(substr(id_kelas,3,3)) from kelas");
        $urutan = (int)$hitungkelas[0][0] + 1;
        $id = "KE".str_pad((string)$urutan, 3, "0", STR_PAD_LEFT);

        // $cek = executeQuery($mysqli, "select id_kelas from kelas where id_ruangan='$ruang' and CONVERT(DATE_FORMAT(mulai_kelas, '%H:%i')='$djam[0]',CHAR) and DAYOFWEEK(hari) = $hari");

        // if (!empty($cek)) {
            // executeNonQuery($mysqli, "insert into kelas values('$id', '$mk', '$dosen', '$ruang', '$djam[0]', '$djam[1]', DATE_FORMAT('$tanggal', '%Y-%m-%d'))");
            // echo "<script>alert('jadwal kelas $ruang sudah terisi!')</script>";
            // echo "jadwal kelas $ruang sudah terisi!";
        // }
        // else {
        //     echo "berhasil";
        // }
        // var_dump($ruang);
        // var_dump($hari);
        // var_dump($djam[0]);
        // var_dump($tanggal);
        // var_dump($tanggal2);
        // var_dump($tanggal3);
        // var_dump($tanggal4);
        // var_dump($tanggal5);
        executeNonQuery($mysqli, "insert into kelas values('$id', '$mk', '$dosen', '$ruang', '$jam', '$jamakhir', DATE_FORMAT('$tanggal', '%Y-%m-%d'), DATE_FORMAT('$tanggal2', '%Y-%m-%d'), DATE_FORMAT('$tanggal3', '%Y-%m-%d'), DATE_FORMAT('$tanggal4', '%Y-%m-%d'), DATE_FORMAT('$tanggal5', '%Y-%m-%d'), DATE_FORMAT('$tanggal6', '%Y-%m-%d'), DATE_FORMAT('$tanggal7', '%Y-%m-%d'), DATE_FORMAT('$tanggal8', '%Y-%m-%d'), DATE_FORMAT('$tanggal9', '%Y-%m-%d'), DATE_FORMAT('$tanggal10', '%Y-%m-%d'), DATE_FORMAT('$tanggal11', '%Y-%m-%d'), DATE_FORMAT('$tanggal12', '%Y-%m-%d'), DATE_FORMAT('$tanggal13', '%Y-%m-%d'), DATE_FORMAT('$tanggal14', '%Y-%m-%d'))");
        // $message = "Berhasil mendaftarkan kelas!";
        // var_dump($mk);
        // var_dump($dtgl[1]);
        // var_dump($prosestanggal);
        // var_dump($tanggal);
        // var_dump($djam);
        // var_dump($dosen);
        // var_dump($ruang);
    }
?>