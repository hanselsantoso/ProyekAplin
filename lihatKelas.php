<?php
    include "adminNavbar.php";
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
    <div class="row">
        <?php include "adminDashboard.php" ?>
        <div class="col s10">
        <div style="text-align: center">
            <h1>Lihat Kelas</h1>
            <div class="container">
                <table border="1">
                    <tr>
                        <th>ID kelas</th>
                        <th>ID mata kuliah</th>
                        <th>ID jadwal kuliah</th>
                        <th>ID dosen</th>
                        <th>ID ruangan</th>
                    </tr>
                    <?php $kelas = executeQuery($mysqli, "SELECT k.id_kelas as 'idKelas',mk.nama_matakuliah as'namaMatakuliah',j.jadwal_awal as 'jadwalAwal',j.jadwal_akhir as 'jadwalAkhir',d.nama as 'namaDosen',r.nama_ruangan as 'namaRuangan' FROM kelas k,mata_kuliah mk,jadwal j,dosen d,ruangan r WHERE k.id_matakuliah = mk.id_matakuliah and k.id_jadwal = j.id_jadwal and k.id_dosen = d.id_dosen and k.id_ruangan = r.id_ruangan"); 
                        foreach ($kelas as $key => $value) {?>
                        <tr>
                        <td><?php echo($value["idKelas"]); ?></td>
                        <td><?php echo($value["namaMatakuliah"]); ?></td>
                        <td><?php echo($value["jadwalAwal"]. " - ".$value["jadwalAkhir"] ); ?></td>
                        <td><?php echo($value["namaDosen"]); ?></td>
                        <td><?php echo($value["namaRuangan"]); ?></td>
                        </tr>
                        <?php }
                    ?>
                </table>
            </div>
        </div>
        </div>
    </div>
</body>
</html>