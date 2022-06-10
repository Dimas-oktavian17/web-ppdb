<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
require "../../config/fungsi_whatsapp.php";
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $verifikasi = (isset($_POST['verifikasi'])) ? 1 : 0;
    $data = [
        'nama_bayar' => $_POST['nama'],
        'verifikasi' => $verifikasi
    ];
    $id_bayar = $_POST['id_bayar'];
    $excec = update($koneksi, 'bayar', $data, ['id_bayar' => $id_bayar]);
    echo $exec;
}
if ($pg == 'tambah') {

    $today = date("Ymd");

    // cari id transaksi terakhir yang berawalan tanggal hari ini
    $query = "SELECT max(id_bayar) AS last FROM bayar WHERE id_bayar LIKE '$today%'";
    $hasil = mysqli_query($koneksi, $query);
    $data  = mysqli_fetch_array($hasil);
    $lastNoTransaksi = $data['last'];
    $lastNoUrut = substr($lastNoTransaksi, 8, 4);
    $nextNoUrut = $lastNoUrut + 1;
    $nextNoTransaksi = $today . sprintf('%04s', $nextNoUrut);
    $biaya = implode(",", $_POST['biaya']);
    $data = [
        'id_bayar'      => $nextNoTransaksi,
        'id_daftar'     => $_POST['id'],
        'jumlah'        => str_replace(",", "", $_POST['jumlah']),
        'tgl_bayar'     => $_POST['tgl'],
        'id_user'       => $_SESSION['id_user'],
        'id_biaya'      => $biaya,
        'verifikasi'    => 1

    ];
    $exec = insert($koneksi, 'bayar', $data);
    $siswa = fetch($koneksi, 'daftar', ['id_daftar' => $_POST['id']]);
    $nama = $siswa['nama'];
    $jumlah = rupiah($_POST['jumlah']);
    $tgl_bayar = $_POST['tgl'];
    $pesannya = "Konfirmasi Pembayaran \n======================== \n\nTerima Kasih *{$nama}* sudah melakukan pembayaran biaya administrasi PPDB \nJumlah *{$jumlah}* \nTanggal *{$tgl_bayar}* \nNo Transaksi {$nextNoTransaksi}\n\n======================= \nPanitia PPDB";
    send_wa_text($setting['devid_wa'], $siswa['no_hp'], $pesannya);
    echo $exec;
}
if ($pg == 'hapus') {
    $id_bayar = $_POST['id_bayar'];
    delete($koneksi, 'bayar', ['id_bayar' => $id_bayar]);
}
if ($pg == 'verifikasi') {
    $id_bayar = $_POST['id_bayar'];
    $bayar = fetch($koneksi, 'bayar', ['id_bayar' => $id_bayar]);
    $data = [
        'verifikasi' => 1
    ];

    $exec = update($koneksi, 'bayar', $data, ['id_bayar' => $id_bayar]);
    if ($exec) {
        $siswa = fetch($koneksi, 'daftar', ['id_daftar' => $bayar['id_daftar']]);
        $nama = $siswa['nama'];
        $jumlah = rupiah($bayar['jumlah']);

        $pesannya = "Pembayaran Diterima \n======================== \n\nTerima Kasih *{$nama}* sudah melakukan pembayaran biaya administrasi PPDB \nJumlah *{$jumlah}* \nNo Transaksi {$id_bayar}\nPembayaran *Sudah Dibayar*\n\n======================= \nPanitia PPDB";
        send_wa_text($setting['devid_wa'], $siswa['no_hp'], $pesannya);
    }
}
if ($pg == 'batalverifikasi') {
    $id_bayar = $_POST['id_bayar'];
    $data = [
        'verifikasi' => 2
    ];
    update($koneksi, 'bayar', $data, ['id_bayar' => $id_bayar]);
}
