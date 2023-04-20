<?php
include ("src/connection/koneksi.php");
$nama       = "";
$rating     = "";
$tanggal    = "";
$ulasan     = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'edit') {
    $nama         = $_GET['nama'];
    $sql1       = "SELECT * from book4 where nama = '$nama'";
    $q1         = mysqli_query($conn, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $rating     = $r1['rating'];
    $ulasan   = $r1['ulasan'];

    if ($nama == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $nama       = $_POST['nama'];
    $rating     = $_POST['rating'];
    $tanggal    = $_POST['tanggal'];
    $ulasan   = $_POST['ulasan'];

    if ($nama && $rating && $tanggal && $ulasan) {
        if ($op == 'edit') { //untuk update
            $sql1       = "UPDATE book4 set rating='$rating',ulasan = '$ulasan' where nama = '$nama'";
            $q1         = mysqli_query($conn, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "INSERT into book4(nama,rating,tanggal,ulasan) values ('$nama','$rating','$tanggal','$ulasan')";
            $q1     = mysqli_query($conn, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
