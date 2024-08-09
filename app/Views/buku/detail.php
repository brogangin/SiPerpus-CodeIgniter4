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
            <h1 class="h3 mb-2 text-gray-800">Detail Buku</h1>

            <!-- Row Content -->
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= base_url() ?>assets/img/<?= $buku['cover'] ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <form class="row g-1" action="/buku/ubah/<?= $buku["id_buku"] ?>" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 mt-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control <?= isset($validation['judul']) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= $buku['judul'] ?>">
                            <div class="invalid-feedback"><?= isset($validation['judul']) ? $validation['judul'] : ''; ?></div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control <?= isset($validation['penulis']) ? 'is-invalid' : ''; ?>" id="penulis" name="penulis" value="<?= $buku['penulis'] ?>">
                            <div class="invalid-feedback"><?= isset($validation['penulis']) ? $validation['penulis'] : ''; ?></div>
                        </div>
                        <input type="hidden" name="isbnLama" value="<?= $buku['isbn'] ?>">
                        <div class="col-md-6 mt-3">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" class="form-control <?= isset($validation['isbn']) ? 'is-invalid' : ''; ?>" id="isbn" name="isbn" value="<?= $buku['isbn'] ?>">
                            <div class="invalid-feedback"><?= isset($validation['isbn']) ? $validation['isbn'] : ''; ?></div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control <?= isset($validation['jumlah']) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" value="<?= $buku['jumlah_awal'] ?>">
                            <div class="invalid-feedback"><?= isset($validation['jumlah']) ? $validation['jumlah'] : ''; ?></div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok" value="<?= $buku['jumlah_stok'] ?>" readonly>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="cover" class="form-label">Cover (format jpg/jpeg/png)</label>
                            <input type="file" class="form-control <?= isset($validation['cover']) ? 'is-invalid' : ''; ?>" id="cover" name='cover' value="<?= $buku['cover'] ?>">
                            <div class="invalid-feedback"><?= isset($validation['cover']) ? $validation['cover'] : ''; ?></div>
                        </div>
                        <div class="col-2 mt-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                    <form class="row g-1" action="/buku/hapus/<?= $buku['id_buku'] ?>" method="post">
                        <div class="col-2 mt-4">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </div>
                    </form>

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