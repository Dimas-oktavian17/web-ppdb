<ul class="sidebar-menu">
    <li class="menu-header">Main Menu</li>
    <li><a class="nav-link" href="."><i class="fas fa-home fa-fw"></i> <span>Beranda</span></a></li>

    <?php if ($user['level'] == 'admin') { ?>
        <li><a class="nav-link" href="?pg=sekolahpilihan"><i class="fas fa-school"></i> <span>Sekolah Pilihan</span></a></li>
        <li class="dropdown ">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire fa-fw"></i> <span>Data Master</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="?pg=sekolah">Master Sekolah Asal</a></li>
                <li><a class="nav-link" href="?pg=jenjang">Master Jenjang</a></li>
                <li><a class="nav-link" href="?pg=jalur">Master Jalur</a></li>
                <?php if ($setting['jurusan'] == 1) { ?>
                    <li><a class="nav-link" href="?pg=jurusan">Master Jurusan</a></li>
                <?php } ?>
                <li><a class="nav-link" href="?pg=jenis">Master Jenis Daftar</a></li>
                <li><a class="nav-link" href="?pg=biaya">Master Biaya</a></li>
            </ul>
        </li>
    <?php } ?>
    <li class="dropdown ">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-friends"></i> <span>Data Pendaftar</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="?pg=daftar">Semua Data</a></li>
            <li><a class="nav-link text-success" href="?pg=diterima">Data Diterima</a></li>
            <li><a class="nav-link text-danger" href="?pg=ditolak">Ditolak / Cadangan</a></li>
        </ul>
    </li>
    <?php if ($setting['pembayaran'] == 1) { ?>
        <li><a class="nav-link" href="?pg=bayar"><i class="fas fa-money-bill    "></i> <span>Pembayaran</span></a></li>
    <?php } ?>


    <?php if ($user['level'] == 'admin') { ?>
        <li class="dropdown ">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-globe"></i> <span>Web</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="?pg=kontak">Kontak Pendaftaran</a></li>
                <li><a class="nav-link text-success" href="?pg=infobayar">Info Pembayaran</a></li>
                <li><a class="nav-link text-success" href="?pg=syarat">Info Persyaratan</a></li>
                <li><a class="nav-link text-danger" href="?pg=slide">Slide</a></li>
            </ul>
        </li>
        <li class="dropdown ">
            <a class="nav-link has-dropdown" href="#"><i class="fab fa-whatsapp    "></i> <span> Pesan</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link " href="?pg=device">Device</a></li>
                <li><a class="nav-link " href="?pg=kirimpesan">Kirim Pesan</a></li>
                <!-- <li><a class="nav-link" href="?pg=riwayatpesan">Riwayat Pesan</a></li> -->
            </ul>
        </li>
    <?php } ?>


    <li><a class="nav-link" href="?pg=pengumuman"><i class="fas fa-bullhorn fa-fw"></i> <span>Pengumuman</span></a></li>
    <?php if ($user['level'] == 'admin') { ?>
        <li class="menu-header">Pengaturan</li>
        <li><a class="nav-link" href="?pg=user"><i class="fas fa-user-friends    "></i> <span>Manajemen User</span></a></li>
        <li><a class="nav-link" href="?pg=setting"><i class="fas fa-toolbox"></i> <span>Pengaturan Aplikasi</span></a></li>
    <?php } ?>

</ul>