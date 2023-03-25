<?php
include "koneksi.php";
session_start();

// status_login nya ga true, gabisa akses halaman 
if($_SESSION['status_login'] != true){
    echo '<script>window.location="kelola-login.php"</script>';
}

if (isset($_GET["id_news"])){
    $idnews = $_GET["id_news"];

    $news = mysqli_query($conn, "SELECT picture FROM news WHERE id_news='$idnews'");
    // data/baris data diambil 
    $data = mysqli_fetch_object($news);
    // unlink gambar yg dihapus ke folder, jd kalo querynya delete yg di folder juga ikutan ke delete
    unlink('./news/'.$data->picture);

    $ambildata = mysqli_query($conn, "DELETE FROM news WHERE id_news='$idnews'");
    echo "<meta http-equiv='refresh' content='1;url=kelola-news-list.php'>";
    echo "<script>alert('Data berhasil dihapus');</script>";
}