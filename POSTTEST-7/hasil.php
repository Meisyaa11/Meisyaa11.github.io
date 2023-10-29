<?php
require 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        .struk {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px auto;
            max-width: 400px;
        }

        .struk p {
            font-size: 16px;
            margin: 10px 0;
            text-align: left;
        }

        .struk .total {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            text-align: right;
        }

        .struk .total-amount {
            font-size: 24px;
            color: #ffcc00;
            text-align: right;
        }

        a {
            color: black; 
            text-decoration: none; 
            font-weight: bold; 
        }

        a:hover {
            color: #0055aa; 
        }
    </style>
</head>
<body>
<?php
if (isset($_GET['id_tempat'])) {
    $id = $_GET['id_tempat'];
    $hargaPerTiket = 150000; 
    
    $query = "SELECT * FROM tiket WHERE id_tempat = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $jumlahTiket = $row['jumlah_tiket'];
        $totalHargaTiket = $hargaPerTiket * $jumlahTiket;

        echo "<div class='struk'>";
        echo "<h1>Struk Pembelian</h1>";
        echo "<p>Nama Tempat: " . $row['nama_tempat'] . "</p>";
        echo "<p>Jumlah Tiket: " . $row['jumlah_tiket'] . "</p>";
        echo "<p>Tanggal Kunjungan: " . $row['tanggal_kunjungan'] . "</p>";
        echo "<p>Waktu Kunjungan: " . $row['waktu_kunjungan'] . "</p>";
        echo "<p>Harga Per Tiket: Rp" . number_format($hargaPerTiket, 2) . "</p>";
        echo "<p>Total Harga Tiket <span class='total-amount'>Rp" . number_format($totalHargaTiket, 2) . "</span></p>";
        echo "<a href='home.html'>Kembali ke Halaman Utama</a>";
        echo "</div>";
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID Transaksi tidak ditemukan.";
}
?>
</body>
</html>
