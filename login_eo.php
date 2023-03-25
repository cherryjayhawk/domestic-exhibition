<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Pengelola</title>
  <link href="css\signup-login-style.css" rel="stylesheet">
</head>

<body>
    <section class="container">
        <div class="container-left">
            <img src="gambar-signup.jpg">
        </div>
        <div class="container-right">
            <div class="back">
                <a href="homepage.php">< Back</a>
            </div>
            <div class="logo">
                <img src="icon\logo.png">
            </div>
            <div class="signup">
                <div class="title">Login as <br> Event Organizer</div>
            </div>
            <div class="isian">
                <form action="" method="POST">

                    <br><input placeholder="Email" name="email" type="email"><br>
                    <br><input placeholder="Password" name="password" type="password"><br>
                    <div class="forgot-pass">
                        <a href="#popup">Forgot Password?</a>
                    </div>
                    <br><br><br><button name="submit" type="submit">Login</button><br>
                
                    <?php
                    if(isset($_POST['submit'])){
                        session_start();
                        include "koneksi.php";
                    
                        $email = $_POST['email'];
                        $pass = $_POST['password'];
                    
                        $query = mysqli_query($conn, "SELECT * FROM eo WHERE email='".$email."' AND password='".md5($pass)."' AND status=0");
                    
                        if(mysqli_num_rows($query) > 0){
                            $data = mysqli_fetch_object($query);
                            $_SESSION['status_login'] = true;
                            $_SESSION['eo'] = $data;
                            $_SESSION['id_eo'] = $data->id_eo;
                            $id_eo = $_SESSION['id_eo'];
                            // $_SESSION['email'] = $email;
                            // echo "<script>alert('Anda berhasil melakukan registrasi');</script>" ;
                            echo "<script>window.location='eo_profile.php?id_eo=$id_eo'</script>";
                        } else {
                            echo "<script>alert('Login gagal');</script>";
                    }
                }
                ?>
                </form>
            </div>
            <div class="login">
                <p class="have-account">Don’t have an account? <a class="have-account-login" href="signup-eo.php">Sign up</a></p>
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