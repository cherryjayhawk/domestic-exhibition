<?php
include "koneksi.php";
session_start();

// status_login nya ga true, gabisa akses halaman 
// if($_SESSION['status_login'] != true){
//     echo '<script>window.location="kelola-login.php"</script>';
// }

if (isset($_GET["id_wishlist"])) {
    $wishlist = $_GET["id_wishlist"];
    $pengunjung = $_GET["id_pengunjung"];


    // $wishlist = mysqli_query($conn, "SELECT id_wishlist FROM wishlist WHERE id_penunjung='$id'");
    // // data/baris data diambil 
    // $data = mysqli_fetch_object($wishlist);

    $hapusdata = mysqli_query($conn, "DELETE FROM wishlist WHERE id_wishlist='$wishlist'");
    
    echo "<meta http-equiv='refresh' content='1;url=favorite-events.php?id="?><?php echo $pengunjung ?><?php echo "'>";
    echo "<script>alert('Data berhasil dihapus');</script>";
}
?>