<?php
require 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama_tempat = $_POST['nama_tempat'];
    $jumlah_tiket = $_POST['jumlah_tiket'];
    $tanggal_kunjungan = $_POST['tanggal_kunjungan'];
    $waktu_kunjungan = $_POST['waktu_kunjungan'];
    $gambar = $_FILES['gambar']['name'];
    $x = explode('.',$gambar);
    $nama_gambar = strtolower(($x[0]));
    $ekstensi = strtolower(end($x));
    $gambar_baru = "$nama_gambar.$ekstensi";
    $tmp = $_FILES['gambar']['tmp_name'];
    $checktipe_ekstensi = array("jpg","png","jpeg","gif","webp","heic");

    if(in_array($ekstensi,$checktipe_ekstensi) === false){
        echo "
        <script>
            alert('Ekstensi bukan tipe gambar');
            document.location.href = 'tambah.php'
        </script>";
    }else{
    if(move_uploaded_file($tmp,'uploads/'.$gambar_baru)){
        $result = mysqli_query($conn, "INSERT INTO tiket (nama_tempat, jumlah_tiket, tanggal_kunjungan, waktu_kunjungan, gambar) VALUES ('$nama_tempat', $jumlah_tiket, '$tanggal_kunjungan', '$waktu_kunjungan', '$gambar_baru')");

        if ($result) {
            $last_insert_id = mysqli_insert_id($conn);
            header("Location: hasil.php?id_tempat=$last_insert_id");
            exit();
        }else {
            echo "
            <script>
                alert('Data Gagal DiTambahkan!');
                document.location.href = 'tambah.php'
            </script>";
        }
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
            <h1>Tambah Data</h1><hr><br>
            <form action="" method="post" enctype="multipart/form-data">
            <label for="nama_tempat">Nama Tempat</label>
            <select name="nama_tempat" class="textfield">
                <option value="Maratua Island">Maratua Island</option>
                <option value="Stone Garden">Stone Garden</option>
                <option value="Candi Borobudur">Candi Borobudur</option>
                <option value="Grafika Cikole">Grafika Cikole</option>
                <option value="Hua Hin">Hua Hin</option>
                <option value="Maldives Island">Maldives Island</option>
                <option value="Danau Cermin">Danau Cermin</option>
                <option value="Lawang Sewu">Lawang Sewu</option>
                <option value="Klenteng Sam Poo">Klenteng Sam Poo</option>
                <option value="Istana Maimun">Istana Maimun</option>
                <option value="Rabbit Town">Rabbit Town</option>
                <option value="MotoMoto">MotoMoto</option>
                <option value="Farmhouse">Farmhouse</option>
                <option value="Museum Angkut">Museum Angkut</option>
                <option value="Kota Mini">Kota Mini</option>
                <option value="Jurang Tembelan">Jurang Tembelan</option>
            </select>
                <label for="jumlah_tiket">Jumlah Tiket</label>
                <input type="number" name="jumlah_tiket" class="textfield">
                <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
                <input type="date" name="tanggal_kunjungan" class="textfield">
                <label for="waktu_kunjungan">Waktu Kunjungan</label>
                <input type="time" name="waktu_kunjungan" class="textfield">
                <label for="profile">Bukti Pembayaran</label>
                <input type="file" name="gambar" class="gambar">
                <input type="submit" name="tambah" value="Tambah Data" class="login-btn">
                <a href="hasil.php"></a>
            </form>
        </div>
    </section>
</body>
</html>