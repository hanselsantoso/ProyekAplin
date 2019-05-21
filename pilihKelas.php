<?php
    include "mhsNavbar.php";
    include "connection.php";
    include "function.php";
    if(isset($_SESSION['idMahasiswa']))
    {
        $nama = getNamaMhs($mysqli,$_SESSION['idMahasiswa']);
        $id = $_SESSION['idMahasiswa'];

        if (isset($_POST["viewKelas"])) {
            $_SESSION["idKelas"] = $_POST['viewKelas'];
            header("location:mhsAbsen.php");
        }
    }
 
    else
    {
        header("location:loginMahasiswa.php");
    }
    
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
        <div>
        <div style="text-align: center">
            <h1> List Kelas</h1>
            <div class="container">
            <table border="1">
                    <tr>
                        <th>ID kelas</th>
                        <th>Mata Kuliah</th>
                        <th>Jadwal Kuliah</th>
                        <th>SKS</th>
                        <th>Dosen</th>
                        <th>Ruangan</th>
                        <th>Action</th>
                    </tr>
                    <?php $kelas = executeQuery($mysqli, 
                    "SELECT k.id_kelas as idKelas, mk.nama_matakuliah as namaMatakuliah, k.mulai_kelas as jadwalAwal, k.akhir_kelas as jadwalAkhir, r.nama_ruangan as namaRuangan, DAYOFWEEK(k.pertemuan_1) as Hari, d.nama as namaDosen, mk.sks as sks
                    FROM kelas k,mata_kuliah mk,dosen d,ruangan r, mengambil_kelas mg
                    WHERE k.id_dosen = d.id_dosen and k.id_matakuliah = mk.id_matakuliah and  k.id_ruangan = r.id_ruangan and mg.nrp = $id and k.id_kelas = mg.id_kelas
                    GROUP BY 1
                    ORDER BY Hari"); 
                        foreach ($kelas as $key => $value) {?>
                        <tr>
                        <?php $hari = checkHari($value["Hari"]) ?>
                        <td><?php echo($value["idKelas"]); ?></td>
                        <td><?php echo($value["namaMatakuliah"]); ?></td>
                        <td><?php echo($hari .", ".$value["jadwalAwal"]. " - ".$value["jadwalAkhir"] ); ?></td>
                        <td><?php echo($value["sks"]); ?></td>
                        <td><?php echo($value["namaDosen"]); ?></td>
                        <td><?php echo($value["namaRuangan"]); ?></td>
                        <form action="" method="post">
                            <td><button class="btn waves-effect waves-light" type="submit" value="<?php echo $value["idKelas"] ?>" name="viewKelas" >Absen</button></td>
                        </form>
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