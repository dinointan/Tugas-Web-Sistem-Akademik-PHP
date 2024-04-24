<?php
$servername = "localhost";
$database = "db_mahasiswa";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

function ceklogin() {
    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
    }

}
