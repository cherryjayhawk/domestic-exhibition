<?php
include "koneksi.php";

$status = $_GET["status"];

$eo = mysqli_query($conn, "UPDATE eo SET status=$status WHERE id_eo='$_GET[id_eo]'");

if ($eo){
    echo "<script>alert('Status exhibition orgnanizer berhasil diubah');</script>";
    echo "<meta http-equiv='refresh' content='1;url=kelola-eo-list.php'>";
  }
?>