<?php
require("../../config/excel_reader.php");
require("../../config/database.php");
require("../../config/function.php");
require("../../config/function_sekolah.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $data = [
        'nama_sekolah' => $_POST['nama'],
        'alamat' => $_POST['alamat'],
        'status' => $status
    ];
    $npsn = $_POST['npsn'];
    $exec = update($koneksi, 'sekolahpilihan', $data, ['npsn' => $npsn]);
    echo $exec;
}
if ($pg == 'tambah') {
    $data = [
        'npsn'          => $_POST['npsn'],
        'nama_sekolah'   => $_POST['nama'],
        'alamat'         => $_POST['alamat'],
        'status'         => 1
    ];
    $exec = insert($koneksi, 'sekolahpilihan', $data);
    echo $exec;
}
if ($pg == 'grab_sekolah') {
    $sekolah = $_POST['sekolah'];
    $kecamatan = explode(':', $_POST['kecamatan']);
    $kabupaten = explode(':', $_POST['kabupaten']);
    $provinsi = explode(':', $_POST['provinsi']);
    foreach ($sekolah as $sekolah) {
        $data = explode(":", $sekolah);
        $npsn = $data[0];
        $nama = $data[1];
        $data = [
            'npsn'          => $npsn,
            'nama_sekolah'   => $nama,
            'status'         => 1,
            'kecamatan'     => $kecamatan[1],
            'kabupaten'     => $kabupaten[1],
            'provinsi'     => $provinsi[1]
        ];

        $cek = rowcount($koneksi, 'sekolahpilihan', ['npsn' => $npsn]);
        if ($cek == 0) {
            $exec = insert($koneksi, 'sekolahpilihan', $data);
        }
    }
}
if ($pg == 'hapus') {
    $npsn = $_POST['npsn'];
    delete($koneksi, 'sekolahpilihan', ['npsn' => $npsn]);
}
if ($pg == 'import') {
    if (isset($_FILES['file']['name'])) {
        $file = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $ext = explode('.', $file);
        $ext = end($ext);
        if ($ext <> 'xls') {
            echo "harap pilih file excel .xls";
        } else {
            $data = new Spreadsheet_Excel_Reader($temp);
            $hasildata = $data->rowcount($sheet_index = 0);
            $sukses = $gagal = 0;

            mysqli_query($koneksi, "truncate sekolahpilihan");
            for ($i = 2; $i <= $hasildata; $i++) {
                $npsn = $data->val($i, 2);
                $sekolah = addslashes($data->val($i, 3));
                $alamat = addslashes($data->val($i, 4));

                if ($sekolah <> "") {
                    $datax = [
                        'npsn' => $npsn,
                        'nama_sekolah' => $sekolah,
                        'alamat' => $alamat,
                        'status'         => 1
                    ];
                    $exec = insert($koneksi, 'sekolahpilihan', $datax);
                    ($exec) ? $sukses++ : $gagal++;
                }
            }
            $total = $hasildata - 1;
            echo "Berhasil: $sukses | Gagal: $gagal | Dari: $total";
        }
    } else {
        echo "gagal";
    }
}
if ($pg == 'get_provinsi') {
    $getData = new GetData;
    $url = "https://referensi.data.kemdikbud.go.id/index11.php";
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true]);
    $get = curl_exec($ch);
    $listProvinsi = $getData->listProvinsi($get);
    curl_close($ch);

    echo "<option value=''>Pilih Provinsi</option>";
    foreach ($listProvinsi as $prov) {
        echo "<option value='$prov[link]:$prov[prov_name]'>$prov[prov_name]</option>";
    }
    unset($getData);
}
if ($pg == 'get_kabupaten') {
    $provinsi = $_POST['provinsi'];
    $getData = new GetData;
    $url = "https://referensi.data.kemdikbud.go.id/" . $provinsi;
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true]);
    $get = curl_exec($ch);
    $listKabupaten = $getData->listKabupaten($get);
    curl_close($ch);
    print_r($listKabupaten);
    echo "<option value=''>Pilih Kabupaten</option>";
    foreach ($listKabupaten as $kab) {
        echo "<option value='$kab[link]:$kab[kab_name]'>$kab[kab_name]</option>";
    }
    unset($getData);
}
if ($pg == 'get_kecamatan') {

    $data = explode(':', $_POST['kabupaten']);
    $kabupaten = $data[0];
    $getData = new GetData;
    $url = "https://referensi.data.kemdikbud.go.id/" . $kabupaten;
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true]);
    $get = curl_exec($ch);
    $listKecamatan = $getData->listKecamatan($get);
    curl_close($ch);
    print_r($listKecamatan);
    echo "<option value=''>Pilih Kecamatan</option>";
    foreach ($listKecamatan as $kec) {
        echo "<option value='$kec[link]:$kec[kec_name]'>$kec[kec_name]</option>";
    }
    unset($getData);
}
if ($pg == 'get_sekolah') {
    $data = explode(':', $_POST['kec']);
    $kec = $data[0];
    $getData = new GetData;
    $url = "https://referensi.data.kemdikbud.go.id/" . $kec . "&level=3";
    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true]);
    $get = curl_exec($ch);
    $listNpsn = $getData->listNpsn($get);
    curl_close($ch);
    echo "
    <button type='submit' class='btn btn-primary float-right'>Ambil Data</button>
    <div class='form-check form-check-inline'>
    <label class='form-check-label'>
    
            <input class='form-check-input' type='checkbox'  id='checkAll'>Pilih Semua Sekolah

    </label>
    </div><br>";
    foreach ($listNpsn as $sekolah) {
        echo "
        <div class='form-check form-check-inline'>
        <label class='form-check-label'>
        
                <input class='form-check-input' type='checkbox' name='sekolah[]'  value='$sekolah[npsn]:$sekolah[nama_sekolah]'>$sekolah[npsn] - $sekolah[nama_sekolah]

        </label>
        </div><br>";
    }
    echo "<script>
    $('#checkAll').click(function() {
        $('input:checkbox').prop('checked', this.checked);
    });
    </script>";
    unset($getData);
}
