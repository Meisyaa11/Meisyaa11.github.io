<?php 
require 'koneksi.php';

$result = mysqli_query($conn, 'SELECT *FROM tiket');

$tiket = [];

while ($row = mysqli_fetch_assoc($result)){
    $tiket[] = $row;
}

date_default_timezone_set("asia/makassar");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>
    <link rel="stylesheet" href="style.css">
    <style>
        img{
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <nav class="dash-side-bar">
            <ul>
                <a href="home.html">Home</a>
            </ul>
            <img src="foto/libur.png" alt="">
        </nav>
        <main class="dash-container">
            <section class="dash-nav-bar">
                <div class="dash-nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/></svg>
                </div>
                <div class="dash-account">
                    <img src="" alt="">
                    <p><a href="home.html">Logout</a></p>

                </div>
            </section>
            <section class="dash-main">
                <h1>Halo !</h1>
                <hr>
                <div class="date-time">
                <p>
                    Hari: <?php echo date("l"); ?><br>
                    Tanggal: <?php echo date("j F Y"); ?><br>
                    Waktu: <?php echo date("h:i:s:a") ?><br>
                    Zona Waktu: <?php echo date_default_timezone_get(); ?>
                </p>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tempat Wisata</th>
                            <th>Jumlah Tiket</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Waktu Kunjungan</th>
                            <th>Bukti Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach($tiket as $tkt) :?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $tkt["nama_tempat"] ?></td>
                            <td><?php echo $tkt["jumlah_tiket"] ?></td>
                            <td><?php echo $tkt["tanggal_kunjungan"] ?></td>
                            <td><?php echo $tkt["waktu_kunjungan"] ?></td>
                            <td><img src="uploads/<?php echo $tkt["gambar"] ?>" alt=""width="150"></td>
                            <td class="action">
                                <a href="update.php?id_tempat=<?php echo $tkt["id_tempat"] ?>"><button class="edit-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="white"><path d="M200-200h56l345-345-56-56-345 345v56Zm572-403L602-771l56-56q23-23 56.5-23t56.5 23l56 56q23 23 24 55.5T829-660l-57 57Zm-58 59L290-120H120v-170l424-424 170 170Zm-141-29-28-28 56 56-28-28Z"/></svg></button>
                                <a href="delete.php?id_tempat=<?php echo $tkt["id_tempat"] ?>"><button class="delete-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="white"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></button>
                            </td>
                        </tr>
                    <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>