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
        var_dump($data);
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
        $hasil = executeQuery($mysqli,"select to_number(max(substr(id_ruangan,3,3))) from ruangan");
        // var_dump($hasil); 
        $id = "RU".str_pad($hasil[0][0], 3, "0", str_pad_left);
        executeNonQuery($mysqli,"insert into ruangan (id_ruangan,nama_ruangan) values('$id','$namaruangan')");
        exit;
    }