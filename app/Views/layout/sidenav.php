<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-frog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIPERPUS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $title == 'Dashboard' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url() ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item <?= $title == 'Daftar Buku' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('/buku') ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Daftar Buku</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item <?= $title == 'Daftar Anggota' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('/anggota') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Daftar Anggota</span></a>
    </li>
    <?php if (session()->get('role') == 1) : ?>
        <!-- Nav Item - Tables -->
        <li class="nav-item <?= $title == 'Daftar Admin' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('/admin') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Daftar Admin</span></a>
        </li>
    <?php endif ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Transaksi Buku
    </div>


    <!-- Nav Item - Charts -->
    <li class="nav-item <?= $title == 'Daftar Peminjaman' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url("/peminjaman") ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Daftar Peminjaman</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item <?= $title == 'Daftar Pengembalian' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url("/pengembalian") ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Daftar Pengembalian</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->