<?php
include "koneksi.php";
session_start();

// status_login nya ga true, gabisa akses halaman 
if($_SESSION['status_login'] != true){
    echo '<script>window.location="kelola-login.php"</script>';
}

$news = mysqli_query($conn, "SELECT * FROM news WHERE id_news='$_GET[id_news]'");
// data/baris data diambil 
$data = mysqli_fetch_object($news);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="kelola.css" rel="stylesheet">
  <title>Edit News</title>
</head>

<body>
    <header>
        <nav class="container-h">
            <div class="naviitem">
                <div class="logo-nav">
                    <a href="kelola-home.php"><img src="icon\logo.png" class="logo"></a>
                </div>
            </div>
            <div class="naviitem">
                <div id="menu">
                    <ul>
                        <li><a href="">Manage Users</a>
                            <ul>
                                <li><a href="kelola-visitors-list.php">Visitors</a></li>
                                <li><a href="kelola-eo-list.php">Exhibition Organizer</a></li>
                            </ul>
                        </li>
                        <li><a href="">Manage Events</a>
                            <ul>
                                <li><a href="kelola-events-list.php">Events</a></li>
                                <!-- <li><a href="kelola-eventcat-list.php">Event Categories</a></li> -->
                            </ul>
                        </li>
                        <li><a href="">Manage News</a>
                            <ul>
                                <li><a href="kelola-news-list.php">News</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="menu">
                    <ul>
                        <li>
                            <a href="#">
                                <svg width="30" height="30" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="48" height="48" rx="24" fill="#BD622A"/>
                                    <path d="M33.5997 34.8001V32.4001C33.5997 31.1271 33.0939 29.9062 32.1938 29.006C31.2936 28.1058 30.0727 27.6001 28.7997 27.6001H19.1997C17.9266 27.6001 16.7057 28.1058 15.8055 29.006C14.9054 29.9062 14.3997 31.1271 14.3997 32.4001V34.8001" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M23.9997 22.8001C26.6507 22.8001 28.7997 20.6511 28.7997 18.0001C28.7997 15.3491 26.6507 13.2001 23.9997 13.2001C21.3487 13.2001 19.1997 15.3491 19.1997 18.0001C19.1997 20.6511 21.3487 22.8001 23.9997 22.8001Z" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                            <ul>
                                <li><a href="kelola-logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="content">
        <div class="content-items">
            <div class="title">
                <div class="title-text">
                    <p>News</p>
                </div>
                <div class="garis-title">
                    <div class="garis"></div>
                </div>
            </div>
        </div>

        <div class="content-items">
            <div class="add-news">
                <div class="add-news-items">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="add-news-input">
                            <label>Tanggal Publikasi</label>
                        </div>
                        <div class="add-news-input">
                            <input name="tgl_publikasi" type="datetime-local" size="40" value="<?= $data->tgl_publikasi ?>">
                        </div>
                        <div class="add-news-input">
                            <label>Penulis</label>
                        </div>
                        <div class="add-news-input">
                            <input name="penulis" type="text" size="40" value="<?= $data->penulis ?>"><br>
                        </div>
                        <div class="add-news-input">
                            <label>Title</label>
                        </div>
                        <div class="add-news-input">
                            <input name="title" type="text" size="40" value="<?= $data->title ?>">
                        </div>
                        <div class="add-news-input">
                            <label>Picture</label>
                        </div>
                        <div class="add-news-input">
                            <img src="news/<?= $data->picture ?>" width="100px">
                            <input name="foto" type="hidden" value="<?= $data->picture ?>"><br>
                            <input name="picture" type="file" size="40" value="<?= $data->picture ?>">
                        </div>
                    </div>
                    <div class="add-news-items">
                        <div class="add-news-input">
                            <label>Content</label>
                        </div>
                        <div class="add-news-input">
                            <textarea rows="10" cols="40" name="content"><?= $data->content ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="add-news">
                    <input class="save" name="save" type="submit" value="Save">
                </div>

                </form>
            </div>            
            <?php
                if (isset($_POST['save'])) {
                  include "koneksi.php";
        
                  //inputan form
                  $tglpub = $_POST["tgl_publikasi"];
                  $penulis = $_POST["penulis"];
                  $title = $_POST["title"];
                  $content = $_POST["content"];
                  $status = $_POST["status"];
                  $foto = $_POST["foto"];
        
                  //input file
                  $picture = $_FILES["picture"]["name"];
                  $tmp_name = $_FILES["picture"]["tmp_name"];
        
                  if ($picture != ''){
                    //tipe file
                    $type1 = explode('.', $picture);
                    $type2 = $type1[1];
        
                    $newname = 'news'.time().'.'.$type2;
        
                    //tipe file upload
                    $type_file = array ('jpg', 'jpeg', 'png');
        
                    if(!in_array($type2, $type_file)){
                      echo "<script>alert('Tipe file tidak diizinkan');</script>";
                    } else {
                      unlink('./news/'.$foto);
                      move_uploaded_file($tmp_name, './news/'.$newname);
                      $newpict = $newname;
                    }
                  } else {
                    $newpict = $foto;
                  }
                  
                  $update = mysqli_query($conn, "UPDATE news SET tgl_publikasi='$tglpub', penulis='$penulis', title='$title', picture='$newpict', content='$content' WHERE id_news='$_GET[id_news]'") or die(mysqli_error($conn));
                  
                  if ($update){
                    echo "<script>alert('Data berhasil diupdate');</script>";
                    echo "<meta http-equiv='refresh' content='1;url=kelola-news-list.php'>";
                  }
                }
                ?>
        </div>
    </section>
  </body>
</html>