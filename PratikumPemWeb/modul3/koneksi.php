<?php

$server     = "localhost";
$user       = "root";
$password   = "";
$db         = "mod3";

$koneksi = mysqli_connect($server, $user, $password, $db);

if( !$koneksi ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>