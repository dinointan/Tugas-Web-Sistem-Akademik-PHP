<?php
session_start();
require "koneksi.php";

$User = $_POST['User'];
$Password = $_POST['Password'];

//query ke database
$result = mysqli_query($conn, "SELECT * FROM admin WHERE User='$User'");

//mengambil baris  pertama
$row = mysqli_fetch_assoc($result);

if (password_verify($Password, $row['Password'])) {
    $_SESSION['login'] = true;
    $_SESSION['nama'] = $row['User'];
    $_SESSION['foto'] = 'admin.jpg';
    $_SESSION['hakakses'] = 'admin';
    header("Location: index.php");
} else {
    echo "
    <script>
    alert('Username atau Password salah');
    document.location.href='loginadmin.php';
    </script>
    ";

}

//var_dump($row);