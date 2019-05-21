<?php
// include "connection.php";
include "function.php";
$timestamp = date("Y-m-d");
if ($_SESSION['idMahasiswa'] == $_POST['nrp']) {
    executeNonQuery($mysqli,"insert into absen_mhs (nrp_mhs, id_kelas ,tanggal_absen) values('".$_POST['nrp']."','".$_SESSION['idKelas']."','$timestamp')");
    echo "sukses";
}else{
    echo "gagal";
}