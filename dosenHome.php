<?php
    include "dosenNavbar.php";
    include "connection.php";
    include "function.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
         if(isset($_SESSION['idDosen']))
         {
             $nama = getNamaDosen($mysqli,$_SESSION['idDosen']);
         }
         else
         {
             header("location:loginDosen.php");
         }

    ?>
    <div style="text-align: center"><h1>Home - <?php echo $nama ?></h1></div>
    <div class="row">
        <div class="container">
            <div class="col s4">
                <div class="card" style="padding-top: 15%">
                    <div class="card-image" style="text-align: center">
                        <i class="large material-icons">date_range</i>
                    </div>
                    <div class="card-content" style="text-align: center">
                    <h3>Jadwal Mengajar</h3>
                    </div>
                    <div class="card-action" style="background-color: black; text-align: center">
                    <a href="dosenLihatJadwal.php">Cek</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card" style="padding-top: 15%">
                    <div class="card-image" style="text-align: center">
                        <i class="large material-icons">event_available</i>
                    </div>
                    <div class="card-content" style="text-align: center">
                    <h3>Lihat Absen Kelas</h3>
                    </div>
                    <div class="card-action" style="background-color: black; text-align: center">
                    <a href="dosenLihatKelas.php">Lihat Absen Kelas</a>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card" style="padding-top: 15%">
                    <div class="card-image" style="text-align: center">
                        <i class="large material-icons">event_available</i>
                    </div>
                    <div class="card-content" style="text-align: center">
                    <h3>Tambah Mahasiswa</h3>
                    </div>
                    <div class="card-action" style="background-color: black; text-align: center">
                    <a href="tambahMahasiswa.php">Tambah Mahasiswa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>