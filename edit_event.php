<?php
include "koneksi.php";
$ambildata = mysqli_query($conn, "SELECT * FROM event WHERE id_event='$_GET[id_event]'");
$data = mysqli_fetch_array($ambildata);

$id_eo = $_GET['id_eo'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Co mpatible" content="ie=edge">
  <title>Edit Event</title>
  <link href="upload_event.css" rel="stylesheet">
</head>

<body>
<div class="container rounded bg-white mt-5">
  <form action="" method="POST" id="inputevent">
    <table>
    <tr>
        <td>Title</td>
        <td>:<input type="text" name="judul" value="<?= $data['judul'] ?>"></td>
      </tr>
      <tr>
        <td>Poster</td>
        <td><img src="poster_event\<?php echo $data['poster']; ?>" alt="" width="100px"></td>
        <td><input name="poster" type="hidden" value="<?= $data['poster'] ?>"><br></td>
        <!-- <td><input name="poster" type="file" size="40" value="<?= $data['poster'] ?>"></td> -->
      </tr>
      <tr>
        <td>Deskripsi</td>
        <td>:<input type="text" name="deskripsi" value="<?= $data['deskripsi'] ?>"></td>
      </tr>
      <tr>
        <td><label for="kategori">Category</label></td>
        <td>:<select name="kategori">
          <option value="" disabled selected>Select Category</option>
          <option <?php if($data['kategori']=="Art") echo "selected";  ?>>Art</option>
          <option <?php if($data['kategori']=="Tech") echo "selected";  ?>>Tech</option>
          <option <?php if($data['kategori']=="Book") echo "selected";  ?>>Book</option>
          <option <?php if($data['kategori']=="Food") echo "selected";  ?>>Food</option>
          <option <?php if($data['kategori']=="Fashion") echo "selected";  ?>>Fashion</option>
          <option <?php if($data['kategori']=="Automotive") echo "selected";  ?>>Automotive</option>
          <option <?php if($data['kategori']=="Others") echo "selected";  ?>>Others</option>
        </select>
        </td>
      </tr>
      <tr>
        <td>Start Event</td>
        <td>:<input type="date" name="event_dstart" value="<?= $data['event_start_date'] ?>"></td>
        <td><input type="time" name="event_tstart" value="<?= $data['event_start_time'] ?>"></td>
      </tr>
      <tr>
        <td>End Event</td>
        <td>:<input type="date" name="event_dend" value="<?= $data['event_end_date'] ?>"></td>
        <td><input type="time" name="event_tend" value="<?= $data['event_end_time'] ?>"></td>
      </tr>
      <tr>
        <td>Region</td>
        <td><input type="text" name="region" value="<?= $data['region'] ?>"></td>
      </tr>
      <tr>
        <td>City</td>
        <td><input type="text" name="city" value="<?= $data['city'] ?>"></td>
      </tr>
      <tr>
        <td>Address</td>
        <td>:<input type="text" name="address" value="<?= $data['address'] ?>"></td>
      <tr>
        <td></td>
        <td><input type="submit" name="edit" value="edit"></td>
      </tr>
    </table>
  </form>
</div>
  <?php
  if (isset($_POST['edit'])) {
    include "koneksi.php";

    // $id_event = $_POST['id_event'];
    $judul = $_POST['judul'];
    $desk = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $event_dstart = $_POST['event_dstart'];
    $event_tstart = $_POST['event_tstart'];
    $event_dend = $_POST['event_dend'];
    $event_tend = $_POST['event_tend'];
    $region = $_POST['region'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    mysqli_query($conn, "UPDATE event SET judul='$judul', deskripsi='$desk', kategori='$kategori', event_start_date='$event_dstart', event_start_time='$event_tstart', event_end_date='$event_dend', event_end_time='$event_tend', 
    region='$region', city='$city', address='$address' WHERE id_event='$_GET[id_event]'") or die(mysqli_error($conn));

    echo "<h5> Silahkan Tunggu, Data Sedang Diupdate.... </h5>";
    echo "<meta http-equiv='refresh' content='1;url=eo_event.php?id_eo=$id_eo'>";
  }
  ?>
</body>

</html>