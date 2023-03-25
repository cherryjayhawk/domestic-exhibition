<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign up Pengunjung</title>
        <link href="css\signup-login-style.css" rel="stylesheet">
    </head>
</html>

<body>
    <div class="container">
        <div class="container-left">
            <img src="gambar-signup.jpg">
        </div>
        <div class="container-right">
            <div class="logo">
                <img src="icon\logo.png">
            </div>
            <div class="signup">
                <div class="title">Sign Up</div>
            </div>
            <div class="isian">
                <form action="" method="POST">
                    <input placeholder="Name" name="name" type="text"><br>
                    <br><input placeholder="Email" name="email" type="email"><br>
                    <br><input placeholder="Password" name="password" type="password"><br>
                    <br><input placeholder="Confirm Password" name="confirmpass" type="password"><br>
                    <br><br><br><button name="submit" type="submit">Sign Up</button><br>

                    <?php
                    if(isset($_POST["submit"])){
                        include "koneksi.php";
                    
                        $name = $_POST["name"];
                        $email = $_POST["email"];
                        $pass = $_POST["password"];
                        $confirm_pass = $_POST["confirmpass"];
                    
                        $sql = "INSERT INTO pengunjung VALUE ('".""."','".$name."','".$email."','".md5($pass)."','".""."','".""."','".""."','".""."','".""."','".""."','".""."')";
                    
                        if ($confirm_pass === $pass) {
                            if ($conn->query($sql) === TRUE) {
                                echo "<script>alert('Anda berhasil melakukan registrasi');</script>" ;
                                echo '<script>window.location="login.php"</script>';
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        } else {
                            echo "<script>alert('Password yang Anda masukkan salah. Silahkan coba lagi');</script>";
                        }
                    
                        $conn->close();
                    }
                    ?>
                </form>
            </div>
            <div class="login">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </div>
    </div>
</body>