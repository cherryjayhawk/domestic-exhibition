<?php 
include "koneksi.php";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="css\homepage.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                    <a style="color: #ffffff;" class="navlinks" href="homepage.php">Home</a>
                    <a class="navlinks" href="eventspage.php">Events</a>
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

<!-- SLIDE SHOW -->

<div class="slider">
      <div class="slide active">
        <img class="img-slide" src="slide\1.png" alt="">
        <div class="info">
          <h2>Avalanche Annual Art Exhibition</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <div class="event-info">
              <div class="event-info-list">
                  <img src="icon\calendar.png">
                  <p>16 Oktober 2022</p>
              </div>
              <div class="event-info-list">
                    <img src="icon\time.png">
                    <p>09.00 - 21.00</p>
              </div>
              <div class="event-info-list">
                    <img src="icon\location.png">    
                    <p>Bandung, Jawa Barat</p>
              </div>
          </div>
        </div>
      </div>
      <div class="slide">
        <img class="img-slide" src="slide\2.png" alt="">
        <div class="info">
          <h2>Mediolan Fashion Show</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <div class="event-info">
              <div class="event-info-list">
                  <img src="icon\calendar.png">
                  <p>16 Oktober 2022</p>
              </div>
              <div class="event-info-list">
                    <img src="icon\time.png">
                    <p>09.00 - 21.00</p>
              </div>
              <div class="event-info-list">
                    <img src="icon\location.png">    
                    <p>Bandung, Jawa Barat</p>
              </div>
          </div>
        </div>
      </div>
      <div class="slide">
        <img class="img-slide" src="slide\3.png" alt="">
        <div class="info">
          <h2>Technology Expo</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <div class="event-info">
              <div class="event-info-list">
                  <img src="icon\calendar.png">
                  <p>16 Oktober 2022</p>
              </div>
              <div class="event-info-list">
                    <img src="icon\time.png">
                    <p>09.00 - 21.00</p>
              </div>
              <div class="event-info-list">
                    <img src="icon\location.png">    
                    <p>Bandung, Jawa Barat</p>
              </div>
          </div>
        </div>
      </div>
      <div class="navigation">
        <i class="fas fa-chevron-left prev-btn"></i>
        <i class="fas fa-chevron-right next-btn"></i>
      </div>
      <div class="navigation-visibility">
        <div class="slide-icon active"></div>
        <div class="slide-icon"></div>
        <div class="slide-icon"></div>
      </div>
    </div>
    <script type="text/javascript">
      const slider = document.querySelector(".slider");
      const nextBtn = document.querySelector(".next-btn");
      const prevBtn = document.querySelector(".prev-btn");
      const slides = document.querySelectorAll(".slide");
      const slideIcons = document.querySelectorAll(".slide-icon");
      const numberOfSlides = slides.length;
      var slideNumber = 0;
  
      //image slider next button
      nextBtn.addEventListener("click", () => {
        slides.forEach((slide) => {
          slide.classList.remove("active");
        });
        slideIcons.forEach((slideIcon) => {
          slideIcon.classList.remove("active");
        });
  
        slideNumber++;
  
        if(slideNumber > (numberOfSlides - 1)){
          slideNumber = 0;
        }
  
        slides[slideNumber].classList.add("active");
        slideIcons[slideNumber].classList.add("active");
      });
  
      //image slider previous button
      prevBtn.addEventListener("click", () => {
        slides.forEach((slide) => {
          slide.classList.remove("active");
        });
        slideIcons.forEach((slideIcon) => {
          slideIcon.classList.remove("active");
        });
  
        slideNumber--;
  
        if(slideNumber < 0){
          slideNumber = numberOfSlides - 1;
        }
  
        slides[slideNumber].classList.add("active");
        slideIcons[slideNumber].classList.add("active");
      });
  
      //image slider autoplay
      var playSlider;
  
      var repeater = () => {
        playSlider = setInterval(function(){
          slides.forEach((slide) => {
            slide.classList.remove("active");
          });
          slideIcons.forEach((slideIcon) => {
            slideIcon.classList.remove("active");
          });
  
          slideNumber++;
  
          if(slideNumber > (numberOfSlides - 1)){
            slideNumber = 0;
          }
  
          slides[slideNumber].classList.add("active");
          slideIcons[slideNumber].classList.add("active");
        }, 8000);
      }
      repeater();
  
      //stop the image slider autoplay on mouseover
      slider.addEventListener("mouseover", () => {
        clearInterval(playSlider);
      });
  
      //start the image slider autoplay again on mouseout
      slider.addEventListener("mouseout", () => {
        repeater();
      });
      </script>

