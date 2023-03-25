<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert Event</title>
</head>

<body>
  <form action="" method="POST" id="inputevent" enctype="multipart/form-data">
    <table>
      <tr>
        <td>Title :</td>
        <td><input type="text" name="judul"></td>
      </tr>
      <tr>
        <td>Poster :</td>
        <td><input type="file" name="poster" id="poster"></td>
      </tr>
      <tr>
        <td>Deskripsi :</td>
        <td><input type="text" name="deskripsi"></td>
      </tr>
      <tr>
        <td><label for="kategori">Category :</label></td>
        <td><select name="kategori">
          <option value="" disabled selected>Select Category</option>
          <option>Seni</option>
          <option>Teknologi</option>
          <option>Buku</option>
          <option>Makanan</option>
          <option>Lainnya</option>
        </select>
        </td>
      </tr>
      <tr>
        <td>Start Event :</td>
        <td><input type="date" name="event_start_date"></td>
        <td><input type="time" name="event_start_time"></td>
      </tr>
      <tr>
        <td>End Event :</td>
        <td><input type="date" name="event_end_date"></td>
        <td><input type="time" name="event_end_time"></td>
      </tr>
      <tr>
      <td><label for="region">Region :</label></td>
        <td><select name="region">
          <option value="" disabled selected>Select Region</option>
          <option>DKI Jakarta</option>
          <option>Jawa Barat</option>
          <option>Jawa Timur</option>
          <option>Jawa Tengah</option>
        </select>
        </td>
      </tr>
      <tr>
      <td><label for="city">City :</label></td>
        <td><select name="city">
          <option value="" disabled selected>Select City</option>
          <option>Bandung</option>
          <option>Jawa Timur</option>
          <option>Jawa Tengah</option>
        </select>
        </td>
      </tr>
      <tr>
        <td>Address :</td>
        <td><input type="text" name="alamat"></td>
      </tr>
      <tr>
          <td>Fees</td>
          <td>
            <select name="fees">
            <option value="" disabled selected>Select Fees</option>
            <option>Free</option>
            <option>Paid</option>
            </select>
          </td>
        </tr>
        <td></td>
        <td><input type="submit" name="insert" value="Upload"></td>
      </tr>
    </table>
  </form>
  <?php
  $target_dir = "poster_event/";
  $file_name = $_FILES["poster"]["name"];
  $target_file = $target_dir . basename($file_name);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if (isset($_POST['insert'])) {
    include "koneksi.php";

    $judul = $_POST['judul'];
    $poster = $_POST['poster'];
    $desk = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $start_event_date = $_POST['event_start_date'];
    $end_event_date = $_POST['event_end_date'];
    $start_event_time = $_POST['event_start_time'];
    $end_event_time = $_POST['event_end_time'];
    $region = $_POST['region'];
    $city = $_POST['city'];
    $address = $_POST['alamat'];
    $fees = $_POST['fees'];

   
    // upload poster
    $tmpName = $_FILES["poster"]["tmp_name"];
    $check = getimagesize($tmpName);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo "File is not an image."."<br>";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }


    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["poster"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    move_uploaded_file($tmpName, 'poster_event/' . $file_name);

    $sql = "INSERT INTO event VALUES ('" . '' . "','" . $judul . "', '" . $file_name . "', '" . $desk. "', '" . $kategori . "',
     '" . $start_event_date . "', '" . $end_event_date . "', '" . $start_event_time. "', '" . $end_event_time. "',
     '" . $region . "', '" . $city . "', '" . $address . "', '" . $fees. "')";
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    echo "<meta http-equiv='refresh' content='1;url=list_event.php'>";
  }

  ?>
</body>

</html>

<!-- kategori, alamat dipisah, eo, ticket, tenant -->