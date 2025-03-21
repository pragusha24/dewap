<?php
session_start();
$directory = "materi/"; // Folder tempat menyimpan file materi
$files = array_diff(scandir($directory), array('..', '.'));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi - PKBM NURUL IMAN</title>
    <link rel="stylesheet" href="gabungan.css?v=2">
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
                <li><a href="materi.php" class="active">Materi</a></li>
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
        <section class="materi-container">
            <h2>Materi Pembelajaran</h2>
            <p>Silakan pilih materi di bawah ini untuk melihat atau mengunduhnya:</p>
           
            <ul class="materi-list">
                <?php if (!empty($files)): ?>
                    <?php foreach ($files as $file): ?>
                        <li>
                            <a href="<?php echo $directory . $file; ?>" target="_blank">📄 <?php echo $file; ?></a>
                            <a href="<?php echo $directory . $file; ?>" download class="download-btn">⬇ Download</a>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li class="no-materi">Belum ada materi yang tersedia.</li>
                <?php endif; ?>
            </ul>
        </section>
        <?php else: ?>
            <p>Anda harus login untuk melihat materi ini. <a href="login.php">Login sekarang</a></p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2025 PKBM NURUL IMAN KABUPATEN LEBAK</p>
    </footer>

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
