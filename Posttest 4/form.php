
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Input</title>

    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        text-align: center;
    }
    
    h2 {
        color: #333;
    }

    p {
        font-size: 18px;
        text-align: left;
    }

    span {
        font-weight: bold;
        color: #4e4848;
    }

    .error {
        color: red;
        font-weight: bold;
    }

    .result-box {
        border: 2px solid #4e4848; 
        padding: 20px;
        border-radius: 10px;
        background-color: #fff;
        margin: 20px auto; 
        max-width: 400px; 
    }

    .button3 {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4e4848;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
        text-align: center;
    }

    .button3:hover {
        background-color: #333;
    }
</style>


</head>
<body>
    <?php
    if (empty($_POST["nama_tempat"]) || empty($_POST["jumlah_tiket"])) {
        echo "<p class='error'>Beberapa kolom harus diisi!</p>";
    } else {
        $nama_tempat = $_POST["nama_tempat"];
        $jumlah_tiket = $_POST["jumlah_tiket"];
        $tanggal_kunjungan = $_POST["tanggal_kunjungan"];
        $waktu_kunjungan = $_POST["waktu_kunjungan"];

        echo "<div class='result-box'>";
        echo "<h2>Hasil Inputan:</h2>";
        echo "<p><span class='label'>Nama Tempat Wisata:</span> $nama_tempat</p>";
        echo "<p><span class='label'>Jumlah Tiket:</span> $jumlah_tiket</p>";
        echo "<p><span class='label'>Tanggal Kunjungan:</span> $tanggal_kunjungan</p>";
        echo "<p><span class='label'>Waktu Kunjungan:</span> $waktu_kunjungan</p>";
        echo "<a href='home.html' class='button3'>Kembali ke Halaman Utama</a>";
        echo "</div>";
    }
    ?>
</body>
</html>
