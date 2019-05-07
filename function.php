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

    function checkJurusan($mysqli,$id){
        $status = 0;
        $user = executeQuery($mysqli, "SELECT  * FROM jurusan");
        foreach ($user as $key => $value) {
            if ($value["id_jurusan"] == $id) {
                $status = 1;
            }
        }
        return $status;
    }