<?php
include "koneksi.php";
session_start();

// status_login nya ga true, gabisa akses halaman 
if($_SESSION['status_login'] != true){
    echo '<script>window.location="kelola-login.php"</script>';
}

if (isset($_GET["id_category"])){
    $id_category = $_GET["id_category"];

    $ambildata = mysqli_query($conn, "DELETE FROM eventcat WHERE id_category='$id_category'");
    echo "<meta http-equiv='refresh' content='1;url=kelola-eventcat-list.php'>";
    echo "<script>alert('Data berhasil dihapus');</script>";
}