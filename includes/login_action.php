<?php
session_start(); // Memulai session
include('config.php'); // Pastikan ini benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['login_message'] = "Selamat datang, $username! Anda berhasil login.";
            header("Location: ../index.php");
            exit();
        } else {
            header("Location: ../login.php?error=Password salah!");
            exit();
        }
    } else {
        header("Location: ../login.php?error=Username tidak ditemukan!");
        exit();
    }
}
?>
