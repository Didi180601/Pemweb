<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
include 'src/func/data.php';
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
<style>
    .mx-auto{
        width: 800px;
    }
    .card{
        margin-top: 15px;
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
        <a href="crudhotel.php">Crud Data Hotel</a>
        <a href="inputrev.php" class="active">Input Review</a>
        <a href="logout.php" class="out">Logout</a>
        <a href="javascript:void(0);" class="icon" onclick="showMobileNav()">
            <i class="fa fa-bars"></i>
        </a>
    </nav>

    <!-- 👇 your content here 👇 -->
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("Location: crudhotel.php"); //5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("Location: crudhotel.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="rating" class="col-sm-2 col-form-label">Rating</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="rating" name="rating" value="<?php echo $rating ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ulasan" class="col-sm-2 col-form-label">Ulasan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ulasan" name="ulasan" value="<?php echo $ulasan ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

    <!-- 👇 javascript code file 👇 -->
    <script src="./src/js/index.js"></script>
</body>

</html>