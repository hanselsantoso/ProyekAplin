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
             $id = $_SESSION['idDosen'];
         }
         else
         {
             header("location:loginDosen.php");
         }
        
        
    ?>
    <div style="text-align: center"><h1>Jadwal Mengajar - <?php echo $nama ?></h1></div>
    <div class="row">
        <div class="container">
         <table border="1">
                    <tr>
                        <th>ID kelas</th>
                        <th>Mata Kuliah</th>
                        <th>Jadwal Kuliah</th>
                        <th>SKS</th>
                        <th>Ruangan</th>
                    </tr>
                    <?php $kelas = executeQuery($mysqli, 
                    "SELECT k.id_kelas as idKelas, mk.nama_matakuliah as namaMatakuliah, k.mulai_kelas as jadwalAwal, k.akhir_kelas as jadwalAkhir, r.nama_ruangan as namaRuangan, DAYOFWEEK(k.pertemuan_1) as Hari, mk.sks as sks
                    FROM kelas k,mata_kuliah mk,dosen d,ruangan r 
                    WHERE k.id_dosen = '$id' and k.id_matakuliah = mk.id_matakuliah and  k.id_ruangan = r.id_ruangan
                    GROUP BY 1
                    ORDER BY Hari"); 
                    
                        foreach ($kelas as $key => $value) {?>
                        <tr>
                        <?php $hari = checkHari($value["Hari"]) ?>
                        <td><?php echo($value["idKelas"]); ?></td>
                        <td><?php echo($value["namaMatakuliah"]); ?></td>
                        <td><?php echo($hari .", ".$value["jadwalAwal"]. " - ".$value["jadwalAkhir"] ); ?></td>
                        <td><?php echo($value["sks"]); ?></td>
                        <td><?php echo($value["namaRuangan"]); ?></td>
                        </tr>
                        <?php }
                    ?>
                </table>
        </div>
    </div>
</body>
</html>