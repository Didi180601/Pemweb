<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul2</title>
    <style>
        .form-login {
            width: 400px;
            margin-left: 200px;
        }

        .head {
            margin-left: 200px;
        }
    </style>
</head>

<body>
    <H1 class="head">FORM LOGIN</H1>
    <div class="form-login">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>Username:</label>
            <input type="text" name="username"><br><br>
            <label>Password:</label>
            <input type="password" name="password"><br><br>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
    <?php
    // memproses data setelah form di-submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // mengambil nilai input username dan password
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["password"]);

        // validasi username
        if (strlen($username) > 8) {
            echo "<p class=pass>Username tidak boleh lebih dari delapan karakter.</p>";
        }

        // validasi password
        $uppercase = preg_match('@[A-Z]@', $password);
        //$lowercase = preg_match('@[a-z]@', $password);
        //$number    = preg_match('@[0-9]@', $password);
        if (!$uppercase || strlen($password) > 7) {
            echo "<p>Jumlah karakter password tidak boleh lebih dari 7 karakter.</p>";
        }
    }

    // fungsi untuk membersihkan data input
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
</body>

</html>