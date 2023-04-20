<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
$username   = $_SESSION['username'];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a href="showhotel.php">Tampil Data Hotel</a>
        <a href="crudhotel.php" class="active">Crud Data Hotel</a>
        <a href="inputrev.php">Input Review</a>
        <a href="logout.php" class="out">Logout</a>
        <a href="javascript:void(0);" class="icon" onclick="showMobileNav()">
            <i class="fa fa-bars"></i>
        </a>
    </nav>

    <!-- 👇 your content here 👇 -->
    <?php
    include ("src/connection/koneksi.php");
    $query = mysqli_query($conn, "SELECT * FROM book4");

    // Konfigurasi pagination
    $halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
    $jumlah_data_per_halaman = 10;
    $jumlah_data = mysqli_num_rows($query);
    $jumlah_halaman = ceil($jumlah_data / $jumlah_data_per_halaman);
    $awal_data = ($halaman - 1) * $jumlah_data_per_halaman;

    // Query untuk mengambil data dengan pagination
    $query_paginate = mysqli_query($conn, "SELECT * FROM book4 LIMIT $awal_data, $jumlah_data_per_halaman");
    ?>
    <div class="mx-auto">
        <div class="card">
            <div class="header">
                <h3>
                    Crud Untuk Edit dan Hapus data Ulasan dari hotel
                </h3>
            </div>
            <table class="table">
                <thead class="kepala-tbl">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Ulasan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = $awal_data + 1;
                    while ($data = mysqli_fetch_array($query_paginate)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td scope="row"><?php echo $data['nama']; ?></td>
                            <td scope="row"><?php echo $data['rating']; ?></td>
                            <td scope="row"><?php echo $data['tanggal']; ?></td>
                            <td scope="row"><?php echo $data['ulasan']; ?></td>
                            <td scope="row">
                                <a href="inputrev.php?op=edit&nama=<?php echo $data['nama']; ?>"><button type="button" class="btn btn-warning">Edit</button></a><th>
                                <a href="delete.php?op=delete&nama=<?php echo $data['nama'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
            <ul class='pagination'>
            <?php
            if ($halaman > 1) {
                // <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                echo "<li class='page-item'><a class='page-link' href='?halaman=" . ($halaman - 1) . "'>Prev</a></li>";
            }
            for ($h = 1; $h <= $jumlah_halaman; $h++) {
                echo "<li class='page-item'><a class='page-link' href='?halaman=$h'>$h</a></li>";
                // echo "<li class='page-item'><a class='page-link' href='?halaman=$h'>Terakhir</a></li>";
            }
            if ($halaman < $jumlah_halaman) {
                echo "<li class= 'page-item'><a class='page-link' href='?halaman=" . ($halaman + 1) . "'>Next</a></li>";
                //<li class="page-item"><a class="page-link" href="#">Next</a></li>
            }
            ?>
            </ul>
            <!-- <button class="btn" onclick="showPopup('starterpack')">Test Function</button> -->
        </div>
    </div>

    <!-- 👇 javascript code file 👇 -->
    <script src="./src/js/index.js"></script>
</body>

</html>