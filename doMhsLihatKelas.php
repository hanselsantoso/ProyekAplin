<?php
include "mhsNavbar.php";
include "connection.php";
include "function.php";
if (isset($_SESSION['idMahasiswa'])) {
    $nama = getNamaMhs($mysqli, $_SESSION['idMahasiswa']);
    $id = $_SESSION['idMahasiswa'];
    $namaMatkul = getMataKuliah($mysqli, $_SESSION["idKelas"]);
} else {
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
                <h1> <?php echo $namaMatkul ?></h1>
                <div class="container">
                    <table border="1">
                        <tr>
                            <th style="text-align: center">1</th>
                            <th style="text-align: center">2</th>
                            <th style="text-align: center">3</th>
                            <th style="text-align: center">4</th>
                            <th style="text-align: center">5</th>
                            <th style="text-align: center">6</th>
                            <th style="text-align: center">7</th>
                            <th style="text-align: center">8</th>
                            <th style="text-align: center">9</th>
                            <th style="text-align: center">10</th>
                            <th style="text-align: center">11</th>
                            <th style="text-align: center">12</th>
                            <th style="text-align: center">13</th>
                            <th style="text-align: center">14</th>
                        </tr>
                        <tr>
                            <?php
                            $idKelas = $_SESSION["idKelas"];
                            $idMhs = $_SESSION["idMahasiswa"];

                            $kelas = executeQuery(
                                $mysqli,
                                "SELECT *
                    FROM kelas 
                    WHERE id_kelas = '$idKelas'
                    "
                            );

                            $absen = executeQuery(
                                $mysqli,
                                "SELECT *
                    FROM absen_mhs 
                    WHERE nrp_mhs = '$idMhs' and id_kelas = '$idKelas'
                    "
                            );
                            $absenData = [];
                            foreach ($absen as $row) {
                                $absenData[] = $row['tanggal_absen'];
                            }

                            foreach ($kelas[0] as $keyDetail => $detail) {
                                if (strpos($keyDetail, 'pertemuan_') !== false) {
                                    if (in_array($detail, $absenData)) {
                                        ?>
                                        <td><?php echo "V" ?></td>
                                    <?php
                                } else {
                                    ?>
                                        <td><?php echo "O" ?></td>
                                    <?php
                                }
                            }
                        }
                        ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>