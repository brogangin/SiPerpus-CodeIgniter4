<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= $this->include('layout/topnav'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Daftar Admin</h1>

            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel <?= $title ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="/admin/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-plus fa-sm text-white-50"></i>&ensp;Tambah Data</a>

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($admins as $admin) { ?>
                                    <tr>
                                        <td><?= $admin['username'] ?></td>
                                        <td><?= $admin['nama'] ?></td>
                                        <td><?= $admin['nik'] ?></td>
                                        <td>
                                            <a title="Edit" href="<?= base_url("/admin/detail/") . $admin['username'] ?>" class="btn btn-info">Edit</a>
                                            <form class="d-inline" action="/admin/hapus/<?= $admin['id_petugas'] ?>" method="post">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->


    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?= $this->include('layout/footer'); ?>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
<?= $this->endSection(); ?>