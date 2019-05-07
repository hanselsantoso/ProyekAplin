<?php

    session_start();

    function connect(&$mysqli)
    {
        $mysqli = new mysqli("localhost","root","","proyek");
        checkError($mysqli);
    }

    function checkError($mysqli)
    {
        if($mysqli->connect_errno)
        {
            echo "Error: Failed to make a MySql COnnection, here is why : \n";
            echo "Error: ". $mysqli->connect_errno . "\n";
            echo "Error: ". $mysqli->connect_error . "\n";
            exit;
        }
    }

    connect($mysqli);

    function executeQuery($mysqli, $sql)
    {
        // $sql = "select * from user";
        if(!$result = $mysqli->query($sql))
        {
            echo "Sorry, the website is experiencing problems";

            echo "Error : our query failed to execute and here is why : \n";
            echo "Query ". $sql. "\n";
            echo "Errno: ". $mysqli->errno. "\n";
            echo "Error: ". $mysqli->error. "\n";
            exit;
        }

        $data = $result->fetch_all(MYSQLI_BOTH);
        return $data;
    }


    function executeNonQuery($mysqli, $sql)
    {
        if(!$result = $mysqli->query($sql))
        {
            echo "Sorry, the website is experiencing problems";

            echo "Error : our query failed to execute and here is why : \n";
            echo "Query ". $sql. "\n";
            echo "Errno: ". $mysqli->errno. "\n";
            echo "Error: ". $mysqli->error. "\n";
            exit;
        }
    }

    function insertRuangan($mysqli,$namaruangan) {
        // $cek = executeQuery($mysqli, "select nama_ruangan");

        // if ($namaruangan != $cek[0][0]) {
        //     # code...
        // }
        $hasil = executeQuery($mysqli,"select max(substr(id_ruangan,3,3)) from ruangan");
        $urutan = (int)$hasil[0][0] + 1;
        $id = "RU".str_pad((string)$urutan, 3, "0", STR_PAD_LEFT);
        executeNonQuery($mysqli,"insert into ruangan (id_ruangan,nama_ruangan) values('$id','$namaruangan')");
        echo "<script>alert('Berhasil Tambah Ruangan')</script>";
        // $message = "Berhasil Tambah Ruangan";
    }

    // function loginSiswa($mysqli,$username,$password){
    //     $hasil = executeQuery($mysqli, "select nrp,password from mahasiswa where nrp = ''")
    // }

    function loginDosen($mysqli,$username,$password){
        $hasil = executeQuery($mysqli, "select id_dosen, password from dosen where id_dosen = '$username'");

        if (!empty($hasil)) {
            if ($password == $hasil [0][1]) {
                echo "<script>alert('Dosen Berhasil Login!')</script>";
            }
            else{
                echo "<script>alert('Password Salah!')</script>";
            }
        }
        else {
            echo "<script>alert('Username Dosen Salah!')</script>";
        }
    }

    function checkDosen($mysqli,$username, $password){
        $status = 0;
        $user = executeQuery($mysqli, "SELECT  * FROM dosen");
        foreach ($user as $key => $value) {
            if ($value["id_dosen"] == $username) {
                $status = 1;
                if ($value["password"] == $password) {
                    $status = 2;
                }
            }
        }
        return $status;
    }
    function checkMhs($mysqli,$username, $password){
        $status = 0;
        $user = executeQuery($mysqli, "SELECT  * FROM mahasiswa");
        foreach ($user as $key => $value) {
            if ($value["nrp"] == $username) {
                $status = 1;
                if ($value["password"] == $password) {
                    $status = 2;
                }
            }
        }
        return $status;
    }
    function checkHari($val){
        if ($val == 1) {
            $hari = "Minggu";
        }
        elseif ($val == 2) {
            $hari = "Senin";
        }
        elseif ($val == 3) {
            $hari = "Selasa";
        }
        elseif ($val == 4) {
            $hari = "Rabu";
        }
        elseif ($val == 5) {
            $hari = "Kamis";
        }
        elseif ($val == 6) {
            $hari = "Jumat";
        }
        elseif ($val == 7) {
            $hari = "Sabtu";
        }
        return $hari;
    }