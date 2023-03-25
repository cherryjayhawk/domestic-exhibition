<?php
include "koneksi.php";
session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login_eo.php"</script>';
}
$id_eo = $_GET['id_eo']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EO Event</title>
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
        <a href=""><img src="icon\logo.png" class="logo"></a>
    </div>
    </header>

<main>
    <!-- sidebar -->
    <div class="kiri">
        <ul>
            <li name="profile">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M20.59 22C20.59 18.13 16.74 15 12 15C7.26003 15 3.41003 18.13 3.41003 22" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <a href="eo_profile.php?id_eo=<?php echo $id_eo ?>">EO profile</a>
            </li>
            
            <li name="event">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.5 12.5C19.5 11.12 20.62 10 22 10V9C22 5 21 4 17 4H7C3 4 2 5 2 9V9.5C3.38 9.5 4.5 10.62 4.5 12C4.5 13.38 3.38 14.5 2 14.5V15C2 19 3 20 7 20H17C21 20 22 19 22 15C20.62 15 19.5 13.88 19.5 12.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 4L10 20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="5 5"/>
                </svg>                    
                <a href="eo_event.php?id_eo=<?php echo $id_eo ?>">My Event</a>
            </li>
            
            <div class="side-button-on">
            <li name="withdraw">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 15C2.79 15 1 16.79 1 19C1 19.75 1.21 20.46 1.58 21.06C2.27 22.22 3.54 23 5 23C6.46 23 7.73 22.22 8.42 21.06C8.79 20.46 9 19.75 9 19C9 16.79 7.21 15 5 15ZM6.49 19.73H5.75V20.51C5.75 20.92 5.41 21.26 5 21.26C4.59 21.26 4.25 20.92 4.25 20.51V19.73H3.51C3.1 19.73 2.76 19.39 2.76 18.98C2.76 18.57 3.1 18.23 3.51 18.23H4.25V17.52C4.25 17.11 4.59 16.77 5 16.77C5.41 16.77 5.75 17.11 5.75 17.52V18.23H6.49C6.9 18.23 7.24 18.57 7.24 18.98C7.24 19.39 6.91 19.73 6.49 19.73Z" fill="#221913"/>
                    <path d="M21.5 12.5H19C17.9 12.5 17 13.4 17 14.5C17 15.6 17.9 16.5 19 16.5H21.5C21.78 16.5 22 16.28 22 16V13C22 12.72 21.78 12.5 21.5 12.5Z" fill="#221913"/>
                    <path d="M16.5302 5.39991C16.8302 5.68991 16.5802 6.13991 16.1602 6.13991L7.88021 6.12991C7.40021 6.12991 7.16021 5.54991 7.50021 5.20991L9.25021 3.44991C10.7302 1.97991 13.1202 1.97991 14.6002 3.44991L16.4902 5.35991C16.5002 5.36991 16.5202 5.38991 16.5302 5.39991Z" fill="#221913"/>
                    <path d="M21.8704 18.66C21.2604 20.72 19.5004 22 17.1004 22H10.6004C10.2104 22 9.96035 21.57 10.1204 21.21C10.4204 20.51 10.6104 19.72 10.6104 19C10.6104 15.97 8.14035 13.5 5.11035 13.5C4.35035 13.5 3.61035 13.66 2.93035 13.96C2.56035 14.12 2.11035 13.87 2.11035 13.47V12C2.11035 9.28 3.75035 7.38 6.30035 7.06C6.55035 7.02 6.82035 7 7.10035 7H17.1004C17.3604 7 17.6104 7.01 17.8504 7.05C19.8704 7.28 21.3304 8.51 21.8704 10.34C21.9704 10.67 21.7304 11 21.3904 11H19.1004C16.9304 11 15.2104 12.98 15.6804 15.23C16.0104 16.87 17.5304 18 19.2004 18H21.3904C21.7404 18 21.9704 18.34 21.8704 18.66Z" fill="#221913"/>
                </svg>                  
                <a href="eo_withdraw.php?id_eo=<?php echo $id_eo ?>">Withdraw</a>
            </li>
            </div>
            <li class="side-button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 15L15 12M15 12L12 9M15 12L4 12M9 17C9 17.9319 9 18.3978 9.15224 18.7654C9.35523 19.2554 9.74432 19.6448 10.2344 19.8478C10.6019 20 11.0681 20 12 20H16.8C17.9201 20 18.48 20 18.9078 19.782C19.2841 19.5902 19.5905 19.2844 19.7822 18.908C20.0002 18.4802 20 17.9201 20 16.8V7.19995C20 6.07985 20.0002 5.51986 19.7822 5.09204C19.5905 4.71572 19.2841 4.40973 18.9078 4.21799C18.48 4 17.9201 4 16.8 4H12C11.0681 4 10.6019 4 10.2344 4.15224C9.74432 4.35523 9.35523 4.74456 9.15224 5.23462C9 5.60216 9 6.0681 9 6.99999" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <a href="logout-eo.php">Log Out</a>
            </li>
        </ul>
    </div>
    <div class="container">
    <!-- konten -->
        <div class="rek status">
            <h5>Card Number</h5>
            <h2><span>4351 8237 2189 0104</span></h2>
        </div>
        
        <div class="balance status">
            <h5>Balance</h5>
            <h2>$ <span>1240</span></h2>
        </div>

        <div class="withdraw status">
            <h5>Withdraw</h5>
            <h2>$ <span>00</span></h2>
        </div>

        <div class="con-wit">
            <h4>Withdraw Amount</h4>
            <input type="text" placeholder="Enter withdraw amount"><br>
            <input name="save" type="submit" value="Withdraw">
        </div>  
    </div>
</main>
</body>
</html>