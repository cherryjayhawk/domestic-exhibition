<?php
include "koneksi.php";

$perPage = 9;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$cards = "SELECT *, DATE_FORMAT(event_start_date, '%d %M %Y') as event_start_date_fix, DATE_FORMAT(event_end_date, '%d %M %Y') as event_end_date_fix, TIME_FORMAT(event_start_time, '%H.%i') as event_start_time_fix, TIME_FORMAT(event_end_time, '%H.%i WIB') as event_end_time_fix from event  CROSS JOIN ticket ON event.id_event=ticket.id_event WHERE kategori='Book' ORDER BY event.id_event DESC LIMIT $start, $perPage";
$all2 = mysqli_query($conn,$cards);

$all = mysqli_query($conn,"SELECT * FROM event WHERE kategori='Book' LIMIT 27");
$total = mysqli_num_rows($all);

$pages = ceil($total/$perPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link href="css\eventspage-categories.css" rel="stylesheet">
</head>
<body>

<!--HEADER-->
<center>
        <header>
            <nav class="container">
                <div class="navitem">
                    <a href="homepage.php"><img src="icon\logo.png" class="logo"></a>
                </div>
    
                <div class="navitem">
                    <a class="navlinks" href="homepage.php">Home</a>
                    <a style="color: #ffffff;" class="navlinks" href="eventspage.php">Events</a>
                    <a class="navlinks" href="newspage.php">News</a>
                </div>
                <div class="navitem">
                    <div class="right-nav">
                        <input type="search" name="search" class="searchbar" placeholder="Search...">
                    </div>
                    <div class="right-nav">
                        <a href="login.php" type="button" name="login-button" class="nav-button">Login</a>
                    </div>
                </div>
            </nav>
        </header>
</center>

<center>
    <div class="banner">
    <h1>The Best Collection of Exhibitions For You</h1>
        <h4><i>"Being a part of exhibitions is not a burden; it's another way for an independent label such as mine to reach a larger audience by exposing them to my whole body of work."</i></h4>
        <h4><i>- Hussein Chalayan</i></h4>
    </div>

    <div class="main-content">
        <content-section>
                <upper-flex>
                    <div class="subjudul">Books</div>
                </upper-flex>
                <main>
                    <?php
                        while($data = mysqli_fetch_assoc($all2)) {
                    ?>
                     
                     <div class="block-events">
                            <div >
                                <img class="poster" src="poster_event\<?php echo $data['poster']?>">
                            </div>
                            <div class="events-title">
                                <h6><?php echo $data['judul']?></h6>
                            </div>
                            
                            <div class="event-info">
                                <div class="event-tags">
                                    <a class="tag" type="button" name="category"><?php echo $data['kategori']?></a>
                                    <a class="tag" type="button" name="fees"><?php echo $data['status']?></a>
                                </div>
                                <div class="tanggal">
                                    <img src="icon\calendar.png">
                                    <h6><?php echo $data['event_start_date_fix']?> - <?php echo $data['event_end_date_fix']?></h6>
                                </div>
                                <div class="jam">
                                    <img src="icon\time.png">
                                    <h6><?php echo $data['event_start_time_fix']?> - <?php echo $data['event_end_time_fix']?></h6>
                                </div>
                                <div class="lokasi">
                                    <img src="icon\location.png">    
                                    <h6><?php echo $data['city']?>, <?php echo $data['region']?></h6>
                                </div>
                                <div class="detail">    
                                <a href="detail-event.php?id_event=<?php echo $data['id_event'] ?>">
                                    <h6>Detail</h6>
                                    <img src="icon\arrow-right-white.png">
                                </a>  
                                </div>
                            </div>
                        </div>
                    
                    <?php
                    }?>
                
                </main>
        </content-section>
        <div class="container-page">
            <?php
            for ($i = 1; $i <= $pages; $i++) { ?>
            <a class="page" href="?page=<?php echo $i?>"><?php echo $i?></a>
            <?php } ?>
        </div>
    </div>
</center>

<!--FOOTER -->
<footer>
            <center>
            <footer-grid>
                <sosmed>
                    <div>
                        <a href="#"><img src="icon\facebook.png"></a>
                    </div>
                    <div>
                        <a href="#"><img src="icon\instagram.png"></a>
                    </div>
                    <div>
                        <a href="#"><img src="icon\pinterest.png"></a>
                    </div>
                    <div>    
                        <a href="#"><img src="icon\twitter.png"></a>
                    </div>
                </sosmed>
                <about-us>
                    <h4>About Us</h4>
                </about-us>
                <web-info>
                    <info>Telkom University</info>
                    <info>Telp +62 812 345 678</info>
                    <info>Bandung</info>
                    <info>Fax +62 (4) 123 456</info>
                    <info>Jawa Barat, 40257</info>
                    <info>domesticexhibition.com</info>
                </web-info>
                <about-us-info>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </about-us-info>
            </footer-grid>
            </center>
        </footer>
</body>
</html>