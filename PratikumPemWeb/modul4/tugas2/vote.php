<!DOCTYPE html>
<html>

<head>
  <title>Pemilu</title>
</head>

<body style="font-family: Arial, sans-serif; font-size: 16px;">
  <?php
  // Ambil data dari form
  $nama = $_POST['nama'];
  $pilihan = $_POST['pilihan'];
  // Koneksi ke database
  $koneksi = mysqli_connect("localhost", "root", "", "pemilu");
  if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
  }

  // Cek apakah pemilih sudah memilih sebelumnya
  $query = "SELECT * FROM pemilih WHERE nama='" . $nama . "'";
  $result = mysqli_query($koneksi, $query);
  if (mysqli_num_rows($result) > 0) {
    echo "<div style='color: red;'>Maaf, Anda sudah memilih sebelumnya</div>";
  } else {
    // Simpan data pemilih ke dalam database
    $query = "INSERT INTO pemilih (nama, pilihan) VALUES ('" . $nama . "', '" . $pilihan . "')";
    if (mysqli_query($koneksi, $query)) {
      echo "<div style='color: green;'>Terima kasih telah memilih</div>";
    } else {
      echo "<div style='color: red;'>Error: " . $query . "<br>" . mysqli_error($koneksi) . "</div>";
    }
  }

  // Query data kandidat
  $query = "SELECT * FROM kandidat";
  $result = mysqli_query($koneksi, $query);

  // Tampilkan hasil suara
  if (mysqli_num_rows($result) > 0) {
    echo "<h2 style='margin-top: 20px;'>Hasil Pemilihan:</h2>";
    while ($row = mysqli_fetch_assoc($result)) {
      $query = "SELECT COUNT(*) as jumlah FROM pemilih WHERE pilihan='" . $row['id'] . "'";
      $count_result = mysqli_query($koneksi, $query);
      $count_row = mysqli_fetch_assoc($count_result);
      echo "<div>" . $row['nama'] . ": " . $count_row['jumlah'] . " suara</div>";
    }
    echo "<br><a href='index.php' style='text-decoration:none; color:blue; text-decoration-line: underline; text-decoration-color: blue;text-decoration-style: wavy;'>Kembali Memilih</a>";
  }

  mysqli_close($koneksi);
  ?>

</body>

</html>