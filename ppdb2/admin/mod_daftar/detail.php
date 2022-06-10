<!-- <div class="section-header">
    <h3>Detail Pendaftar</h3>
</div> -->
<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php $siswa = fetch($koneksi, 'daftar', ['id_daftar' => dekripsi($_GET['id'])]); ?>
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-edit-status">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="<?= $siswa['id_daftar'] ?>" name="id_daftar" class="form-control" required="">
                    <div class="form-group">
                        <div class="control-label">Pilih Status</div>
                        <div class="custom-switches-stacked mt-2">
                            <label class="custom-switch">
                                <input type="radio" name="status" value="0" class="custom-switch-input" <?php if ($siswa['status'] == 0) {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">DAFTAR</span>
                            </label>
                            <label class="custom-switch">
                                <input type="radio" name="status" value="1" class="custom-switch-input" <?php if ($siswa['status'] == 1) {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Lunas/Diterima</span>
                            </label>
                            <label class="custom-switch">
                                <input type="radio" name="status" value="2" class="custom-switch-input" <?php if ($siswa['status'] == 2) {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">HEREGISTRASI</span>
                            </label>


                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-label">Apakah akan memberikan diskon ?</div>
                        <div class="custom-switches-stacked mt-2">
                            <label class="custom-switch">
                                <input type="radio" name="diskon" value="1" class="custom-switch-input" <?php if ($siswa['diskon'] == 1) {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Iya</span>
                            </label>
                            <label class="custom-switch">
                                <input type="radio" name="diskon" value="0" class="custom-switch-input" <?php if ($siswa['diskon'] == 0) {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Tidak</span>
                            </label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-sm-8 col-lg-8">
        <div class="card author-box card-primary">
            <div class="card-header">
                <h4>Data Pendaftar</h4>
                <div class="card-header-action">
                    <a target="_blank" href="mod_daftar/print_daftar.php?id=<?= enkripsi($siswa['id_daftar']) ?>" type="button" class="btn btn-success btn-lg"><i class="fas fa-print    "></i> Cetak Formulir</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-edit    "></i> Edit Status</button>
                </div>
            </div>
            <div class="card-body">

                <div class="author-box-left">
                    <?php if ($siswa['foto'] == 'default.png') { ?>
                        <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture">
                    <?php } else { ?>
                        <img alt="image" src="../<?= $siswa['foto'] ?>" class="rounded-circle author-box-picture">
                    <?php } ?>
                    <div class="clearfix"></div>
                    <br>
                    <div class="author-box-job">Status Pendaftaran</div>
                    <?php if ($siswa['status'] == 1) { ?>
                        <span class="badge badge-success">Diterima</span>
                    <?php } else { ?>
                        <span class="badge badge-warning">Pending</span>
                    <?php } ?>
                </div>
                <div class="author-box-details">

                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-user    "></i> Data Diri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-home    "></i> Data Alamat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user-friends    "></i> Orang Tua</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="berkas-tab3" data-toggle="tab" href="#berkas3" role="tab" aria-controls="berkas" aria-selected="false"><i class="fas fa-file    "></i> Data Berkas</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <form id="form-datadiri">
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Pendaftaran</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="no" class="form-control" value="<?= $siswa['no_daftar'] ?>" disabled>
                                    </div>
                                </div> <?php if ($setting['jurusan'] == 1) { ?>
                                    <div class="form-group row mb-2">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jurusan</label>
                                        <div class="col-sm-12 col-md-6">
                                            <input type="text" name="jurusan" class="form-control" value="<?= $siswa['jurusan'] ?>" disabled>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ukuran Baju</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="text" name="baju" class="form-control" value="<?= $siswa['baju'] ?>" placeholder="M/L/XL/XXL/XXXL" required>
                                    </div>
                                </div>
                                <h5><i class="fas fa-home    "></i> Data Diri Siswa</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Profil</label>
                                    <div class="col-sm-12 col-md-8">
                                        <div class="custom-file">
                                            <input type="file" name="file-foto" class="custom-file-input" id="site-logo">
                                            <label class="custom-file-label">Choose File</label>
                                        </div>
                                        <div class="form-text text-muted">Upload yang diperbolehkan ukuran maksimun 1Mb</div>

                                    </div>

                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NISN</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="text" name="nisn" class="form-control" value="<?= $siswa['nisn'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="nik" class="form-control" value="<?= $siswa['nik'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No KK</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nokk" class="form-control" value="<?= $siswa['no_kk'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="nama" class="form-control" value="<?= $siswa['nama'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="tempat" class="form-control" value="<?= $siswa['tempat_lahir'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tgl Lahir</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="text" name="tgllahir" class="form-control datepicker" value="<?= $siswa['tgl_lahir'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                                    <div class="col-sm-12 col-md-4">
                                        <select class='form-control' name='jenkel' required>
                                            <option value=''>Pilih Jenis Kelamin</option>";
                                            <?php foreach ($jeniskelamin as $val => $key) { ?>
                                                <?php if ($siswa['jenkel'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Agama</label>
                                    <div class="col-sm-12 col-md-5">
                                        <select class='form-control' name='agama' required>
                                            <option value=''>Pilih Agama</option>";
                                            <?php foreach ($agama as $val) { ?>
                                                <?php if ($siswa['agama'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Handphone</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="nohp" class="form-control" value="<?= $siswa['no_hp'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Asal Sekolah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="asal" class="form-control" value="<?= $siswa['asal_sekolah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Anak Ke</label>
                                    <div class="col-sm-6 col-md-3">
                                        <input type="number" name="anakke" class="form-control" value="<?= $siswa['anak_ke'] ?>" required>
                                    </div>
                                    Dalam Keluarga
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Saudara</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="saudara" class="form-control" value="<?= $siswa['saudara'] ?>" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-6 col-md-8">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="anak_guru" id="" value="1" <?php if ($siswa['anak_guru'] == 1) {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>> Ceklis jika kamu Anak Guru disekolah ini
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tinggi Badan (Cm)</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="tinggi" class="form-control" value="<?= $siswa['tinggi'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Berat Badan (Kg)</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="berat" class="form-control" value="<?= $siswa['berat'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Dalam Keluarga</label>
                                    <div class="col-sm-12 col-md-5">

                                        <select class="form-control" name="statuskeluarga">
                                            <option value="<?= $siswa['status_keluarga'] ?>" selected><?= $siswa['status_keluarga'] ?></option>
                                            <option value="Anak Kandung">Anak Kandung</option>
                                            <option value="Anak Angkat">Anak Angkat</option>
                                            <option value="Anak Tiri">Anak Tiri</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No KIP</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="kip" class="form-control" value="<?= $siswa['no_kip'] ?>" placeholder="kosongkan jika tidak punya KIP">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data alamat dengan sebenar-benarnya</p>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Diri</button></center>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                            <form id="form-alamat">
                                <h5><i class="fas fa-home    "></i> Data Alamat</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="alamat" class="form-control" value="<?= $siswa['alamat'] ?>" placeholder="nama jalan / kampung" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">RT / RW</label>
                                    <div class="col-sm-6 col-md-3">
                                        <input type="number" name="rt" class="form-control" value="<?= $siswa['rt'] ?>" required>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 col-md-3">
                                        <input type="number" name="rw" class="form-control" value="<?= $siswa['rw'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Provinsi</label>
                                    <div class="col-sm-12 col-md-8">
                                        <select class="form-control select2" style="width: 100%;" name="provinsi" id="provinsi" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kabupaten / Kota</label>
                                    <div class="col-sm-12 col-md-8">
                                        <select class="form-control select2" style="width: 100%;" name="kabupaten" id="kabupaten" required>
                                            <option value="<?= $siswa['kota'] ?>" selected><?= $siswa['kota'] ?></option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kecamatan</label>
                                    <div class="col-sm-12 col-md-8">
                                        <select class="form-control select2" style="width: 100%;" name="kecamatan" id="kecamatan" required>
                                            <option value="<?= $siswa['kecamatan'] ?>" selected><?= $siswa['kecamatan'] ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Desa</label>
                                    <div class="col-sm-12 col-md-8">
                                        <select class="form-control select2" style="width: 100%;" name="desa" id="desa" required>
                                            <option value="<?= $siswa['desa'] ?>" selected><?= $siswa['desa'] ?></option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Pos</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="kodepos" class="form-control" value="<?= $siswa['kode_pos'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tinggal Bersama</label>
                                    <div class="col-sm-12 col-md-5">
                                        <select class='form-control' name='tinggal' required>
                                            <option value=''>Pilih Tinggal</option>";
                                            <?php foreach ($jenistinggal as $val) { ?>
                                                <?php if ($siswa['tinggal'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jarak Ke Sekolah (Meter)</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="jarak" class="form-control" value="<?= $siswa['jarak'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Berapa Menit Kesekolah</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="waktu" class="form-control" value="<?= $siswa['waktu'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Transportasi</label>
                                    <div class="col-sm-12 col-md-5">
                                        <select class='form-control' name='transportasi' required>
                                            <option value=''>Pilih Transportasi</option>";
                                            <?php foreach ($transport as $val) { ?>
                                                <?php if ($siswa['transportasi'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data alamat dengan sebenar-benarnya</p>
                                    <center><button type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Alamat</button></center>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                            <form id="form-orangtua">
                                <h5><i class="fas fa-user-check    "></i> Data Lengkap Ayah</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK Ayah</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nikayah" class="form-control" value="<?= $siswa['nik_ayah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ayah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="namaayah" class="form-control" value="<?= $siswa['nama_ayah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="tempatayah" class="form-control" value="<?= $siswa['tempat_ayah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="text" name="tglayah" class="datepicker form-control" value="<?= $siswa['tgl_lahir_ayah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pendidikan_ayah' required>
                                            <option value=''>Pilih Pendidikan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($siswa['pendidikan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pekerjaan_ayah' required>
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($siswa['pekerjaan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='penghasilan_ayah' required>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($siswa['penghasilan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP Ayah</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nohpayah" class="form-control" value="<?= $siswa['no_hp_ayah'] ?>">
                                    </div>
                                </div>
                                <h5><i class="fas fa-user-check    "></i> Data Lengkap ibu</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK ibu</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nikibu" class="form-control" value="<?= $siswa['nik_ibu'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama ibu</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="namaibu" class="form-control" value="<?= $siswa['nama_ibu'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="tempatibu" class="form-control" value="<?= $siswa['tempat_ibu'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="text" name="tglibu" class="datepicker form-control" value="<?= $siswa['tgl_lahir_ibu'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pendidikan_ibu' required>
                                            <option value=''>Pilih Pendidikan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($siswa['pendidikan_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pekerjaan_ibu' required>
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($siswa['pekerjaan_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='penghasilan_ibu' required>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($siswa['penghasilan_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Hp Ibu</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nohpibu" class="form-control" value="<?= $siswa['no_hp_ibu'] ?>">
                                    </div>
                                </div>
                                <h5><i class="fas fa-user-check    "></i> Data Lengkap wali</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK wali</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nikwali" class="form-control" value="<?= $siswa['nik_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama wali</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="namawali" class="form-control" value="<?= $siswa['nama_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="tempatwali" class="form-control" value="<?= $siswa['tempat_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="text" name="tglwali" class="datepicker form-control" value="<?= $siswa['tgl_lahir_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pendidikan_wali'>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($siswa['pendidikan_wali'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pekerjaan_wali'>
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($siswa['pekerjaan_wali'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='penghasilan_wali'>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($siswa['penghasilan_wali'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP wali</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nohpwali" class="form-control" value="<?= $siswa['no_hp_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data orang tua dengan sebenar-benarnya</p>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Orang Tua</button></center>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="berkas3" role="tabpanel" aria-labelledby="berkas">
                            <form id="form-berkas">
                                <h5><i class="fas fa-file   "></i> Upload Data Berkas</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kartu Keluarga</label>
                                    <div class="col-sm-12 col-md-8">
                                        <div class="custom-file">
                                            <input type="file" name="file-kk" class="custom-file-input" id="site-logo">
                                            <label class="custom-file-label">Choose File</label>
                                        </div>
                                        <div class="form-text text-muted">Upload yang diperbolehkan ukuran maksimun 2Mb</div>

                                        <?php if ($siswa['file_kk'] <> null) { ?>
                                            <div class="gallery gallery-fw" data-item-height="200">
                                                <div class="gallery-item" data-image="../<?= $siswa['file_kk'] ?>" data-title="Image 1"></div>

                                            </div>
                                        <?php } ?>
                                    </div>

                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ijazah / SKL</label>
                                    <div class="col-sm-12 col-md-8">
                                        <div class="custom-file">
                                            <input type="file" name="file-ktp" class="custom-file-input" id="site-logo">
                                            <label class="custom-file-label">Choose File</label>
                                        </div>
                                        <div class="form-text text-muted">Upload yang diperbolehkan ukuran maksimun 2Mb</div>
                                        <?php if ($siswa['file_ktp'] <> null) { ?>
                                            <div class="gallery gallery-fw" data-item-height="200">
                                                <div class="gallery-item" data-image="../<?= $siswa['file_ktp'] ?>" data-title="Image 1"></div>

                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Akta Lahir</label>
                                    <div class="col-sm-12 col-md-8">
                                        <div class="custom-file">
                                            <input type="file" name="file-akte" class="custom-file-input" id="site-logo">
                                            <label class="custom-file-label">Choose File</label>
                                        </div>
                                        <div class="form-text text-muted">Upload yang diperbolehkan ukuran maksimun 2Mb</div>
                                        <?php if ($siswa['file_akte'] <> null) { ?>
                                            <div class="gallery gallery-fw" data-item-height="200">
                                                <div class="gallery-item" data-image="../<?= $siswa['file_akte'] ?>" data-title="Image 1"></div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kartu KIP (jika punya)</label>
                                    <div class="col-sm-12 col-md-8">
                                        <div class="custom-file">
                                            <input type="file" name="file-kip" class="custom-file-input">
                                            <label class="custom-file-label">Choose File</label>
                                        </div>
                                        <div class="form-text text-muted">Upload yang diperbolehkan ukuran maksimun 2Mb</div>
                                        <?php if ($siswa['file_kip'] <> null) { ?>
                                            <div class="gallery gallery-fw" data-item-height="200">
                                                <div class="gallery-item" data-image="../<?= $siswa['file_kip'] ?>" data-title="Image 1"></div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data berkas dengan sebenarnya</p>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Berkas</button></center>
                                </div>
                            </form>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-lg-4">
        <div class="card author-box card-primary">
            <div class="card-header">
                <h4>Progres Pengisian Formulir</h4>
                <div class="card-header-action">

                </div>
            </div>
            <div class="card-body">
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            1
                        </div>
                        <div class="activity-detail">
                            <h5>Data Diri Siswa</h5>
                            <?php
                            $cekdatadiri = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
                             id_daftar         = '$siswa[id_daftar]' and
                             nik                is  null and
                             no_kk              is  null and 
                             jenkel             is  null and
                             anak_ke            is  null and
                             saudara            is  null and
                             tinggi             is  null and
                             berat              is  null and
                             status_keluarga    is  null and
                             baju               is  null and
                             agama              is  null
                            "));
                            if ($cekdatadiri <> 0) { ?>
                                <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                                <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                        </div>
                    </div>

                </div>
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            2
                        </div>
                        <div class="activity-detail">
                            <h5>Data Alamat Siswa</h5>
                            <?php
                            $cekalamat = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
                             id_daftar         = '$siswa[id_daftar]' and
                             alamat                 is  null and
                             rt                     is  null and 
                             rw                     is  null and
                             desa                   is  null and
                             kecamatan              is  null and
                             kota                   is  null and
                             provinsi               is  null and
                             kode_pos               is  null and
                             tinggal                is  null and
                             jarak                  is  null and
                             waktu                  is  null and
                             transportasi           is  null
                            "));
                            if ($cekalamat <> 0) { ?>
                                <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                                <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            3
                        </div>
                        <div class="activity-detail">
                            <h5>Data Orang Tua</h5>
                            <?php
                            $cek = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
                             id_daftar         = '$siswa[id_daftar]' and
                             nik_ayah                 is  null and
                             nama_ayah                     is  null and 
                             tempat_ayah                    is  null and
                             tgl_lahir_ayah                   is  null and
                             pendidikan_ayah              is  null and
                             pekerjaan_ayah                  is  null and
                             penghasilan_ayah              is  null and
                             nik_ibu                 is  null and
                             nama_ibu                     is  null and 
                             tempat_ibu                    is  null and
                             tgl_lahir_ibu                   is  null and
                             pendidikan_ibu              is  null and
                             pekerjaan_ibu                 is  null and
                             penghasilan_ibu              is  null 
                             
                            "));
                            if ($cek <> 0) { ?>
                                <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                                <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $.ajax({
            type: "POST", // Method pengiriman data bisa dengan GET atau POST
            url: "mod_daftar/crud_formulir.php?pg=get_provinsi&id=<?= $siswa['id_daftar'] ?>", // Isi dengan url/path file php yang dituju
            // data yang akan dikirim ke file yang dituju
            success: function(response) { // Ketika proses pengiriman berhasil
                $("#provinsi").html(response);

            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });

    });

    $("#provinsi").change(function() {
        var provinsi = $(this).val();
        console.log(provinsi);
        $.ajax({
            type: "POST", // Method pengiriman data bisa dengan GET atau POST
            url: "mod_daftar/crud_formulir.php?pg=get_kabupaten", // Isi dengan url/path file php yang dituju
            data: "provinsi=" + provinsi, // data yang akan dikirim ke file yang dituju
            success: function(response) { // Ketika proses pengiriman berhasil
                $("#kabupaten").html(response);
                // console.log(response);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
    $("#kabupaten").change(function() {
        var kabupaten = $(this).val();
        console.log(kabupaten);
        $.ajax({
            type: "POST", // Method pengiriman data bisa dengan GET atau POST
            url: "mod_daftar/crud_formulir.php?pg=get_kecamatan", // Isi dengan url/path file php yang dituju
            data: "kabupaten=" + kabupaten, // data yang akan dikirim ke file yang dituju
            success: function(response) { // Ketika proses pengiriman berhasil
                $("#kecamatan").html(response);
                //console.log(response);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
    $("#kecamatan").change(function() {
        var kecamatan = $(this).val();
        console.log(kecamatan);
        $.ajax({
            type: "POST", // Method pengiriman data bisa dengan GET atau POST
            url: "mod_daftar/crud_formulir.php?pg=get_desa", // Isi dengan url/path file php yang dituju
            data: "kecamatan=" + kecamatan, // data yang akan dikirim ke file yang dituju
            success: function(response) { // Ketika proses pengiriman berhasil
                $("#desa").html(response);

            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
    $('.form-control').keyup(function(event) {

        $(this).val($(this).val().toUpperCase());
    });
    $(document).ready(function() {
        $('#form-datadiri').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_daftar/crud_formulir.php?pg=simpandatadiri&id=<?= $siswa['id_daftar'] ?>',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter'
                        });

                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        $('#form-edit-status').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_daftar/crud_daftar.php?pg=status',
                data: $(this).serialize(),

                success: function(data) {

                    iziToast.success({
                        title: 'Terima Kasih!',
                        message: 'Data berhasil disimpan',
                        position: 'topCenter'
                    });
                    $('#modal-edit').modal('hide');
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            });
            return false;
        });
        $('#form-alamat').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_daftar/crud_formulir.php?pg=simpanalamat&id=<?= $siswa['id_daftar'] ?>',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter'
                        });

                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        $('#form-orangtua').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_daftar/crud_formulir.php?pg=simpanortu&id=<?= $siswa['id_daftar'] ?>',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter'
                        });

                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
        $('#form-berkas').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: 'mod_daftar/crud_formulir.php?pg=simpanberkas&id=<?= $siswa['id_daftar'] ?>',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {

                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter'
                        });

                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            });
        });


    });
</script>