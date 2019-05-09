<?php
    include "dosenNavbar.php";
    include "connection.php";
    include "function.php";

    if (isset($_POST['tambahMhs'])) {
        $cek = executeQuery($mysqli, "select * from mengambil_kelas where nrp='$_POST[tambahMhs]' and id_kelas='$_SESSION[idKelas]'");
        if (!empty($cek)) {
            $message = "Mahasiswa sudah masuk kelas ini!";
        }
        else {
            executeNonQuery($mysqli, "insert into mengambil_kelas values('$_POST[tambahMhs]','$_SESSION[idKelas]')");
            $message = "berhasil mendaftarkan siswa";
        }
        
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
    <div style="text-align: center"><h1><?php echo $_SESSION["namaKelas"] ?></h1></div>
    <a href="#!" class="collection-item  red darken-4 white-text">
            <?php 
            if (isset($message)) {
                echo $message;
            } ?>
        </a>
    <div class="row">
        <div class="container">
        
            <table>
                <tr>
                    <th>Nama Mahasiswa</th>
                    <th>Action</th>
                </tr>
                <?php 
                    $jurusan = $_SESSION["jurusan"];
                    $mhs = executeQuery($mysqli, "SELECT * FROM mahasiswa WHERE id_jurusan = '$jurusan' "); 
                        foreach ($mhs as $key => $value) {?>
                        <form action="" method="post">
                            <tr>
                                <td><?php echo($value["nama"]); ?></td>
                                <td><button class="btn waves-effect waves-light" type="submit" value="<?php echo $value["nrp"] ?>" name="tambahMhs" >Tambah</button></td>
                            </tr>
                        </form>
                        <?php }
                ?>
            </table>
        </div>
    </div>
</body>
</html>