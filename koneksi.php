<?php
$servername = "localhost";
$database = "db_mahasiswa";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

function ceklogin()
{
    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
    }

}

function cekadmin()
{
    if ($_SESSION['hakakses'] != 'admin') {
        header("Location: index.php");
    }
}