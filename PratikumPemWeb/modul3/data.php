<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "mod3";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
$id_pegawai     = "";
$nama           = "";
$nip            = "";
$alamat         = "";
$jk             = "";
$id_divisi      = "";
$id_jabatan     = "";
$sukses         = "";
$error          = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id_pegawai = $_GET['id_pegawai'];
    $sql1       = "delete from pegawai where id_pegawai = '$id_pegawai'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    //$id_pegawai    = $_GET['id_pegawai'];
    $sql1           = "select * from pegawai where id_pegawai = '$id_pegawai'";
    $q1             = mysqli_query($koneksi, $sql1);
    $r1             = mysqli_fetch_array($q1);
    $nip            = $r1['nip'];
    $nama           = $r1['nama'];
    $alamat         = $r1['alamat'];
    $jk             = $r1['jk'];
    $id_divisi      = $r1['id_divisi'];
    $id_jabatan     = $r1['id_jabatan'];

    if ($nip == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $id_pegawai         = $_POST['id_pegawai'];
    $nama               = $_POST['nama'];
    $nip                = $_POST['nip'];
    $alamat             = $_POST['alamat'];
    $jk                 = $_POST['jk'];
    $id_divisi        = $_POST['divisi'];
    $id_jabatan       = $_POST['jabatan'];

    if ($nip && $nama && $alamat && $id_divisi && $id_jabatan) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update pegawai set nip = '$nip',nama='$nama',alamat = '$alamat',divisi='$id_divisi', jabatan='$id_jabatan', where id_pegawai = '$id_pegawai'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into pegawai(id_pegawai,nama,nip,alamat,jk,id_divisi,id_jabatan) values ('$id_pegawai','$nama','$nip','$alamat','$jk','$id_divisi','$id_jabatan')";
            $q1     = mysqli_query($koneksi, $sql1);
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
?>