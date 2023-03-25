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
    <title>My Tickets</title>
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
                    <li class="side-button-on">
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
                    <li class="side-button">
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
            <div class="tickets">
                <?php
                $myticket = mysqli_query($conn, "SELECT DISTINCT  *, DATE_FORMAT(event_start_date, '%d %M %Y') as event_start_date_fix, DATE_FORMAT(event_end_date, '%d %M %Y') as event_end_date_fix, TIME_FORMAT(event_start_time, '%H.%i') as event_start_time_fix, TIME_FORMAT(event_end_time, '%H.%i WIB') as event_end_time_fix, DATE_FORMAT(book_date, '%d %M %Y') as arrival_date FROM transaksi CROSS JOIN event ON transaksi.id_event=event.id_event CROSS JOIN ticket ON transaksi.id_ticket=ticket.id_ticket WHERE id_pengunjung='$id' ORDER BY id_transaksi DESC LIMIT 6");
                while ($data = mysqli_fetch_object($myticket)) {
                ?>
                <div class="tickets-items">
                    <svg width="358" height="172" viewBox="0 0 358 172" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_d_244_2325)">
                        <path d="M347.066 0.702483C346.216 0.241482 345.264 0.00336699 344.297 0.0103938H82.9192C81.7374 0.00840089 80.5842 0.37359 79.619 1.0555C78.6538 1.73741 77.9243 2.70235 77.5313 3.81689C76.7625 6.03375 75.341 7.96611 73.4536 9.36006C71.5661 10.754 69.3011 11.5443 66.9562 11.6271C66.8212 11.6271 66.6794 11.6271 66.5375 11.6271C64.1187 11.6275 61.7598 10.8747 59.7884 9.47323C57.817 8.07174 56.331 6.09115 55.5367 3.80649C55.1446 2.69279 54.4162 1.72834 53.4523 1.04646C52.4884 0.364579 51.3364 -0.00106414 50.1557 2.32627e-06H5.69588C4.94776 -0.000452599 4.20688 0.146558 3.51562 0.432643C2.82435 0.718727 2.19629 1.13828 1.66728 1.66729C1.13828 2.19629 0.718726 2.82435 0.432641 3.51562C0.146557 4.20688 -0.000453872 4.94776 1.0526e-06 5.69589V157.873C-0.000453872 158.621 0.146557 159.362 0.432641 160.053C0.718726 160.744 1.13828 161.372 1.66728 161.901C2.19629 162.43 2.82435 162.85 3.51562 163.136C4.20688 163.422 4.94776 163.569 5.69588 163.568H50.1557C51.3367 163.57 52.4891 163.205 53.4532 162.523C54.4173 161.841 55.1455 160.876 55.5367 159.762C56.331 157.477 57.817 155.497 59.7884 154.095C61.7598 152.694 64.1187 151.941 66.5375 151.941C66.6794 151.941 66.8212 151.941 66.9562 151.941C69.3011 152.024 71.5661 152.814 73.4536 154.208C75.341 155.602 76.7625 157.535 77.5313 159.752C77.9239 160.866 78.6533 161.832 79.6186 162.514C80.5839 163.196 81.7373 163.561 82.9192 163.558H344.304C345.052 163.558 345.793 163.411 346.484 163.125C347.176 162.839 347.804 162.42 348.333 161.891C348.862 161.362 349.281 160.734 349.567 160.042C349.853 159.351 350 158.61 350 157.862V5.68896C349.999 4.67182 349.727 3.6734 349.211 2.79679C348.695 1.92018 347.954 1.19719 347.066 0.702483ZM67.5029 144.546C67.5048 144.728 67.4542 144.907 67.3572 145.061C67.2603 145.215 67.1211 145.338 66.9562 145.415C66.8284 145.486 66.6838 145.522 66.5375 145.519C66.4097 145.519 66.283 145.494 66.1648 145.446C66.0467 145.397 65.9392 145.325 65.8489 145.235C65.7585 145.145 65.6869 145.037 65.6382 144.919C65.5895 144.801 65.5646 144.674 65.5651 144.546V133.279C65.5651 133.021 65.6675 132.774 65.8499 132.592C66.0322 132.409 66.2796 132.307 66.5375 132.307C66.6828 132.305 66.8264 132.338 66.9562 132.404C67.0551 132.45 67.1452 132.513 67.2226 132.59C67.4038 132.775 67.5046 133.024 67.5029 133.283V144.546ZM67.5029 125.247C67.5048 125.429 67.4542 125.608 67.3572 125.762C67.2603 125.916 67.1211 126.039 66.9562 126.116C66.8278 126.186 66.6836 126.222 66.5375 126.22C66.4094 126.221 66.2823 126.197 66.1637 126.149C66.0451 126.1 65.9374 126.029 65.8468 125.938C65.7562 125.848 65.6846 125.74 65.6363 125.621C65.5879 125.503 65.5637 125.375 65.5651 125.247V113.97C65.5646 113.842 65.5895 113.715 65.6382 113.597C65.6869 113.479 65.7585 113.372 65.8489 113.281C65.9392 113.191 66.0467 113.119 66.1648 113.071C66.283 113.022 66.4097 112.997 66.5375 112.997C66.6828 112.996 66.8264 113.029 66.9562 113.094C67.055 113.14 67.1451 113.202 67.2226 113.278C67.4032 113.463 67.5038 113.711 67.5029 113.97V125.247ZM67.5029 105.948C67.5043 106.13 67.4536 106.309 67.3567 106.463C67.2598 106.617 67.1208 106.74 66.9562 106.817C66.8278 106.887 66.6836 106.923 66.5375 106.921C66.4086 106.921 66.2809 106.895 66.162 106.846C66.0432 106.796 65.9355 106.722 65.8454 106.63C65.7546 106.54 65.6829 106.432 65.6348 106.313C65.5866 106.194 65.5629 106.066 65.5651 105.938V94.6709C65.5646 94.5431 65.5895 94.4164 65.6382 94.2982C65.6869 94.1801 65.7585 94.0727 65.8489 93.9823C65.9392 93.8919 66.0467 93.8203 66.1648 93.7716C66.283 93.7229 66.4097 93.6981 66.5375 93.6985C66.6828 93.6969 66.8264 93.7301 66.9562 93.7954C67.0557 93.8394 67.146 93.9016 67.2226 93.9788C67.4032 94.1639 67.5038 94.4124 67.5029 94.6709V105.948ZM67.5029 86.6461C67.505 86.8286 67.4546 87.0078 67.3576 87.1624C67.2607 87.317 67.1213 87.4406 66.9562 87.5182C66.8275 87.587 66.6834 87.6215 66.5375 87.6185C66.4097 87.619 66.283 87.5941 66.1648 87.5454C66.0467 87.4967 65.9392 87.4251 65.8489 87.3347C65.7585 87.2443 65.6869 87.137 65.6382 87.0188C65.5895 86.9006 65.5646 86.774 65.5651 86.6461V75.3754C65.5651 75.2479 65.5903 75.1216 65.6392 75.0038C65.6881 74.8861 65.7598 74.7791 65.8501 74.6891C65.9404 74.5991 66.0477 74.5278 66.1656 74.4793C66.2836 74.4308 66.41 74.4061 66.5375 74.4065C66.6831 74.406 66.8267 74.4404 66.9562 74.5069C67.0557 74.5508 67.146 74.6131 67.2226 74.6903C67.3128 74.7814 67.384 74.8894 67.4321 75.0082C67.4802 75.127 67.5043 75.2542 67.5029 75.3824V86.6461ZM67.5029 67.3472C67.5052 67.5293 67.4548 67.7081 67.3578 67.8622C67.2608 68.0163 67.1213 68.1391 66.9562 68.2158C66.8284 68.2873 66.6838 68.3231 66.5375 68.3196C66.279 68.3205 66.0304 68.2198 65.8454 68.0393C65.6661 67.8535 65.5657 67.6055 65.5651 67.3472V56.08C65.5651 55.8221 65.6675 55.5748 65.8499 55.3924C66.0322 55.2101 66.2796 55.1076 66.5375 55.1076C66.7964 55.108 67.0449 55.2099 67.2296 55.3914C67.4101 55.5764 67.5107 55.8249 67.5098 56.0835L67.5029 67.3472ZM67.5029 48.0483C67.5048 48.2303 67.4542 48.409 67.3572 48.563C67.2603 48.717 67.1211 48.8398 66.9562 48.9169C66.8284 48.9884 66.6838 49.0243 66.5375 49.0207C66.4097 49.0212 66.283 48.9963 66.1648 48.9476C66.0467 48.8989 65.9392 48.8273 65.8489 48.7369C65.7585 48.6465 65.6869 48.5391 65.6382 48.421C65.5895 48.3028 65.5646 48.1761 65.5651 48.0483V36.7811C65.5651 36.5232 65.6675 36.2759 65.8499 36.0935C66.0322 35.9111 66.2796 35.8087 66.5375 35.8087C66.6828 35.8071 66.8264 35.8403 66.9562 35.9056C67.0551 35.9521 67.1452 36.0153 67.2226 36.0924C67.4038 36.2771 67.5046 36.5259 67.5029 36.7845V48.0483ZM67.5029 28.7494C67.5048 28.9314 67.4542 29.11 67.3572 29.2641C67.2603 29.4181 67.1211 29.5409 66.9562 29.618C66.8278 29.6878 66.6836 29.7236 66.5375 29.7218C66.4094 29.7232 66.2823 29.6989 66.1637 29.6506C66.0451 29.6022 65.9374 29.5307 65.8468 29.4401C65.7562 29.3495 65.6846 29.2417 65.6363 29.1231C65.5879 29.0045 65.5637 28.8775 65.5651 28.7494V17.4822C65.5646 17.3544 65.5895 17.2277 65.6382 17.1095C65.6869 16.9913 65.7585 16.8839 65.8489 16.7936C65.9392 16.7032 66.0467 16.6316 66.1648 16.5829C66.283 16.5342 66.4097 16.5093 66.5375 16.5098C66.6828 16.5082 66.8264 16.5414 66.9562 16.6067C67.055 16.6519 67.1451 16.714 67.2226 16.7901C67.4038 16.9747 67.5046 17.2235 67.5029 17.4822V28.7494Z" fill="#BD622A"/>
                        </g>
                        <defs>
                        <filter id="filter0_d_244_2325" x="0" y="0" width="358" height="171.568" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dx="4" dy="4"/>
                        <feGaussianBlur stdDeviation="2"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_244_2325"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_244_2325" result="shape"/>
                        </filter>
                        </defs>
                    </svg>
                    <div class="tickets-info">
                        <div class="tickets-info-name">
                            <h4><?php echo $data->judul ?></h4>
                        </div>
                        <div class="tickets-info-date">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.66663 1.6665V4.1665" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.3334 1.6665V4.1665" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.91663 7.5752H17.0833" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17.5 7.08317V14.1665C17.5 16.6665 16.25 18.3332 13.3333 18.3332H6.66667C3.75 18.3332 2.5 16.6665 2.5 14.1665V7.08317C2.5 4.58317 3.75 2.9165 6.66667 2.9165H13.3333C16.25 2.9165 17.5 4.58317 17.5 7.08317Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.079 11.4167H13.0864" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.079 13.9167H13.0864" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.9962 11.4167H10.0037" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.9962 13.9167H10.0037" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.91197 11.4167H6.91945" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.91197 13.9167H6.91945" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>                        
                            <p><?php echo $data->arrival_date ?></p>
                        </div>
                        <div class="tickets-info-time">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.3333 9.99984C18.3333 14.5998 14.6 18.3332 9.99996 18.3332C5.39996 18.3332 1.66663 14.5998 1.66663 9.99984C1.66663 5.39984 5.39996 1.6665 9.99996 1.6665C14.6 1.6665 18.3333 5.39984 18.3333 9.99984Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.0917 12.65L10.5083 11.1083C10.0583 10.8416 9.69165 10.2 9.69165 9.67497V6.2583" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <p><?php echo $data->event_start_time_fix ?> WIB</p>                      
                        </div>
                        <div class="tickets-info-place">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 11.1917C11.436 11.1917 12.6 10.0276 12.6 8.5917C12.6 7.15576 11.436 5.9917 10 5.9917C8.56408 5.9917 7.40002 7.15576 7.40002 8.5917C7.40002 10.0276 8.56408 11.1917 10 11.1917Z" stroke="white" stroke-width="2"/>
                                <path d="M3.01663 7.07484C4.65829 -0.141827 15.35 -0.133494 16.9833 7.08317C17.9416 11.3165 15.3083 14.8998 13 17.1165C11.325 18.7332 8.67496 18.7332 6.99163 17.1165C4.69163 14.8998 2.05829 11.3082 3.01663 7.07484Z" stroke="white" stroke-width="2"/>
                            </svg>
                            <p><?php echo $data->city ?></p>
                        </div>
                        <div class="tickets-info-pay">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.25 10.4168C16.25 9.26683 17.1833 8.3335 18.3333 8.3335V7.50016C18.3333 4.16683 17.5 3.3335 14.1666 3.3335H5.83329C2.49996 3.3335 1.66663 4.16683 1.66663 7.50016V7.91683C2.81663 7.91683 3.74996 8.85016 3.74996 10.0002C3.74996 11.1502 2.81663 12.0835 1.66663 12.0835V12.5002C1.66663 15.8335 2.49996 16.6668 5.83329 16.6668H14.1666C17.5 16.6668 18.3333 15.8335 18.3333 12.5002C17.1833 12.5002 16.25 11.5668 16.25 10.4168Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.33337 3.3335L8.33337 16.6668" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="5 5"/>
                            </svg>
                            <p><?php echo $data->status ?></p>                        
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