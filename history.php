<?php
include "koneksi.php";
session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}

$id = $_GET['id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link href="css\account.css" rel="stylesheet">
</head>
<body>
    <!-- header -->
    <header>
        <div class="right">
        <div class="home">
            <a href="homepage-user.php?id=<?php echo $_GET['id'] ?>">
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
        <a href="homepage-user.php?id=<?php echo $_GET['id'] ?>"><img src="icon\logo.png" class="logo"></a>
    </div>
    </header>
    
    <div class="container">
        <!-- SIDEBAR -->
        <div class="container-items">
            <div class="sidebar">
                <ul>
                    <li class="side-button">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="white" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20.59 22C20.59 18.13 16.74 15 12 15C7.26003 15 3.41003 18.13 3.41003 22" fill="white"/>
                            <path d="M20.59 22C20.59 18.13 16.74 15 12 15C7.26003 15 3.41003 18.13 3.41003 22" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="myprofile-user.php?id=<?php echo $_GET['id'] ?>">My Profile</a>
                    </li>
                    <li class="side-button">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.5 12.5C19.5 11.12 20.62 10 22 10V9C22 5 21 4 17 4H7C3 4 2 5 2 9V9.5C3.38 9.5 4.5 10.62 4.5 12C4.5 13.38 3.38 14.5 2 14.5V15C2 19 3 20 7 20H17C21 20 22 19 22 15C20.62 15 19.5 13.88 19.5 12.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10 4L10 20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="5 5"/>
                        </svg>
                        <a href="my-tickets.php?id=<?php echo $_GET['id'] ?>">My Tickets</a>
                    </li>
                    <li class="side-button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 8.19431C10 3.49988 3 3.99988 3 9.99991C3 15.9999 12 20.9999 12 20.9999C12 20.9999 21 15.9999 21 9.99991C21 3.99988 14 3.49988 12 8.19431Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="favorite-events.php?id=<?php echo $_GET['id'] ?>">Favorite Events</a>
                    </li>
                    <li class="side-button-on">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C9.43639 2.00731 6.97349 2.99891 5.12 4.77V3C5.12 2.73478 5.01464 2.48043 4.82711 2.29289C4.63957 2.10536 4.38522 2 4.12 2C3.85478 2 3.60043 2.10536 3.41289 2.29289C3.22536 2.48043 3.12 2.73478 3.12 3V7.5C3.12 7.76522 3.22536 8.01957 3.41289 8.20711C3.60043 8.39464 3.85478 8.5 4.12 8.5H8.62C8.88522 8.5 9.13957 8.39464 9.32711 8.20711C9.51464 8.01957 9.62 7.76522 9.62 7.5C9.62 7.23478 9.51464 6.98043 9.32711 6.79289C9.13957 6.60536 8.88522 6.5 8.62 6.5H6.22C7.50578 5.15636 9.21951 4.30265 11.0665 4.08567C12.9136 3.86868 14.7785 4.30198 16.3407 5.31104C17.9028 6.32011 19.0646 7.84191 19.6263 9.61479C20.188 11.3877 20.1145 13.3009 19.4184 15.0254C18.7223 16.7499 17.4472 18.1781 15.8122 19.0643C14.1772 19.9505 12.2845 20.2394 10.4596 19.8813C8.63463 19.5232 6.99147 18.5405 5.81259 17.1022C4.63372 15.6638 3.99279 13.8597 4 12C4 11.7348 3.89464 11.4804 3.70711 11.2929C3.51957 11.1054 3.26522 11 3 11C2.73478 11 2.48043 11.1054 2.29289 11.2929C2.10536 11.4804 2 11.7348 2 12C2 13.9778 2.58649 15.9112 3.6853 17.5557C4.78412 19.2002 6.3459 20.4819 8.17317 21.2388C10.0004 21.9957 12.0111 22.1937 13.9509 21.8079C15.8907 21.422 17.6725 20.4696 19.0711 19.0711C20.4696 17.6725 21.422 15.8907 21.8079 13.9509C22.1937 12.0111 21.9957 10.0004 21.2388 8.17317C20.4819 6.3459 19.2002 4.78412 17.5557 3.6853C15.9112 2.58649 13.9778 2 12 2ZM12 8C11.7348 8 11.4804 8.10536 11.2929 8.29289C11.1054 8.48043 11 8.73478 11 9V12C11 12.2652 11.1054 12.5196 11.2929 12.7071C11.4804 12.8946 11.7348 13 12 13H14C14.2652 13 14.5196 12.8946 14.7071 12.7071C14.8946 12.5196 15 12.2652 15 12C15 11.7348 14.8946 11.4804 14.7071 11.2929C14.5196 11.1054 14.2652 11 14 11H13V9C13 8.73478 12.8946 8.48043 12.7071 8.29289C12.5196 8.10536 12.2652 8 12 8Z" fill="white"/>
                        </svg>
                        <a href="history.php?id=<?php echo $_GET['id'] ?>">History</a>
                    </li>
                    <li class="side-button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 15L15 12M15 12L12 9M15 12L4 12M9 17C9 17.9319 9 18.3978 9.15224 18.7654C9.35523 19.2554 9.74432 19.6448 10.2344 19.8478C10.6019 20 11.0681 20 12 20H16.8C17.9201 20 18.48 20 18.9078 19.782C19.2841 19.5902 19.5905 19.2844 19.7822 18.908C20.0002 18.4802 20 17.9201 20 16.8V7.19995C20 6.07985 20.0002 5.51986 19.7822 5.09204C19.5905 4.71572 19.2841 4.40973 18.9078 4.21799C18.48 4 17.9201 4 16.8 4H12C11.0681 4 10.6019 4 10.2344 4.15224C9.74432 4.35523 9.35523 4.74456 9.15224 5.23462C9 5.60216 9 6.0681 9 6.99999" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- KONTEN -->
        <div class="container-items" style="background-color: white; border-left: 5px solid #BD622A;">
            <div class="filter">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 6.5H16" stroke="#221913" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6 6.5H2" stroke="#221913" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 10C11.933 10 13.5 8.433 13.5 6.5C13.5 4.567 11.933 3 10 3C8.067 3 6.5 4.567 6.5 6.5C6.5 8.433 8.067 10 10 10Z" stroke="#221913" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M22 17.5H18" stroke="#221913" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8 17.5H2" stroke="#221913" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 21C15.933 21 17.5 19.433 17.5 17.5C17.5 15.567 15.933 14 14 14C12.067 14 10.5 15.567 10.5 17.5C10.5 19.433 12.067 21 14 21Z" stroke="#221913" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <select name="kategori" value="">
                    <option value="" disabled selected>Category</option>
                    <option>-</option>
                    <option>-</option>
                </select>
                <select name="urutkan" value="">
                    <option value="" disabled selected>Urutkan</option>
                    <option>-</option>
                    <option>-</option>
                </select>             
            </div>
            <div class="history">
                <?php
                $history = mysqli_query($conn, "SELECT *, DATE_FORMAT(event_start_date, '%d %M %Y') as event_start_date_fix, DATE_FORMAT(event_end_date, '%d %M %Y') as event_end_date_fix, TIME_FORMAT(event_start_time, '%H.%i') as event_start_time_fix, TIME_FORMAT(event_end_time, '%H.%i WIB') as event_end_time_fix, DATE_FORMAT(book_date, '%d %M %Y') as arrival_date FROM transaksi CROSS JOIN event ON transaksi.id_event=event.id_event CROSS JOIN ticket ON transaksi.id_ticket=ticket.id_ticket WHERE id_pengunjung='$id' AND event.event_end_date<=CURDATE() ORDER BY id_transaksi DESC LIMIT 6");
                while ($data = mysqli_fetch_object($history)) {
                ?>
                <div class="history-items">
                    <div class="history-items-content">
                        <div>
                            <img src="poster_event\<?php echo $data->poster ?>" alt="">
                        </div>
                        <div>
                            <h2><?php echo $data->judul ?></h2>
                        </div>
                    </div>
                </div>
                <?php
                }?>
            </div>
        </div>
    </div>
</body>
</html>