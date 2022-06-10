

<?php

session_start();
error_reporting();
include "config/colokan.php";
include "config/library.php";
$query = "SELECT * FROM sekolah";
$hasil = mysqli_query($colok, $query);
$d     = mysqli_fetch_array($hasil);

if(isset($_POST['simpan'])) {
	    
		$file = "-".date("YmdHis");
		$files = $file.".pdf";
		$tgl_upload = date("Y-m-d H:i:s");
		$ip = $_SERVER['REMOTE_ADDR'];
		$tgllahir = $_POST['ttl'];
	
        $nama_file = $_FILES['gambar']['name'];
        $ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

$path = "upload/".$nama_file;
if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
  // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
  if($ukuran_file <= 1000000000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
    // Proses upload
    if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
      // Jika gambar berhasil diupload, Lakukan :  

		
		$query = "INSERT INTO upload SET 
											nik = '$_POST[nik]',	
												no_wa =	'$_POST[wa]',					
										tanggal_upload = '$tgl_upload',
                                        ttl = '$tgllahir',	
										ip = '$ip',
                                        upload_registrasi = '$nama_file',
                                        file_bayar = '$files'";
                                        
        $input = mysqli_query($colok, $query);
    }}}}    
		if($input) {

define('FPDF_FONTPATH', 'fpdf/font/');
require('fpdf/fpdf.php');

$qsekolah = mysqli_query($colok,"SELECT * FROM sekolah where id_sekolah=1");
$qsiswa = mysqli_query($colok,"select * from upload join siswa on siswa.no_nik=upload.nik where siswa.no_nik ='$_POST[nik]' group by id_upload");

$s=mysqli_fetch_array($qsekolah);
$r=mysqli_fetch_array($qsiswa);

$lahir   = tgl_indo($r['ttl']);


$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
//ambil Gambar logo dan judul
$pdf->Image("images/$s[logo]", 10, 12, 15);
//Judul Laporan PDF
$pdf->SetFont('Arial','B','12');
$pdf->Cell(20,6,'',0,0,'L');
$pdf->Cell(145,6,'BUKTI PEMBAYARAN REGISTRASI',0,1,'L');
$pdf->Cell(20,6,'',0,0,'L');
$pdf->Cell(145,6,'PENERIMAAN PESERTA DIDIK BARU TAHUN AJARAN 2021/2022',0,1,'L');
$pdf->Cell(20,6,'',0,0,'L');
$pdf->Cell(145,6,$s['nama_sekolah'],0,1,'L');



$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'Terima kasih anda Telah Melakukan Upload Bukti Pembayaran Registrasi ',0,1,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,6,'1. NIK',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nik'],0,1,'L');

$pdf->Cell(60,6,'2. Nomor Whatsapp',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['no_wa'],0,1,'L');

$pdf->Cell(60,6,'3. Tanggal Lahir',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['ttl'],0,1,'L');

$pdf->Cell(60,6,'4. Tanggal Upload bukti Pembayaran',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$tgl_upload,0,1,'L');

$pdf->Cell(4,6,'5. Bukti Pembayaran :',0,0,'L');
$pdf->Image('upload/' . $nama_file,10,68,80);


$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$pdf->Cell(130);
$pdf->Cell(60,6,$s['kabupaten'].', '.$tgl_upload,0,1,'C');
$pdf->Cell(130);
$pdf->Cell(60,6,'PPDB',0,1,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(130);
$pdf->Cell(60,6,'(.....................................)',0,1,'C');

$pdf->Output('upload/'.$files,'F');
        }
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
                     <form method="post" action="<?php echo $d['alamat_website']; ?>/aksiform.php" class="form-horizontal">
                        <h4 class="title">TERIMA KASIH ANDA TELAH MELAKUKAN UPLOAD BUKTI PEMBAYARAN REGISTRASI</h4>
                        <p class="category">(Kolom bertanda (*) Wajib Diisi)</p>
                    </div>
                    <div class="card-content">

				
				<p>SILAHKAN DOWNLOAD DAN CETAK BUKTI UPLOAD PEMBAYARAN REGISTRASI. </p>
				<p><a href="<?php echo $d['alamat_website']; ?>/upload/<?php echo $files; ?>" class="btn btn-success" target="_blank">DOWNLOAD CETAK BUKTI UPLOAD PEMBAYARAN</a></p>
                	<p>Langkah Selanjutnya tunggu konfirmasi dari Admin melalui No Whatsapp yang telah dimasukkan maksimal 2 hari Kerja Pastikan No Whatsapp anda aktif  </p>
                    <p><a href="<?php echo $d['alamat_website']; ?>" class=" btn btn-primary" target="_blank">Kembali Kehalaman Utama</a></p>
 </div>
                </div>
                
            </div>
	    </div>
	</div>

