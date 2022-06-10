

<?php

session_start();
error_reporting();
include "config/colokan.php";
include "config/library.php";
$query = "SELECT * FROM sekolah";
$hasil = mysqli_query($colok, $query);
$d     = mysqli_fetch_array($hasil);
	  
$query1 = "SELECT * FROM siswa order by no_nik ";
$hasil1 = mysqli_query($colok, $query1);
$m     = mysqli_fetch_array($hasil1);

if(isset($_POST['daftar'])) {
	 if($_POST['no_nik'] != $m['no_nik'] ){
		$file = "-".date("YmdHis");
		$files = $file.".pdf";
		$tgl_daftar = date("Y-m-d H:i:s");
		$ip = $_SERVER['REMOTE_ADDR'];
		$password = md5('123456');
		$tgllahir = $_POST['tgllahir'];
		$tgllahirayah = $_POST['tgllahirayah'];
		$tgllahiribu = $_POST['tgllahiribu'];
		if($_POST['tgllahirwali']=="") {
			$tgllahirwali = "0000-00-00";
		} else {
			$tgllahirwali = tgl_inggris($_POST['tgllahirwali']);
		}
		
		$query = "INSERT INTO siswa SET nm_siswa = '".addslashes($_POST['namalengkap'])."',
										nm_p_siswa = '$_POST[namapanggilan]',
										
										jk = '$_POST[jk]',
										g_darah = '$_POST[g_darah]',
										tmp_lahir = '$_POST[tempatlahir]',
										
										tgl_lahir = '$tgllahir',
										no_kk = '$_POST[no_kk]',

										no_nik = '$_POST[no_nik]',
										no_nik_a = '$_POST[no_nik_a]',
										no_nik_i = '$_POST[no_nik_i]',
										
										agama = '$_POST[agama]',
										anak_ke = '$_POST[anakke]',
										jml_sdr = '$_POST[jmlsdr]',
										alamat = '$_POST[alamatlengkap]',
										rt = '$_POST[rt]',
										rw = '$_POST[rw]',
										kelurahan = '$_POST[kelurahan]',
										kecamatan = '$_POST[kecamatan]',
										kabupaten = '$_POST[kabupaten]',
										kodepos = '$_POST[kodepos]',
										hp = '$_POST[nohp]',
										tmp_tinggal = '$_POST[tempattinggal]',
										nm_sekolah = '".addslashes($_POST['nm_sekolah'])."',
										nijazah = '$_POST[nijazah]',
										alamat_sekolah = '$_POST[alamat_sekolah]',
										nisn = '$_POST[nisn]',
										nm_ayah = '$_POST[namaayah]',
										tmp_lahir_ayah = '$_POST[tempatlahirayah]',
										tgl_lahir_ayah = '$tgllahirayah',
										agama_a = '$_POST[agama_a]',
										alamat_ayah = '$_POST[alamatayah]',
										pekerjaan_ayah = '$_POST[pekerjaanayah]',
										instansi_ayah = '$_POST[instansiayah]',
										jbt_ayah = '$_POST[jbt_ayah]',
										
										penghasilan_ayah = '$_POST[penghasilanayah]',
										pendidikan_ayah = '$_POST[pendidikanayah]',
										
										
										hp_ayah = '$_POST[nohpayah]',
										
										
										nm_ibu = '$_POST[namaibu]',
										tmp_lahir_ibu = '$_POST[tempatlahiribu]',
										tgl_lahir_ibu = '$tgllahiribu',
										agama_i = '$_POST[agama_i]',
										alamat_ibu = '$_POST[alamatibu]',
										pekerjaan_ibu = '$_POST[pekerjaanibu]',
										instansi_ibu = '$_POST[instansiibu]',
										penghasilan_ibu = '$_POST[penghasilanibu]',
										pendidikan_ibu = '$_POST[pendidikanibu]',
										
										jbt_ibu = '$_POST[jbt_ibu]',
										hp_ibu = '$_POST[nohpibu]',
									
										nm_wali = '$_POST[namawali]',
										tmp_lahir_wali = '$_POST[tempatlahirwali]',
										tgl_lahir_wali = '$tgllahirwali',
										agama_w = '$_POST[agama_w]',
										alamat_wali = '$_POST[alamatwali]',
										pekerjaan_wali = '$_POST[pekerjaanwali]',
										instansi_wali = '$_POST[instansiwali]',
										penghasilan_wali = '$_POST[penghasilanwali]',
										pendidikan_wali = '$_POST[pendidikanwali]',
										
										jbt_wali = '$_POST[jbt_wali]',
										hp_wali = '$_POST[nohpwali]',
										email_wali = '$_POST[emailwali]',
										k_jasmani = '$_POST[k_jasmani]',
										p_derita = '$_POST[p_derita]',
										j_rumah = '$_POST[j_rumah]',
										p_jurusan = '$_POST[p_jurusan]',
										status = 'DAFTAR',
										tgl_daftar = '$tgl_daftar',
										ip = '$ip', password = '$password', 
										file = '$files'";
										
		$input = mysqli_query($colok, $query);
		if($input) {

define('FPDF_FONTPATH', 'fpdf/font/');
require('fpdf/fpdf.php');

$qsekolah = mysqli_query($colok,"SELECT * FROM sekolah where id_sekolah=1");
$qsiswa = mysqli_query($colok,"SELECT * FROM siswa, agama WHERE siswa.agama=agama.id_agama and siswa.file='$files'");

$s=mysqli_fetch_array($qsekolah);
$r=mysqli_fetch_array($qsiswa);

$lahir   = tgl_indo($r['tgl_lahir']);
$tgl_lahir_ayah   = tgl_indo($r['tgl_lahir_ayah']);
$tgl_lahir_ibu    = tgl_indo($r['tgl_lahir_ibu']);
$tgl_lahir_wali   = tgl_indo($r['tgl_lahir_wali']);

$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
//ambil Gambar logo dan judul
$pdf->Image("images/$s[logo]", 10, 12, 15);
//Judul Laporan PDF
$pdf->SetFont('Arial','B','12');
$pdf->Cell(20,6,'',0,0,'L');
$pdf->Cell(145,6,'FORMULIR PENDAFTARAN ONLINE',0,1,'L');
$pdf->Cell(20,6,'',0,0,'L');
$pdf->Cell(145,6,'PENERIMAAN PESERTA DIDIK BARU TAHUN '.$s['tahun_ajaran'],0,1,'L');
$pdf->Cell(20,6,'',0,0,'L');
$pdf->Cell(145,6,$s['nama_sekolah'],0,1,'L');

$pdf->Ln(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(35,8,'No Pendaftaran',1,0,'L');
$pdf->Cell(50,8,'',1,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(70,8,'Diisi oleh Panitia',0,1,'L');

$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'A.   DATA SISWA',0,1,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,6,'1.   Nama Lengkap',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nm_siswa'],0,1,'L');

$pdf->Cell(60,6,'2.   Unit Sekolah Pilihan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nm_p_siswa'],0,1,'L');

// $pdf->Cell(60,6,'3.   Ikut Program Ponpes',0,0,'L');
// $pdf->Cell(4,6,':',0,0,'L');
// // if($r['stat_mondok']=="Mondok") $stat_mondok="Saya mau mondok"; elseif($r['stat_mondok']=="Tidak Mondok") $stat_mondok="Saya sekolah saja";
// // $pdf->Cell(100,6,[$stat_mondok],0,1,'L');

$pdf->Cell(60,6,'3.   Jenis Kelamin',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
if($r['jk']=="L") $jk="Laki-laki"; elseif($r['jk']=="P") $jk="Perempuan";
$pdf->Cell(100,6,$jk,0,1,'L');

$pdf->Cell(60,6,'4.   Tempat, Tanggal Lahir',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['tmp_lahir'].', '.$lahir ,0,1,'L');

$pdf->Cell(60,6,'5.   No Kartu keluarga',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['no_kk'] ,0,1,'L');

$pdf->Cell(60,6,'6.  Nomer NIK',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['no_nik'] ,0,1,'L');


$pdf->Cell(60,6,'7.   Alamat',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['alamat'].'  RT : '.$r['rt'].'  /  RW : '.$r['rw'],0,1,'L');

$pdf->Cell(60,6,'     a.   Kelurahan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['kelurahan'],0,1,'L');

$pdf->Cell(60,6,'     b.   Kecamatan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['kecamatan'],0,1,'L');

$pdf->Cell(60,6,'     c.   Kabupaten / Kota',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['kabupaten'],0,1,'L');

$pdf->Cell(60,6,'     d.   Kode POS',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['kodepos'],0,1,'L');

$pdf->Cell(60,6,'8.   Agama',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nm_agama'],0,1,'L');

$pdf->Cell(60,6,'9.   Anak ke',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['anak_ke'].'  dari  '.$r['jml_sdr'].'  Bersaudara',0,1,'L');

$pdf->Cell(60,6,'10.   golongan darah',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['g_darah'],0,1,'L');


$pdf->Cell(60,6,'11.   penyakit yang pernah diderita',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['p_derita'],0,1,'L');

$pdf->Cell(60,6,'12.   kelainan jasmani',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['k_jasmani'],0,1,'L');

$pdf->Cell(60,6,'13.   jarak rumah ke sekolah',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
// $pdf->Cell(100,6,$r['j_jarak'],0,1,'L');
if($r['j_rumah']=="1") $j_rumah="<1 KM"; elseif($r['j_rumah']=="5") $j_rumah="1-5 KM"; 
elseif($r['j_rumah']=="10") $j_rumah="5-10 KM";elseif($r['j_rumah']=="15") $j_rumah=">10 KM";
$pdf->Cell(100,6,$j_rumah,0,1,'L');

$pdf->Cell(60,6,'14.   No. Telp/HP',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['hp'],0,1,'L');

$pdf->Cell(60,6,'15.   Bertempat tinggal dengan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['tmp_tinggal'],0,1,'L');

$pdf->Cell(60,6,'16.   pilihan jurusan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
if($r['p_jurusan']=="o") $p_jurusan="Otomatisasi dan Tata Kelola Perkantoran (OTKP)"; 
elseif($r['p_jurusan']=="a") $p_jurusan="Akuntansi dan Keuangan Lembaga(akl)"; 
elseif($r['p_jurusan']=="r") $p_jurusan="Rekayasa Perangkat Lunak (RPL)";
$pdf->Cell(100,6,$p_jurusan,0,1,'L');



$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'B.   RIWAYAT PENDIDIKAN SISWA',0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(60,6,'1.   Masuk Menjadi Siswa Baru',0,1,'L');

$pdf->Cell(60,6,'     a.   Nama Sekolah Asal',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nm_sekolah'],0,1,'L');

$pdf->Cell(60,6,'     b.   Nomor Ijazah',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nijazah'],0,1,'L');

$pdf->Cell(60,6,'     c.   Nisn',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nisn'],0,1,'L');

$pdf->Cell(60,6,'     c.   Jumlah nilai',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['alamat_sekolah'],0,1,'L');

//--- DATA AYAH -------
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'DATA PRIBADI ORANG TUA SISWA',0,1,'L');
$pdf->Cell(70,6,'A.   AYAH',0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(60,6,'1.   Nama',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nm_ayah'],0,1,'L');


$pdf->SetFont('Arial','',10);
$pdf->Cell(60,6,'2.   NIK',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['no_nik_a'],0,1,'L');

$pdf->Cell(60,6,'2.   Tempat, Tanggal Lahir',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['tmp_lahir_ayah'].', '.$tgl_lahir_ayah,0,1,'L');

$pdf->Cell(60,6,'3.   Alamat',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['alamat_ayah'],0,1,'L');

$pdf->Cell(60,6,'4.   Agama',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nm_agama'],0,1,'L');

$pdf->Cell(60,6,'5.   Pekerjaan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$qp_ayah = mysqli_query($colok, "SELECT nm_pekerjaan FROM pekerjaan WHERE id_pekerjaan=$r[pekerjaan_ayah]");
$qpa = mysqli_fetch_array($qp_ayah);
$pdf->Cell(100,6,$qpa['nm_pekerjaan'],0,1,'L');

$pdf->Cell(60,6,'6.   Instansi',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['instansi_ayah'],0,1,'L');

$pdf->Cell(60,6,'7.   jabatan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['jbt_ayah'],0,1,'L');


$pdf->Cell(60,6,'8.   Penghasilan/bulan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,'Rp. '.rupiah($r['penghasilan_ayah']).',-',0,1,'L');

$pdf->Cell(60,6,'9.   Pendidikan Terakhir',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$qpd_ayah = mysqli_query($colok, "SELECT nm_pendidikan FROM pendidikan WHERE id_pendidikan=$r[pendidikan_ayah]");
$qpda = mysqli_fetch_array($qpd_ayah);
$pdf->Cell(100,6,$qpda['nm_pendidikan'],0,1,'L');

// $pdf->Cell(60,6,'8.   Pengalaman Berorganisasi',0,0,'L');
// $pdf->Cell(4,6,':',0,0,'L');
// if($r['org_ayah']=="" or $r['org_ayah']=="-") {
// 	$org = $r['org_ayah'];
// } else {
// 	$org = $r['org_ayah']."       Jabatan : ".$r['jbt_ayah'];
// }
// $pdf->Cell(100,6,$org,0,1,'L');

$pdf->Cell(60,6,'10.   No. Telp/HP',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['hp_ayah'],0,1,'L');

// $pdf->Cell(60,6,'11. Email',0,0,'L');
// $pdf->Cell(4,6,':',0,0,'L');
// $pdf->Cell(100,6,$r['email_ayah'],0,1,'L');

//--- DATA IBU -------
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'B.   IBU',0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(60,6,'1.   Nama',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nm_ibu'],0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(60,6,'2.   NIK',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['no_nik_i'],0,1,'L');

$pdf->Cell(60,6,'2.   Tempat, Tanggal Lahir',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['tmp_lahir_ibu'].', '.$tgl_lahir_ibu,0,1,'L');

$pdf->Cell(60,6,'3.   Agama',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nm_agama'],0,1,'L');

$pdf->Cell(60,6,'4.   Alamat',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['alamat_ibu'],0,1,'L');

$pdf->Cell(60,6,'5.   Pekerjaan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$qp_ibu = mysqli_query($colok, "SELECT nm_pekerjaan FROM pekerjaan WHERE id_pekerjaan=$r[pekerjaan_ibu]");
$qpi = mysqli_fetch_array($qp_ibu);
$pdf->Cell(100,6,$qpi['nm_pekerjaan'],0,1,'L');

$pdf->Cell(60,6,'6.   Instansi',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['instansi_ibu'],0,1,'L');

$pdf->Cell(60,6,'7.   jabatan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['jbt_ibu'],0,1,'L');


$pdf->Cell(60,6,'8.   Penghasilan/bulan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,'Rp. '.rupiah($r['penghasilan_ibu']).',-',0,1,'L');

$pdf->Cell(60,6,'9.   Pendidikan Terakhir',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$qpd_ibu = mysqli_query($colok, "SELECT nm_pendidikan FROM pendidikan WHERE id_pendidikan=$r[pendidikan_ibu]");
$qpdi = mysqli_fetch_array($qpd_ibu);
$pdf->Cell(100,6,$qpdi['nm_pendidikan'],0,1,'L');

// $pdf->Cell(60,6,'8.   Pengalaman Berorganisasi',0,0,'L');
// $pdf->Cell(4,6,':',0,0,'L');
// if($r['org_ibu']=="" or $r['org_ibu']=="-") {
// 	$org = $r['org_ibu'];
// } else {
// 	$org = $r['org_ibu']."       Jabatan : ".$r['jbt_ibu'];
// }
// $pdf->Cell(100,6,$org,0,1,'L');

$pdf->Cell(60,6,'10.   No. Telp/HP',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['hp_ibu'],0,1,'L');

// $pdf->Cell(60,6,'11. Email',0,0,'L');
// $pdf->Cell(4,6,':',0,0,'L');
// $pdf->Cell(100,6,$r['email_ibu'],0,1,'L');

//--- DATA WALI -------
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(70,6,'C.   WALI',0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(60,6,'1.   Nama',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nm_wali'],0,1,'L');

$pdf->Cell(60,6,'2.   Tempat, Tanggal Lahir',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['tmp_lahir_wali'].', '.$tgl_lahir_wali,0,1,'L');

$pdf->Cell(60,6,'3.   agama',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['nm_agama'],0,1,'L');

$pdf->Cell(60,6,'4.   Alamat',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['alamat_wali'],0,1,'L');

$pdf->Cell(60,6,'5.   Pekerjaan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$qp_wali = mysqli_query($colok, "SELECT nm_pekerjaan FROM pekerjaan WHERE id_pekerjaan=$r[pekerjaan_wali]");
$qpa = mysqli_fetch_array($qp_wali);
$pdf->Cell(100,6,$qpa['nm_pekerjaan'],0,1,'L');

$pdf->Cell(60,6,'6.   Instansi',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['instansi_wali'],0,1,'L');

$pdf->Cell(60,6,'7.   jabatan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['jbt_ibu'],0,1,'L');

$pdf->Cell(60,6,'8.   Penghasilan/bulan',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,'Rp. '.rupiah($r['penghasilan_wali']).',-',0,1,'L');

$pdf->Cell(60,6,'9.   Pendidikan Terakhir',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$qpd_wali = mysqli_query($colok, "SELECT nm_pendidikan FROM pendidikan WHERE id_pendidikan=$r[pendidikan_wali]");
$qpda = mysqli_fetch_array($qpd_wali);
$pdf->Cell(100,6,$qpda['nm_pendidikan'],0,1,'L');

// $pdf->Cell(60,6,'.   Pengalaman Berorganisasi',0,0,'L');
// $pdf->Cell(4,6,':',0,0,'L');
// if($r['org_wali']=="" or $r['org_wali']=="-") {
// 	$org = $r['org_wali'];
// } else {
// 	$org = $r['org_wali']."       Jabatan : ".$r['jbt_wali'];
// }
// $pdf->Cell(100,6,$org,0,1,'L');

$pdf->Cell(60,6,'10.   No. Telp/HP',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['hp_wali'],0,1,'L');

$pdf->Cell(60,6,'11. Email',0,0,'L');
$pdf->Cell(4,6,':',0,0,'L');
$pdf->Cell(100,6,$r['email_wali'],0,1,'L');

$tgl_daftar = tgl_indo($r['tgl_daftar']);
$pdf->Ln();
$pdf->Cell(130);
$pdf->Cell(60,6,$s['kabupaten'].', '.$tgl_daftar,0,1,'C');
$pdf->Cell(130);
$pdf->Cell(60,6,'Orang Tua/Wali',0,1,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(130);
$pdf->Cell(60,6,'(.....................................)',0,1,'C');

$pdf->Output('bukti-pendaftaran/'.$files,'F');
		}
		
		}else{

			
			echo "<script>alert('Mohon maaf NIK yang anda masukkan telah terdaftar di Sistem Penerimaan Peserta Didik Baru SMK KAWUNG 1 SURABAYA ');window.location='form.php'</script>";
		}
	
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
                    
                        <h4 class="title">SELAMAT PENDAFTARAN ONLINE TELAH BERHASIL</h4>
                        <p class="category">(Kolom bertanda (*) Wajib Diisi)</p>
                    </div>
                    <div class="card-content">

				
				<p>SILAHKAN DOWNLOAD DAN CETAK FORMULIR PENDAFTARAN INI. <br />Setelah download cetak bukti lanjut tahap selannjutnya</p>
				<p><a href="<?php echo $d['alamat_website']; ?>/bukti-pendaftaran/<?php echo $files; ?>" class="btn btn-success" target="_blank">DOWNLOAD CETAK BUKTI PENDAFTARAN</a></p>
				
				<p> Untuk Tahap Selanjutnya silahkan Anda Melakukan Transfer untuk Pembayaran Registrasi sebesar Rp. 100.000,- </p><br>
				<p>Transfer Di Bank BNI </p> <br>
				<p>0822211  A/n </p><br>
				<p>Silahkan Upload Bukti Pembayaran Registrasi Disini</p>

				<p><a href="<?php echo $d['alamat_website']; ?>/upload_pembayaran.php" class="btn btn-success" target="_blank">Upload Bukti Pembayaran Registrasi</a>
				
				<a href="<?php echo $d['alamat_website']; ?>" class=" btn btn-primary" target="_blank">Kembali Kehalaman Utama</a></p>
 </div>
                </div>
                
            </div>
	    </div>
	</div>

