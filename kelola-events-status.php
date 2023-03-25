<?php
include "koneksi.php";

$status = $_GET["status"];

$events = mysqli_query($conn, "UPDATE event SET status=$status WHERE id_event='$_GET[id_event]'");

if ($events){
    echo "<script>alert('Status event berhasil diubah');</script>";
    echo "<meta http-equiv='refresh' content='1;url=kelola-events-list.php'>";
  }
?>