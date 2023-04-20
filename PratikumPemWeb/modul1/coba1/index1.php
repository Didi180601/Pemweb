<?php
session_start();

if (isset($_POST['submit'])) {
  // Simpan nama-nama keluarga dalam array session
  $_SESSION['family'] = explode(",", $_POST['names']);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Program Web untuk Mengolah Nama Keluarga</title>
</head>
<body>
  <h1>Program Web untuk Mengolah Nama Keluarga</h1>
  <form method="post">
    <label>Masukkan nama anggota keluarga (pisahkan dengan koma):</label>
    <input type="text" name="names" required>
    <button type="submit" name="submit">Submit</button>
  </form>

  <?php if (isset($_SESSION['family'])) : ?>
    <?php $family = $_SESSION['family']; ?>
    <h2>Daftar Anggota Keluarga:</h2>
    <ul>
      <?php foreach ($family as $name) : ?>
        <li><?= $name ?></li>
      <?php endforeach; ?>
    </ul>

    <?php $name = implode("", $family); ?>
    <h2>Hasil Pengolahan Nama:</h2>
    <ul>
      <li>Jumlah kata: <?= str_word_count($name) ?></li>
      <li>Jumlah huruf: <?= strlen($name) ?></li>
      <li>Kebalikan nama: <?= strrev($name) ?></li>
      <li>Jumlah konsonan: <?= preg_match_all('/[bcdfghjklmnpqrstvwxyz]/i', $name) ?></li>
      <li>Jumlah vokal: <?= preg_match_all('/[aeiou]/i', $name) ?></li>
    </ul>
  <?php endif; ?>
</body>
</html>
