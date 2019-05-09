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
    <div style="text-align: center"><h1>Tambah Mahasiswa - <?php echo $nama ?></h1></div>
    <div class="row">
        <div class="container">
            <div class="collection">
            <?php
                $idDosen = $_SESSION["idDosen"];
                $kelas = executeQuery($mysqli, "SELECT k.id_kelas as idKelas , mk.nama_matakuliah as namaMk FROM kelas k, mata_kuliah mk WHERE k.id_dosen = '$idDosen' and k.id_matakuliah = mk.id_matakuliah");
                foreach ($kelas as $key => $value) {
                    ?>
                    <button style="width: 100%" type="submit" name="viewKelas" value="<?php echo $value["idKelas"] ?>"><?php echo $value["namaMk"] ?></button>
                    <?php
                }
            ?>
            </div>

            
        </div>
    </div>
</body>
</html>