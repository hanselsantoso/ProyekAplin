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
    <div style="text-align: center"><h1><?php echo $_SESSION["namaKelas"] ?></h1></div>
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
                        <tr>
                        <td><?php echo($value["nama"]); ?></td>
                        <td><button class="btn waves-effect waves-light" type="submit" value="<?php echo $value["nrp"] ?>" name="tambahMhs" >Tambah</button></td>
                        </tr>
                        <?php }
                ?>
            </table>
        </div>
    </div>
</body>
</html>