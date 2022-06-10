<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = 'index.php'</script>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
	$aksi = "modul/mod_pendaftaran/aksi_pendaftaran.php";
?>
	<section class="content-header">
		<div class="row">
			<div class="col-xs-6">
				<span style="font-size:24px;">DATA SEMUA PEMBAYARAN REGISTRASI</span>
			</div>
			<div class="col-xs-2 pull-right"><a href="<?php echo $aksi; ?>?module=pendaftaran&act=export-excel" class="btn btn-block btn-primary"><i class="fa fa-file-excel-o"></i> &nbsp; DOWNLOAD EXCEL</a></div>
		</div>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-xs-12">
			<!-- menampilkan data pendaftaran statis -->
			<div class="box">
				<div class="box-body">
				  <form method="post" action="<?php echo $aksi; ?>?module=pendaftaran&act=ubahstatus">
					<table id="pendaftarandata" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th><input type="checkbox" class="minimal" id="checkAll"></th>
								<th>NO</th>
							
								<th>NIK</th>
								<th>NAMA</th>
								<th>TTL</th>
								<th>NO TELP</th>
								<th>TANGGAL UPLOAD</th>
								<th>STATUS</th>
								<th>AKSI</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$mySql 	= "select * from upload join siswa on siswa.no_nik=upload.nik  group by id_upload";
							$myQry 	= mysqli_query($colok, $mySql);
							$nomor  = 0;
							while($myData = mysqli_fetch_array($myQry)) {
								$nomor++;
							?>
								<tr>
									<td class="text-center"><input type="checkbox" class="minimal" id="cek[]" name="cek[]" value="<?php echo $myData['id_siswa']; ?>" /></td>
									<td><?php echo $nomor; ?></td>
									<td><?php echo $myData['no_nik']; ?></td>
								<td><?php echo $myData['nm_siswa']; ?></td>
									<td><?php echo $myData['tmp_lahir'].", ".tgl_indo($myData['tgl_lahir']); ?></td>
									
									
									<td><?php echo $myData['hp']; ?></td>
									<td><?php echo tgl_indo($myData['tanggal_upload']); ?></td>
									<td><?php echo $myData['status']; ?></td>
									<td class="text-center">
										<a class="btn btn-warning btn-xs" alt="Lihat Data" title="Lihat Data" data-toggle="modal" data-target="#myModal<?php echo $myData['id_siswa']; ?>"><i class="fa fa-search"></i></a> &nbsp;
										<a href="../bukti-pendaftaran/<?php echo $myData['file']; ?>" class="btn btn-success btn-xs" target="_blank" alt="PDF File" title="PDF File"><i class="fa fa-file-pdf-o"></i></a> &nbsp;
										<a class="btn btn-warning btn-xs" href="<?php echo $aksi; ?>?module=pendaftaran&act=hapus&id=<?php echo $myData['id_siswa']; ?>" alt="Hapus Data" title="Hapus Data"><i class="fa fa-times"></i></a>
									</td>
								</tr>
<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $myData['id_siswa']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $myData['id_siswa']; ?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel<?php echo $myData['id_siswa']; ?>">Detail Data</h4>
			</div> <!-- /.modal-header -->
			<div class="modal-body">
				<h3 class="page-header">A. DATA SISWA</h3>
				<dl class="dl-horizontal">
					<dt>ID Pendaftaran</dt> <dd><?php echo $myData['id_siswa']; ?></dd>
					<dt>Nama Lengkap</dt> <dd><?php echo $myData['nm_siswa']; ?></dd>
					<dt>Unit Lembaga Pilihan</dt> <dd><?php echo $myData['nm_p_siswa']; ?></dd>
					<dt>Ikut Program Ponpes</dt> <dd><?php if($myData['stat_mondok']=="Mondok") echo "Saya mau mondok"; else echo "Saya sekolah saja"; ?></dd>
					<dt>Jenis Kelamin</dt> <dd><?php if($myData['jk']=="L") echo "Laki-laki"; else echo "Perempuan"; ?></dd>
					<dt>Tempat, Tanggal Lahir</dt> <dd><?php echo $myData['tmp_lahir'].", ".tgl_indo($myData['tgl_lahir']); ?></dd>
					<dt>Agama</dt> <dd><?php echo $myData['nm_agama']; ?></dd>
					<dt>Anak ke</dt> <dd><?php echo $myData['anak_ke']."  dari  ".$myData['jml_sdr']."  Bersaudara"; ?></dd>
					<dt>Alamat</dt> <dd><?php echo $myData['alamat']." RT: ".$myData['rt']." RW: ".$myData['rw'].", ".$myData['kelurahan'].", ".$myData['kecamatan'].", ".$myData['kabupaten'].". <br />Kodepos ".$myData['kodepos']; ?></dd>
					<dt>No. Telp/HP</dt> <dd><?php echo $myData['hp']; ?></dd>
					<dt>Tempat Tinggal</dt> <dd><?php echo $myData['tmp_tinggal']; ?></dd>
				</dl>

				<h3 class="page-header">Data Pembayaran Registrasi </h3>
				<dl class="dl-horizontal">
					<dt>Tanggal Pembayaran registrasi</dt> <dd><?php echo $myData['tanggal_upload']; ?></dd>
					<dt>Foto Bukti Pembayaran</dt> <dd><img src="../upload/<?php echo $myData['upload_registrasi']; ?>"width='relative' height='250'/></dd>
					<dt>NIK</dt> <dd><?php echo $myData['no_nik']; ?></dd>
				</dl>


			</div> <!-- /.modal-body -->
			<div class="modal-footer">
			<button onclick="window.location.href='https://api.whatsapp.com/send?phone=62<?php echo $myData['hp']; ?>&text=Hai%20Saudara%2Fi%20 <?php echo $myData['nm_siswa']; ?>0A%0ATerima%20Kasih%20Anda%20telah%20melakukan%20pembayaran%20registrasi%20PPDB%20SMK%20KAWUNG%201%20SURABAYA%0A%0ASILAHKAN%20ANDA%20LOGIN%20KE%20htt%0Alalu%20masukkan%20%3A%0Anik%0Apassword%20%3A%20123456%20%0A%0ASetelah%20login%20anda%20upload%20beberapa%20berkas%20untuk%20validasi%20data%20pendaftar%20dan%20melengkapi%20pembayaran%20penuh.%0A%0Auntuk%20info%20lebih%20lanjut%20silahkan%20hubungi%20kami%0AJunaidi%2008993383017%0AWildan%20%20082232905071'" type="button" class="btn btn-primary" data-dismiss="modal">Konfirmasi</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div> <!-- /.modal-footer -->
		</div> <!-- /.modal-content -->
	</div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
							<?php
							}
							?>
						</tbody>
					</table>
				</div> <!-- .box-body -->
				<div class="box-footer">
					<div class="col-sm-3">
						<select name="statuspendaftaran" id="statuspendaftaran" class="form-control">
							<option>-- Pilih Hasil Akhir --</option>
							<option value="DITERIMA">DITERIMA</option>
							<option value="CADANGAN">CADANGAN</option>
							<option value="DITOLAK">DITOLAK</option>
						</select>
					</div> <!-- /.col-sm-3 -->
					<div class="col-sm-1">
						<input name="applystatuspendaftaran" id="applystatuspendaftaran" type="submit" class="btn btn-primary" value="APPLY" />
					</div> <!-- /.col-sm-1 -->
				</div> <!-- /.box-footer -->
			  </form>
			</div> <!-- .box -->
		</div> <!-- col-xs-12 -->
		</div> <!-- row -->
	</section> <!-- content -->
<?php
}
?>
