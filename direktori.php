<?php
session_start();
include "includes/config.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direktori - PKBM NURUL IMAN</title>
    <link rel="stylesheet" href="gabungan.css?v=1">
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
                <li><a href="direktori.php" class="active">Direktori</a></li>
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
        <section class="directory-container">
            <h2>Direktori PKBM NURUL IMAN</h2>

            <div class="tabs">
                <button class="tab-btn active" onclick="showTab('peserta')">Peserta</button>
                <button class="tab-btn" onclick="showTab('alumni')">Alumni</button>
            </div>

            <!-- Data Peserta -->
            <div class="tab-content active" id="peserta">
                <h3>Daftar Peserta</h3>
                <table class="directory-table">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Program Pendidikan</th>
                    </tr>
                    <?php
                    $query = "SELECT * FROM ppdb ORDER BY nama_lengkap ASC";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['nama_lengkap']}</td>
                                <td>{$row['alamat']}</td>
                                <td>{$row['jenis_kelamin']}</td>
                                <td>{$row['tanggal_lahir']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['nomor_telepon']}</td>
                                <td>{$row['program_pendidikan']}</td>
                            </tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='8'>Data tidak ditemukan atau query error: " . mysqli_error($conn) . "</td></tr>";
                    }
                    ?>
                </table>
            </div>

            <!-- Data Alumni -->
            <div class="tab-content" id="alumni">
                <h3>Daftar Alumni</h3>
                <table class="directory-table">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Program Pendidikan</th>
                    </tr>
                    <?php
                    $query = "SELECT * FROM alumni ORDER BY nama_lengkap ASC";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['nama_lengkap']}</td>
                                <td>{$row['alamat']}</td>
                                <td>{$row['jenis_kelamin']}</td>
                                <td>{$row['tanggal_lahir']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['nomor_telepon']}</td>
                                <td>{$row['program_pendidikan']}</td>
                            </tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='8'>Data tidak ditemukan atau query error: " . mysqli_error($conn) . "</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </section>
        <?php else: ?>
            <p>Anda harus login untuk melihat direktori ini. <a href="login.php">Login sekarang</a></p>
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

    <script>
        function showTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            document.querySelector(`#${tabName}`).classList.add('active');

            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.currentTarget.classList.add('active');
        }
    </script>
</body>
</html>
