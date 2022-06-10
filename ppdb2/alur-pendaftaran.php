<?php

session_start();
error_reporting();
include "config/colokan.php";
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.9.3, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta name="description" content="Website Builder Description">
  <title>UPLOAD BUKTI PEMBAYARAN</title>
  <!-- favicon -->
    <link rel="shortcut icon" href="./asset/Ilustrasi-Icon/logo/kawung-logo.png" type="image/x-icon">
 	<!-- Bootstrap,Aos,Animate.css,ionic-icons-->\
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"
		/>
		  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
		  <link rel="stylesheet" href="./asset/animatecss/animate.min.css">
		  <link rel="stylesheet" href="./asset/Bootstrap/css/bootstrap.min.css" />
		   <link rel="stylesheet" href="./asset/bootstrap-footer-18/bootstrap-footer-18/css/ionicons.min.css">
		  <!-- end -->
          	<!-- Css Only -->
		<link rel="stylesheet" href="./asset/CSS/payment.css" />
		<link rel="stylesheet" href="./asset/CSS/form.css" />
		<link rel="stylesheet" href="./asset/CSS/alur-pendaftaran.css">
		  	<!-- end -->
    	<style>
			/* 
Form Login style
 */     
			.form-signin {
				max-width: 330px;
				padding: 15px;
				margin: 0 auto;
			}
			.form-signin .form-signin-heading,
			.form-signin .checkbox {
				margin-bottom: 10px;
			}
			.form-signin .checkbox {
				font-weight: normal;
			}
			.form-signin .form-control {
				position: relative;
				font-size: 16px;
				height: auto;
				padding: 10px;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				box-sizing: border-box;
			}
			.form-signin .form-control:focus {
				z-index: 2;
			}
			.form-signin input[type="text"] {
				margin-bottom: -1px;
				border-bottom-left-radius: 0;
				border-bottom-right-radius: 0;
			}
			.form-signin input[type="password"] {
				margin-bottom: 10px;
				border-top-left-radius: 0;
				border-top-right-radius: 0;
			}
			.account-wall {
				margin-top: 20px;
				padding: 40px 0px 20px 0px;
				background-color: #f7f7f7;
				-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
				-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
				box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			}
			.login-title {
				color: #555;
				font-size: 18px;
				font-weight: 400;
				display: block;
			}
			.profile-img {
				width: 96px;
				height: 96px;
				margin: 0 auto 10px;
				display: block;
				-moz-border-radius: 50%;
				-webkit-border-radius: 50%;
				border-radius: 50%;
			}
			.need-help {
				margin-top: 10px;
			}
			.new-account {
				display: block;
				margin-top: 10px;
			}

			/* 
END FORM LOGIN STYLE
 */

			/* 
Index.php Style
 */
			.card-background {
				background-color: #fff;
				width: 80%;
				height: auto;
				overflow: hidden;
				margin-top: 100px;
				box-shadow: 2px 2px #888;
				border-radius: 10px;
				padding-top: 50px;
			}

			.student,
			.note {
				margin: 30px;
			}
			/* End Index.php Style */

			/* FIELDSET */

			.the-legend {
				border-style: none;
				border-width: 0;
				font-size: 14px;
				line-height: 20px;
				margin-bottom: 0;
			}
			.the-fieldset {
				border: 2px groove threedface #000;
				-webkit-box-shadow: 0px 0px 0px 0px #000;
				box-shadow: 0px 0px 0px 0px #000;
			}

			/* END FIELDSET */
		</style>
