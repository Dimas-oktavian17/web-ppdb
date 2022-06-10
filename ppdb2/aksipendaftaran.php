

<?php

session_start();
error_reporting();
include "config/database.php";
include "config/library.php";
$query = "SELECT * FROM sekolah";

	  


if(isset($_POST['daftar'])) {
    $nik = mysqli_query($koneksi, "SELECT nik FROM daftar where nik='$_POST[no_nik]'");
$ceknik = mysqli_num_rows($nik);
	 if($ceknik < 1){
		$file = "-".date("YmdHis");
		$files = $file.".pdf";
		$tgl_daftar = date("Y-m-d H:i:s");
		$ip = $_SERVER['REMOTE_ADDR'];
		$password = md5('123456');
		$tgllahir = tgl_indo($_POST['tgllahir']);
		$tgllahirayah = tgl_indo($_POST['tgllahirayah']);
		$tgllahiribu = tgl_indo($_POST['tgllahiribu']);
		if($_POST['tgllahirwali']=="") {
			$tgllahirwali = "0000-00-00";
		} else {
			$tgllahirwali = tgl_indo($_POST['tgllahirwali']);
		}
		
		$query = "INSERT INTO daftar SET nama= '".addslashes($_POST['namalengkap'])."',
										sekolah_pilihan = '$_POST[namapanggilan]',
										
										jenkel = '$_POST[jk]',
										golongan_darah = '$_POST[g_darah]',
										tempat_lahir = '$_POST[tempatlahir]',
										
										tgl_lahir = '$tgllahir',
										no_kk = '$_POST[no_kk]',

										nik = '$_POST[no_nik]',
										nik_ayah = '$_POST[no_nik_a]',
										nik_ibu = '$_POST[no_nik_i]',
										
										agama = '$_POST[agama]',
										anak_ke = '$_POST[anakke]',
										saudara = '$_POST[jmlsdr]',
										alamat = '$_POST[alamatlengkap]',
										rt = '$_POST[rt]',
										rw = '$_POST[rw]',
										desa = '$_POST[kelurahan]',
										kecamatan = '$_POST[kecamatan]',
										kota = '$_POST[kabupaten]',
										kode_pos = '$_POST[kodepos]',
										no_hp = '$_POST[nohp]',
										tinggal = '$_POST[tempattinggal]',
										asal_sekolah = '".addslashes($_POST['nm_sekolah'])."',
										no_ijazah = '$_POST[nijazah]',
										nisn = '$_POST[nisn]',
										nama_ayah = '$_POST[namaayah]',
										tempat_ayah = '$_POST[tempatlahirayah]',
										tgl_lahir_ayah = '$tgllahirayah',
										agama_ayah = '$_POST[agama_ayah]',
										alamat_ayah = '$_POST[alamatayah]',
										pekerjaan_ayah = '$_POST[pekerjaanayah]',
										instansi_ayah = '$_POST[instansiayah]',
										jbt_ayah = '$_POST[jbt_ayah]',
										
										penghasilan_ayah = '$_POST[penghasilanayah]',
										status_ayah = '$_POST[pendidikanayah]',
										
										
										no_hp_ayah = '$_POST[nohpayah]',
										
										
										nama_ibu = '$_POST[namaibu]',
										tempat_ibu = '$_POST[tempatlahiribu]',
										tgl_lahir_ibu = '$tgllahiribu',
										agama_ibu = '$_POST[agama_i]',
										alamat_ibu = '$_POST[alamatibu]',
										pekerjaan_ibu = '$_POST[pekerjaanibu]',
										instansi_ibu = '$_POST[instansiibu]',
										penghasilan_ibu = '$_POST[penghasilanibu]',
										status_ibu = '$_POST[pendidikanibu]',
										
										jbt_ibu = '$_POST[jbt_ibu]',
										no_hp_ibu = '$_POST[nohpibu]',
									
										nama_wali = '$_POST[namawali]',
										tempat_wali = '$_POST[tempatlahirwali]',
										tgl_lahir_wali = '$tgllahirwali',
										agama_wali = '$_POST[agama_w]',
										alamat_wali = '$_POST[alamatwali]',
										pekerjaan_wali = '$_POST[pekerjaanwali]',
										instansi_wali = '$_POST[instansiwali]',
										penghasilan_wali = '$_POST[penghasilanwali]',
										pendidikan_wali = '$_POST[pendidikanwali]',
										
										jbt_wali = '$_POST[jbt_wali]',
										no_hp_wali = '$_POST[nohpwali]',
										k_jasmani = '$_POST[k_jasmani]',
										p_derita = '$_POST[p_derita]',
										jarak = '$_POST[j_rumah]',
										jurusan = '$_POST[p_jurusan]',
										status = '1',
										tgl_daftar = '$tgl_daftar',
										password = '$password' 
										";
										
		$input = mysqli_query($koneksi, $query);
		echo $query;
		exit();
	 }}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Penerimaan Siswa Baru</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/css/main.css">

</head>
<body>
	<div class="container">
	    <div class="row">
	        <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
            	<div class="card" style="margin-top: 50px">
                    <div class="card-header" data-background-color="blue">
                    
                        <h4 class="title">SELAMAT PENDAFTARAN ONLINE TELAH BERHASIL</h4>
                        <p class="category">(Kolom bertanda (*) Wajib Diisi)</p>
                    </div>
                    <div class="card-content">

				
				<p>SILAHKAN DOWNLOAD DAN CETAK FORMULIR PENDAFTARAN INI. <br />Setelah download cetak bukti lanjut tahap selannjutnya</p>
				<p><a href="<?php echo $d['alamat_website']; ?>/bukti-pendaftaran/<?php echo $files; ?>" class="btn btn-success" target="_blank">DOWNLOAD CETAK BUKTI PENDAFTARAN</a></p>
				
				<p> Untuk Tahap Selanjutnya silahkan Anda Melakukan Transfer untuk Pembayaran Registrasi sebesar Rp. 100.000,- </p><br>
				<p>Transfer Di Bank BNI </p> <br>
				<p>0822211  A/n </p><br>
					<p>Atau Dapat melakukan pembayaran dengan langsung datang ke sekolah JL.Parangklitik No. 2 Surabaya </p><br>
				
				<p>Silahkan Upload Bukti Pembayaran Registrasi Disini</p>

				<p><a href="<?php echo $d['alamat_website']; ?>/upload_pembayaran.php" class="btn btn-success" target="_blank">Upload Bukti Pembayaran Registrasi</a>
				
				<a href="<?php echo $d['alamat_website']; ?>" class=" btn btn-primary" target="_blank">Kembali Kehalaman Utama</a></p>
 </div>
                </div>
                
            </div>
	    </div>
	</div>

