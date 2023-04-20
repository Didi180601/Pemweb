<!DOCTYPE html>
<html lang="en">
<?php
include("data.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <header style="margin-top: 10px;">
        <h2 class="mb-3" style="text-align: center;">SURVEY MAHASISWA UNIVERSITAS PALANGKARAYA</h2>
    </header>
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
                    header("<refresh:50></refresh:50>;url=index.php");
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="">- Pilih Jenis Kelamin -</option>
                                <option value="laki-laki" <?php if ($jk == "laki-laki") echo "selected" ?>>Laki-Laki</option>
                                <option value="perempuan" <?php if ($jk == "perempuan") echo "selected" ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="fakultas" id="fakultas">
                                <option value="">- Pilih Fakultas -</option>
                                <option value="Pertanian" <?php if ($fakultas == "Pertanian") echo "selected" ?>>Fakultas Pertanian</option>
                                <option value="Hukum" <?php if ($fakultas == "Hukum") echo "selected" ?>>Fakultas Hukum</option>
                                <option value="Teknik" <?php if ($fakultas == "Teknik") echo "selected" ?>>Fakultas Teknik</option>
                                <option value="Fkip" <?php if ($fakultas == "Fkip") echo "selected" ?>>Fakultas Keguruan dan Ilmu Pendidikan</option>
                                <option value="Kedokteran" <?php if ($fakultas == "kedokteran") echo "selected" ?>>Fakultas Kedokteran</option>
                                <option value="Fisip" <?php if ($fakultas == "Fisip") echo "selected" ?>>Fakultas Ilmu Sosial dan Ilmu Politik</option>
                                <option value="Mipa" <?php if ($fakultas == "Mipa") echo "selected" ?>>Fakultas Matematika dan IPA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                        <a class="btn btn-primary" href="grafik.php">Lihat Chart</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nip</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Fakultas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "SELECT * FROM mahasiswa";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++; ?></th>
                                <td scope="row"><?php echo $r2['nim']; ?></td>
                                <td scope="row"><?php echo $r2['nama']; ?></td>
                                <td scope="row"><?php echo $r2['alamat']; ?></td>
                                <td scope="row"><?php echo $r2['jk']; ?></td>
                                <td scope="row"><?php echo $r2['fakultas']; ?></td>
                                <td></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</body>

</html>