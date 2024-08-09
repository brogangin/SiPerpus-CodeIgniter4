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
            <h1 class="h3 mb-2 text-gray-800">Transaksi Peminjaman</h1>

            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel <?= $title ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="/peminjaman/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-plus fa-sm text-white-50"></i>&ensp;Tambah Data</a>

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode Peminjaman</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tenggat Pengembalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($daftar_p as $p) { ?>
                                    <tr>
                                        <td><?= $p['kode'] ?></td>
                                        <td><?= $p['tgl_pinjam'] ?></td>
                                        <td><?= $p['tgt_kembali'] ?></td>
                                        <td>
                                            <a title="Details" href="<?= base_url("/peminjaman/detail/") . $p['kode'] ?>" class="btn btn-info">Details</a>
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