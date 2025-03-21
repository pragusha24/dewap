<?php
session_start(); // Memulai session untuk memeriksa status login
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - PKBM NURUL IMAN</title>
    <link rel="stylesheet" href="gabungan.css">
</head>
<body>
    <header>
        <div class="header-container">
            <img src="gambar/logo2.jpeg" alt="Logo Sekolah" class="logo">
            <div class="title">
                <h1>SITUS RESMI</h1>
                <h2>PKBM NURUL IMAN</h2>
            </div>
            <div class="date" id="real-time-clock">
                <!-- Waktu akan ditampilkan di sini -->
            </div>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="kategori.php" class="active">Kategori</a></li>
                <li><a href="direktori.php">Direktori</a></li>
                <li><a href="pendaftaran.php">Pendaftaran Alumni</a></li>
                <li><a href="ppdb.php">PPDB</a></li>
                <li><a href="galeri.php">Galeri</a></li>
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
            <section class="kategori">
                <h2>Berita/ Aktivitas PKBM NURUL IMAN</h2>
                <div class="kategori-content">
                    <div class="kategori-item">
                        <h3>Aktivitas 1: Pelatihan Pendidikan Kesetaraan</h3>
                        <p>PKBM Nurul Iman mengadakan pelatihan untuk meningkatkan kualitas pendidikan kesetaraan dengan melibatkan berbagai tenaga pengajar dan peserta didik. Pelatihan ini bertujuan untuk mempersiapkan peserta didik agar siap menghadapi ujian kesetaraan Paket A, B, dan C.</p>
                        <a href="#">Baca Selengkapnya</a>
                    </div>
                    <div class="kategori-item">
                        <h3>Aktivitas 2: Kegiatan Sosial PKBM Nurul Iman</h3>
                        <p>PKBM Nurul Iman juga melaksanakan kegiatan sosial dengan tujuan untuk meningkatkan kesadaran masyarakat akan pentingnya pendidikan. Kegiatan ini melibatkan seluruh warga sekitar dan dilakukan di berbagai tempat.</p>
                        <a href="#">Baca Selengkapnya</a>
                    </div>
                    <div class="kategori-item">
                        <h3>Aktivitas 3: Penyerahan Beasiswa Pendidikan</h3>
                        <p>PKBM Nurul Iman memberikan beasiswa kepada peserta didik berprestasi di bidang pendidikan. Beasiswa ini bertujuan untuk mendukung pendidikan mereka agar bisa melanjutkan ke jenjang yang lebih tinggi.</p>
                        <a href="#">Baca Selengkapnya</a>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <p>Anda harus login untuk melihat kategori ini. <a href="login.php">Login sekarang</a></p>
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
