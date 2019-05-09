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
    <div style="text-align: center"><h1>Jadwal Mengajar - <?php echo $nama ?></h1></div>
    <div class="row">
        <div class="container">
        <table class="striped">
            <tr>
            <th>Mata Kuliah</th>
            <th>Jam</th>
            <th>Hari</th>
            </tr>
        
        <?php
            $hasil = executeQuery($mysqli,"select mk.nama_matakuliah, k.mulai_kelas, k.akhir_kelas, DAYOFWEEK(k.hari) as 'hari' from kelas k, mata_kuliah mk, dosen d, ruangan r where k.id_dosen='".$_SESSION['idDosen']."' and k.id_dosen = d.id_dosen and mk.id_matakuliah=k.id_matakuliah and r.id_ruangan=k.id_ruangan order by 4");

            foreach ($hasil as $key => $value) {?>
            <tr>
                <td><?php echo($value["nama_matakuliah"]); ?></td>
                <?php $hari = checkHari($value["hari"]) ?>
                <td><?php echo($hari); ?></td>
                <td><?php echo($value["mulai_kelas"]. " - ".$value["akhir_kelas"] ); ?></td>
            </tr>
                <?php
                
            }
        ?>
        </table>
        </div>
    </div>
</body>
</html>