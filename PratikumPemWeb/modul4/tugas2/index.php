<!DOCTYPE html>
<html>

<head>
  <title>Pemilu</title>
</head>

<body>
  <h1>Pemilihan Umum</h1>
  <form method="post" action="vote.php">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" required><br><br>
    <label for="pilihan">Pilih Kandidat:</label>
    <select name="pilihan" required>
      <option value="">Pilih</option>
      <?php
      // Koneksi ke database
      $koneksi = mysqli_connect("localhost", "root", "", "pemilu");
      if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
      }

      // Query data kandidat
      $query = "SELECT * FROM kandidat";
      $result = mysqli_query($koneksi, $query);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option value="' . $row['id'] . '">' . $row['nama'] . '</option>';
        }
      }

      mysqli_close($koneksi);
      ?>
    </select><br><br>
    <input type="submit" value="Vote">
  </form>
</body>

</html>