</head>
<body>
		<!-- Navbar  -->
		<nav
			class="navbar fixed-top navbar-expand-lg navbar-light p-md-3 lh-base"
			id="nav"
		>
			<div class="container">
				<img src="./asset/Ilustrasi-Icon/logo/kawung-logo.png" alt="" class="me-2" style="width: 3em;">
				<a class="navbar-brand text-dark text-start" href="./index.php">SMK KAWUNG 1 SURABAYA</a>
				<button
					class="navbar-toggler"				
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#navbarNav"
					aria-controls="navbarNav"
					aria-expanded="false"
					aria-label="Toggle navigation"
			
				>
					<span class="navbar-toggler-icon"></span>
			
				</button>

				<div class="collapse navbar-collapse" id="navbarNav">
					<div class="mx-auto"></div>
					<ul class="navbar-nav">
						<li class="nav-item pe-2" data-toggle="collapse" data-target=".navbar-collapse.show">
							<a class="nav-link" href="./index.php">Beranda</a>
						</li>
						<li class="nav-item pe-2">
							<a class="nav-link" href="./alur-pendaftaran.php">Alur Pendaftaran</a>
						</li>
						<li class="nav-item pe-2" data-toggle="collapse" data-target=".navbar-collapse.show">
							<a class="nav-link"  href="./index.php">Program Keahlian</a>
						</li>
						<li class="nav-item pe-2" data-toggle="collapse" data-target=".navbar-collapse.show">
							<a class="nav-link"  href="./index.php">Ekstrakurikuler</a>
						</li> 
						<li class="nav-item pe-2" data-toggle="collapse" data-target=".navbar-collapse.show">
							<a class="nav-link"  href="#contact">Contact</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!---Akhir Nav-->
		<!-- content -->
		<ul
			class="nav nav-pills mb-3 justify-content-evenly align-items-center"
			id="pills-tab"
			role="tablist"
			style="margin-top: 10em"
		>
			<li class="nav-item" role="presentation">
				<button
					class="nav-link active"
					id="pills-home-tab"
					data-bs-toggle="pill"
					data-bs-target="#pills-home"
					type="button"
					role="tab"
					aria-controls="pills-home"
					aria-selected="true"
				>
					Alur Pendaftaran
				</button>
			</li>
			<li class="nav-item" role="presentation">
				<button
					class="nav-link"
					id="pills-profile-tab"
					data-bs-toggle="pill"
					data-bs-target="#pills-profile"
					type="button"
					role="tab"
					aria-controls="pills-profile"
					aria-selected="false"
				>
					Pendaftaran
				</button>
			</li>
			<li class="nav-item" role="presentation">
				<button
					class="nav-link"
					id="pills-contact-tab"
					data-bs-toggle="pill"
					data-bs-target="#pills-contact"
					type="button"
					role="tab"
					aria-controls="pills-contact"
					aria-selected="false"
				>
					Pembayaran
				</button>
			</li>
		</ul>
		<div class="tab-content" id="pills-tabContent" style="margin-bottom: -25em;">
			<div
				class="tab-pane fade show active"
				id="pills-home"
				role="tabpanel"
				aria-labelledby="pills-home-tab"
			>
				<div class="container my-5">
					<div
						class="row justify-content-center align-items-center text-center"
					>
						<div class="col-12">
							<h2>Alur Proses Pendaftaran Online</h2>
						</div>
						<div class="col-12 mt-3" style="margin-bottom: 30em;">
							<figure>
								<img
									class="animate__animated animate__backInLeft"
									src="./asset/Ilustrasi-Icon/alur-daftar/alurpendaftaran.jpg"
									alt="alur-pendaftaran"
									style="width: 80%"
								/>
							</figure>
						</div>
					</div>
				</div>
			</div>
			<div
				class="tab-pane fade"
				id="pills-profile"
				role="tabpanel"
				aria-labelledby="pills-profile-tab"
			><div class="container" style="margin-bottom: 30em;">
	    <div class="row justify-content-center align-items-center">
	        <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
            <div class="card" style="margin-top: 50px">
                    <div class="card-header" data-background-color="green">
                    <center><h3 class="title">FORMULIR PENDAFTARAN SISWA BARU TAHUN AJARAN 2022/2023</h3></center>

