<?php
session_start(); // Memulai session untuk memeriksa status login
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - PKBM NURUL IMAN</title>
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
                <li><a href="profil.php" class="active">Profil</a></li>
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

    <main>
        <?php if (isset($_SESSION['username'])): ?>
            <section class="profil">
                <h2>Profil PKBM NURUL IMAN</h2>
                <div class="profil-content">
                    <div class="profil-img">
                        <img src="gambar/bersama.jpeg" alt="Ketua PKBM" class="ketua-img">
                        <div class="profil-details">
                            <p><strong>Nama:</strong> Dewa Pragusha</p>
                            <p><strong>Jabatan:</strong> Ketua PKBM</p>
                            <p><strong>Alamat:</strong> Jalan Raya Lebak No. 45, Lebak, Banten</p>
                            <p><strong>Email:</strong> dewa@example.com</p>
                        </div>
                    </div>
                    <div class="profil-text">
                        <p>
                            <strong>PKBM NURUL IMAN</strong> adalah Pusat Kegiatan Belajar Masyarakat yang berlokasi di Kabupaten Lebak. 
                            Kami menyediakan program pendidikan kesetaraan seperti Paket A (setara SD), Paket B (setara SMP), dan Paket C (setara SMA) 
                            untuk membantu masyarakat yang ingin melanjutkan pendidikan formal.
                        </p>
                        <p><strong>Visi:</strong> Menjadi pusat pendidikan kesetaraan yang unggul, berkarakter, dan berintegritas.</p>
                        <p><strong>Misi:</strong></p>
                        <ul>
                            <li>Memberikan akses pendidikan yang setara bagi seluruh masyarakat.</li>
                            <li>Menciptakan lingkungan belajar yang kondusif dan mendukung potensi peserta didik.</li>
                            <li>Membangun generasi yang berakhlak mulia dan siap bersaing di era global.</li>
                        </ul>
                        <p>
                            Dengan dukungan tenaga pendidik profesional, PKBM NURUL IMAN terus berkomitmen 
                            untuk mencetak lulusan yang berkualitas dan mampu berkontribusi dalam pembangunan bangsa.
                        </p>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <p>Anda harus login untuk melihat profil ini. <a href="login.php">Login sekarang</a></p>
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
