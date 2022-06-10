<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
require "../../config/fungsi_whatsapp.php";
session_start();
$id = $_SESSION['id_siswa'];
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
    $query = "SELECT max(id_bayar) AS last FROM bayar WHERE id_bayar LIKE '$today%'";
    $hasil = mysqli_query($koneksi, $query);
    $data  = mysqli_fetch_array($hasil);
    $lastNoTransaksi = $data['last'];
    $lastNoUrut = substr($lastNoTransaksi, 8, 4);
    $nextNoUrut = $lastNoUrut + 1;
    $nextNoTransaksi = $today . sprintf('%04s', $nextNoUrut);
    $ektensi = ['jpg', 'png', 'JPG', 'JPEG', 'PNG', 'jpeg', 'bmp'];
    $biaya = implode(",", $_POST['biaya']);
    $data = [
        'id_bayar'      => $nextNoTransaksi,
        'id_daftar'     => $id,
        'jumlah'        => str_replace(",", "", $_POST['jumlah']),
        // 'tgl_bayar'     => $_POST['tgl'],
        'id_user'       => 0,
        // 'bukti'         => $dest,
        'id_biaya'      => $biaya
    ];
    $siswa = fetch($koneksi, 'daftar', ['id_daftar' => $id]);
    $nama = $siswa['nama'];
    $jumlah = rupiah($_POST['jumlah']);
    $norek = $setting['no_rek'];
    $bank = $setting['nama_bank'];
    $namarek = $setting['nama_rek'];
    $noskul = $setting['nolivechat'];
    $pesannya = "Menunggu Pembayaran \n======================== \n\nTagihan Pembayaran. \nNama *{$nama}* \nJumlah *{$jumlah}* \nNo Transaksi {$nextNoTransaksi}\n\nSilahkan melakukan proses pembayaran dengan cara transfer \nNo Rek {$norek}\nA/N {$namarek} \n{$bank} \n\nJika Sudah transfer konfirmasi dengan cara kirim bukti struk pembayaran di Web atau bisa kirim ke WA berikut ini : *{$noskul}* \n======================= \nPanitia PPDB";
    send_wa_text($setting['devid_wa'], $siswa['no_hp'], $pesannya);
    $exec = insert($koneksi, 'bayar', $data);
    if ($exec) {
        echo 'ok';
    } else {
        echo mysqli_error($koneksi);
    }
}
if ($pg == 'hapus') {
    $id_bayar = $_POST['id_bayar'];

    $bayar = fetch($koneksi, 'bayar', ['id_bayar' => $id_bayar]);
    if (file_exists($bayar['bukti'])) {
        if (unlink($bayar['bukti'])) {
            delete($koneksi, 'bayar', ['id_bayar' => $id_bayar]);
        }
    } else {
        delete($koneksi, 'bayar', ['id_bayar' => $id_bayar]);
    }
}

if ($pg == 'bukti') {
    $id_bayar = $_POST['id_bayar'];
    $bayar = fetch($koneksi, 'bayar', ['id_bayar' => $id_bayar]);
    $ektensi = ['jpg', 'png', 'jpeg', 'JPG', 'JPEG', 'PNG'];
    if ($_FILES['file-bukti']['name'] <> '') {
        $filename = $_FILES['file-bukti']['name'];
        $temp = $_FILES['file-bukti']['tmp_name'];
        $ext = explode('.', $filename);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'bukti_transaksi/bukti-' . $id_bayar . '.' . $ext;

            $upload = move_uploaded_file($temp, $dest);
            if ($upload) {
                $data2 = [
                    'tgl_bayar' => $_POST['tgl_bayar'],
                    'bukti' => $dest,
                    'verifikasi' => 2
                ];
                $exec = update($koneksi, 'bayar', $data2, ['id_bayar' => $id_bayar]);

                compress($dest, $dest, 65);
                if ($exec) {
                    $siswa = fetch($koneksi, 'daftar', ['id_daftar' => $bayar['id_daftar']]);
                    $nama = $siswa['nama'];
                    $jumlah = rupiah($bayar['jumlah']);

                    $pesannya = "Verifikasi Pembayaran \n======================== \n\nTerima Kasih *{$nama}* sudah melakukan konfirmasi pembayaran biaya administrasi PPDB \nJumlah *{$jumlah}* \nNo Transaksi {$id_bayar}\nPembayaran *Sedang Dicek*\n\n======================= \nPanitia PPDB";
                    send_wa_text($setting['devid_wa'], $siswa['no_hp'], $pesannya);
                }
                echo "ok";
            } else {
                echo "gagal";
            }
        }
    }
}
