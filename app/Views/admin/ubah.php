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
            <h1 class="h3 mb-2 text-gray-800">Edit Admin</h1>
            <div class="container mt-4">
                <form class="row g-1" action="/admin/ubah/<?= $admin['id_petugas'] ?>" method="post">
                    <div class="col-md-6 mt-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control <?= isset($validation['username']) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= $admin['username'] ?>">
                        <div class="invalid-feedback"><?= isset($validation['username']) ? $validation['username'] : ''; ?></div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control <?= isset($validation['nama']) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= $admin['nama'] ?>">
                        <div class="invalid-feedback"><?= isset($validation['nama']) ? $validation['nama'] : ''; ?></div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control <?= isset($validation['nik']) ? 'is-invalid' : ''; ?>" id="nik" name="nik" value="<?= $admin['nik'] ?>">
                        <div class="invalid-feedback"><?= isset($validation['nik']) ? $validation['nik'] : ''; ?></div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control <?= isset($validation['role']) ? 'is-invalid' : ''; ?>" id="role" name="role">
                            <option value="1" <?= $admin['role'] == '1' ? 'selected' : '' ?>>Super</option>
                            <option value="2" <?= $admin['role'] == '2' ? 'selected' : '' ?>>Admin</option>
                        </select>
                        <div class="invalid-feedback"><?= isset($validation['nik']) ? $validation['nik'] : ''; ?></div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control <?= isset($validation['password']) ? 'is-invalid' : ''; ?>" id="password" name="password" value="<?= $admin['password'] ?>">
                        <div class="invalid-feedback"><?= isset($validation['password']) ? $validation['password'] : ''; ?></div>
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