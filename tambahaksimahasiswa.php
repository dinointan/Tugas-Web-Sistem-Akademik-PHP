<?php
require 'koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['namamahasiswa'];
$prodi = $_POST['namaprodi'];
$nomorhp = $_POST['nomorhp'];
$alamat = $_POST['alamat'];


//echo 'nama prodinya adalah: ' . $prodi ;

// $query = "INSERT INTO prodi (Nama_Prodi) VALUES ('$prodi')";

$query = 'INSERT INTO mahasiswa (NIM, Nama, Nomor_HP, Alamat, Password, ID_Prodi, Foto)
             VALUES ("' .$nim. '", "' .$nama. '", "' .$nomorhp. '", "' .$alamat. '", "NULL", "' .$prodi. '", "NULL")';

mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "
            <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href='mahasiswa.php';
            </script>
    ";
}else {
    echo "
    <script>
    alert ('Data gagal ditambahkan');
    </script>
";
echo mysqli_error($conn);
};

