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
    $status = (isset($_POST['status'])) ? 1 : 0;

    $nama = str_replace("'", "`", $_POST['nama']);
    $data = [
        'nisn' => $_POST['nisn'],
        'nama' => ucwords(strtolower($nama)),
        'asal_sekolah' => $_POST['asal'],
        'no_hp' => str_replace(" ", "", $_POST['nohp']),
        'status' => $status

    ];
    $id_daftar = $_POST['id_daftar'];
    update($koneksi, 'daftar', $data, ['id_daftar' => $id_daftar]);
}
if ($pg == 'tambah') {
    $sekolah = fetch($koneksi, 'sekolah', ['npsn' => $_POST['asal']]);
    $sekolahpilihan = fetch($koneksi, 'sekolah', ['npsn' => $_POST['pilihan']]);
    $query = "SELECT max(no_daftar) as maxKode FROM daftar";
    $hasil = mysqli_query($koneksi, $query);
    $data  = mysqli_fetch_array($hasil);
    $kodedaftar = $data['maxKode'];
    $noUrut = (int) substr($kodedaftar, 8, 3);
    $noUrut++;
    $char = "PPDB" . date('Y');
    $newID = $char . sprintf("%03s", $noUrut);
    $nama = mysqli_escape_string($koneksi, ucwords(strtolower($_POST['nama'])));
    if (isset($_POST['jurusan'])) {
        $jurusan = $_POST['jurusan'];
    } else {
        $jurusan = 'ALL';
    }
    $data = [
        'no_daftar' => $newID,
        'jenis' => $_POST['jenis'],
        'jenjang' => $_POST['jenjang'],
        'jurusan' => $jurusan,
        'nik' => $_POST['nik'],
        'nama' => $nama,
        'asal_sekolah' => $sekolah['nama_sekolah'],
        'npsn_asal' => $_POST['asal'],
        'sekolah_pilihan' => $sekolahpilihan['nama_sekolah'],
        'npsn_sekolah_pilihan' => $_POST['pilihan'],
        'no_hp' => $_POST['nohp'],
        'password' => $_POST['password'],
        'foto' => 'default.png',


    ];
    $cek = rowcount($koneksi, 'daftar', ['nik' => $_POST['nik']]);
    if ($cek == 0) {
        $exec = insert($koneksi, 'daftar', $data);
        if ($exec) {
            $password = $_POST['password'];
            $sekolah = $setting['nama_sekolah'];
            $pesannya = "Terima Kasih *{$nama}* sudah mendaftar PPDB di Sekolah {$sekolah}.\n====================== \nSilahkan login dengan \nUsername : {$newID} \nPassword : {$password} \nKlik link ini untuk melanjutkan pendaftaran di : *{$uri}*";

            send_wa_text($setting['devid_wa'], $_POST['nohp'], $pesannya);
        }
        $namapendek = explode(" ", $nama);
        $pesan = [
            'pesan' => 'ok',
            'id' => $newID,
            'pass' => $_POST['password'],
            'nama' => $namapendek[0]
        ];
        echo json_encode($pesan);
    } else {
        $pesan = [
            'pesan' => 'Nik sudah ada'
        ];
        echo json_encode($pesan);
    }
}
if ($pg == 'hapus') {
    $id_daftar = $_POST['id_daftar'];
    delete($koneksi, 'daftar', ['id_daftar' => $id_daftar]);
    delete($koneksi, 'bayar', ['id_daftar' => $id_daftar]);
}
//membatalkan proses daftar ulang
if ($pg == 'batal') {
    $data = [
        'status' => 0
    ];
    $where = [
        'id_daftar' => $_POST['id_daftar']
    ];
    update($koneksi, 'daftar', $data, $where);
    delete($koneksi, 'bayar', $where);
}
if ($pg == 'status') {
    $status = (isset($_POST['status'])) ? $_POST['status'] : 0;
    $data = [
        'status' => $status,
        'diskon' => $_POST['diskon']
    ];
    $where = [
        'id_daftar' => $_POST['id_daftar']
    ];
    $id_daftar = $_POST['id_daftar'];
    update($koneksi, 'daftar', $data, $where);
}
if ($pg == 'hapusdaftar') {
    $kode = $_POST['kode'];
    $query = mysqli_query($koneksi, "DELETE from daftar where id_daftar in (" . $kode . ")");
    $query = mysqli_query($koneksi, "DELETE from bayar where id_daftar in (" . $kode . ")");
    if ($query) {
        echo 1;
    } else {
        echo 0;
    }
}
