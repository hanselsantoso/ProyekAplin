<?php
    include "mhsNavbar.php";
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
    <div style="text-align: center"><h1>Home</h1></div>
    <div class="row">
        <div class="container">
            <div class="col s6">
                <div class="card">
                    <div class="card-image">
                    <img style="width: 200px" src="check.jpg">
                    </div>
                    <div class="card-content">
                    <p>Absensi</p>
                    </div>
                    <div class="card-action">
                    <a href="#">Absen</a>
                    </div>
                </div>
            </div>
            <div class="col s6">
                <div class="card">
                    <div class="card-image">
                    <img style="width: 200px" src="check.jpg">
                    </div>
                    <div class="card-content">
                    <p>Lihat Absen</p>
                    </div>
                    <div class="card-action">
                    <a href="mhsLihatKelas.php">Lihat Absen</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>