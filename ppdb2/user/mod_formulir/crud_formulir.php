<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
$id = $_SESSION['id_siswa'];
if ($pg == 'simpandatadiri') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $anak_guru = (isset($_POST['anak_guru'])) ? 1 : 0;
    $data = [
        'nisn'              => $_POST['nisn'],
        'nik'               => $_POST['nik'],
        'no_kk'             => $_POST['nokk'],
        'nama'              => mysqli_escape_string($koneksi, $_POST['nama']),
        'tempat_lahir'      => mysqli_escape_string($koneksi, $_POST['tempat']),
        'tgl_lahir'         => $_POST['tgllahir'],
        'jenkel'            => $_POST['jenkel'],
        'no_hp'             => $_POST['nohp'],
        'asal_sekolah'      => $_POST['asal'],
        'anak_ke'           => $_POST['anakke'],
        'saudara'           => $_POST['saudara'],
        'tinggi'            => $_POST['tinggi'],
        'berat'             => $_POST['berat'],
        'status_keluarga'   => $_POST['statuskeluarga'],
        'baju'              => $_POST['baju'],
        'agama'             => $_POST['agama'],
        'no_kip'            => $_POST['kip'],
        'anak_guru'         => $anak_guru,
        // 'anak_yayasan'      => $_POST['anak_yayasan']

    ];
    $ektensi = ['jpg', 'png', 'jpeg'];
    if ($_FILES['file-foto']['name'] <> '') {
        $filename = $_FILES['file-foto']['name'];
        $temp = $_FILES['file-foto']['tmp_name'];
        $ext = explode('.', $filename);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'assets/img/foto/foto-profil-' . $id . '.' . $ext;

            $upload = move_uploaded_file($temp, '../../' . $dest);
            if ($upload) {
                $data2 = [
                    'foto' => $dest
                ];
                $exec = update($koneksi, 'daftar', $data2, ['id_daftar' => $id]);
                compress('../../' . $dest, '../../' . $dest, 65);
            } else {
                echo "gagal";
            }
        }
    }
    $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
    if ($exec) {
        $pesan = [
            'pesan' => 'ok'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}
if ($pg == 'simpanalamat') {
    $desa = explode(":", $_POST['desa']);
    $desa = $desa[1];
    $kecamatan = explode(":", $_POST['kecamatan']);
    $kecamatan = $kecamatan[1];
    $kabupaten = explode(":", $_POST['kabupaten']);
    $kabupaten = $kabupaten[1];
    $provinsi = explode(":", $_POST['provinsi']);
    $provinsi = $provinsi[1];
    $data = [
        'alamat'            => mysqli_escape_string($koneksi, $_POST['alamat']),
        'rt'                => $_POST['rt'],
        'rw'                => $_POST['rw'],
        'desa'              => $desa,
        'kecamatan'         => $kecamatan,
        'kota'              => $kabupaten,
        'provinsi'          => $provinsi,
        'kode_pos'          => $_POST['kodepos'],
        'tinggal'           => $_POST['tinggal'],
        'jarak'             => $_POST['jarak'],
        'waktu'             => $_POST['waktu'],
        'transportasi'      => $_POST['transportasi']

    ];

    $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
    if ($exec) {
        $pesan = [
            'pesan' => 'ok'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}
if ($pg == 'simpanortu') {

    $data = [
        'nik_ayah'            => $_POST['nikayah'],
        'nama_ayah'           => mysqli_escape_string($koneksi, $_POST['namaayah']),
        'tempat_ayah'         => mysqli_escape_string($koneksi, $_POST['tempatayah']),
        'tgl_lahir_ayah'      => $_POST['tglayah'],
        'pendidikan_ayah'     => $_POST['pendidikan_ayah'],
        'pekerjaan_ayah'      => $_POST['pekerjaan_ayah'],
        'penghasilan_ayah'    => $_POST['penghasilan_ayah'],
        'no_hp_ayah'          => $_POST['nohpayah'],
        'nik_ibu'             => $_POST['nikibu'],
        'nama_ibu'            => mysqli_escape_string($koneksi, $_POST['namaibu']),
        'tempat_ibu'          => mysqli_escape_string($koneksi, $_POST['tempatibu']),
        'tgl_lahir_ibu'       => $_POST['tglibu'],
        'pendidikan_ibu'      => $_POST['pendidikan_ibu'],
        'pekerjaan_ibu'       => $_POST['pekerjaan_ibu'],
        'penghasilan_ibu'     => $_POST['penghasilan_ibu'],
        'no_hp_ibu'           => $_POST['nohpibu'],
        'nik_wali'            => $_POST['nikwali'],
        'nama_wali'           => mysqli_escape_string($koneksi, $_POST['namawali']),
        'tempat_wali'         => mysqli_escape_string($koneksi, $_POST['tempatwali']),
        'tgl_lahir_wali'      => $_POST['tglwali'],
        'pendidikan_wali'     => $_POST['pendidikan_wali'],
        'pekerjaan_wali'      => $_POST['pekerjaan_wali'],
        'penghasilan_wali'    => $_POST['penghasilan_wali'],
        'no_hp_wali'          => $_POST['nohpwali'],
    ];

    $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
    if ($exec) {
        $pesan = [
            'pesan' => 'ok'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}
if ($pg == 'simpanberkas') {
    $ektensi = ['jpg', 'png', 'jpeg'];
    if ($_FILES['file-kk']['name'] <> '') {
        $filename = $_FILES['file-kk']['name'];
        $temp = $_FILES['file-kk']['tmp_name'];
        $ext = explode('.', $filename);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'assets/img/berkas/berkas-kk-' . $id . '.' . $ext;
            $upload = move_uploaded_file($temp, '../../' . $dest);
            if ($upload) {
                $data2 = [
                    'file_kk' => $dest
                ];
                $exec = update($koneksi, 'daftar', $data2, ['id_daftar' => $id]);
            } else {
                echo "gagal";
            }
        }
    }
    if ($_FILES['file-ktp']['name'] <> '') {
        $filename = $_FILES['file-ktp']['name'];
        $temp = $_FILES['file-ktp']['tmp_name'];
        $ext = explode('.', $filename);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'assets/img/berkas/berkas-ktp-' . $id . '.' . $ext;
            $upload = move_uploaded_file($temp, '../../' . $dest);
            if ($upload) {
                $data2 = [
                    'file_ktp' => $dest
                ];
                $exec = update($koneksi, 'daftar', $data2, ['id_daftar' => $id]);
            } else {
                echo "gagal";
            }
        }
    }
    if ($_FILES['file-akte']['name'] <> '') {
        $filename = $_FILES['file-akte']['name'];
        $temp = $_FILES['file-akte']['tmp_name'];
        $ext = explode('.', $filename);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'assets/img/berkas/berkas-akte-' . $id . '.' . $ext;
            $upload = move_uploaded_file($temp, '../../' . $dest);
            if ($upload) {
                $data2 = [
                    'file_akte' => $dest
                ];
                $exec = update($koneksi, 'daftar', $data2, ['id_daftar' => $id]);
            } else {
                echo "gagal";
            }
        }
    }
    if ($_FILES['file-kip']['name'] <> '') {
        $filename = $_FILES['file-kip']['name'];
        $temp = $_FILES['file-kip']['tmp_name'];
        $ext = explode('.', $filename);
        $ext = end($ext);
        if (in_array($ext, $ektensi)) {
            $dest = 'assets/img/berkas/berkas-kip-' . $id . '.' . $ext;
            $upload = move_uploaded_file($temp, '../../' . $dest);
            if ($upload) {
                $data2 = [
                    'file_kip' => $dest
                ];
                $exec = update($koneksi, 'daftar', $data2, ['id_daftar' => $id]);
            } else {
                echo "gagal";
            }
        }
    }
    echo "ok";
}

if ($pg == 'get_provinsi') {
    //ambil data json dari file
    $content = file_get_contents("../../assets/wilayah/index.json");

    //mengubah standar encoding
    $content = utf8_encode($content);

    //mengubah data json menjadi data array asosiatif
    $result = json_decode($content, true);
    $siswa = fetch($koneksi, 'daftar', ['id_daftar' => $id]);
    //looping data menggunakan foreach
    if ($siswa['provinsi'] == "" or $siswa['provinsi'] == NULL) {
        echo "<option value='' selected>Pilih Provinsi</option>";
    } else {
        echo "<option value='$siswa[provinsi]' selected>$siswa[provinsi]</option>";
    }
    foreach ($result as $value) {
        echo "
        <option value='$value[code]:$value[name]'>$value[name]</option>
        ";
    }
}
if ($pg == 'get_provinsi2') {
    $content = file_get_contents("../../wilayah/index.json");
    $content = utf8_encode($content);
    $result = json_decode($content, true);
    $data = array();
    foreach ($result as $value) {
        $data[] = array("id" => $value['code'] . "-" . $value['name'], "text" => $value['name']);
    }
    echo json_encode($data);
}
if ($pg == 'get_kabupaten') {
    $data = $_POST['provinsi'];
    $data = substr($data, 0, 2);
    $provinsi = $data;
    //ambil data json dari file
    $content = file_get_contents("../../assets/wilayah/" . $provinsi . ".json");

    //mengubah standar encoding
    $content = utf8_encode($content);

    //mengubah data json menjadi data array asosiatif
    $result = json_decode($content, true);

    //looping data menggunakan foreach
    echo "<option value=''>Pilih Kab/Kota</option>";
    foreach ($result as $value) {
        if ($value['type'] == "kabupaten") {
            echo "
            <option value='$value[code]:$value[name]'>$value[name]</option>
        ";
        }
    }
}
if ($pg == 'get_kecamatan') {
    $data = $_POST['kabupaten'];
    $provinsi = substr($data, 0, 2);
    $kode = substr($data, 0, 5);
    //ambil data json dari file
    $content = file_get_contents("../../assets/wilayah/" . $provinsi . ".json");

    //mengubah standar encoding
    $content = utf8_encode($content);

    //mengubah data json menjadi data array asosiatif
    $result = json_decode($content, true);

    //looping data menggunakan foreach
    echo "<option value=''>Pilih Kecamatan</option>";
    foreach ($result as $value) {
        if ($value['type'] == "kecamatan" and substr($value['code'], 0, 5) == $kode) {
            echo "
            <option value='$value[code]:$value[name]'>$value[name]</option>
        ";
        }
    }
}
if ($pg == 'get_desa') {
    $data = $_POST['kecamatan'];
    $provinsi = substr($data, 0, 2);
    $kode = substr($data, 0, 8);
    //ambil data json dari file
    $content = file_get_contents("../../assets/wilayah/" . $provinsi . ".json");

    //mengubah standar encoding
    $content = utf8_encode($content);

    //mengubah data json menjadi data array asosiatif
    $result = json_decode($content, true);

    //looping data menggunakan foreach
    echo "<option value=''>Pilih Desa</option>";
    foreach ($result as $value) {
        if ($value['type'] == "desa" and substr($value['code'], 0, 8) == $kode) {
            echo "
            <option value='$value[code]:$value[name]'>$value[name]</option>
        ";
        }
    }
}
