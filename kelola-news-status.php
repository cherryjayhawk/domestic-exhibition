<?php
include "koneksi.php";

$status = $_GET["status"];

$events = mysqli_query($conn, "UPDATE news SET status=$status WHERE id_news='$_GET[id_news]'");

if ($events){
    echo "<script>alert('Status news berhasil diubah');</script>";
    echo "<meta http-equiv='refresh' content='1;url=kelola-news-list.php'>";
  }
?>