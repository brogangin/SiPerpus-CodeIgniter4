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
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Daftar Buku</h1>
                <a href="<?= base_url() ?>buku/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>&ensp;Tambah Data</a>
            </div>

            <!-- Content Row -->
            <div class="row row-cols-1 row-cols-md-4 g-4 my-5">
                <?php foreach ($daftar_buku as $buku) { ?>
                    <div class="col">
                        <div class="card h-100 shadow border-0">
                            <img src="<?= base_url() ?>assets/img/<?= $buku['cover'] ?>" class="card-img-top image-produk" alt="...">
                            <div class="card-body p-4">
                                <a href='<?= base_url() ?>buku/detail/<?= $buku['isbn'] ?>'>
                                    <h5 class="card-title" class="text-primary-emphasis"><?= $buku['judul'] ?></h5>
                                </a>
                                <p class="card-text">ISBN <?= $buku['isbn'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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