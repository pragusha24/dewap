<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="registrasi.css"> <!-- Link ke file CSS -->
</head>
<body>
    <div class="container">
        <h2>Registrasi Pengguna</h2>

        <!-- Notifikasi Pesan -->
        <?php
        if (isset($_GET['success'])) {
            echo "<p class='message success'>Pendaftaran berhasil! Silakan <a href='login.php'>login di sini</a>.</p>";
        }
        if (isset($_GET['error'])) {
            echo "<p class='message error'>Error: Username sudah digunakan. Silakan pilih username lain.</p>";
        }
        ?>

        <form method="POST" action="includes/register_action.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Daftar</button>
        </form>
        
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</body>
</html>