</div>
            	<div class="card" style="margin-top: 50px">
                    <div class="card-header" data-background-color="blue">
                     <form method="post" action="aksipendaftaran.php" class="form-horizontal">
                        <h4 class="title">A. Data Siswa</h4>
                        <p class="category">(Kolom bertanda (*) Wajib Diisi)</p>
                    </div>

                    <input type="hidden" id="password" name="password" value="123456"/>
                    <div class="card-content">
                       
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nama Lengkap *</label>
                                        <input type="text" class="form-control" id="namalengkap" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()" name="namalengkap" placeholder="Nama Lengkap" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Sekolah Baru*</label>
                                        <select class="form-control" id="namapanggilan" name="namapanggilan" placeholder="Nama Panggilan" required>
							
   							             <option>Sekolah Menengah Kejuruan (SMK Kawung 1 surabaya)</option>
							            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Tempat lahir</label>
                                       <input type="text" class="form-control" id="tempatlahir" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()" name="tempatlahir" placeholder="Tempat Lahir harus diisi"  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Tanggal lahir *</label>
                                       <input type="date" class="form-control date"  autocomplete="off" name="tgllahir" placeholder="Tanggal Lahir harus diisi"  /> 
							<label> ikuti contoh dibawah</label><br>
							<b>contoh penulisan :  01-Jun-2006</b>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Jenis Kelamin</label>
                                        <select name="jk" class="form-control">
                                        	<option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
										<option value="L">Laki-Laki</option>
                                        	<option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">No Kartu Keluarga *</label>
                                       <input type="text" class="form-control" autocomplete="off" id="no_kk" onkeyup="this.value = this.value.toUpperCase()" name="no_kk" placeholder="Nomer kartu keluarga harus diisi"  />
                                    </div>
                                </div>
                            </div>
                            
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nomer NIK *</label>
                                       <input type="text" class="form-control" autocomplete="off" id="no_nik" onkeyup="this.value = this.value.toUpperCase()" name="no_nik" placeholder="Nomer NIK harus diisi"  />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Alamat Lengkap *</label>
                                       <input type="text" class="form-control" autocomplete="off" id="alamatlengkap" onkeyup="this.value = this.value.toUpperCase()" name="alamatlengkap" placeholder="Kampung / Jalan harus diisi"  />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            	<div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">RT *</label>
                                        <input type="number" class="form-control" value="0" autocomplete="off" id="rt" name="rt"  />
                                    </div>
                    
                                </div>

                              	<div class="col-md-6">
                              		<div class="form-group label-floating">
                                        <label class="control-label">RW *</label>
                                        <input type="number" class="form-control" value="0" autocomplete=" off" id="rw" name="rw"  />
                                    </div>
                              	</div>	
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Kelurahan / Desa *</label>
                                      <input type="text" class="form-control" autocomplete="off" id="kelurahan" onkeyup="this.value = this.value.toUpperCase()" name="kelurahan" placeholder="Kelurahan / Desa"  />
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Kecamatan *</label>
                                     <input type="text" class="form-control" autocomplete="off" id="kecamatan" onkeyup="this.value = this.value.toUpperCase()" name="kecamatan" placeholder="Kecamatan"  />
                                    </div>
                                </div>
                            </div>


                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Kota / Kabupaten *</label>
                                     <input type="text" class="form-control" autocomplete="off" id="kabupaten" onkeyup="this.value = this.value.toUpperCase()" name="kabupaten" placeholder="Kota / Kabupaten"  />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Kodepos</label>
                                     <input type="number" class="form-control" value="0" autocomplete="off" id="kodepos" onkeypress="returnhanyaAngka(event)" name="kodepos" placeholder="Kode"/>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Agama *</label>
                                     <select class="form-control" id="agama" name="agama" placeholder="Agama" >
								<option value="1">Islam</option><option value="2">Kristen Katolik</option><option value="3">Kristen Protestan</option><option value="4">Hindu</option><option value="5">Budha</option><option value="6">Konghucu</option>							</select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Anak Ke-</label>
                                        <input type="number" class="form-control" autocomplete="off" value="0" id="anakke" name="anakke"  />
                                    </div>
                    
                                </div>

                              	<div class="col-md-6">
                              		<div class="form-group label-floating">
                                        <label class="control-label">Jumlah Saudara Kandung</label>
                                       <input type="number" class="form-control" value="0" autocomplete="off" id="jmlsdr" name="jmlsdr">
                                    </div>
                              	</div>	
                            </div>

                        <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Golongan Darah</label>
                                        <select class="form-control" name="g_darah" >
                                        	<option value="" disabled selected>-- Golongan Darah --</option>
										<option value="A">A</option>
                                        	<option value="B">B</option>
                                            <option value="AB">AB</option>
                                        	<option value="O">O</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Penyakit yang pernah diderita *</label>
                                       <input type="text" class="form-control" autocomplete="off" id="p_derita" onkeyup="this.value = this.value.toUpperCase()" name="p_derita" placeholder="kosongi jika tidak ada"  />
                                    </div>
                                </div>
                            </div>
                            
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Kelainan Jasmani *</label>
                                       <input type="text" class="form-control" autocomplete="off" id="k_jasmani" onkeyup="this.value = this.value.toUpperCase()" name="k_jasmani" placeholder=" kosongi jika tidak ada "  />
                                    </div>
                                </div>
                            </div>

                               <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Jarak rumah ke Sekolah *</label>
                                        <select name="j_rumah" class="form-control">
                                        	<option value="" disabled selected>-- Jarak rumah ke sekolah --</option>
										<option value="1">< 1 km </option>
                                        	<option value="5">  -5 km </option>
                                            <option value="10">  5-10 km </option>
                                        	<option value="15">  10 km</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                           
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">No. Hp *</label>
                                      <input type="number" class="form-control" value="0" autocomplete="off" onkeypress="returnhanyaAngka(event)" id="nohp" name="nohp" placeholder="Min. 11 Max. 12 (Angka)"  /> 
							Contoh Penulisan : 089677222789, harus diawali 0
							<script>
			function hanyaAngka(evt) {
				var charCode = (evt.which) ? evt.which : event.keyCode
				 if (charCode > 31 && (charCode < 48 || charCode > 57))

					return false;
				return true;
			}
		</script>
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Bertempat Tinggal di *</label>
                                        <select name="tempattinggal" class="form-control">
                                        	<option value="" disabled selected>-- Bertempat Tinggal di --</option>
										<option>Orang Tua </option>
                                        	<option>  Wali / Saudara </option>
                                            <option>  Asrama</option>
                                        	
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
							  <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Pilihan Jurusan *</label>
                                        <select name="p_jurusan" class="form-control">
                                        	<option value="" disabled selected>-- Pilihan Jurusan --</option>
										<option value="Otomatisasi Tata Kelola Perkantoran">Otomatisasi Tata Kelola Perkantoran </option>
                                        	<option value="Akuntansi dan Keuangan Lembaga">  Akuntansi dan Keuangan Lembaga </option>
                                            <option value="Rekayasa Perangkat Lunak">  Rekayasa Perangkat Lunak</option>
                                        	
                                        </select>
                                    </div>
                                </div>
                            </div>

                            </div>
                            
                 </div>
	 <div class="clearfix"></div>

    <div class="card" style="margin-top: 50px">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">B. Riwayat Pendidikan Siswa</h4>
                        <p class="category">(Kolom bertanda (*) Wajib Diisi)</p>
                    </div>
                    <div class="card-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nama Sekolah Asal *</label>
                                        <input type="text" class="form-control" autocomplete="off" id="nm_sekolah" onkeyup="this.value = this.value.toUpperCase()" name="nm_sekolah" placeholder="Nama SMP/MTs"  />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nomor ijazah</label>
                                        <input type="text" class="form-control" autocomplete="off" id="nijazah" onkeyup="this.value = this.value.toUpperCase()" name="nijazah" placeholder="No ijazah boleh kosong jika belum ada"  />  
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">NISN *</label>
                                       <input type="text" class="form-control" autocomplete="off" id="nisn" onkeyup="this.value = this.value.toUpperCase()" name="nisn" placeholder="NISN harus diisi"  /> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Jumlah Nilai </label>
                                       <input type="text" class="form-control" autocomplete="off" id="alamat_sekolah" onkeyup="this.value = this.value.toUpperCase()" name="alamat_sekolah" placeholder="jumlah nilai boleh kosong jika belum ada ijazah"  /> 
                                    </div>
                                </div>
                            </div>
                           </div>
						</div>
 <div class="clearfix"></div>
 
                            <div class="card" style="margin-top: 50px">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">C. Data Orang Tua ( AYAH )</h4>
                        <p class="category">(Kolom bertanda (*) Wajib Diisi)</p>
                    </div>
                    <div class="card-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nama Ayah *</label>
                                       <input type="text" class="form-control" id="namaayah" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()" name="namaayah" placeholder="Nama Ayah"  />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nomer NIK *</label>
                                        <input type="text" class="form-control" autocomplete="off" id="no_nik_a" onkeyup="this.value = this.value.toUpperCase()" name="no_nik_a" placeholder="Nomer NIK harus diisi"  />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Tempat lahir*</label>
                                      <input type="text" class="form-control" id="tempatlahirayah" onkeyup="this.value = this.value.toUpperCase()" name="tempatlahirayah" placeholder="Tempat Lahir Ayah"  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Tanggal Lahir * </label>
                                      <input type="date" class="form-control" id="" name="tgllahirayah" placeholder="Tanggal Lahir"  /> 
						
							<label >ikuti contoh dibawah*</label><br>
						<b font color="red">	Contoh Penulisan : 02-Jun-1987</b>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Alamat Lengkap *</label>
                                       <input type="text" class="form-control" id="alamatayah" onkeyup="this.value = this.value.toUpperCase()" name="alamatayah" placeholder="ALamat Lengkap - Min. Kampung / Jalan"  />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Pekerjaan *</label>
                                       <select id="pekerjaanayah" name="pekerjaanayah" class="form-control" required><option value="1">Tidak Ada Pilihan</option><option value="2">Karyawan Swasta</option><option value="3">Wiraswasta</option><option value="4">PNS</option><option value="5">TNI/Polri</option><option value="6">Perangkat Desa</option><option value="7">Buruh</option><option value="8">Nelayan</option><option value="10">IRT (Ibu Rumah Tangga)</option><option value="11">Tani</option><option value="12">Lain-lainnya</option></select>                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Instansi</label>
                                       <input type="text" class="form-control" id="instansiayah" onkeyup="this.value = this.value.toUpperCase()" name="instansiayah" placeholder="Instansi Tempat Bekerja (Boleh di Kosongkan)">
                                    </div>
                                </div>
                            </div>    

                             <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Jabatan</label>
                                      <input type="text" class="form-control" id="jbt_ayah" onkeyup="this.value = this.value.toUpperCase()" name="jbt_ayah" placeholder="Jabatan dalam Pekerjaan boleh tidak diisi">
                                    </div>
                                </div>
                            </div>     

                              <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">>Penghasilan / Bulan * (tidak boleh ada titik)</label>
                                      <input type="number" class="form-control" value="0" id="penghasilanayah" name="penghasilanayah" placeholder="tidak boleh ada titik">
							
							<label for="penghasilanayah">contoh penulisan : 3000000(tidak ada titik, koma)</label>
                                    </div>
                                </div>
                            </div>     


                             <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Pendidikan Terakhir *</label>
                                      <select class="form-control" id="pendidikanayah" name="pendidikanayah" >
								<option value="10">Tidak Ada Pilihan</option><option value="9">S-3</option><option value="7">S-2</option><option value="6">Sarjana</option><option value="5">Diploma</option><option value="4">SMA/SMK/MAN</option><option value="3">SMP/MTs</option><option value="2">SD/MI</option><option value="1">Tidak Sekolah</option>							</select>
                                    </div>
                                </div>
                            </div>  
                            
                             <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Agama *</label>
                                      <select class="form-control" id="agama_a" name="agama_a" placeholder="Agama" >
								<option value="1">Islam</option><option value="2">Kristen Katolik</option><option value="3">Kristen Protestan</option><option value="4">Hindu</option><option value="5">Budha</option><option value="6">Konghucu</option>							</select>
                                    </div>
                                </div>
                            </div>            
                            
                             <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">No HP *</label>
                                      <input type="number" class="form-control" value="0" onkeypress="returnhanyaAngka(event)" id="nohpayah" name="nohpayah">
								Contoh Penulisan : 089677222789,diawali 0
                                    </div>
                                </div>
                            </div>  
