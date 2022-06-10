<?php
require("../../config/excel_reader.php");
require("../../config/database.php");
require("../../config/function.php");
require("../../config/function_sekolah.php");
require("../../config/functions.crud.php");
require "../../config/fungsi_whatsapp.php";
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $no_utama = (isset($_POST['no_utama'])) ? 1 : 0;
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [
        'nama_device' => $_POST['nama_device'],
        'no_hp' => $_POST['no_hp'],
        'device_id' => $_POST['device_id'],
        'status' => $status,
        'no_utama' => $no_utama
    ];
    $id = $_POST['id_device'];
    if ($no_utama == 1) {
        $exec = update($koneksi, 'setting', ['devid_wa' => $_POST['device_id']], ['id_setting' => 1]);
    }
    $exec = update($koneksi, 'device', ['no_utama' => 0]);
    $exec = update($koneksi, 'device', $data, ['id_device' => $id]);
    echo $exec;
}
if ($pg == 'tambah') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $no_utama = (isset($_POST['no_utama'])) ? 1 : 0;
    $data = [
        'nama_device' => $_POST['nama_device'],
        'no_hp' => $_POST['no_hp'],
        'device_id' => $_POST['device_id'],
        'status' => $status,
        'no_utama' => $no_utama
    ];
    if ($no_utama == 1) {
        $exec = update($koneksi, 'setting', ['devid_wa' => $_POST['device_id']], ['id_setting' => 1]);
    }
    $exec = update($koneksi, 'device', ['no_utama' => 0]);
    $exec = insert($koneksi, 'device', $data);
    echo $exec;
}

if ($pg == 'hapus') {
    $id = $_POST['id_device'];
    delete($koneksi, 'device', ['id_device' => $id]);
}
