<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Pengelola Admin</title>
  <link href="signup-login.css" rel="stylesheet">
</head>

<body>
    <section class="container">
        <div class="container-left">
            <img src="gambar-signup.jpg">
        </div>
        <div class="container-right">
            <div class="logo">
                <img src="icon\logo.png">
            </div>
            <div class="signup">
                <div class="title">Login Admin</div>
            </div>
            <div class="isian">
                <form action="" method="POST">

                    <br><input placeholder="Email" name="email" type="email"><br>
                    <br><input placeholder="Password" name="password" type="password"><br>
                    <div class="forgot-pass">
                        <a href="#popup">Forgot Password?</a>
                    </div>
                    <br><br><br><button name="submit" type="submit">Login</button><br>
                    <p style="color: #ffffff;">Don't have an account?<a href="kelola-signup.php" style="text-decoration: none; color: #BD622A;"> Sign Up</a></p>
                
                    <?php
                    if(isset($_POST['submit'])){
                        session_start();
                        include "koneksi.php";
    
                        $email = $_POST['email'];
                        $pass = $_POST['password'];

                        $query = mysqli_query($conn, "SELECT * FROM pengelola WHERE email='".$email."' AND password='".md5($pass)."'");

                        // jika data/jumlah baris yg dicari query ada di tabel
                        if(mysqli_num_rows($query) > 0){
                            // data/baris data diambil 
                            $data = mysqli_fetch_object($query);
                            // statusnya true berarti sudah login
                            $_SESSION['status_login'] = true;
                            // menyimpan data yg diambil ke session
                            $_SESSION['pengelola'] = $data;
                            // menyimpan data id ke session
                            $_SESSION['id'] = $data->id_pengelola;

                            echo '<script>window.location="kelola-home.php"</script>';
                        } else {
                            echo "<script>alert('Login gagal');</script>";
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </section> 

    <div class="popup" id="popup">
        <div class="popup-content">
            <div class="close"><a href="#" class="popup-close">&times;</a></div>
            <div class="signup">
                <div class="title">Forgot Password</div>
            </div>
            <div class="massage">
                <p>We will send you an email for reseting the password.</p>
                <p>Please enter your email.</p>
            </div>
            <div class="isian">
                <form>
                    <br><input placeholder="Email" name="forgotpass" type="text"><br>
                    <br><br><button type="submit">Send</button><br>
                <form>
            </div>
        </div>
    </div>
</body>