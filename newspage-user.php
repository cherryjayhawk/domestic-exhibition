<?php 
include "koneksi.php";

session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}

$id = $_GET['id'];

$perPage = 9;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$cards = "SELECT * FROM news ORDER BY id_news DESC LIMIT $start, $perPage";
$all2 = mysqli_query($conn,$cards);

$all = mysqli_query($conn,"SELECT * FROM news LIMIT 27");
$total = mysqli_num_rows($all);

$pages = ceil($total/$perPage);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>News</title>
        <link href="css\newspage.css" rel="stylesheet">
    </head>
</html>

<body>

<!-- HEADER -->
<center>
        <header>
            <nav class="container">
                <div class="navitem">
                    <a href="homepage-user.php"><img src="icon\logo.png" class="logo"></a>
                </div>
    
                <div class="navitem">
                    <a class="navlinks" href="homepage-user.php?id=<?php echo $_GET['id'] ?>">Home</a>
                    <a class="navlinks" href="eventspage-user.php?id=<?php echo $_GET['id'] ?>">Events</a>
                    <a style="color: #ffffff;" class="navlinks" href="newspage-user.php?id=<?php echo $_GET['id'] ?>">News</a>
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
    <div class="container-news">
        <div class="banner">
            <h1>Read The Lastest News</h1>
            <h4><i>"Works of art often last forever, or nearly so. But exhibitions themselves, especially gallery exhibitions, are like flowers; they bloom and then they die, then exist only as memories, or pressed in magazines and books."</i></h4>
            <h4><i>- Jerry Saltz</i></h4>
        </div>
        <div class="container-items">
            <div class="news">
                <?php
                $news = mysqli_query($conn, "SELECT * FROM news WHERE status=0 ORDER BY id_news DESC LIMIT 9");
                if (mysqli_num_rows($news) > 0){
                    while($data = mysqli_fetch_array($news)){
                ?>
                <div class="news-items">
                    <div class="news-info">
                        <img class="poster-news" src="poster_news/<?php echo $data['picture'] ?>">
                    </div>
                    <div class="news-info">
                        <p class="all-news-title"><?php echo $data['title'] ?></p>
                    </div>
                    <div class="news-info">
                        <p class="all-news-content"><?php echo substr($data['content'], 0, 100) ?> ...</p>
                    </div>
                    <div class="news-info">
                        <a href="news-detail-user.php?id=<?php echo $id ?>&id_news=<?php echo $data['id_news'] ?>" class="read-more">Read more</a>
                        <img src="icon\arrow-right-orange-small.png" alt="">
                    </div>
                </div>
                <?php }} else {} ?>
            </div>
            <div class="container-page">
                <?php
                    for ($i = 1; $i <= $pages; $i++) { ?>
                    <a class="page" href="?page=<?php echo $i?>"><?php echo $i?></a>
                <?php } ?>
            </div>
        </div>
    </div>
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