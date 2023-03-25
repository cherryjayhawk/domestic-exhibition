<?php 
include "koneksi.php";

session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}

// id user
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
// id event
$id_event = $_GET['id_event'];

// nampilkan
$query = "SELECT *, DATE_FORMAT(event_start_date, '%d %M %Y') as event_start_date_fix, DATE_FORMAT(event_end_date, '%d %M %Y') as event_end_date_fix, TIME_FORMAT(event_start_time, '%H.%i') as event_start_time_fix, TIME_FORMAT(event_end_time, '%H.%i WIB') as event_end_time_fix from event CROSS JOIN eo ON event.id_eo=eo.id_eo WHERE event.id_event='".$_GET['id_event']."'";
$event = mysqli_query($conn, $query);
$data = mysqli_fetch_object($event);

// wishlist
$id_pengunjung = $_SESSION['id'];
$id_event = $_GET['id_event'];

// 
$sql = mysqli_query($conn, "SELECT * FROM event CROSS JOIN ticket USING(id_event) WHERE event.id_event=$id_event");
$ticket = mysqli_fetch_array($sql);
$id_ticket = $ticket['id_ticket'];

// next transaksi
if (isset($_POST['next'])) {

    $arrival_date = $_POST['arrival_date'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    
    mysqli_query($conn, "INSERT INTO transaksi VALUES ('', '$id', '$id_ticket','$id_event', '$arrival_date','$nama','$email','','','','','','','')");
    echo "<script>document.location.href='detail-event-user-transaksi.php?id=$id&id_event=$id_event&id_ticket=$id_ticket'; </script>";
}


// wishlist
if (isset($_POST['wishlist'])) {
        mysqli_query($conn, "INSERT INTO wishlist VALUES ('', '$id_pengunjung', '$id_event')");
        echo "<script> alert('Event saved!');
        document.location.href='detail-event-user.php?id=$id&id_event=$id_event&id_ticket=$id_ticket'; </script>";
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detail Events</title>
        <link href="css\events-detail.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <div class="right">
                <div class="home">
                    <a href="eventspage-user.php?id=<?php echo $id ?>">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.275 3.54999L4.5375 8.79999C3.4125 9.67499 2.5 11.5375 2.5 12.95V22.2125C2.5 25.1125 4.8625 27.4875 7.7625 27.4875H22.2375C25.1375 27.4875 27.5 25.1125 27.5 22.225V13.125C27.5 11.6125 26.4875 9.67499 25.25 8.81249L17.525 3.39999C15.775 2.17499 12.9625 2.23749 11.275 3.54999Z" stroke="#BD622A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 22.4875V18.7375" stroke="#BD622A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
                <div class="arrow">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.90991 19.92L15.4299 13.4C16.1999 12.63 16.1999 11.37 15.4299 10.6L8.90991 4.07999" stroke="#BD622A" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <p>Events</p>
            </div>
            <a href="homepage-user.php?id=<?php echo $id ?>"><img src="icon\logo.png" class="logo"></a>
        </header>

        <section class="container">
            <div class="container-items">
                <div class="poster">
                    <img src="poster_event/<?php echo $data->poster ?>">
                </div>
            </div>
            <div class="container-items">
                <div class="event-name">
                    <p><?php echo $data->judul ?></p>
                </div>
                <div class="info">
                    <div class="info-items">
                        <img src="gambar-plaza indonesia.png">
                        <p><b><?php echo $data->name ?></b></p>
                    </div>
                    <div class="info-items"></div>
                    <div class="info-items">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.6665 2.91666V7.29166" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23.3335 2.91666V7.29166" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.104 13.2563H29.8957" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M30.625 12.3958V24.7917C30.625 29.1667 28.4375 32.0833 23.3333 32.0833H11.6667C6.5625 32.0833 4.375 29.1667 4.375 24.7917V12.3958C4.375 8.02082 6.5625 5.10416 11.6667 5.10416H23.3333C28.4375 5.10416 30.625 8.02082 30.625 12.3958Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22.8881 19.9792H22.9012" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22.8881 24.3542H22.9012" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.4936 19.9792H17.5067" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.4936 24.3542H17.5067" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.0957 19.9792H12.1088" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.0957 24.3542H12.1088" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p><?php echo $data->event_start_date_fix ?> - <?php echo $data->event_end_date_fix ?></p>
                    </div>
                    <div class="info-items">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32.0832 17.5C32.0832 25.55 25.5498 32.0833 17.4998 32.0833C9.44984 32.0833 2.9165 25.55 2.9165 17.5C2.9165 9.44999 9.44984 2.91666 17.4998 2.91666C25.5498 2.91666 32.0832 9.44999 32.0832 17.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22.9104 22.1375L18.3896 19.4396C17.6021 18.9729 16.9604 17.85 16.9604 16.9313V10.9521" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p><?php echo $data->event_start_time_fix ?> - <?php echo $data->event_end_time_fix ?> </p>
                    </div>
                    <div class="info-items">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.5002 19.5854C20.0131 19.5854 22.0502 17.5483 22.0502 15.0354C22.0502 12.5225 20.0131 10.4854 17.5002 10.4854C14.9873 10.4854 12.9502 12.5225 12.9502 15.0354C12.9502 17.5483 14.9873 19.5854 17.5002 19.5854Z" stroke="white" stroke-width="2"/>
                            <path d="M5.27931 12.3812C8.15223 -0.247923 26.8626 -0.23334 29.721 12.3958C31.3981 19.8042 26.7897 26.075 22.7501 29.9542C19.8189 32.7833 15.1814 32.7833 12.2356 29.9542C8.21056 26.075 3.60223 19.7896 5.27931 12.3812Z" stroke="white" stroke-width="2"/>
                        </svg>
                            <p><?php echo $data->address ?></p>
                    </div>
                    <div class="info-items">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M28.4373 18.2292C28.4373 16.2167 30.0707 14.5833 32.0832 14.5833V13.125C32.0832 7.29166 30.6248 5.83333 24.7915 5.83333H10.2082C4.37484 5.83333 2.9165 7.29166 2.9165 13.125V13.8542C4.929 13.8542 6.56234 15.4875 6.56234 17.5C6.56234 19.5125 4.929 21.1458 2.9165 21.1458V21.875C2.9165 27.7083 4.37484 29.1667 10.2082 29.1667H24.7915C30.6248 29.1667 32.0832 27.7083 32.0832 21.875C30.0707 21.875 28.4373 20.2417 28.4373 18.2292Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.5835 5.83333L14.5835 29.1667" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="5 5"/>
                        </svg>
                        <p><?php echo "Rp. "?><?php echo $ticket['ticket_price']; ?></p>
                    </div>
                </div>

                <!-- tab -->
                <div class="container-items">
                    <div class="tabs">
                        <!-- description -->
                        <input type="radio" class="tabs_radio" id="tab1" name="tab" checked>
                        <label for="tab1" class="tabs_label">Description</label>
                        <div class="tabs_content">
                            <div class="deskripsi">
                                <div class="deskripsi-items">
                                    <p><?php echo $data->deskripsi ?></p>
                                </div>
                                <div class="deskripsi-items">
                                    <div class="contact">
                                        <div class="contact-items">
                                            <svg width="25" height="25" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21.25 25.625H8.75C5 25.625 2.5 23.75 2.5 19.375V10.625C2.5 6.25 5 4.375 8.75 4.375H21.25C25 4.375 27.5 6.25 27.5 10.625V19.375C27.5 23.75 25 25.625 21.25 25.625Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M21.25 11.25L17.3375 14.375C16.05 15.4 13.9375 15.4 12.65 14.375L8.75 11.25" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <p><?php echo $data->email?></p>    
                                        </div>
                                        <div class="contact-items">
                                            <svg width="25" height="25" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.25 27.5H18.75C25 27.5 27.5 25 27.5 18.75V11.25C27.5 5 25 2.5 18.75 2.5H11.25C5 2.5 2.5 5 2.5 11.25V18.75C2.5 25 5 27.5 11.25 27.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M15 19.375C17.4162 19.375 19.375 17.4162 19.375 15C19.375 12.5838 17.4162 10.625 15 10.625C12.5838 10.625 10.625 12.5838 10.625 15C10.625 17.4162 12.5838 19.375 15 19.375Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M22.0451 8.75H22.0596" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <p><?php echo $data->instagram?></p>  
                                        </div>
                                        <div class="contact-items">
                                            <svg width="25" height="25" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M27.4625 22.9125C27.4625 23.3625 27.3625 23.825 27.15 24.275C26.9375 24.725 26.6625 25.15 26.3 25.55C25.6875 26.225 25.0125 26.7125 24.25 27.025C23.5 27.3375 22.6875 27.5 21.8125 27.5C20.5375 27.5 19.175 27.2 17.7375 26.5875C16.3 25.975 14.8625 25.15 13.4375 24.1125C12 23.0625 10.6375 21.9 9.3375 20.6125C8.05 19.3125 6.8875 17.95 5.85 16.525C4.825 15.1 4 13.675 3.4 12.2625C2.8 10.8375 2.5 9.475 2.5 8.175C2.5 7.325 2.65 6.5125 2.95 5.7625C3.25 5 3.725 4.3 4.3875 3.675C5.1875 2.8875 6.0625 2.5 6.9875 2.5C7.3375 2.5 7.6875 2.575 8 2.725C8.325 2.875 8.6125 3.1 8.8375 3.425L11.7375 7.5125C11.9625 7.825 12.125 8.1125 12.2375 8.3875C12.35 8.65 12.4125 8.9125 12.4125 9.15C12.4125 9.45 12.325 9.75 12.15 10.0375C11.9875 10.325 11.75 10.625 11.45 10.925L10.5 11.9125C10.3625 12.05 10.3 12.2125 10.3 12.4125C10.3 12.5125 10.3125 12.6 10.3375 12.7C10.375 12.8 10.4125 12.875 10.4375 12.95C10.6625 13.3625 11.05 13.9 11.6 14.55C12.1625 15.2 12.7625 15.8625 13.4125 16.525C14.0875 17.1875 14.7375 17.8 15.4 18.3625C16.05 18.9125 16.5875 19.2875 17.0125 19.5125C17.075 19.5375 17.15 19.575 17.2375 19.6125C17.3375 19.65 17.4375 19.6625 17.55 19.6625C17.7625 19.6625 17.925 19.5875 18.0625 19.45L19.0125 18.5125C19.325 18.2 19.625 17.9625 19.9125 17.8125C20.2 17.6375 20.4875 17.55 20.8 17.55C21.0375 17.55 21.2875 17.6 21.5625 17.7125C21.8375 17.825 22.125 17.9875 22.4375 18.2L26.575 21.1375C26.9 21.3625 27.125 21.625 27.2625 21.9375C27.3875 22.25 27.4625 22.5625 27.4625 22.9125Z" stroke="white" stroke-width="2" stroke-miterlimit="10"/>
                                            </svg>
                                            <p><?php echo $data->telp?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- tenant -->
                        <input type="radio" class="tabs_radio" id="tab2" name="tab" checked>
                        <label for="tab2" class="tabs_label">Tenant</label>
                        <div class="tabs_content">
                            <div class="card-grid">
                                <div class="card-grid-items">
                                    <div class="card">
                                        <img src="https://www.maicih.com/assets/images/background/background1-20211221080312.png" alt="Avatar" style="width:60%">
                                        <h4><b>Maicih</b></h4> 
                                    </div>
                                </div>
                                <div class="card-grid-items">
                                    <div class="card">
                                        <img src="https://esteler77.com/assets/images/header/logoesteler-02.png" alt="Avatar" style="width:60%">
                                        <h4><b>Es Teler 77</b></h4>
                                    </div>
                                </div>
                                <div class="card-grid-items">
                                    <div class="card">
                                        <img src="https://srengengewetan.co.id/public/img/logo/sw.png" alt="Avatar" style="width:60%">
                                        <h4><b>Srengenge Wetan</b></h4>
                                    </div>
                                </div>
                                <div class="card-grid-items">
                                    <div class="card">
                                        <img src="https://www.maicih.com/assets/images/background/background1-20211221080312.png" alt="Avatar" style="width:60%">
                                        <h4><b>Maicih</b></h4> 
                                    </div>
                                </div>
                                <div class="card-grid-items">
                                    <div class="card">
                                        <img src="https://esteler77.com/assets/images/header/logoesteler-02.png" alt="Avatar" style="width:60%">
                                        <h4><b>Es Teler 77</b></h4>
                                    </div>
                                </div>
                                <div class="card-grid-items">
                                    <div class="card">
                                        <img src="https://srengengewetan.co.id/public/img/logo/sw.png" alt="Avatar" style="width:60%">
                                        <h4><b>Srengenge Wetan</b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- ticket -->
                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM pengunjung WHERE id_pengunjung=$id");
                        $data_p = mysqli_fetch_object($sql);
                        ?>
                        <input type="radio" class="tabs_radio" id="tab3" name="tab" checked>
                        <label for="tab3" class="tabs_label">Ticket</label>
                        <div class="tabs_content">
                            <div class="ticket">
                                <form method="post" action="">
                                    <!-- <input type="date" name="tgl"> -->
                                    Arrival date * <br>
                                    <input type="date" name="arrival date" placeholder="Arrival date" value="<?php echo $data->event_start_date ?>" required>
                                    <br>Name *<br>
                                    <input type="text" name="nama" placeholder="Nama" value="<?php echo $data_p->nama ?>" required>
                                    <br>Email *<br>
                                    <input type="text" name="email" placeholder="Email" value="<?php echo $data_p->email ?>" required>
                                    <br><p>* required</p><br>
                                    <a href="events-detail-transaksi.php?id=<?php echo $id ?>&id_event=<?php echo $_GET['id_event'] ?>"><input class="next "type="submit" name="next" value="Next"></a>
                                    <a><input class="wishlist" type="submit" name="wishlist" value="Save to Wishlist"></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </body>
</html>