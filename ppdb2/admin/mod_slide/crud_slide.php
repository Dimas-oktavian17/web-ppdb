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
        'nama_slide' => $_POST['nama'],

    ];
    $id_slide = $_POST['id_slide'];
    update($koneksi, 'slide', $data, ['id_slide' => $id_slide]);
}
if ($pg == 'tambah') {
    $ektensi = ['jpg', 'png', 'JPG', 'JPEG', 'PNG', 'jpeg'];
    if ($_FILES['slide-1']['name'] <> '') {
        $filename = $_FILES['slide-1']['name'];
        $temp = $_FILES['slide-1']['tmp_name'];
        $ext = explode('.', $filename);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'assets/img/slide/slide-' . date('YmdHis') . '.' . $ext;
            $upload = move_uploaded_file($temp, '../../' . $dest);
            if ($upload) {
                $data = [
                    'nama_slide' => $dest
                ];
                $exec = insert($koneksi, 'slide', $data);
            } else {
                echo "gagal";
            }
        }
    }
    echo "ok";
}
if ($pg == 'hapus') {
    $id_slide = $_POST['id_slide'];
    $slide = fetch($koneksi, 'slide', ['id_slide' => $id_slide]);
    // if (file_exists(getcwd() . $slide['nama_slide'])) {
    if (unlink(BASEPATH . $slide['nama_slide'])) {
        delete($koneksi, 'slide', ['id_slide' => $id_slide]);
    } else {
        delete($koneksi, 'slide', ['id_slide' => $id_slide]);
    }
    // }
}
