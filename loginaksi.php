<?php
session_start();
require "koneksi.php";

$nim = $_POST['nim'];
$password = $_POST['password'];

//query ke database
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$nim'");

//mengambil baris  pertama
$row = mysqli_fetch_assoc($result);

if (password_verify($password, $row['Password'])) {
    $_SESSION['login'] = true;
    $_SESSION['nama'] = $row['Nama'];
    $_SESSION['foto'] = $row['Foto'];
    $_SESSION['hakakses'] = 'mahasiswa';
    header("Location: index.php");
} else {
    echo "
    <script>
    alert('Username atau Password salah');
    document.location.href='login.php';
    </script>
    ";

}

//var_dump($row);