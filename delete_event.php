<?php
include "koneksi.php";
$id_eo = $_GET['id_eo'];
$id_event = $_GET['id_event'];
$ambildata = mysqli_query($conn, "DELETE FROM event WHERE id_event='$id_event'");
echo "<meta http-equiv='refresh' content='1;url=eo_event.php?id_eo=$id_eo'>";
echo "<h5>Data sedang dihapus...<h5>";