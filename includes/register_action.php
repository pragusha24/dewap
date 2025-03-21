<?php
// Menyertakan koneksi database
include(__DIR__ . '/config.php'); // Menggunakan jalur relatif ke file config.php

// Menangani form registrasi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Melakukan hash pada password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Mengecek apakah username sudah ada
    $check_sql = "SELECT username FROM user WHERE username = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        // Username sudah ada, tampilkan pesan error
        header("Location: ../register.php?error=1");
        exit();
    } else {
        // Username tidak ada, lanjutkan ke proses registrasi
        $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ss", $username, $hashed_password);
            if ($stmt->execute()) {
                // Redirect ke halaman registrasi dengan pesan sukses
                header("Location: ../register.php?success=1");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
