<?php
require 'koneksi.php';

$nim = $_POST['nim'];
$nimlama = $_POST['nimlama'];
$namamahasiswa = $_POST['namamahasiswa'];
$namaprodi = $_POST['namaprodi'];
$nomorhp = $_POST['nomorhp'];
$alamat = $_POST['alamat'];
$fotolama = $_POST['fotolama'];
if ($_FILES == "") {
    $namaFile = $fotolama;
} else {
    $namaFile = $_FILES['photo']['name'];
    $tmpName = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmpName, "dist/img/" . $namaFile);
    unlink("dist/img/" . $fotolama);
}

$query = "UPDATE mahasiswa SET NIM='$nim', Nama='$namamahasiswa', Nomor_HP='$nomorhp', Alamat='$alamat', ID_Prodi='$namaprodi', Foto='$namaFile'  WHERE NIM='$nimlama'";

mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "
            <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href='mahasiswa.php';
            </script>
    ";
} else {
    echo "
    <script>
    alert ('Data gagal ditambahkan');
    </script>
";
    echo mysqli_error($conn);
}
;

?>