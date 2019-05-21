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
                        <th>Mata Kuliah</th>
                        <th>Jadwal Kuliah</th>
                        <th>Nama dosen</th>
                        <th>Ruangan</th>
                        <th style="text-align: center">Pertemuan 1</th>
                        <th style="text-align: center">Pertemuan 2</th>
                        <th style="text-align: center">Pertemuan 3</th>
                        <th style="text-align: center">Pertemuan 4</th>
                        <th style="text-align: center">Pertemuan 5</th>
                    </tr>
                    <?php $kelas = executeQuery($mysqli, 
                    "SELECT k.id_kelas as idKelas, mk.nama_matakuliah as namaMatakuliah, k.mulai_kelas as jadwalAwal, k.akhir_kelas as jadwalAkhir, r.nama_ruangan as namaRuangan, d.nama as namaDosen, DAYOFWEEK(k.pertemuan_1) as Hari, 
                    DATE_FORMAT(k.pertemuan_1 ,'%d-%m-%Y') as pertemuan_1, 
                    DATE_FORMAT(k.pertemuan_2 ,'%d-%m-%Y') as pertemuan_2, 
                    DATE_FORMAT(k.pertemuan_3 ,'%d-%m-%Y') as pertemuan_3,
                    DATE_FORMAT(k.pertemuan_4 ,'%d-%m-%Y') as pertemuan_4,
                    DATE_FORMAT(k.pertemuan_5 ,'%d-%m-%Y') as pertemuan_5
                    FROM kelas k,mata_kuliah mk,dosen d,ruangan r 
                    WHERE k.id_matakuliah = mk.id_matakuliah and k.id_dosen = d.id_dosen and k.id_ruangan = r.id_ruangan"); 
                        foreach ($kelas as $key => $value) {?>
                        <tr>
                        <?php $hari = checkHari($value["Hari"]) ?>
                        <td><?php echo($value["idKelas"]); ?></td>
                        <td><?php echo($value["namaMatakuliah"]); ?></td>
                        <td><?php echo($hari .", ".$value["jadwalAwal"]. " - ".$value["jadwalAkhir"] ); ?></td>
                        <td><?php echo($value["namaDosen"]); ?></td>
                        <td><?php echo($value["namaRuangan"]); ?></td>
                        <td><?php echo($value["pertemuan_1"]); ?></td>
                        <td><?php echo($value["pertemuan_2"]); ?></td>
                        <td><?php echo($value["pertemuan_3"]); ?></td>
                        <td><?php echo($value["pertemuan_4"]); ?></td>
                        <td><?php echo($value["pertemuan_5"]); ?></td>
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