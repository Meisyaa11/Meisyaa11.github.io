<?php
require "koneksi.php";
$id_tempat = $_GET['id_tempat'];


$result = mysqli_query($conn,"DELETE FROM tiket WHERE id_tempat = '$id_tempat'");

if ($result) {
    echo "
    <script>
        alert('Data berhasil Hapus!');
        document.location.href = 'dashboard.php'
    </script>";
} else {
    echo "
    <script>
        alert('Data Gagal Hapus!');
        document.location.href = 'dashboard.php'
    </script>";
}
?>