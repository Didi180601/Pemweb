<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
$username   = $_SESSION['username'];
include ("src/connection/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous" />
    <title>Responsi PemWeb</title>
    <!-- 👇 css code file 👇 -->
    <link rel="stylesheet" href="./src/style/global.css" />
</head>

<body>
    <!-- auto responsive navigation bar -->
    <nav id="navbar" class="navibar">
        <a href="dashboard.php"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
            </svg></a>
        <a href="showhotel.php" class="active">Tampil Data Hotel</a>
        <a href="crudhotel.php">Crud Data Hotel</a>
        <a href="inputrev.php">Input Review</a>
        <a href="logout.php" class="out">Logout</a>
        <a href="javascript:void(0);" class="icon" onclick="showMobileNav()">
            <i class="fa fa-bars"></i>
        </a>
    </nav>

    <!-- 👇 your content here 👇 -->
    <div class="container">
        <div class="header">
            <center>
                <h1>
                    Hotel Mulia Senayan, Jakarta
                </h1>
            </center>
            <div class="row">
                <div class="column">
                    <img class="ukuran" src="../ResponsiPemweb/src/img/hotel1.webp" style="width: 100%;">
                    <img class="ukuran" src="../ResponsiPemweb/src/img/hotel6.webp" style="width: 100%;">
                </div>
                <div class="column">
                    <img class="ukuran" src="../ResponsiPemweb/src/img/hotel2.webp" style="width: 100%;">
                    <img class="ukuran" src="../ResponsiPemweb/src/img/hotel3.webp" style="width: 100%;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8" style="margin-right: 50px">
                <h2 class="mt-4">About Us</h2>
                <p style="text-align: justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Voluptas cumque officia animi voluptatibus
                    necessitatibus atque nulla ab,
                    blanditiis quis recusandae assumenda dolor
                    doloremque suscipit obcaecati minus, porro beatae aperiam voluptate.</p>
                <p>
                    <a class="btn btn-danger btn-lg" href="formInsertTamu.php">Join with us &raquo;</a>
                </p>
            </div>
            <div class="col-sm-3">
                <h2 class="mt-4">Contact Us</h2>
                <address>
                    <strong>Sabana Hotel</strong>
                    <br>Jl. Musfofa Pakiskembar
                    <br>
                    Pakis, Kode Pos 5456
                    <br>
                </address>
                <address>
                    <div class="hub">
                        <h3 class="sosmed">Hubungi Kami</h3><br>
                        <a class="sosmed" href="https://facebook.com/" target="_blank"><i class="fab fa-facebook fa-2x" style="color: grey"></i></a>
                        <a class="sosmed" href="https://instagram.com/" target="_blank"><i class="fab fa-instagram fa-2x" style="margin-left: 7%; color: grey"></i></i></a>
                        <a class="sosmed" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter-square fa-2x" style="margin-left: 7%; color: grey"></i></a>
                        <a class="sosmed" href="https://web.whatsapp.com/" target="_blank"><i class="fab fa-whatsapp fa-2x" style="margin-left: 7%; color: grey"></i></a>
                    </div>
                    <!-- <abbr title="Email">Inbox :</abbr><a href="mailto:#">sabanahotel.htl.com</a> -->
                </address>
            </div>
        </div>
        <div>
            <center>
                <h3>Tipe Kamar dan Harga Kamar</h3>
            </center>
        </div>
        <div class="col">
            <div class="row">
                <div class="card">
                    <center>
                        <div class="row">
                            <div class="column">
                                <img class="ukuran" src="../ResponsiPemweb/src/img/deluxe1.webp" style="width: 95%;">
                                <img class="ukuran" src="../ResponsiPemweb/src/img/deluxe3.webp" style="width: 95%;">
                            </div>
                            <div class="column">
                                <img class="ukuran" src="../ResponsiPemweb/src/img/deluxe2.webp" style="width: 95%;">
                                <img class="ukuran" src="../ResponsiPemweb/src/img/deluxe4.webp" style="width: 95%;">
                            </div>
                        </div>
                    </center>
                    <!-- <img src="../ResponsiPemweb/src/img/deluxe1.webp" alt=""> -->
                    <div class="card-body">
                        <h4 class="card-title">Kamar Grand Deluxe Twin atau Ranjang Lain - Pemandangan Kota
                            </h4>
                            <p>IDR 3.075.009/kamar/malam (termasuk pajak)</p>
                        <p class="card-text" style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Laudantium nisi tempore quo debitis unde minus odio provident
                            reprehenderit modi, inventore, corporis praesentium ex delectus odit!
                            Quaerat architecto voluptatibus placeat consequuntur!</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-primary">Booking Sekarang</a>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="card">
                    <center>
                        <div class="row">
                            <div class="column">
                                <img class="ukuran" src="../ResponsiPemweb/src/img/deluxe1.webp" style="width: 95%;">
                                <img class="ukuran" src="../ResponsiPemweb/src/img/deluxe3.webp" style="width: 95%;">
                            </div>
                            <div class="column">
                                <img class="ukuran" src="../ResponsiPemweb/src/img/deluxe2.webp" style="width: 95%;">
                                <img class="ukuran" src="../ResponsiPemweb/src/img/deluxe4.webp" style="width: 95%;">
                            </div>
                        </div>
                    </center>
                    <!-- <img src="../ResponsiPemweb/src/img/deluxe1.webp" alt=""> -->
                    <div class="card-body">
                        <h4 class="card-title">Kamar Superior Twin atau Ranjang Lain - Pemandangan Kota
                            </h4>
                            <p>IDR 3.114.540 /kamar/malam (termasuk pajak)</p>
                        <p class="card-text" style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Laudantium nisi tempore quo debitis unde minus odio provident
                            reprehenderit modi, inventore, corporis praesentium ex delectus odit!
                            Quaerat architecto voluptatibus placeat consequuntur!</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-primary">Booking Sekarang</a>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="card">
                    <center>
                        <div class="row">
                            <div class="column">
                                <img class="ukuran" src="../ResponsiPemweb/src/img/junior2.webp" style="width: 95%;">
                                <img class="ukuran" src="../ResponsiPemweb/src/img/junior1.webp" style="width: 95%;">
                            </div>
                            <div class="column">
                                <img class="ukuran" src="../ResponsiPemweb/src/img/junior3.webp" style="width: 95%;">
                                <img class="ukuran" src="../ResponsiPemweb/src/img/junior4.webp" style="width: 95%;">
                            </div>
                        </div>
                    </center>
                    <!-- <img src="../ResponsiPemweb/src/img/deluxe1.webp" alt=""> -->
                    <div class="card-body">
                        <h4 class="card-title">Suite Junior King - Pemandangan Kota
                            </h4>
                            <p>IDR 5.450.445 /kamar/malam (termasuk pajak)</p>
                        <p class="card-text" style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Laudantium nisi tempore quo debitis unde minus odio provident
                            reprehenderit modi, inventore, corporis praesentium ex delectus odit!
                            Quaerat architecto voluptatibus placeat consequuntur!</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-primary">Booking Sekarang</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <footer class="kaki-1">
        <div class="container">
            <p>Copyright &copy; Scraping data</p>
        </div>
    </footer>
    <!-- 👇 javascript code file 👇 -->
    <script src="./src/js/index.js"></script>
</body>

</html>