<!--body 1-->
        <center>
            <div class="body1">
                <div class="top-content-events">
                <div class="related-news-event">
                    <div class="garis-related-news">
                        <div class="garis"></div>
                    </div>
                    <div class="text-related-event">
                        <p>Visit The Exhibition</p>
                    </div>
                </div>
                </div>

                <div class="content">
                    
                    <?php
                        $result = mysqli_query($conn, "SELECT * FROM event CROSS JOIN ticket ON event.id_event=ticket.id_event ORDER BY event.id_event DESC LIMIT 4");
                        while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <a href="detail-event.php?id_event=<?php echo $data['id_event'] ?>">
                        <div class="block-events">
                            <div>
                                <img class="poster-events" src="poster_event\<?php echo $data['poster']?>">
                            </div>
                            <div class="events-title">
                                <h6><?php echo $data['judul']?></h6>
                            </div>
                            <div class="tag-section">
                                <a class="tag" type="button" name="category"><?php echo $data['kategori']?></a>
                                <a class="tag" type="button" name="fees"><?php echo $data['status']?></a>
                            </div>
                        </div>
                    </a>
                    <?php
                    }?>  
                    <div class="arrow-nav">
                        <a href="eventspage.php"><img src="icon\arrow-right-orange.png" alt=""></a>
                    </div>
                </div>
            
            </div>
        </center>

<!--body 2-->
        <center>
            <div class="body2">
                <div class="top-content-news">
                <div class="related-news-news">
                    <div class="text-related-news">
                        <p>Read The Lastest News</p>
                    </div>
                    <div class="garis-related-news">
                        <div class="garis"></div>
                    </div>
                </div>
                </div>

                <div class="content">
                    <?php 
                        $result = mysqli_query($conn, "SELECT * FROM news ORDER BY id_news DESC LIMIT 3");
                        while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <a href="news-detail.php?id_news=<?php echo $data['id_news']?>">
                        <div class="block-news">
                            <div>
                              <img src="poster_news\<?php echo $data['picture']?>" class="poster-news">
                            </div>
                            <div class="news-title">
                                <p class="subjudul"><?php echo $data['title']?></p>
                                <p class="news-text"><?php echo substr($data['content'], 0, 100) ?> ...</p>
                            </div>
                            
                        </div>
                        </a>
                    <?php
                    }?>
                    <div class="arrow-nav">
                    <a href="newspage.php"><img src="icon\arrow-right-orange.png" alt=""></a>
                    </div>
                </div>
            </div>
        </center>

<!--body 3-->
        <center>
            <div class="body3">
                <div class="top-content-promote">
                <div class="related-news-event">
                    <div class="garis-related-news">
                        <div class="garis"></div>
                    </div>
                    <div class="text-related-event">
                        <p>Promote Your Event</p>
                    </div>
                </div>
                </div>

                <div class="content">
                    <div class="content-promote"><img src="img-promote.png"></div>
                    <div class="content-promote">
                        <p>Are you part of Event Organizer? Domestic Exhibition will be the right media partner for your event. By register your account as your Event Organizer Company, you can promote your event here and get  as many visitors as possible.</p>
                        <a href="signup.php" type="button" name="discover-button" class="nav-button">Discover more</a>
                    </div>
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
