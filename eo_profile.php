<?php
include "koneksi.php";
session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login_eo.php"</script>';
}
$id_eo = $_GET['id_eo']; 

$sql = mysqli_query($conn, "SELECT * FROM eo WHERE id_eo=$id_eo");
$data = mysqli_fetch_object($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EO Profile</title>
    <link href="eo_acc.css" rel="stylesheet">
</head>
<body>
    <!-- header -->
    <header>
        <div class="right">
        <div class="home">
            <a href="login_eo.php">
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
        <p>Account</p>
    </div>
        <a href="login_eo.php"><img src="icon\logo.png" class="logo"></a>
    </div>
    </header>

<main>
    <!-- sidebar -->
    <div class="kiri">
        <ul>
            <div class="side-button-on">
            <li name="profile">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="#221913" stroke="#221913" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M20.5901 22C20.5901 18.13 16.7402 15 12.0002 15C7.26015 15 3.41016 18.13 3.41016 22" fill="#221913"/>
                    <path d="M20.5901 22C20.5901 18.13 16.7402 15 12.0002 15C7.26015 15 3.41016 18.13 3.41016 22" stroke="#221913" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <a href="eo_profile.php?id_eo=<?php echo $id_eo ?>">EO profile</a>
            </li>
            </div>
            <li name="event">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.5 12.5C19.5 11.12 20.62 10 22 10V9C22 5 21 4 17 4H7C3 4 2 5 2 9V9.5C3.38 9.5 4.5 10.62 4.5 12C4.5 13.38 3.38 14.5 2 14.5V15C2 19 3 20 7 20H17C21 20 22 19 22 15C20.62 15 19.5 13.88 19.5 12.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 4L10 20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="5 5"/>
                </svg>                    
                <a href="eo_event.php?id_eo=<?php echo $id_eo ?>">My Event</a>
            </li>
            <li name="withdraw">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.7514 7.04997C17.5114 7.00997 17.2614 6.99998 17.0014 6.99998H7.00141C6.72141 6.99998 6.45141 7.01998 6.19141 7.05998C6.33141 6.77998 6.53141 6.52001 6.77141 6.28001L10.0214 3.02C11.3914 1.66 13.6114 1.66 14.9814 3.02L16.7314 4.78996C17.3714 5.41996 17.7114 6.21997 17.7514 7.04997Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 19C9 19.75 8.79 20.46 8.42 21.06C7.73 22.22 6.46 23 5 23C3.54 23 2.27 22.22 1.58 21.06C1.21 20.46 1 19.75 1 19C1 16.79 2.79 15 5 15C7.21 15 9 16.79 9 19Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.49172 18.9795H3.51172" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5 17.5195V20.5095" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M22 12V17C22 20 20 22 17 22H7.63C7.94 21.74 8.21 21.42 8.42 21.06C8.79 20.46 9 19.75 9 19C9 16.79 7.21 15 5 15C3.8 15 2.73 15.53 2 16.36V12C2 9.28 3.64 7.38 6.19 7.06C6.45 7.02 6.72 7 7 7H17C17.26 7 17.51 7.00999 17.75 7.04999C20.33 7.34999 22 9.26 22 12Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M22 12.5H19C17.9 12.5 17 13.4 17 14.5C17 15.6 17.9 16.5 19 16.5H22" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>                    
                <a href="eo_withdraw.php?id_eo=<?php echo $id_eo ?>">Withdraw</a>
            </li>
            <li class="side-button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 15L15 12M15 12L12 9M15 12L4 12M9 17C9 17.9319 9 18.3978 9.15224 18.7654C9.35523 19.2554 9.74432 19.6448 10.2344 19.8478C10.6019 20 11.0681 20 12 20H16.8C17.9201 20 18.48 20 18.9078 19.782C19.2841 19.5902 19.5905 19.2844 19.7822 18.908C20.0002 18.4802 20 17.9201 20 16.8V7.19995C20 6.07985 20.0002 5.51986 19.7822 5.09204C19.5905 4.71572 19.2841 4.40973 18.9078 4.21799C18.48 4 17.9201 4 16.8 4H12C11.0681 4 10.6019 4 10.2344 4.15224C9.74432 4.35523 9.35523 4.74456 9.15224 5.23462C9 5.60216 9 6.0681 9 6.99999" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <a href="logout-eo.php?id_eo=<?php echo $id_eo ?>">Log Out</a>
            </li>
        </ul>
    </div>

    <!-- konten -->
    <div class="container">
        <form action="" method="post">
        <div class="bruh">
            <div>
                EO Name
                <input required name="name" type="text" placeholder="domesticexhibition" value="<?php echo $data->name ?>">
            </div>
            <div>
                Email
                <input required name="email" type="email" placeholder="domesticexhibition@gmail.com" value="<?php echo $data->email ?>">
            </div>
            <div>
                Instagram
                <input name="instagram" type="text" placeholder="domesticexhibition" value="<?php echo $data->instagram ?>">
            </div>
            <div>
                Phone Number
                <input name="telp" type="text" placeholder="0812345678910" value="<?php echo $data->telp ?>"> 
            </div>
                <div class="submit-box">
                <input type="submit" value="Save" name="save">
            </div>
        </div> 
        </form>
        <?php
        if (isset($_POST['save'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $instagram = $_POST['instagram'];
            $telp = $_POST['telp'];

            $sql = mysqli_query($conn, "UPDATE eo SET name='$name', email='$email', instagram='$instagram', telp='$telp' WHERE id_eo=$id_eo");
        }
        
        ?>
    </div>

</main>

</body>
</html>