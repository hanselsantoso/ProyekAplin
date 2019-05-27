<?php
    include "dosenNavbar.php";
    include "connection.php";
    include "function.php";

    if (isset($_POST["viewKelas"])) {
        $_SESSION["idKelas"] = $_POST['viewKelas'];
        $_SESSION["jurusan"] = $_POST['jurusan'];
        $_SESSION["namaKelas"] = $_POST["namaKelas"];
        header("location:doDosenLihatKelas.php");
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
<div style="text-align: center"><h1>Lihat Absen Kelas - List Kelas</h1></div>
    <div class="row">
        <div class="container">
            <table>
                <tr>
                    <th>Nama Kelas</th>
                    <th>Action</th>
                </tr>
                
                    <?php
                        $idDosen = $_SESSION["idDosen"];
                        $kelas = executeQuery($mysqli, "SELECT k.id_kelas as idKelas , mk.nama_matakuliah as namaMk, mk.id_jurusan as jurusan FROM kelas k, mata_kuliah mk WHERE k.id_dosen = '$idDosen' and k.id_matakuliah = mk.id_matakuliah");
                        foreach ($kelas as $key => $value) {
                            ?>
                            <tr>
                            <td><?php echo $value["namaMk"] ?></td>
                            <form action="" method="post">
                                <td><button class="btn waves-effect waves-light" type="submit" value="<?php echo $value["idKelas"] ?>" name="viewKelas" >Lihat Absen</button></td>
                                <input type="hidden" name="jurusan" value="<?php echo $value["jurusan"] ?>"> 
                                <input type="hidden" name="namaKelas" value="<?php echo $value["namaMk"] ?>"> 
                            </form>
                            </tr>
                            <?php
                        }
                    ?>
            </table>
            <form action="dosenHome.php">
                    <input type="submit" value="Back">
            </form>
        </div>
    </div>
</body>
</html>