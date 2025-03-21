<?php
session_start(); // Memulai session untuk memeriksa status login
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Sekolah Paket</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="kategori.php">Kategori</a></li>
                <li><a href="direktori.php">Direktori</a></li>
                <li><a href="pendaftaran.php">Pendaftaran Alumni</a></li>
                <li><a href="ppdb.php">PPDB</a></li>
                <li><a href="galeri.php">Galeri</a></li>
                <li><a href="materi.php">Materi</a></li>
                <li><a href="hubungi.php">Hubungi Kami</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <!-- Jika sudah login, tampilkan Logout -->
                    <li><a href="includes/logout.php">Logout</a></li>
                <?php else: ?>
                    <!-- Jika belum login, tampilkan Login dan Registrasi -->
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Registrasi</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
</body>
</html>
