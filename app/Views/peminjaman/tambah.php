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
            <h1 class="h3 mb-2 text-gray-800">Tambah Peminjaman</h1>

            <!-- DataTales -->
            <div class="container mt-4">
                <form class="row g-1" action="/peminjaman/simpan" method="post">
                    <div class="col-md-6 mt-3">
                        <label for="inputKode" class="form-label">Kode</label>
                        <input type="text" class="form-control" id="inputKode" value="1212935" readonly>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="peminjam" class="form-label">NIK Peminjam</label>
                        <input type="text" class="form-control <?= isset($validation['peminjam']) ? 'is-invalid' : ''; ?>" id="peminjam" name="peminjam" value="<?= old('peminjam') ?>" placeholder="NIK Peminjam">
                        <div class="invalid-feedback"><?= isset($validation['peminjam']) ? $validation['peminjam'] : ''; ?></div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="tgl_pinjam" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= date('Y-m-d') ?>" readonly>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="tgt_kembali" class="form-label">Tenggat Pengembalian</label>
                        <input type="date" class="form-control <?= isset($validation['tgt_kembali']) ? 'is-invalid' : ''; ?>" id="tgt_kembali" name="tgt_kembali" value="<?= old('tgt_kembali') ?>">
                        <div class="invalid-feedback"><?= isset($validation['tgt_kembali']) ? $validation['tgt_kembali'] : ''; ?></div>
                    </div>
                    <div class="card shadow-sm my-5 col-12 px-0">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Daftar Buku</h6>

                            <input class="form-control <?= isset($validation['pilihBuku']) ? 'is-invalid' : ''; ?>" type="hidden" name="pilihBuku" id="pilihBuku">

                            <div class="invalid-feedback"><?= isset($validation['pilihBuku']) ? $validation['pilihBuku'] : ''; ?></div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ISBN</th>
                                            <th>Judul</th>
                                            <th>Tersedia</th>
                                            <th>Pilih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($daftar_buku as $buku) { ?>
                                            <tr>
                                                <td><?= $buku['isbn'] ?></td>
                                                <td><?= $buku['judul'] ?></td>
                                                <td><?= $buku['jumlah_stok'] ?></td>
                                                <td><input type="checkbox" name="pilihBuku[]" id="pilihBuku" value="<?= $buku['isbn'] ?>" <?= $buku['jumlah_stok'] == 0 ? 'disabled' : '' ?>></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-4 text-center">
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