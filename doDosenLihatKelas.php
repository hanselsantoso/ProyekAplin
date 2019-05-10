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
            <table>
                <tr>
                    <th>Nama Mahasiswa</th>
                    <th>6/5/2019</th>
                    <th>13/5/2019</th>
                    <th>20/5/2019</th>
                    <th>27/5/2019</th>
                    <th>3/6/2019</th>
                    <th>10/6/2019</th>
                    <th>17/6/2019</th>
                    <th>24/6/2019</th>
                </tr>
                <tr>
                    <td>Kevin Wijaya</td>
                    <td style="text-align: center">v</td>
                    <td style="text-align: center">v</td>
                    <td style="text-align: center">v</td>
                    <td style="text-align: center">v</td>
                    <td style="text-align: center">v</td>
                    <td style="text-align: center">v</td>
                    <td style="text-align: center">v</td>
                    <td style="text-align: center">v</td>
                </tr>
                <tr>
                    <td>Johannes Chananta</td>
                    <td style="text-align: center">v</td>
                    <td style="text-align: center">v</td>
                    <td style="text-align: center">v</td>
                    <td style="text-align: center">X</td>
                    <td style="text-align: center">v</td>
                    <td style="text-align: center">X</td>
                    <td style="text-align: center">v</td>
                    <td style="text-align: center">v</td>
                </tr>
                <tr>
                    <td>SIMONG</td>
                    <td style="text-align: center">X</td>
                    <td style="text-align: center">X</td>
                    <td style="text-align: center">v</td>
                    <td style="text-align: center">v</td>
                    <td style="text-align: center">v</td>
                    <td style="text-align: center">v</td>
                    <td style="text-align: center">X</td>
                    <td style="text-align: center">v</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>