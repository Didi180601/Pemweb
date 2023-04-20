<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul1</title>
</head>
<header>

</header>

<body>
    <?php
    //deklarasi array
    $keluarga = array("Budi", "Nur", "Cahya", "Yadi");

    //membuat fungsi meghitung jumlah huruf dan kata serta pembalik nama
    function hitung_kata($string)
    {
        return str_word_count($string);
    }
    function hitung_huruf($string)
    {
        return strlen($string);
    }
    function membalik_nama($string)
    {
        return strrev($string);
    }
    //membuat fungsi untuk  menghitung huruf konsonan dan vokal
    function konsonan($string)
    {
        $konsonan = 0;
        $Hkonsonan = "bcdfghjklmnpqrstvwxyz";
        $string = strtolower($string);
        for ($i = 0; $i < strlen($string); $i++) {
            if (strpos($Hkonsonan, $string[$i]) !== false) {
                $konsonan++;
            }
        }
        return $konsonan;
    }
    function vokal($string)
    {
        $vokal = 0;
        $Hvokal = "aiueo";
        $string = strtolower($string);
        for ($i = 0; $i < strlen($string); $i++) {
            if (strpos($Hvokal, $string[$i]) !== false) {
                $vokal++;
            }
        }
        return $vokal;
    }
    //Output Program
    foreach ($keluarga as $nama) {
        echo "<div style='border: 2px solid black; padding: 10px; margin-bottom: 10px;'>";
        echo "<h3>Nama: $nama</h3>";
        echo "<div style='border: 2px solid black; padding: 10px; margin-bottom: 10px;'>";
        echo "Jumlah kata: " . hitung_kata($nama) . "";
        echo "</div>";
        echo "<div style='border: 2px solid black; padding: 10px; margin-bottom: 10px;'>";
        echo "Jumlah huruf: " . hitung_huruf($nama) . "";
        echo "</div>";
        echo "<div style='border: 2px solid black; padding: 10px; margin-bottom: 10px;'>";
        echo "Nama terbalik: " . membalik_nama($nama) . "";
        echo "</div>";
        echo "<div style='border: 2px solid black; padding: 10px; margin-bottom: 10px;'>";
        echo "Jumlah konsonan: " . konsonan($nama) . "";
        echo "</div>";
        echo "<div style='border: 2px solid black; padding: 10px; margin-bottom: 10px;'>";
        echo "Jumlah vokal: " . vokal($nama) . "";
        echo "</div>";
        echo "</div>";
    }


    ?>
</body>

</html>