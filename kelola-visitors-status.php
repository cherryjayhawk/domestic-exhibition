<?php
include "koneksi.php";

$status = $_GET["status"];

$pengunjung = mysqli_query($conn, "UPDATE pengunjung SET status=$status WHERE id_pengunjung='$_GET[id_pengunjung]'");

if ($pengunjung){
    echo "<script>alert('Status visitor berhasil diubah');</script>";
    echo "<meta http-equiv='refresh' content='1;url=kelola-visitors-list.php'>";
  }
?>