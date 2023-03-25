<?php
include "koneksi.php";
session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="eo-login.php"</script>';
}

$id_eo = $_GET['id_eo'];

$eo = mysqli_query($conn, "SELECT * FROM eo WHERE id_eo=$id_eo");
$data = mysqli_fetch_object($eo);


$sql_event = mysqli_query($conn, "SELECT * FROM event ORDER BY id_event DESC LIMIT 1");
$event = mysqli_fetch_object($sql_event);
$id = isset($event->id_event) ? (int)$event->id_event : 0;
$id_event_new = $id + 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Event</title>
    <link href="css\upload_event.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
    <!-- header -->
    <header>
        <div class="right">
        <div class="home">
            <a href="eo_profile.php?id_eo=<?php echo $id_eo ?>">
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
        <p>EO Account</p>
    </div>
        <a href="eo_profile.php?id_eo=<?php echo $id_eo ?>"><img src="icon\logo.png" class="logo"></a>
    </div>
    </header>

    <div class="tabs">
        <!-- eo -->
        <input type="radio" class="tabs_radio" id="tab1" name="tab" checked>
        <label for="tab1" class="tabs_label">Event Organizer</label>
        <div class="tabs_content">
            <form action="" method="POST" enctype="multipart/form-data">
                <tr>
                    <td>
                        <p class="title_input">Logo *</p>
                    </td>
                    <td>
                        <img src="logo\<?= $data->logo ?>" width="100px" height="100px" style="border-radius: 50%;" >
                        <input name="foto" type="hidden" value="<?= $data->logo ?>"><br>
                        <input name="logo" type="file" size="40" value="<?= $data->logo ?>">
                    </td>
                </tr>
                
                    <p class="title_input">Name of Event Organizer *</p>
                    <input name="name" type="text" size="40" value="<?= $data->name ?>" required>

                    <p class="title_input">Email *</p>
                    <input name="email" type="email" size="40" value="<?= $data->email ?>" required>

                    <p class="title_input">Instagram</p>
                    <input name="instagram" type="text" size="40" value="<?= $data->instagram ?>">

                    <p class="title_input">Phone Number *</p>
                    <input name="telp" type="text" size="40" value="<?= $data->telp ?>" required>
                    <br>
                    <p>* required</p>
                <input name="eo" type="submit" value="Save">  
            </form>
        </div>
        <?php
        if(isset($_POST["eo"])){
            include "koneksi.php";
            
            // inputan form
            $name = $_POST["name"];
            $email = $_POST["email"];
            $instagram = $_POST["instagram"];
            $telp = $_POST["telp"];
            $foto = $_POST["foto"];

            //input file
            $logo = $_FILES["logo"]["name"];
            $tmp_name = $_FILES["logo"]["tmp_name"];

            if ($logo != ''){
                //tipe file
                $type1 = explode('.', $logo);
                $type2 = $type1[1];

                $newname = 'logo'.time().'.'.$type2;

                //tipe file upload
                $type_file = array ('jpg', 'jpeg', 'png');

                    if(!in_array($type2, $type_file)){
                        echo "<script>alert('Tipe file tidak diizinkan');</script>";
                    } else {
                        unlink('./logo/'.$foto);
                        move_uploaded_file($tmp_name, './logo/'.$newname);
                        $newpict = $newname;
                    }
                } else {
                $newpict = $foto;
                }
            
            $update = mysqli_query($conn, "UPDATE eo SET name='$name', email='$email', logo='$newpict', instagram='$instagram', telp='$telp' WHERE id_eo='".$data->id_eo."'") or die(mysqli_error($conn));
            
            if ($update){
                echo "<script>alert('Data berhasil diupdate');</script>";
                echo "<meta http-equiv='refresh' content='1;url=eo_profile.php?id_eo=$id_eo'>";
            }
        }
        ?>

        <!-- event -->
        <input type="radio" class="tabs_radio" id="tab2" name="tab" checked>
        <label for="tab2" class="tabs_label">Event</label>
        <div class="tabs_content">
            <form action="" method="POST" id="inputevent" enctype="multipart/form-data">
            <tenant-grid>
                <div class="grid-event">
                    <div>
                        <div class="title_input">Title *</div>
                        <input type="text" name="judul" placeholder="Exhibition Name" required>
                    </div>
                    <div>
                        <div class="title_input">Poster *</div>
                        <input type="file" name="poster" required>
                    </div>
                    <div>
                        <div class="title_input">Deskripsi</div>
                        <textarea name="deskripsi" id="" cols="30" rows="10" required></textarea><br>
                    </div>
                    <label for="kategori" class="title_input">Category * :</label>
                    <select name="kategori" required>
                        <option value="" disabled selected>Select Category</option>
                        <option>Art</option>
                        <option>Tech</option>
                        <option>Book</option>
                        <option>Food</option>
                        <option>Fashion</option>
                        <option>Automotive</option>
                        <option>Others</option>
                    </select>
                </div>
                <div class="grid-event">
                    <div class="title_input">Start Event *</div>
                    <input type="date" name="event_start_date" required> <br>
                    <input type="time" name="event_start_time" required> <br>

                    <div class="title_input">End Event *</div>
                    <input type="date" name="event_end_date" required> <br>
                    <input type="time" name="event_end_time" required> <br>

                    <div class="title_input">Province *</div>
                    <input type="text" name="region" placeholder="Jawa Barat" required>

                    <div class="title_input">City *</div>
                    <input type="text" name="city" placeholder="Cimahi" required>

                    <div class="title_input">Address *</div>
                    <input type="text" name="alamat" placeholder="Jl. Soekarno Hatta No.X" required>
                </div>    
            </tenant-grid>
            <div class="tombol">
                <div>
                    <p>* required</p>
                    <input type="submit" name="event" value="Upload">
                </div>
                <div>

                </div>
            </div>
            </form>
        </div>
        <?php
            include "koneksi.php";
            if (isset($_POST['event'])) {


                $judul = $_POST['judul'];
                $desk = $_POST['deskripsi'];
                $kategori = $_POST['kategori'];
                $event_dstart = $_POST['event_start_date'];
                $event_tstart = $_POST['event_start_time'];
                $event_dend = $_POST['event_end_date'];
                $event_tend = $_POST['event_end_time'];
                $region = $_POST['region'];
                $city = $_POST['city'];
                $address = $_POST['alamat'];

                    //input file
                    $poster = $_FILES["poster"]["name"];
                    $tmp_name = $_FILES["poster"]["tmp_name"];

                    if ($poster != ''){
                        //tipe file
                        $type1 = explode('.', $poster);
                        $type2 = $type1[1];
            
                        $newname = 'poster'.time().'.'.$type2;
            
                        //tipe file upload
                        $type_file = array ('jpg', 'jpeg', 'png');
            
                        if(!in_array($type2, $type_file)){
                          echo "<script>alert('Tipe file tidak diizinkan');</script>";
                        } else {
                        //   unlink('./poster/'.$foto);
                          move_uploaded_file($tmp_name, './poster_event/'.$newname);
                          $newpict = $newname;
                        }
                      }

            $sql = "INSERT INTO event 
                            SET judul = '$judul', deskripsi = '$desk', poster='$newname', kategori= '$kategori', event_start_date='$event_dstart', event_end_date='$event_dend', event_start_time='$event_tstart', event_end_time='$event_tend', region='$region', city='$city', address='$address',
                            id_ticket = '$id_event_new', id_eo='$id_eo'";
                
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
                    echo "<meta http-equiv='refresh' content='1;url=eo_event.php?id_eo=$id_eo'>";
            }
        ?>


        <!-- ticket -->
        <input type="radio" class="tabs_radio" id="tab3" name="tab" checked>
        <label for="tab3" class="tabs_label">Ticket</label>
        <div class="tabs_content">
            <h4>Ticket</h4>

            <form action="" method="POST" id="inputtiket">
                <label for="status">Make Your Ticket *</label>
                <select name="status" value="Paid/Free" required>
                    <!-- <option value="" disabled selected>Paid/Free</option> -->
                    <option>Free</option>
                    <option>Paid</option>
                </select>

                <div class="title_input">Stock *</div>
                <input type="text" name="ticket_stok" placeholder="0" required>

                <div class="title_input">Price *</div>
                <input type="text" name="ticket_price" placeholder="Rp 0" >

                <div class="title_input">Sales Start *</div>
                <input type="date" name="ticket_dstart" required><br>
                <input type="time" name="ticket_tstart" required>

                <div class="title_input">Sales End *</div>
                <input type="date" name="ticket_dend" required><br>
                <input type="time" name="ticket_tend" required>

                <div class="title_input">Payment Method *</div>
                Bank Name *
                <input type="text" name="bank_nm" placeholder="Mandiri" required><br>
                Account Name *
                <input type="text" name="rek_nama" placeholder="Loren" required><br>
                Account Number *
                <input type="text" name="rek_no" placeholder="4242 4242 4242 4242" required>
                <p>required *</p>
                <input type="submit" name="ticket" value="Upload">
            </form>
        </div>
        <?php
            if (isset($_POST['ticket'])) {
                include "koneksi.php";

                $status = $_POST['status'];
                $ticket_stok = $_POST['ticket_stok'];
                $ticket_price = $_POST['ticket_price'];
                $ticket_dstart = $_POST['ticket_dstart'];
                $ticket_tstart = $_POST['ticket_tstart'];
                $ticket_dend = $_POST['ticket_dend'];
                $ticket_tend = $_POST['ticket_tend'];
                $rek_nama = $_POST['rek_nama'];
                $rek_no = $_POST['rek_no'];
                $bank = $_POST['bank_nm'];

                $sql = "INSERT INTO ticket VALUES ('" . '' . "','" . $status . "','" . $ticket_price . "','" . $ticket_stok . "', '" . $ticket_dstart . "', 
                '" . $ticket_dend . "', '" . $ticket_tstart . "', '" . $ticket_tend . "', '" . $rek_nama . "', '" . $rek_no . "', '" . $id_event_new . "', '" . $id_eo . "', '" . $bank . "')";
                
                if ($conn->query($sql) === TRUE) {
                    // echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                // $conn->close();
                // echo "<meta http-equiv='refresh' content='1;url=eo_event.php?id_eo=$id_eo'>";
            }
        ?>


        <!-- tenant -->
        <input type="radio" class="tabs_radio" id="tab4" name="tab" checked>
        <label for="tab4" class="tabs_label">Tenant</label>
        <div class="tabs_content">
                <h1><b>*Please upload your ticket first*</b></h1>
                <form action="" method="POST">
                <tenant-grid>
                    <div class="tenant">
                        <h1>Tenant 1</h1>
                        <div class="title_input">Name</div>
                        <input name="tenant_name1" type="text">

                        <div class="title_input">Logo</div>
                        <input name="tenant_logo1" type="file">
                    </div>
                    <div class="tenant">
                    <h1>Tenant 2</h1>
                        <div class="title_input">Name</div>
                        <input name="tenant_name2" type="text">

                        <div class="title_input">Logo</div>
                        <input name="tenant_logo2" type="file">
                    </div>
                    <div class="tenant">
                    <h1>Tenant 3</h1>
                        <div class="title_input">Name</div>
                        <input name="tenant_name3" type="text">

                        <div class="title_input">Logo</div>
                        <input name="tenant_logo3" type="file">
                    </div>
                    <div class="tenant">
                    <h1>Tenant 4</h1>
                        <div class="title_input">Name</div>
                        <input name="tenant_name4" type="text">

                        <div class="title_input">Logo</div>
                        <input name="tenant_logo4" type="file">
                    </div>
                    <div class="tenant">
                    <h1>Tenant 5</h1>
                        <div class="title_input">Name</div>
                        <input name="tenant_name5" type="text">

                        <div class="title_input">Logo</div>
                        <input name="tenant_logo5" type="file">
                    </div>
                    <div class="tenant">
                    <h1>Tenant 6</h1>
                        <div class="title_input">Name</div>
                        <input name="tenant_name6" type="text">

                        <div class="title_input">Logo</div>
                        <input name="tenant_logo6" type="file">
                    </div>
                </tenant-grid>
                    <input name="tenant" type="submit" value="Save">
                </form>
        </div>
        <?php
            if(isset($_POST["tenant"])){
                include "koneksi.php";

                $tenant_name1 = $_POST["tenant_name1"];
                $tenant_logo1 = $_POST["tenant_logo1"];
                $tenant_name2 = $_POST["tenant_name2"];
                $tenant_logo2 = $_POST["tenant_logo2"];
                $tenant_name3 = $_POST["tenant_name3"];
                $tenant_logo3 = $_POST["tenant_logo3"];
                $tenant_name4 = $_POST["tenant_name4"];
                $tenant_logo4 = $_POST["tenant_logo4"];
                $tenant_name5 = $_POST["tenant_name5"];
                $tenant_logo5 = $_POST["tenant_logo5"];
                $tenant_name6 = $_POST["tenant_name6"];
                $tenant_logo6 = $_POST["tenant_logo6"];
                
                $sql = "INSERT INTO tenant VALUE ('".""."','".$tenant_name1."','".$tenant_logo1."','".$tenant_logo2."','".$tenant_logo2."','".$tenant_logo3."','".$tenant_logo3."','".$tenant_logo4."','".$tenant_logo4."','".$tenant_logo5."','".$tenant_logo5."','".$tenant_logo6."','".$tenant_logo6."')";
        
                if ($conn->query($sql) === TRUE) {
                    // echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
                    echo "<meta http-equiv='refresh' content='1;url=eo_event.php?id_eo=$id_eo'>";
            }
        ?>
    </div>
</body>
</html>