<?php

	require_once("function.php");
	$status = 0;
    $mhs = executeQuery($mysqli, "SELECT  * FROM mahasiswa");

    foreach ($mhs as $key => $value) {
        if ($value["nrp"] == $_POST["nrp"]) {
            $status = 1;
        }
    }
    return $status;
	echo $user['id_tamu'].";".$user['nama_tamu'].";".$user['alamat'].";".$user['kuota'].";".$user['sudah_datang'];
?>