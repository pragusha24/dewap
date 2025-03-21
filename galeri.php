<?php
session_start(); // Memulai session untuk memeriksa status login
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - PKBM NURUL IMAN</title>
    <link rel="stylesheet" href="gabungan.css?v=1"> <!-- Cache Buster -->
</head>
<body>
    <header>
        <div class="header-container">
            <img src="gambar/logo2.jpeg" alt="Logo Sekolah" class="logo">
            <div class="title">
                <h1>SITUS RESMI</h1>
                <h2>PKBM NURUL IMAN</h2>
            </div>
            <div class="date" id="real-time-clock"></div>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="kategori.php">Kategori</a></li>
                <li><a href="direktori.php">Direktori</a></li>
                <li><a href="pendaftaran.php">Pendaftaran Alumni</a></li>
                <li><a href="ppdb.php">PPDB</a></li>
                <li><a href="galeri.php" class="active">Galeri</a></li>
                <li><a href="materi.php">Materi</a></li>
                <li><a href="hubungi.php">Hubungi Kami</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li><a href="includes/logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Registrasi</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <?php if (isset($_SESSION['username'])): ?>
            <section class="gallery">
                <h2>Galeri Kegiatan PKBM NURUL IMAN</h2>
                <div class="gallery-container">
                    <div class="gallery-item">
                        <img src="gambar/bersama.jpeg" alt="Kegiatan Belajar">
                        <div class="gallery-caption">Kegiatan Belajar Paket C</div>
                    </div>
                    <div class="gallery-item">
                        <img src="gambar/galeri2.jpg" alt="Wisuda">
                        <div class="gallery-caption">Wisuda Lulusan Paket B & C</div>
                    </div>
                    <div class="gallery-item">
                        <img src="gambar/galeri3.jpg" alt="Pelatihan">
                        <div class="gallery-caption">Pelatihan Kewirausahaan</div>
                    </div>
                    <div class="gallery-item">
                        <img src="gambar/galeri4.jpg" alt="Kegiatan Sosial">
                        <div class="gallery-caption">Kegiatan Bakti Sosial</div>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <p>Anda harus login untuk melihat galeri ini. <a href="login.php">Login sekarang</a></p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2025 PKBM NURUL IMAN KABUPATEN LEBAK</p>
    </footer>

    <!-- Script untuk menampilkan waktu -->
    <script>
        function updateClock() {
            const jakartaTime = new Date().toLocaleString("id-ID", { 
                timeZone: "Asia/Jakarta", 
                weekday: "long", 
                year: "numeric", 
                month: "long", 
                day: "numeric", 
                hour: "2-digit", 
                minute: "2-digit", 
                second: "2-digit" 
            });
            document.getElementById("real-time-clock").innerHTML = jakartaTime;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>
</html>
