<?php
session_start();
include 'koneksi.php';
include 'template/header.php';
include 'template/sidebar.php';

require 'koneksi.php';
ceklogin();

$query = "SELECT * FROM prodi";
$hasil = mysqli_query($conn, $query);

$data = [];
while ($baris = mysqli_fetch_assoc($hasil)) {
    $data[] = $baris;
};

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Prodi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Prodi</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Prodi</h3>

                            <div class="card-tools">
                                <a href="tambahprodi.php" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Prodi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($data as $d) {
                                    ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $d['Nama_Prodi'] ?></td>
                                            <td> <a href="editprodi.php?id_prodi=<?= $d['ID_Prodi'] ?>" class="btn btn-warning">Edit</a>
                                                <a href="hapusprodi.php?id_prodi=<?= $d['ID_Prodi'] ?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
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