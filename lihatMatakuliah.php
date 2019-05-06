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
            <h1>Lihat Jurusan</h1>
            <div class="container">
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Nama Jurusan</th>
                        <th>Nama Mata Kuliah</th>
                    </tr>
                    <?php $jurusan = executeQuery($mysqli, "SELECT mk.id_matakuliah as 'idMatakuliah', j.nama_jurusan as 'namaJurusan',mk.nama_matakuliah as 'namaMk' FROM mata_kuliah mk, jurusan j WHERE mk.id_jurusan = j.id_jurusan"); 
                        foreach ($jurusan as $key => $value) {?>
                        <tr>
                        <td><?php echo($value["idMatakuliah"]); ?></td>
                        <td><?php echo($value["namaJurusan"]); ?></td>
                        <td><?php echo($value["namaMk"]); ?></td>
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