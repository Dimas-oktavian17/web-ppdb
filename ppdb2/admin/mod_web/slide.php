<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>SLIDE GAMBAR</h4>
            </div>
            <form id="form-slide">
                <div class="card-body">
                    <div class="form-group row mb-2">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kartu Keluarga</label>
                        <div class="col-sm-12 col-md-8">
                            <div class="custom-file">
                                <input type="file" name="slide-1" class="custom-file-input">
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
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ijazah / Surat Keterangan Lulus</label>
                        <div class="col-sm-12 col-md-8">
                            <div class="custom-file">
                                <input type="file" name="slide-2" class="custom-file-input">
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
                                <input type="file" name="slide-3" class="custom-file-input">
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
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#infobayar').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_setting/crud_setting.php?pg=syarat',
            data: $(this).serialize(),
            success: function(data) {
                if (data == 'ok') {
                    iziToast.success({
                        title: 'Mantap!',
                        message: 'Data Berhasil ditambahkan',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $('#tambahdata').modal('hide');
                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: 'Data Gagal ditambahkan ',
                        position: 'topRight'
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });
</script>