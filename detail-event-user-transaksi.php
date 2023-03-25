<?php
include "koneksi.php";

session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}

$id_ticket = $_GET['id_ticket'];
$id = $_GET['id'];
$id_event = $_GET['id_event'];

// sql
$user = mysqli_query($conn,"SELECT * FROM pengunjung WHERE id_pengunjung='".$_GET['id']."'");
$event = mysqli_query($conn,"SELECT * FROM event CROSS JOIN eo ON event.id_eo = eo.id_eo WHERE event.id_event='".$_GET['id_event']."'");
$ticket = mysqli_query($conn,"SELECT * FROM ticket WHERE id_ticket='".$_GET['id_ticket']."'");
$trans = mysqli_query($conn,"SELECT * FROM transaksi WHERE id_ticket=$id_ticket AND id_pengunjung='".$_GET['id']."'");


// fetch
$devent = mysqli_fetch_object($event);
$duser = mysqli_fetch_object($user);
$dticket = mysqli_fetch_object($ticket);
$dtrans = mysqli_fetch_object($trans);

// update transaksi
if (isset($_POST['transaksi'])) {
    $poster = $devent->poster;
    $judul = $devent->judul;
    $acc_name = $dticket->acc_name;
    $acc_num = $dticket->acc_num;
    $tpayment = $dticket->ticket_price;
    $bank = $dticket->bank_nm;
    
    //input file
    $bukti = $_FILES["bukti"]["name"];
    $tmp_name = $_FILES["bukti"]["tmp_name"];

    if ($bukti != ''){
        //tipe file
        $type1 = explode('.', $bukti);
        $type2 = $type1[1];

        $newname = 'bukti'.time().'.'.$type2;

        //tipe file upload
        $type_file = array ('jpg', 'jpeg', 'png');

            if(!in_array($type2, $type_file)){
                echo "<script>alert('Tipe file tidak diizinkan');</script>";
            } else {
                // unlink('bukti/'.$foto);
                move_uploaded_file($tmp_name, 'bukti/'.$newname);
                $newpict = $newname;
            }
    }

    $update = "UPDATE transaksi SET judul='$judul', poster='$poster',  acc_num='$acc_num', acc_name='$acc_name', bank_nm='$bank', transfer='$newpict' WHERE id_pengunjung=$id AND id_ticket=$id_ticket";
    
    if ($conn->query($update) === true) {
        echo "<script>alert('Data berhasil diupdate');</script>";
        echo "<meta http-equiv='refresh' content='1;url=detail-event-user-ticket.php?id=$id&id_event=$id_event&id_ticket=$id_ticket'>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

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
                    <a href="eventspage-user.php">
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
            <a href=""><img src="icon\logo.png" class="logo"></a>
        </header>
        <section class="transaksi">
            <div class="transaksi-items">
                <div class="transaksi-left">
                    <div class="transaksi-left-items">
                        <img src="poster_event\<?php echo $devent->poster ?>" alt="">
                    </div>
                    <div class="transaksi-left-items">
                        <p><?php echo $devent->judul ?></p> 
                    </div>
                </div>
                <div class="transaksi-right">
                    <div class="transaksi-right-items">
                        <div class="info-transaksi">
                            <p class="info-transaksi-title">Total Payment</p>
                        </div>
                        <div class="info-transaksi">
                            <p class="info-transaksi-title">Account Name</p>
                        </div>
                        <div class="info-transaksi">
                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M28.4378 18.2292C28.4378 16.2167 30.0712 14.5833 32.0837 14.5833V13.125C32.0837 7.29168 30.6253 5.83334 24.792 5.83334H10.2087C4.37533 5.83334 2.91699 7.29168 2.91699 13.125V13.8542C4.92949 13.8542 6.56283 15.4875 6.56283 17.5C6.56283 19.5125 4.92949 21.1458 2.91699 21.1458V21.875C2.91699 27.7083 4.37533 29.1667 10.2087 29.1667H24.792C30.6253 29.1667 32.0837 27.7083 32.0837 21.875C30.0712 21.875 28.4378 20.2417 28.4378 18.2292Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.583 5.83334L14.583 29.1667" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="5 5"/>
                                </svg>          
                            <p><?php echo $dticket->ticket_price ?></p>
                        </div>
                        <div class="info-transaksi">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 15C18.4518 15 21.25 12.2018 21.25 8.75C21.25 5.29822 18.4518 2.5 15 2.5C11.5482 2.5 8.75 5.29822 8.75 8.75C8.75 12.2018 11.5482 15 15 15Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M25.7377 27.5C25.7377 22.6625 20.9252 18.75 15.0002 18.75C9.07519 18.75 4.2627 22.6625 4.2627 27.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>                                
                            <p><?php echo $dticket->acc_name ?></p>
                        </div>
                        <div class="info-transaksi">
                            <p class="info-transaksi-title">Payment Method</p>
                        </div>
                        <div class="info-transaksi">
                            <p class="info-transaksi-title">Account Number</p>
                        </div>
                        <div class="info-transaksi">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.4625 2.68755L26.7125 7.18752C27.15 7.36252 27.5 7.88751 27.5 8.35001V12.5C27.5 13.1875 26.9375 13.75 26.25 13.75H3.75C3.0625 13.75 2.5 13.1875 2.5 12.5V8.35001C2.5 7.88751 2.85001 7.36252 3.28751 7.18752L14.5375 2.68755C14.7875 2.58755 15.2125 2.58755 15.4625 2.68755Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M27.5 27.5H2.5V23.75C2.5 23.0625 3.0625 22.5 3.75 22.5H26.25C26.9375 22.5 27.5 23.0625 27.5 23.75V27.5Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5 22.5V13.75" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 22.5V13.75" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15 22.5V13.75" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20 22.5V13.75" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M25 22.5V13.75" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M1.25 27.5H28.75" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15 10.625C16.0355 10.625 16.875 9.78553 16.875 8.75C16.875 7.71447 16.0355 6.875 15 6.875C13.9645 6.875 13.125 7.71447 13.125 8.75C13.125 9.78553 13.9645 10.625 15 10.625Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <p>Bank Transfer : <br>
                            <?php echo  $dticket->bank_nm ?>
                            </p>
                        </div>
                        <div class="info-transaksi">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.5 10.6312H27.5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.5 20.6312H10" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.125 20.6312H18.125" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.05 4.3812H21.9375C26.3875 4.3812 27.5 5.48119 27.5 9.86869V20.1312C27.5 24.5187 26.3875 25.6187 21.95 25.6187H8.05C3.6125 25.6312 2.5 24.5312 2.5 20.1437V9.86869C2.5 5.48119 3.6125 4.3812 8.05 4.3812Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <p><?php echo $dticket->acc_num ?></p>
                        </div>
                    </div>
                    <div class="transaksi-right-items">
                        <div class="isian">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <label for="date">Select Date</label><br>
                                <input style="background-color: #ffffff;" placeholder="Select Date" name="date" type="date" value="<?php echo $dtrans->book_date ?>" disabled><br>
                                <br><label for="name">Name</label>
                                <br><input style="background-color: #ffffff;" placeholder="Name" name="name" type="text" value="<?php echo $dtrans->nama ?>" disabled><br>
                                <br><label for="email">Email</label>
                                <br><input style="background-color: #ffffff;" placeholder="Email" name="email" type="text" value="<?php echo $dtrans->email ?>" disabled><br>
                                <br><label for="bukti">Upload proof of payment *</label><br>
                                <br><input placeholder="" name="bukti" type="file" required><br>
                                <br>
                                <p style="color: #BD622A;">* required</p>
                                <button type="submit" name="transaksi">
                                    <a>Checkout</a>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>