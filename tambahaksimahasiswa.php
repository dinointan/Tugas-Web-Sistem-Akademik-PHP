<?php
session_start();
require 'koneksi.php';
ceklogin();

$nim = $_POST['nim'];
$nama = $_POST['namamahasiswa'];
$prodi = $_POST['namaprodi'];
$nomorhp = $_POST['nomorhp'];
$alamat = $_POST['alamat'];

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

$password = password_hash($nim, PASSWORD_DEFAULT);

//$ekstensifoto = explode('.', $namaFile);
//$ekstensifoto = strtolower(end($ekstensifoto));
//$namaFileBaru = $nim;  -> 555 (nama terakhir di nim jadi nama filenya)
//$namaFileBaru .= '.';  -> 555. (memberi tanda titik setelah nama file)
//$namaFileBaru .= $ekstensifoto;  ->555.PNG  (memberikan ekstensi pada nama file tersebut)
//echo 'nama prodinya adalah: ' . $prodi ;
//$query = "INSERT INTO prodi (Nama_Prodi) VALUES ('$prodi')";

$query = 'INSERT INTO mahasiswa (NIM, Nama, Nomor_HP, Alamat, ID_Prodi, Foto, Password) 
            VALUES ("' . $nim . '", "' . $nama . '", "' . $nomorhp . '", "' . $alamat . '", "' . $prodi . '", "' . $namaFileBaru . '", "' . $password . '")';

move_uploaded_file($tmpName, 'dist/img/' . $namaFileBaru);
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



