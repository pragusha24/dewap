<?php
session_start(); // Memulai session untuk memeriksa status login

// Ambil notifikasi login jika ada, lalu hapus dari session agar tidak muncul terus-menerus
$login_message = isset($_SESSION['login_message']) ? $_SESSION['login_message'] : "";
unset($_SESSION['login_message']); // Hapus setelah ditampilkan
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKBM NURUL IMAN</title>
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

    <!-- Notifikasi Login -->
    <?php if (!empty($login_message)) : ?>
        <div class="alert success">
            <p><?php echo htmlspecialchars($login_message); ?></p>
        </div>
    <?php endif; ?>

    <main>
        <div class="main-image">
            <img src="gambar/bersama2.jpeg" alt="Foto Bersama">
        </div>
    </main>

    <section class="announcement">
        <div class="announcement-text">
            <p>Penerimaan Pendaftaran Siswa Baru di PKBM NURUL IMAN Tahun Ajaran 2025/2026 Telah Dibuka!</p>
            <p>Program Kesetaraan Paket A setara SD, Paket B setara SMP, Paket C setara SMA</p>
        </div>
    </section>

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
