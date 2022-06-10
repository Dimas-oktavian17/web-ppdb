<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [
        'nama_jalur' => $_POST['nama'],
        'status' => $status,
        'kuota'         => $_POST['kuota']
    ];
    $id_jalur = $_POST['id_jalur'];
    update($koneksi, 'jalur', $data, ['id_jalur' => $id_jalur]);
}
if ($pg == 'tambah') {
    $data = [
        'id_jalur'     => $_POST['id_jalur'],
        'nama_jalur'   => $_POST['nama'],
        'status'         => 1,
        'kuota'         => $_POST['kuota']
    ];
    $exec = insert($koneksi, 'jalur', $data);
    echo $exec;
}
if ($pg == 'hapus') {
    $id_jalur = $_POST['id_jalur'];
    delete($koneksi, 'jalur', ['id_jalur' => $id_jalur]);
}
