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
    <title>Events</title>
    <link href="css\eventspage.css" rel="stylesheet">
</head>
<body>
<center>
        <header>
            <nav class="container">
                <div class="navitem">
                    <a href="homepage-user.php?id=<?php echo $_GET['id'] ?>"><img src="icon\logo.png" class="logo"></a>
                </div>
    
                <div class="navitem">
                    <a class="navlinks" href="homepage-user.php?id=<?php echo $_GET['id'] ?>">Home</a>
                    <a style="color: #ffffff;" class="navlinks" href="eventspage-user.php?id=<?php echo $_GET['id'] ?>">Events</a>
                    <a class="navlinks" href="newspage-user.php?id=<?php echo $_GET['id'] ?>">News</a>
                </div>
                <div class="navitem">
                    <div class="right-nav">
                        <input type="search" name="search" class="searchbar" placeholder="Search...">
                    </div>
                    <div class="right-nav">
                        <a href="myprofile-user.php?id=<?php echo $_GET['id'] ?>">
                            <img src="icon\profile.png" alt="" class="icon">
                        </a>
                    </div>
                    <div class="right-nav">
                        <a href="signup-eo.php" type="button" name="login-button" class="nav-button">Upload</a>
                    </div>
                </div>
            </nav>
        </header>
</center>

