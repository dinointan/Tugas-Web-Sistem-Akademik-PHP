<?php
include 'template/header.php';
include 'template/sidebar.php';
require 'koneksi.php';

$nim = $_GET['nim'];

$query = "SELECT * FROM mahasiswa WHERE NIM='$nim'";
$hasil = mysqli_query($conn, $query);

$data = mysqli_fetch_assoc($hasil);

$queryProdi = "SELECT * FROM prodi";
$hasilProdi = mysqli_query($conn, $queryProdi);

$dataProdi = [];
while ($baris = mysqli_fetch_assoc($hasilProdi)) {
  $dataProdi[] = $baris;
}


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Mahasiswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Mahasiswa</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Mahasiswa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="editaksimahasiswa.php" method="post" enctype="multipart/form-data">
              <input type='hidden' name='nimlama' id='nimlama' value="<?php echo $nim ?>" />
              <input type='hidden' name='fotolama' id='fotolama' value="<?php echo $data['Foto'] ?>" />
              <div class="card-body">
                <div class="form-group">
                  <label for="nim">NIM</label>
                  <input type="text" name="nim" class="form-control" id="nim" value="<?php echo $data['NIM'] ?>">
                </div>
                <div class="form-group">
                  <label for="namamahasiswa">Nama Mahasiswa</label>
                  <input type="text" name="namamahasiswa" class="form-control" id="namamahasiswa"
                    value="<?php echo $data['Nama'] ?>">
                </div>
                <div class="form-group">
                  <label for="namaprodi">Prodi</label>
                  <select name="namaprodi" id="namaprodi" class="form-control">
                    <?php
                    foreach ($dataProdi as $prodi) {
                      ?>
                      <option id="<?php echo $prodi['Nama_Prodi'] ?>" value="<?php echo $prodi['ID_Prodi'] ?>">
                        <?php echo $prodi['Nama_Prodi'] ?>
                      </option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="nomorhp">Nomor HP</label>
                  <input type="text" name="nomorhp" class="form-control" id="nomorhp"
                    value="<?php echo $data['Nomor_HP'] ?>">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" name="alamat" class="form-control" id="alamat"
                    value="<?php echo $data['Alamat'] ?>">
                </div>
                <div class="form-group">
                  <label for="photo">Foto</label><br>
                  <input type="file" id="photo" name="photo" accept="image/*">
                </div>
              </div>

              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

          <!-- /.card-footer -->
      </div>

  </section>
  <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<?php
include 'template/footer.php';
?>