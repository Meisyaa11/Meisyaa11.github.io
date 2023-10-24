<?php
require "koneksi.php";
$id = $_GET['id_tempat'];

$result = mysqli_query($conn, "SELECT * FROM tiket where id_tempat=$id");

$tiket = [];

while ($row = mysqli_fetch_assoc($result)){
    $tiket[] = $row;
}

$tiket = $tiket[0];

if (isset($_POST['edit'])) {
    $nama_tempat = $_POST['nama_tempat'];
    $jumlah_tiket = $_POST['jumlah_tiket'];
    $tanggal_kunjungan = $_POST['tanggal_kunjungan'];
    $waktu_kunjungan = $_POST['waktu_kunjungan'];

    // Cek apakah ada gambar baru yang diunggah
    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        $x = explode('.', $gambar);
        $nama_gambar = strtolower(($x[0]));
        $ekstensi = strtolower(end($x));
        $gambar_baru = "$nama_gambar.$ekstensi";
        $tmp = $_FILES['gambar']['tmp_name'];

        // Upload gambar baru
        if (move_uploaded_file($tmp, 'uploads/' . $gambar_baru)) {
            // Hapus gambar lama jika ada dan update dengan gambar baru
            if (file_exists('uploads/' . $tiket['gambar'])) {
                unlink('uploads/' . $tiket['gambar']);
            }
            $result = mysqli_query($conn, "UPDATE tiket SET nama_tempat = '$nama_tempat', jumlah_tiket = '$jumlah_tiket', tanggal_kunjungan = '$tanggal_kunjungan', waktu_kunjungan = '$waktu_kunjungan', gambar = '$gambar_baru' WHERE id_tempat = '$id'");
        }
    } else {
        // Jika tidak ada gambar baru, perbarui data lainnya tanpa mengganti gambar
        $result = mysqli_query($conn, "UPDATE tiket SET nama_tempat = '$nama_tempat', jumlah_tiket = '$jumlah_tiket', tanggal_kunjungan = '$tanggal_kunjungan', waktu_kunjungan = '$waktu_kunjungan' WHERE id_tempat = '$id'");
    }

    if ($result) {
        echo "
        <script>
            alert('Data berhasil Diubah!');
            document.location.href = 'dashboard.php'
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal Diubah!');
            document.location.href = 'update.php?id_tempat=$id'
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
            <h1>Edit Data</h1><hr><br>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="nama_tempat">Nama Tempat</label>
                <select name="nama_tempat" class="textfield">
                    <option value="Maratua Island" <?php echo ($tiket['nama_tempat'] === 'Maratua Island') ? 'selected' : ''; ?>>Maratua Island</option>
                    <option value="Stone Garden" <?php echo ($tiket['nama_tempat'] === 'Stone Garden') ? 'selected' : ''; ?>>Stone Garden</option>
                    <option value="Candi Borobudur" <?php echo ($tiket['nama_tempat'] === 'Candi Borobudur') ? 'selected' : ''; ?>>Candi Borobudur</option>
                    <option value="Grafika Cikole" <?php echo ($tiket['nama_tempat'] === 'Grafika Cikole') ? 'selected' : ''; ?>>Grafika Cikole</option>
                    <option value="Hua Hin" <?php echo ($tiket['nama_tempat'] === 'Hua Hin') ? 'selected' : ''; ?>>Hua Hin</option>
                    <option value="Maldives Island" <?php echo ($tiket['nama_tempat'] === 'Maldives Island') ? 'selected' : ''; ?>>Maldives Island</option>
                    <option value="Danau Cermin" <?php echo ($tiket['nama_tempat'] === 'Danau Cermin') ? 'selected' : ''; ?>>Danau Cermin</option>
                    <option value="Lawang Sewu" <?php echo ($tiket['nama_tempat'] === 'Lawang Sewu') ? 'selected' : ''; ?>>Lawang Sewu</option>
                    <option value="Klenteng Sam Poo" <?php echo ($tiket['nama_tempat'] === 'Klenteng Sam Poo') ? 'selected' : ''; ?>>Klenteng Sam Poo</option>
                    <option value="Istana Maimun" <?php echo ($tiket['nama_tempat'] === 'Istana Maimun') ? 'selected' : ''; ?>>Istana Maimun</option>
                    <option value="Rabbit Town" <?php echo ($tiket['nama_tempat'] === 'Rabbit Town') ? 'selected' : ''; ?>>Rabbit Town</option>
                    <option value="MotoMoto" <?php echo ($tiket['nama_tempat'] === 'MotoMoto') ? 'selected' : ''; ?>>MotoMoto</option>
                    <option value="Farmhouse" <?php echo ($tiket['nama_tempat'] === 'Farmhouse') ? 'selected' : ''; ?>>Farmhouse</option>
                    <option value="Museum Angkut" <?php echo ($tiket['nama_tempat'] === 'Museum Angkut') ? 'selected' : ''; ?>>Museum Angkut</option>
                    <option value="Kota Mini" <?php echo ($tiket['nama_tempat'] === 'Kota Mini') ? 'selected' : ''; ?>>Kota Mini</option>
                    <option value="Jurang Tembelan" <?php echo ($tiket['nama_tempat'] === 'Jurang Tembelan') ? 'selected' : ''; ?>>Jurang Tembelan</option>
                </select>
                <label for="jumlah_tiket">Jumlah Tiket</label>
                <input type="number" name="jumlah_tiket" value="<?php echo $tiket['jumlah_tiket']; ?>" class="textfield">
                <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
                <input type="date" name="tanggal_kunjungan" value="<?php echo $tiket['tanggal_kunjungan']; ?>" class="textfield">
                <label for="waktu_kunjungan">Waktu Kunjungan</label>
                <input type="time" name="waktu_kunjungan" value="<?php echo $tiket['waktu_kunjungan']; ?>" class="textfield">
                <label for="gambar">Gambar Baru</label>
                <input type="file" name="gambar" class="gambar">
                <input type="submit" name="edit" value="edit" class="login-btn">
                <a href="dashboard.php"></a>
            </form>
        </div>
    </section>
</body>
</html>