<?php
// include database connection file
include_once("koneksi.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id         = $_POST['user_id'];
    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $dop        = $_POST['dop'];
    $region     = $_POST['region'];
    $city       = $_POST['city'];
    $contact    = $_POST['contact'];
    $gender     = $_POST['gender'];
    $address    = $_POST['address'];
        
    // update user data
    $result = mysqli_query($conn, "UPDATE users SET username='$username',email='$email',dop='$dop',region='$region',city='$city',contact='$contact',gender='$gender',address='$address' WHERE user_id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: myprofile.php");
}
?>
<?php
$id = $_GET['id'];
 
// Fetech user data based on id

$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id=$id");

$data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="css\myprofile.css" rel="stylesheet">
</head>
<body>

    <main>
        <aside>
            <div class="sidebar">
                <a href="myprofile.php" type="button" class="side-button-on">My Profile</a>
                <a href="myprofile.php" type="button" class="side-button">Edit Profile</a>
                <a href="myprofile.php" type="button" class="side-button">My Ticket</a>
                <a href="myprofile.php" type="button" class="side-button">Favorite Event</a>
                <a href="myprofile.php" type="button" class="side-button">History</a>
                <a href="myprofile.php" type="button" class="side-button">Log Out</a>
            </div>
        </aside>
        <article>
            <form  name="update_user" method="post" action="edit-profile.php">
            <div class="box-content">

                <div class="box-1">
                        Username <br>
                        <input type="text" name="username" value=<?php echo $data['username']; ?>>
                </div>
                <div class="box-2">
                <div class="box-2-left">
                        <div class="box">
                            <div>
                            Email
                            </div>
                            <div>
                            <input type="email" name="email" value=<?php echo $data['email']; ?>>
                            </div>
                        </div>
                        <div class="box">
                            <div>
                                Date of Birth
                            </div>
                            <div>
                                <input type="date" name="dop" value=<?php echo $data['dop']; ?>>
                            </div>
                        </div>
                        <div class="box">
                            <div>
                                Region
                            </div>
                            <div>
                                <input type="text" name="region" value=<?php echo $data['region']; ?>>
                            </div>
                        </div>
                        <div class="box">
                            <div>
                                City
                            </div>
                            <div>
                                <input type="text" name="city" value=<?php echo $data['city']; ?>>
                            </div>
                        </div>
                    </div>
                    <div class="box-2-right">
                        <div class="box">
                            <div>
                                Phone Number
                            </div>
                            <div>
                                <input type="text" name="contact" value=<?php echo $data['contact']; ?>>
                            </div>
                        </div>
                        <div class="box">
                            <div>
                                Gender
                            </div>
                            <div>
                                <input type="gender" name="gender" value=<?php echo $data['gender']; ?>>
                            </div>
                        </div>
                        <div class="box" style="height: 100%">
                            <div>
                                Address
                            </div>
                            <div>
                                <input type="text" name="address" value=<?php echo $data['address'];?>>
                            </div>
                        </div>
                    </div>
                </div>
           
                    
                <div class="box-3">
                    <div class="box-submit">
                        <input type="hidden" name="user_id" value=<?php echo $_GET['id'];?>>
                        <input class="nav-button" type="submit" name="update" value="Update">
                    </div>
                </div>
            </div>
            </form>

        </article>
    </main>


</body>
</html>