<!-- BODY -->
<center>
    <div class="banner">
        <h1>The Best Collection of Exhibitions For You</h1>
        <h4><i>"Being a part of exhibitions is not a burden; it's another way for an independent label such as mine to reach a larger audience by exposing them to my whole body of work."</i></h4>
        <h4><i>- Hussein Chalayan</i></h4>
    </div>

    <div class="tag-ketegori">
        <a href="#art">
            <div class="tag-atas">
                Art
            </div>
        </a>
        <a href="#tech">
            <div class="tag-atas">
                Technology
            </div>
        </a>
        <a href="#food">
            <div class="tag-atas">
                Food
            </div>
        </a>
        <a href="#auto">
            <div class="tag-atas">
                Automotive
            </div>
        </a>
        <a href="#fashion">
            <div class="tag-atas">
                Fashion
            </div>
        </a>
        <a href="#books">
            <div class="tag-atas">
                Books
            </div>
        </a>
        <a  href="#others">
            <div class="tag-atas">
                Others
            </div>
        </a>
    </div>

    <div class="main-content">
        <section id="art">
        
        <content-section >
                <upper-flex>
                    <div class="subjudul">Art</div>
                    <div><a href="eventspage-user-art.php?id=<?php echo $_GET['id'] ?>" class="subjudul-view">View All ></a></div>
                </upper-flex>
                <content>
                    <?php
                        $query = "SELECT *, DATE_FORMAT(event_start_date, '%d %M %Y') as event_start_date_fix, DATE_FORMAT(event_end_date, '%d %M %Y') as event_end_date_fix, TIME_FORMAT(event_start_time, '%H.%i') as event_start_time_fix, TIME_FORMAT(event_end_time, '%H.%i WIB') as event_end_time_fix from event CROSS JOIN ticket ON event.id_event=ticket.id_event WHERE kategori='Art' ORDER BY event.id_event DESC LIMIT 3";
                        $art = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_array($art)) {
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
                                <a href="detail-event-user.php?id=<?php echo $id ?>&id_event=<?php echo $data['id_event']?>">
                                        <h6>Detail</h6>
                                        <img src="icon\arrow-right-white.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }?>
                </content>
        </content-section>
        </section>
        
        <section id="tech">
        <content-section>
                <upper-flex>
                    <div class="subjudul">Technology</div>
                    <div><a href="eventspage-user-tech.php?id=<?php echo $_GET['id'] ?>" class="subjudul-view">View All ></a></div>
                </upper-flex>
                <content>
                    <?php
                        $query = "SELECT *, DATE_FORMAT(event_start_date, '%d %M %Y') as event_start_date_fix, DATE_FORMAT(event_end_date, '%d %M %Y') as event_end_date_fix, TIME_FORMAT(event_start_time, '%H.%i') as event_start_time_fix, TIME_FORMAT(event_end_time, '%H.%i WIB') as event_end_time_fix from event CROSS JOIN ticket ON event.id_event=ticket.id_event WHERE kategori='Tech' ORDER BY event.id_event DESC LIMIT 3";
                        $tech = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_array($tech)) {
                    ?>
                        <div class="block-events">
                            <img class="poster" src="poster_event\<?php echo $data['poster']?>">
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
                                <a href="detail-event-user.php?id=<?php echo $id ?>&id_event=<?php echo $data['id_event']?>">
                                        <h6>Detail</h6>
                                        <img src="icon\arrow-right-white.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }?>
                </content>
        </content-section>
        </section>

        <section id="food">
        <content-section>
                <upper-flex>
                    <div class="subjudul">Food</div>
                    <div><a href="eventspage-user-food.php?id=<?php echo $_GET['id'] ?>" class="subjudul-view">View All ></a></div>
                </upper-flex>
                <content>
                    <?php
                        $query = "SELECT *, DATE_FORMAT(event_start_date, '%d %M %Y') as event_start_date_fix, DATE_FORMAT(event_end_date, '%d %M %Y') as event_end_date_fix, TIME_FORMAT(event_start_time, '%H.%i') as event_start_time_fix, TIME_FORMAT(event_end_time, '%H.%i WIB') as event_end_time_fix from event CROSS JOIN ticket ON event.id_event=ticket.id_event WHERE kategori='Food' ORDER BY event.id_event DESC LIMIT 3";
                        $other = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_array($other)) {
                    ?>
                        <div class="block-events">
                            <img class="poster" src="poster_event\<?php echo $data['poster']?>">
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
                                <a href="detail-event-user.php?id=<?php echo $id ?>&id_event=<?php echo $data['id_event']?>">
                                        <h6>Detail</h6>
                                        <img src="icon\arrow-right-white.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }?>
                </content>
        </content-section>
        </section>
        <section id="auto">
        <content-section>
                <upper-flex>
                    <div class="subjudul">Automotive</div>
                    <div><a href="eventspage-user-automotive.php?id=<?php echo $_GET['id'] ?>" class="subjudul-view">View All ></a></div>
                </upper-flex>
                <content>
                    <?php
                        $query = "SELECT *, DATE_FORMAT(event_start_date, '%d %M %Y') as event_start_date_fix, DATE_FORMAT(event_end_date, '%d %M %Y') as event_end_date_fix, TIME_FORMAT(event_start_time, '%H.%i') as event_start_time_fix, TIME_FORMAT(event_end_time, '%H.%i WIB') as event_end_time_fix from event CROSS JOIN ticket ON event.id_event=ticket.id_event WHERE kategori='Automotive' ORDER BY event.id_event DESC LIMIT 3";
                        $art = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_array($art)) {
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
                                <a href="detail-event-user.php?id=<?php echo $id ?>&id_event=<?php echo $data['id_event']?>">
                                        <h6>Detail</h6>
                                        <img src="icon\arrow-right-white.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }?>
                </content>
            </content-section>
            </section>
            <section id="fashion">
            <content-section>
                <upper-flex>
                    <div class="subjudul">Fashion</div>
                    <div><a href="eventspage-user-fashion.php?id=<?php echo $_GET['id'] ?>" class="subjudul-view">View All ></a></div>
                </upper-flex>
                <content>
                    <?php
                        $query = "SELECT *, DATE_FORMAT(event_start_date, '%d %M %Y') as event_start_date_fix, DATE_FORMAT(event_end_date, '%d %M %Y') as event_end_date_fix, TIME_FORMAT(event_start_time, '%H.%i') as event_start_time_fix, TIME_FORMAT(event_end_time, '%H.%i WIB') as event_end_time_fix from event CROSS JOIN ticket ON event.id_event=ticket.id_event WHERE kategori='Fashion' ORDER BY event.id_event DESC LIMIT 3";
                        $tech = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_array($tech)) {
                    ?>
                        <div class="block-events">
                            <img class="poster" src="poster_event\<?php echo $data['poster']?>">
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
                                <a href="detail-event-user.php?id=<?php echo $id ?>&id_event=<?php echo $data['id_event']?>">
                                        <h6>Detail</h6>
                                        <img src="icon\arrow-right-white.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }?>
                </content>
            </content-section>
                </section>
                <section id="books">
            <content-section>
                <upper-flex>
                    <div class="subjudul">Books</div>
                    <div><a href="eventspage-user-books.php?id=<?php echo $_GET['id'] ?>" class="subjudul-view">View All ></a></div>
                </upper-flex>
                <content>
                    <?php
                        $query = "SELECT *, DATE_FORMAT(event_start_date, '%d %M %Y') as event_start_date_fix, DATE_FORMAT(event_end_date, '%d %M %Y') as event_end_date_fix, TIME_FORMAT(event_start_time, '%H.%i') as event_start_time_fix, TIME_FORMAT(event_end_time, '%H.%i WIB') as event_end_time_fix from event CROSS JOIN ticket ON event.id_event=ticket.id_event WHERE kategori='Book' ORDER BY event.id_event DESC LIMIT 3";
                        $other = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_array($other)) {
                    ?>
                        <div class="block-events">
                            <img class="poster" src="poster_event\<?php echo $data['poster']?>">
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
                                <a href="detail-event-user.php?id=<?php echo $id ?>&id_event=<?php echo $data['id_event']?>">
                                        <h6>Detail</h6>
                                        <img src="icon\arrow-right-white.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }?>
                </content>
            </content-section>
            </section>
            <section id="others">
            <content-section >
                <upper-flex>
                    <div class="subjudul">Others</div>
                    <div><a href="eventspage-user-others.php?id=<?php echo $_GET['id'] ?>" class="subjudul-view">View All ></a></div>
                </upper-flex>
                <content>
                    <?php
                        $query = "SELECT *, DATE_FORMAT(event_start_date, '%d %M %Y') as event_start_date_fix, DATE_FORMAT(event_end_date, '%d %M %Y') as event_end_date_fix, TIME_FORMAT(event_start_time, '%H.%i') as event_start_time_fix, TIME_FORMAT(event_end_time, '%H.%i WIB') as event_end_time_fix from event CROSS JOIN ticket ON event.id_event=ticket.id_event WHERE kategori='Others' ORDER BY event.id_event DESC LIMIT 3";
                        $art = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_array($art)) {
                    ?>
                     <div class="block-events">
                            <div>
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
                                <a href="detail-event-user.php?id=<?php echo $id ?>&id_event=<?php echo $data['id_event']?>">
                                        <h6>Detail</h6>
                                        <img src="icon\arrow-right-white.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }?>
                </content>
            </content-section>
                </section>
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
                    <info1>Telkom University</info1>
                    <info4>Telp +62 812 345 678</info4>
                    <info2>Bandung</info2>
                    <info5>Fax +62 (4) 123 456</info5>
                    <info3>Jawa Barat, 40257</info3>
                    <info6>domesticexhibition.com</info6>
                </web-info>
                <about-us-info>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </about-us-info>
            </footer-grid>
        </center>
    </footer>
</body>
</html>