<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

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
    <title>Responsi PemWeb</title>
    <!-- 👇 css code file 👇 -->
    <link rel="stylesheet" href="./src/style/global.css" />
    <style>
        body {
        background-image: url(../ResponsiPemweb/src/img/1.jpg);
        background-size: cover;
        }
    </style>
</head>

<body>
    <!-- auto responsive navigation bar -->
    <nav id="navbar" class="navibar">
        <a href="dashboard.php"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
            </svg></a>
        <a href="showhotel.php">Tampil Data Hotel</a>
        <a href="showhotel.php">Crud Data Hotel</a>
        <a href="inputrev.php">Input Review</a>
        <a href="logout.php" class="out">Logout</a>
        <a href="javascript:void(0);" class="icon" onclick="showMobileNav()">
            <i class="fa fa-bars"></i>
        </a>
    </nav>

    <!-- 👇 your content here 👇 -->
    <div class="container-db">
        <h1>
            <h2>Hellow</h2><?php echo "<h1>Selamat Datang, " . $_SESSION['username'] . "!" . "</h1>"; ?>
        </h1>
        <!--<button class="btn" onclick="showPopup('starterpack')">Test Function</button>-->
    </div>

    <!-- 👇 javascript code file 👇 -->
    <script src="./src/js/index.js"></script>
</body>

</html>