<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>List Event</title>
</head>

<body>
  <button>
    <a href="insert_event.php" class="btn btn-primary">Tambah Data</a>
  </button>
  <table border="1">
    <tr>
      <th>id</th>
      <th>Title</th>
      <th>Poster</th>
      <th>Deskripsi</th>
      <th>Category</th>
      <th>Start Event</th>
      <th>End Event</th>
      <th>Region</th>
      <th>City</th>
      <th>Address</th>
    </tr>

    <?php
    include "koneksi.php";
    $show = mysqli_query($conn, "SELECT * FROM event ORDER BY id_event DESC");
    while ($data = mysqli_fetch_array($show)) {
    ?>

    <tr>
      <td> <?= $data['id_event']; ?> </td>
      <td> <?= $data['judul']; ?> </td>
      <td> <?= $data['poster']; ?> </td>
      <td> <?= $data['deskripsi']; ?> </td>
      <td> <?= $data['kategori']; ?> </td>
      <td> <?= $data['event_start_date']; ?> </td>
      <td> <?= $data['event_end_date']; ?> </td>
      <td> <?= $data['region']; ?> </td>
      <td> <?= $data['city']; ?> </td>
      <td> <?= $data['address']; ?> </td>
      <td> <?= $data['fees']; ?> </td>
      <td>
        <a href="edit_event.php?id_event=<?= $data['id_event']; ?>">Edit</a>
        <a href="delete_event.php?id_event=<?= $data['id_event']; ?>">Hapus</a>
      </td>
    </tr>
    <?php } ?>

  </table>


</body>

</html>