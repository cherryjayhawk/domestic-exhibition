<?php 
include "koneksi.php";
$news = mysqli_query($conn, "SELECT * FROM news WHERE id_news='".$_GET['id_news']."'");
$data = mysqli_fetch_object($news);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detail News</title>
        <link href="css\news-detail.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <div class="right">
                <div class="home">
                    <a href="newspage-user.php?id=<?php echo $_GET['id'] ?>">
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
                <p>News</p>
            </div>
            <a href="homepage-user.php?id=<?php echo $_GET['id'] ?>"><img src="icon\logo.png" class="logo"></a>
        </header>
    <div class="main">
        <section class="container">
            <div class="container-items">
                <div class="title">
                    <div class="title-items">
                        <div class="title-left">
                            <img src="poster_news/<?php echo $data->picture ?>">
                        </div>
                    </div>
                    <div class="title-items">
                        <div class="title-right">
                            <p class="news-title"><?php echo $data->title ?></p>
                            <br>
                        </div>
                        <div class="more-info">
                            <div class="like">
                                <svg width="32" height="31" viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9 4.00069C6.22 4.00069 4 6.2268 4 8.93493C4 11.9831 5.764 15.2352 8.492 18.4214C10.784 21.0955 13.568 23.5076 16 25.4537C18.432 23.5076 21.216 21.0935 23.508 18.4214C26.236 15.2352 28 11.9811 28 8.93493C28 6.2268 25.78 4.00069 23 4.00069C20.22 4.00069 18 6.2268 18 8.93493C18 9.46539 17.7893 9.97412 17.4142 10.3492C17.0391 10.7243 16.5304 10.935 16 10.935C15.4696 10.935 14.9609 10.7243 14.5858 10.3492C14.2107 9.97412 14 9.46539 14 8.93493C14 6.2268 11.78 4.00069 9 4.00069ZM16 3.31865C15.1531 2.28011 14.0854 1.44341 12.8745 0.869418C11.6636 0.29543 10.34 -0.00141077 9 0.00048972C4.048 0.00048972 0 3.98069 0 8.93493C0 13.4371 2.534 17.6154 5.454 21.0235C8.416 24.4817 12.048 27.4598 14.772 29.5799C15.1231 29.8531 15.5552 30.0013 16 30.0013C16.4448 30.0013 16.8769 29.8531 17.228 29.5799C19.952 27.4598 23.584 24.4797 26.546 21.0235C29.466 17.6154 32 13.4371 32 8.93493C32 3.98069 27.952 0.00048972 23 0.00048972C20.18 0.00048972 17.652 1.29255 16 3.31865Z" fill="#BD622A"/>
                                </svg>
                            </div>
                            <div class="share">
                                <svg width="24" height="37" viewBox="0 0 24 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18 4.00049C17.4695 4.00049 16.9608 4.21122 16.5858 4.58631C16.2107 4.9614 16 5.47013 16 6.00059C16 6.53105 16.2107 7.03978 16.5858 7.41487C16.9608 7.78996 17.4695 8.00069 18 8.00069C18.5304 8.00069 19.0391 7.78996 19.4142 7.41487C19.7893 7.03978 20 6.53105 20 6.00059C20 5.47013 19.7893 4.9614 19.4142 4.58631C19.0391 4.21122 18.5304 4.00049 18 4.00049ZM12 6.00059C11.9999 4.69974 12.4227 3.43411 13.2044 2.39439C13.9862 1.35467 15.0846 0.597183 16.3343 0.236045C17.5839 -0.125094 18.9171 -0.0703171 20.1329 0.392122C21.3487 0.854561 22.3813 1.69961 23.0752 2.79996C23.769 3.90031 24.0865 5.19635 23.9797 6.49281C23.873 7.78927 23.3479 9.01594 22.4834 9.98799C21.619 10.96 20.4621 11.6248 19.187 11.8822C17.9119 12.1395 16.5877 11.9755 15.414 11.4149L11.414 15.415C11.79 16.1971 12 17.0751 12 18.0012C12 18.9272 11.79 19.8053 11.414 20.5873L15.414 24.5875C16.6912 23.9774 18.1429 23.8385 19.5126 24.1953C20.8823 24.5521 22.0817 25.3817 22.8989 26.5374C23.7161 27.6931 24.0985 29.1006 23.9784 30.5109C23.8583 31.9213 23.2435 33.2438 22.2427 34.2447C21.2418 35.2456 19.9194 35.8604 18.5091 35.9805C17.0988 36.1006 15.6915 35.7182 14.5358 34.901C13.3802 34.0837 12.5506 32.8842 12.1938 31.5144C11.837 30.1447 11.9759 28.6929 12.586 27.4156L8.58597 23.4154C7.67138 23.8519 6.66114 24.0496 5.6495 23.9901C4.63785 23.9306 3.65776 23.6158 2.80065 23.0751C1.94354 22.5344 1.23734 21.7854 0.747923 20.898C0.25851 20.0106 0.00183105 19.0136 0.00183105 18.0002C0.00183105 16.9867 0.25851 15.9898 0.747923 15.1024C1.23734 14.2149 1.94354 13.4659 2.80065 12.9252C3.65776 12.3845 4.63785 12.0697 5.6495 12.0102C6.66114 11.9507 7.67138 12.1484 8.58597 12.5849L12.586 8.58671C12.1996 7.77939 11.9993 6.89562 12 6.00059ZM5.99997 16.0011C5.46954 16.0011 4.96083 16.2118 4.58576 16.5869C4.21068 16.962 3.99997 17.4707 3.99997 18.0012C3.99997 18.5316 4.21068 19.0404 4.58576 19.4155C4.96083 19.7905 5.46954 20.0013 5.99997 20.0013C6.5304 20.0013 7.03911 19.7905 7.41418 19.4155C7.78926 19.0404 7.99997 18.5316 7.99997 18.0012C7.99997 17.4707 7.78926 16.962 7.41418 16.5869C7.03911 16.2118 6.5304 16.0011 5.99997 16.0011ZM18 28.0017C17.7372 28.0011 17.477 28.0525 17.2343 28.1531C16.9916 28.2537 16.7712 28.4014 16.586 28.5877C16.2588 28.9149 16.0553 29.3455 16.01 29.806C15.9647 30.2666 16.0805 30.7285 16.3376 31.1132C16.5948 31.4979 16.9773 31.7816 17.4202 31.9158C17.863 32.0501 18.3386 32.0266 18.7661 31.8495C19.1936 31.6723 19.5464 31.3524 19.7644 30.9443C19.9825 30.5361 20.0523 30.065 19.9619 29.6112C19.8715 29.1573 19.6266 28.7489 19.2689 28.4554C18.9111 28.1619 18.4627 28.0016 18 28.0017Z" fill="#BD622A"/>
                            </svg>
                            </div>
                            <div class="writer">
                                <p>by <b><?php echo $data->penulis ?></b>
                                <br><?php echo $data->tgl_publikasi ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-items">
                <div class="content">
                    <p><?php echo $data->content ?></p>
                </div>
            </div>
        </section>
    </div>
    </body>
</html>