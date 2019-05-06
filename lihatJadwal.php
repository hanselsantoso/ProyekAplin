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
            <h1>Lihat Jadwal</h1>
            <div class="container">
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Jadwal Awal</th>
                        <th>Jadwal Akhir</th>
                    </tr>
                    <?php $jadwal = executeQuery($mysqli, "SELECT * FROM jadwal"); 
                        foreach ($jadwal as $key => $value) {?>
                        <tr>
                        <td><?php echo($value["id_jadwal"]); ?></td>
                        <td><?php echo($value["jadwal_awal"]); ?></td>
                        <td><?php echo($value["jadwal_akhir"]); ?></td>
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