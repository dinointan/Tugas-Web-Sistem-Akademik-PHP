<?php
require 'koneksi.php';

$nim = $_POST['nim'];
$nimlama = $_POST['nimlama'];
$namamahasiswa = $_POST['namamahasiswa'];
$namaprodi = $_POST['namaprodi'];
$nomorhp = $_POST['nomorhp'];
$alamat = $_POST['alamat'];
$fotolama = $_POST['fotolama'];
$namaFileBaru;


if ($_FILES['photo']['error'] === 4) {
    $namaFileBaru = $fotolama;
} else {
    $namaFile = $_FILES['photo']['name'];
    $tmpName = $_FILES['photo']['tmp_name'];

    $ekstensifoto = explode('.', $namaFile);
    $ekstensifoto = strtolower(end($ekstensifoto));
    $ekstensiValid = ['jpg', 'png', 'jpeg'];


    if (!in_array($ekstensifoto, $ekstensiValid)) {
        echo "
    <script>
    alert('File yang anda upload bukan file gambar');
    document.location.href='tambahmahasiswa.php';
    </script>
    ";
    }

    $ukuranFile = $_FILES['photo']['size'];
    if ($ukuranFile > 1500000) {
        echo "
    <script>
    alert('File maksimal 1,5 MB');
    document.location.href='tambahmahasiswa.php';
    </script>
    ";
    }

    $namaFileBaru = $nim;
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensifoto;

    move_uploaded_file($tmpName, "dist/img/" . $namaFileBaru);
    unlink("dist/img" . $fotolama);

}


$query = "UPDATE mahasiswa SET NIM='$nim', Nama='$namamahasiswa', Nomor_HP='$nomorhp', Alamat='$alamat', ID_Prodi='$namaprodi', Foto='$namaFileBaru'  WHERE NIM='$nimlama'";

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