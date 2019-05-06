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
                    </tr>
                    <?php 
                        $jurusan = executeQuery($mysqli, "SELECT  * FROM jurusan"); 
                        foreach ($jurusan as $key => $value) {?>
                        <tr>
                        <td><?php echo($value["id_jurusan"]); ?></td>
                        <td><?php echo($value["nama_jurusan"]); ?></td>
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