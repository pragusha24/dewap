<?php
session_start();
session_unset(); // Menghapus semua data sesi
session_destroy(); // Mengakhiri sesi
header("Location: ../login.php"); // Redirect ke halaman login
exit();
?>
