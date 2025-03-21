<?php
session_start(); // Memulai session untuk memeriksa status login

// Variabel untuk menyimpan status pendaftaran
$notifikasi = "";

$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "sekolah_paket";

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses pendaftaran
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $email = $_POST['email'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $program_pendidikan = $_POST['program_pendidikan'];

    // Menyimpan data ke database (menggunakan prepared statement untuk keamanan)
    $stmt = $conn->prepare("INSERT INTO alumni (nama_lengkap, alamat, jenis_kelamin, tanggal_lahir, email, nomor_telepon, program_pendidikan) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nama_lengkap, $alamat, $jenis_kelamin, $tanggal_lahir, $email, $nomor_telepon, $program_pendidikan);

    if ($stmt->execute()) {
        $notifikasi = "Pendaftaran berhasil!";
    } else {
        $notifikasi = "Terjadi kesalahan: " . $stmt->error;
    }
    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Alumni - PKBM NURUL IMAN</title>
    <link rel="stylesheet" href="gabungan.css">
    <style>
        .notifikasi {
            display: none;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
        .notifikasi.error {
            background-color: #f44336;
        }
    </style>
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
                <li><a href="pendaftaran.php" class="active">Pendaftaran Alumni</a></li>
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
            <section class="ppdb">
                <h2>Pendaftaran Alumni PKBM NURUL IMAN</h2>
                <form action="pendaftaran.php" method="post">
                    <label for="nama_lengkap">Nama Lengkap:</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required><br>

                    <label for="alamat">Alamat:</label>
                    <textarea id="alamat" name="alamat" required></textarea><br>

                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select><br>

                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br>

                    <label for="nomor_telepon">Nomor Telepon:</label>
                    <input type="text" id="nomor_telepon" name="nomor_telepon" required><br>

                    <label for="program_pendidikan">Pilih Program Pendidikan:</label>
                    <select id="program_pendidikan" name="program_pendidikan" required>
                        <option value="Paket A">Paket A</option>
                        <option value="Paket B">Paket B</option>
                        <option value="Paket C">Paket C</option>
                    </select><br>

                    <input type="submit" value="Daftar Sekarang">
                </form>
            </section>
        <?php else: ?>
            <p>Anda harus login untuk mendaftar. <a href="login.php">Login sekarang</a></p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2025 PKBM NURUL IMAN KABUPATEN LEBAK</p>
    </footer>

    <div id="notifikasi" class="notifikasi <?= $notifikasi ? '' : 'error' ?>"><?= $notifikasi ?></div>

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

        // Menampilkan notifikasi jika ada
        document.addEventListener("DOMContentLoaded", function () {
            var notifikasi = document.getElementById("notifikasi");
            if (notifikasi.textContent.trim() !== "") {
                notifikasi.style.display = "block";
                setTimeout(function () {
                    notifikasi.style.display = "none";
                }, 5000);
            }
        });
    </script>
</body>
</html>
