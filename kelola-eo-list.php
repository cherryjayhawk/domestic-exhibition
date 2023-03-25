<?php 
include "koneksi.php";
session_start();

// status_login nya ga true, gabisa akses halaman 
if($_SESSION['status_login'] != true){
    echo '<script>window.location="kelola-login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kelola EO</title>
        <link href="kelola.css" rel="stylesheet">
    </head>
</html>

<body>
    <header>
        <nav class="container-h">
            <div class="naviitem">
                <div class="logo-nav">
                    <a href="kelola-home.php"><img src="icon\logo.png" class="logo"></a>
                </div>
            </div>
            <div class="naviitem">
                <div id="menu">
                    <ul>
                        <li><a href="">Manage Users</a>
                            <ul>
                                <li><a href="kelola-visitors-list.php">Visitors</a></li>
                                <li><a href="kelola-eo-list.php">Exhibition Organizer</a></li>
                            </ul>
                        </li>
                        <li><a href="">Manage Events</a>
                            <ul>
                                <li><a href="kelola-events-list.php">Events</a></li>
                                <!-- <li><a href="kelola-eventcat-list.php">Event Categories</a></li> -->
                            </ul>
                        </li>
                        <li><a href="">Manage News</a>
                            <ul>
                                <li><a href="kelola-news-list.php">News</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="menu">
                    <ul>
                        <li>
                            <a href="#">
                                <svg width="30" height="30" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="48" height="48" rx="24" fill="#BD622A"/>
                                    <path d="M33.5997 34.8001V32.4001C33.5997 31.1271 33.0939 29.9062 32.1938 29.006C31.2936 28.1058 30.0727 27.6001 28.7997 27.6001H19.1997C17.9266 27.6001 16.7057 28.1058 15.8055 29.006C14.9054 29.9062 14.3997 31.1271 14.3997 32.4001V34.8001" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M23.9997 22.8001C26.6507 22.8001 28.7997 20.6511 28.7997 18.0001C28.7997 15.3491 26.6507 13.2001 23.9997 13.2001C21.3487 13.2001 19.1997 15.3491 19.1997 18.0001C19.1997 20.6511 21.3487 22.8001 23.9997 22.8001Z" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                            <ul>
                                <li><a href="kelola-logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="content">
        <div class="content-items">
            <div class="title">
                <div class="title-text">
                    <p>Exhibition Organizers</p>
                </div>
                <div class="garis-title">
                    <div class="garis"></div>
                </div>
            </div>
        </div>
        <div class="content-items">
            <table class="list">
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Instagram</th>
                    <th>Telepon</th>
                    <th>Status</th>
                </tr>

                <?php
                include "koneksi.php";

                $no = 1;
                $eo = mysqli_query($conn, "SELECT * FROM eo");

                // jika data/jumlah baris yg dicari query ada di tabel
                if (mysqli_num_rows($eo) > 0){
                    // data/baris data diambil 
                    while ($data = mysqli_fetch_array($eo)) {
                ?>

                <tr>
                    <td align="center"> <?= $no++; ?> </td>
                    <td align="center"> <?= $data['id_eo']; ?> </td>
                    <td align="center"> <?= $data['name']; ?> </td>
                    <td align="center"> <?= $data['email']; ?> </td>
                    <td align="center"> <img src="logo/<?= $data['logo']; ?>" alt="" width="100px"> </td>
                    <td align="center"> <?= $data['instagram']; ?> </td>
                    <td align="center"> <?= $data['telp']; ?> </td>
                    <td align="center">
                    <?php
                    // status 0 = aktif
                    // status 1 = non-aktif
                        if($data['status'] == "0"){
                            echo '<button class="delete"><a href="kelola-eo-status.php?id_eo='.$data['id_eo'].'&status=1">Non-Aktif<a></button>';
                        } else {
                            echo '<button class="edit"><a href="kelola-eo-status.php?id_eo='.$data['id_eo'].'&status=0">Aktif<a></button>';
                        }
                        ?>
                    </td>
                </tr>
                <?php }} else { ?>

                    <tr>
                        <td colspan="">Tidak ada data</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>
</body>
