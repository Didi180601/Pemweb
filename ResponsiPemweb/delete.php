<?php
include ("src/connection/koneksi.php");

$id = $_GET['nama'];

$query = "DELETE FROM book4 WHERE nama='$id'";
$result = mysqli_query($conn, $query);

if ($result) {
  header('Location: crudhotel.php');
} else {
  echo "Gagal menghapus data";
}
