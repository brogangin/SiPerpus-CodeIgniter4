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
            <h1 class="h3 mb-2 text-gray-800">Tambah Anggota</h1>
            <div class="container mt-4">
                <form class="row g-1" action="/anggota/simpan" method="post">
                    <div class="col-md-6 mt-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control <?= isset($validation['nama']) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ?>">
                        <div class="invalid-feedback"><?= isset($validation['nama']) ? $validation['nama'] : ''; ?></div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control <?= isset($validation['nik']) ? 'is-invalid' : ''; ?>" id="nik" name="nik" value="<?= old('nik') ?>">
                        <div class="invalid-feedback"><?= isset($validation['nik']) ? $validation['nik'] : ''; ?></div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="jenis_kelamin" class="form-label">Role</label>
                        <select class="form-control <?= isset($validation['jenis_kelamin']) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="" selected>Pilih jenis kelamin</option>
                            <option value="l">Laki-laki</option>
                            <option value="p">Perempuan</option>
                        </select>
                        <div class="invalid-feedback"><?= isset($validation['jenis_kelamin']) ? $validation['jenis_kelamin'] : ''; ?></div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control <?= isset($validation['alamat']) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat') ?>">
                        <div class="invalid-feedback"><?= isset($validation['alamat']) ? $validation['alamat'] : ''; ?></div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control <?= isset($validation['email']) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email') ?>">
                        <div class="invalid-feedback"><?= isset($validation['email']) ? $validation['email'] : ''; ?></div>
                    </div>
                    <div class="col-2 mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
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