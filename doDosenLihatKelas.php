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
            // var_dump($cek); exit;
            executeNonQuery($mysqli, "INSERT INTO mengambil_kelas VALUES ('$_POST[tambahMhs]','$_SESSION[idKelas]')");
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
    <div class="row">
        <div class="container">
        <table border="1">
                        <tr>
                            <th>NRP</th>
                            <th>Nama</th>
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
                        <?php
                            $idKelas = $_SESSION["idKelas"];
                            $absen = executeQuery(
                                $mysqli,
                                "SELECT a.nrp_mhs as nrp, m.nama as nama
                                FROM absen_mhs a, mahasiswa m
                                where a.id_kelas = '$idKelas' and a.nrp_mhs = m.nrp
                                GROUP BY 1"
                            );
                            foreach ($absen as $key => $value) {
                               ?>
                               <tr>
                                   <td> <?php echo $value["nrp"] ?> </td>
                                   <td> <?php echo $value["nama"] ?> </td>
                            <?php
                                

                                $kelas = executeQuery(
                                    $mysqli,
                                    "SELECT *
                                    FROM kelas 
                                    WHERE id_kelas = '$idKelas'"
                                );

                                $absen = executeQuery(
                                    $mysqli,
                                    "SELECT *
                                    FROM absen_mhs"
                                );
                                $absenData = [];
                                foreach ($absen as $row) {
                                    $absenData[] = $row['tanggal_absen'];
                                }

                                foreach ($kelas[0] as $keyDetail => $detail) {
                                    if (strpos($keyDetail, 'pertemuan_') !== false) {
                                        if (in_array($detail, $absenData)) {
                                            ?>
                                            <td style="text-align: center"><?php echo "V" ?></td>
                                        <?php
                                        } 
                                    else {
                                        ?>
                                            <td style="text-align: center"><?php echo "O" ?></td>
                                        <?php
                                        }
                                    }
                                }
                        ?>
                        </tr>
                               <?php
                            }
                        ?>
                        
                    </table>
        </div>
    </div>
</body>
</html>