</div></div>


                            <div class="card" style="margin-top: 50px">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">D. Data Orang Tua ( IBU )</h4>
                        <p class="category">(Kolom bertanda (*) Wajib Diisi)</p>
                    </div>
                    <div class="card-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nama Ibu *</label>
                                      <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" id="namaibu" name="namaibu" placeholder="Nama Ibu"  />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nomer NIK *</label>
                                       <input type="text" class="form-control" autocomplete="off" id="no_nik_i" onkeyup="this.value = this.value.toUpperCase()" name="no_nik_i" placeholder="Nomer NIK harus diisi"  />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Tempat lahir*</label>
                                      <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" id="tempatlahiribu harus diisi" name="tempatlahiribu" placeholder="Tempat Lahir Ibu"  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Tanggal Lahir * </label>
                                      <input type="date" class="form-control" id="" onkeyup="this.value = this.value.toUpperCase()" name="tgllahiribu" placeholder="Tanggal Lahir harus diisi"  /> 
						
							<label >ikuti contoh dibawah*</label><br>
						<b font color="red">	Contoh Penulisan : 02-Jun-1981</b>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Alamat Lengkap *</label>
                                       <input type="text" class="form-control" id="alamatibu" onkeyup="this.value = this.value.toUpperCase()" name="alamatibu" placeholder="ALamat Lengkap - Min. Kampung / Jalan harus diisi"  />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Pekerjaan *</label>
                                       <select id="pekerjaanibu" name="pekerjaanibu" class="form-control" required><option value="1">Tidak Ada Pilihan</option><option value="2">Karyawan Swasta</option><option value="3">Wiraswasta</option><option value="4">PNS</option><option value="5">TNI/Polri</option><option value="6">Perangkat Desa</option><option value="7">Buruh</option><option value="8">Nelayan</option><option value="10">IRT (Ibu Rumah Tangga)</option><option value="11">Tani</option><option value="12">Lain-lainnya</option></select>                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Instansi</label>
                                       <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" id="instansiibu" name="instansiibu" placeholder="Instansi Tempat Bekerja (Boleh di Kosongkan)">
                                    </div>
                                </div>
                            </div>    

                             <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Jabatan</label>
                                     <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" id="jbt_ibu" name="jbt_ibu" placeholder="jabatan dipekerjaan (boleh kosong)">
                                    </div>
                                </div>
                            </div>     

                              <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">>Penghasilan / Bulan * (tidak boleh ada titik)</label>
                                     <input type="number" class="form-control" value="0" id="penghasilanibu" name="penghasilanibu" placeholder="tidak boleh ada titik">
							
							<label for="penghasilanayah">contoh penulisan : 3000000(tidak ada titik, koma)</label>
                                    </div>
                                </div>
                            </div>     


                             <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Pendidikan Terakhir *</label>
                                     <select class="form-control" id="pendidikanibu" name="pendidikanibu">
								<option value="10">Tidak Ada Pilihan</option><option value="9">S-3</option><option value="7">S-2</option><option value="6">Sarjana</option><option value="5">Diploma</option><option value="4">SMA/SMK/MAN</option><option value="3">SMP/MTs</option><option value="2">SD/MI</option><option value="1">Tidak Sekolah</option>							</select>
                                    </div>
                                </div>
                            </div>  
                            
                             <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Agama *</label>
                                      <select class="form-control" id="agama_i" name="agama_i" placeholder="Agama" >
								<option value="1">Islam</option><option value="2">Kristen Katolik</option><option value="3">Kristen Protestan</option><option value="4">Hindu</option><option value="5">Budha</option><option value="6">Konghucu</option>							</select>
                                    </div>
                                </div>
                            </div>            
                            
                             <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">No HP *</label>
                                      <input type="number" class="form-control"  value="0" onkeypress="returnhanyaAngka(event)" id="nohpibu" name="nohpibu" placeholder="Boleh sama dengan Ayah" />
				
								Contoh Penulisan : 089677222789,diawali 0
                                    </div>
                                </div>
                            </div>
