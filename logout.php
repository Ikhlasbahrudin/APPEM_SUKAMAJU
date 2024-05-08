<?php
session_start(); // Mulai session

// Hapus variabel 'nama' dari session
unset($_SESSION['nama']);

// Hancurkan session
session_destroy();

// Arahkan ke index.php
header('Location:index.php');
exit; // Pastikan tidak ada output lain setelah header