</div></div>

     <div class="card" style="margin-top: 50px">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">E. Data Wali Siswa</h4>
                        <center><h5>(jika tidak ada wali, bisa dikosongi)</h5></center>
					<center><h5>(PERSONAL YANG DITUNJUK UNTUK MEWAKILI KEDUA ORANG TUA)</h5></center>
                    </div>
                    <div class="card-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nama Wali</label>
                                      <input type="text" class="form-control" id="namawali" onkeyup="this.value = this.value.toUpperCase()" name="namawali" placeholder="Nama Wali" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Tempat lahir</label>
                                      <input type="text" class="form-control" id="tempatlahirwali" onkeyup="this.value = this.value.toUpperCase()" name="tempatlahirwali" placeholder="Tempat Lahir Wali" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Tanggal Lahir Wali </label>
                                      <input type="text" class="form-control" id="tgllahirwali" onkeyup="this.value = this.value.toUpperCase()" name="tgllahirwali" placeholder="Tanggal Lahir" />Contoh Penulisan : 1996-11-02
						
				
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Alamat Lengkap </label>
                                      <input type="text" class="form-control" id="alamatwali" onkeyup="this.value = this.value.toUpperCase()" name="alamatwali" placeholder="Alamat Lengkap" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Pekerjaan *</label>
                                      <select id="pekerjaanwali" name="pekerjaanwali" class="form-control" required><option value="1">Tidak Ada Pilihan</option><option value="2">Karyawan Swasta</option><option value="3">Wiraswasta</option><option value="4">PNS</option><option value="5">TNI/Polri</option><option value="6">Perangkat Desa</option><option value="7">Buruh</option><option value="8">Nelayan</option><option value="10">IRT (Ibu Rumah Tangga)</option><option value="11">Tani</option><option value="12">Lain-lainnya</option></select>                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Instansi</label>
                                      <input type="text" class="form-control" id="instansiwali" onkeyup="this.value = this.value.toUpperCase()" name="instansiwali" placeholder="Instansi Tempat Bekerja" />
                                    </div>
                                </div>
                            </div>    

                             <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Jabatan</label>
                                     <input type="text" class="form-control" id="jbt_nwali" onkeyup="this.value = this.value.toUpperCase()" name="jbt_wali" placeholder="Jabatan dipekerjaan" />
                                    </div>
                                </div>
                            </div>     

                              <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">>Penghasilan / Bulan * (tidak boleh ada titik)</label>
                                    <input type="number" class="form-control" value="0" id="penghasilanwali" name="penghasilanwali" />
							
							
                                    </div>
                                </div>
                            </div>     


                             <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Pendidikan Terakhir *</label>
                                     <select class="form-control" id="pendidikanwali" name="pendidikanwali">
								<option value="10">Tidak Ada Pilihan</option><option value="9">S-3</option><option value="7">S-2</option><option value="6">Sarjana</option><option value="5">Diploma</option><option value="4">SMA/SMK/MAN</option><option value="3">SMP/MTs</option><option value="2">SD/MI</option><option value="1">Tidak Sekolah</option>							</select>
                                    </div>
                                </div>
                            </div>  
                            
                             <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Agama WALI *</label>
                                     <select class="form-control" id="agama_w" name="agama_w" placeholder="Agama" >
								<option value="1">Islam</option><option value="2">Kristen Katolik</option><option value="3">Kristen Protestan</option><option value="4">Hindu</option><option value="5">Budha</option><option value="6">Konghucu</option>							</select>
                                    </div>
                                </div>
                            </div>            
                            
                             <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">No HP WALI*</label>
                                      <input type="number" class="form-control" onkeypress="returnhanyaAngka(event)" id="nohpwali" name="nohpwali" />
								Contoh Penulisan : 089677222789,diawali 0
                                    </div>
                                </div>
                            </div>


   <div class="row">
                            	<div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email Wali</label>
                                      <input type="email" class="form-control" id="emailwali" name="emailwali" />
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                       
                                     <input type="submit" class="btn btn-warning" id="daftar" name="daftar" value="DAFTAR SEKARANG" /> <br /><small><i>* Sebelum DAFTAR Pastikan data bertanda (*) diisi semua</i></small>
                                    </div>
                                </div>
                         
                           
                          
								

                            
                            
                       
                    </div>
                </div>
                
            </div>
	    </div>
	</div>
     </form>
     </div>
     </div>
	</div>
			<div
				class="tab-pane fade"
				id="pills-contact"
				role="tabpanel"
				aria-labelledby="pills-contact-tab"
			>
				<div class="content" style="margin-bottom: 30em;">
					<div class="container">
						<div
							class="row justify-content-center align-items-center text-center mb-5"
						>
							<div class="col-12">
								<h1>Uploud Bukti Pembayaran Registrasi</h1>
							</div>
							<div class="col-12">
								<h5 class="text-capitalized">
									silahkan uploud bukti pembayaran anda disini
								</h5>
							</div>
						</div>
						<div class="row align-items-stretch no-gutters contact-wrap">
							<div class="col-md-12">
								<div class="form h-100">
									<h3>Welcome</h3>
									<form
										class="mb-5"
										method="post"
										id="contactForm"
										name="contactForm"
									>
										<div class="row">
											<div class="col-md-6 form-group mb-3">
												<label for="" class="col-form-label">Masukan Nik Siswa Pendaftaran *</label>
												<input
													type="number"
													class="form-control"
													name="number"
													id="number"
													placeholder="Your nik number"
												/>
											</div>
											<div class="col-md-6 form-group mb-3">
												<label for="" class="col-form-label">Masukan No Whatsapp *</label>
												<input
													type="number"
													class="form-control"
													name="number"
													id="number"
													placeholder="Your phone"
												/>
											</div>
										</div>

										<div class="row">
											<div class="col-md-12 form-group mb-3">
												<label for="" class="col-form-label"
													>Masukan Tgl lahir Siswa	 *</label
												>
												<input
													type="date"
													class="form-control"
													name="date"
													id="date"
													placeholder="Your phone"
												/>
											</div>
										</div>

										<div class="row">
											<div class="col-md-12 form-group mb-3">
												<label for="" class="col-form-label"
													>select file *</label
												>
												<input
													type="file"
													class="form-control"
													name="file"
													id="file"
													placeholder="Your phone"
												/>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12 form-group">
												<input
													type="submit"
													value="Send Message"
													class="btn btn-primary rounded-0 py-2 px-4"
												/>
												<span class="submitting"></span>
											</div>
										</div>
									</form>

									<div id="form-message-warning mt-4"></div>
									<div id="form-message-success">
										Your message was sent, thank you!
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end content -->
		<!--footer-->
	<footer class="footer-08 pt-5" id="contact" style="margin-top: 6.25em;">
			<div class="container-fluid px-lg-5">
				<div class="row">
					<div class="col-md-12 py-5">
						<div class="row">
							<div class="col-md-4 mb-md-0 mb-4">						
								<img src="./asset/Ilustrasi-Icon/logo/kawung-logo.png" style="margin-bottom: 1em;" alt="" width="30%">
								<h2 class="footer-heading">Lokasi Kami</h2>
								<p style="color: #cbd5e1;">Surabaya, jl.Parang klitik No: 2 Kemayoran - Krembangan.</p>
								<ul class="ftco-footer-social p-0 d-flex flex-row" style="list-style: none;">
		              <li class="ftco-animate"><a href="https://twitter.com/smkkawung1sby"><span class="ion-logo-twitter"></span></a></li>
		              <li class="ftco-animate"><a href="https://www.facebook.com/smk_kawung1_official-102331551880793"><span class="ion-logo-facebook"></span></a></li>
		              <li class="ftco-animate"><a href="https://instagram.com/smk_kawung1_official?utm_medium=copy_link"><span class="ion-logo-instagram"></span></a></li>
		            </ul>
							</div>
							<div class="col-md-8">
								<div class="row justify-content-center">
									<div class="col-md-12 col-lg-9">
										<div class="row">
											<div class="col-md-6 mb-md-0 mb-4">
												<h2 class="footer-heading">Tautan Lain</h2>
												<ul class="list-unstyled">
						              <li><a href="./index.php" class="py-2 d-block">Beranda</a></li>
						              <li><a href="./alur-pendaftaran.php" class="py-2 d-block">Alur Pendaftaran</a></li>
						              <li><a href="./index.php" class="py-2 d-block">Program Keahlian</a></li>
						              <li><a href="./index.php" class="py-2 d-block">Ekstrakurikuler</a></li>
						            </ul>
											</div>
											<div class="col-md-6 mb-md-0 mb-4">
												<h2 class="footer-heading">Contact</h2>
												<ul class="list-unstyled">
						              <li><a href="https://api.whatsapp.com/send?phone=628978378911&text=Permisi Abang Frondt end"class="py-2 d-block"> <img src="./asset/Ilustrasi-Icon/logo/phone-portrait-outline.svg" alt="">+62 812 3526 9999 (pak Dimas)</a></li>
						              <li><a href="https://api.whatsapp.com/send?phone=628978378911&text=Permisi Abang Frondt end" class="py-2 d-block"><img src="./asset/Ilustrasi-Icon/logo/phone-portrait-outline.svg" alt="">+62 812 3526 8888 (Bu Dian)</a></li>
						              <li><a href="https://api.whatsapp.com/send?phone=628978378911&text=Permisi Abang Frondt end" class="py-2 d-block"><img src="./asset/Ilustrasi-Icon/logo/phone-portrait-outline.svg" alt="">+62 812 3526 7777 (Bu Felly)</a></li>
						            </ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-md-5">
							<div class="col-md-12">
								<p class="copyright text-light"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | DmsOkr</a>
					  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</footer>
		<!-- payment script -->
		<script src="./asset/js/jquery.validate.min.js"></script>
		<script src="./asset/js/main.js"></script>
			<!--script-->
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 	 	<script src="./asset/bootstrap-footer/js/jquery.min.js"></script>
    	<script src="./asset/bootstrap-footer/js/popper.js"></script>
		<script src="./asset/bootstrap-footer/js/bootstrap.min.js"></script>
		<script src="./asset/js/aos.js"></script>
		<script src="./asset/Bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="./asset/js/window.js"></script>
		<!--akhir script-->
  </body>
</html>