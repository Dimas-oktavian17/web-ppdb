<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="section-header">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#importdata">
        <i class="fas fa-file-excel    "></i> Import Data
    </button>&nbsp;

    <!-- Modal -->
    <div class="modal fade" id="importdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-import">
                    <div class="modal-header">
                        <h5 class="modal-title">Import Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file">Import File Excel</label>
                            <input type="file" class="form-control-file" name="file" id="file" placeholder="" aria-describedby="helpfile" required>
                            <small id="helpfile" class="form-text text-muted">File harus .xlx</small>
                        </div>
                        <a href="template_excel/importsekolah.xls">Download template Excel</a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#tambahdata">
        <i class="far fa-edit"></i> Tambah Data
    </button>&nbsp;

    <!-- Modal -->
    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-tambah">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Sekolah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NPSN</label>
                            <input type="text" name="npsn" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Nama Sekolah</label>
                            <input type="text" name="nama" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control">
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
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Ambil Data Sekolah</h4>
            </div>
            <div class="card-body">
                <form id="form-grab">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinsi"></label>
                                <select class="select2 form-control" name="provinsi" id="provinsi" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kabupaten"></label>
                                <select class="select2 form-control" name="kabupaten" id="kabupaten" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kecamatan"></label>
                                <select class="select2 form-control" name="kecamatan" id="kecamatan" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="coba"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Sekolah</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>NPSN</th>
                                <th>Nama Sekolah</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from sekolahpilihan");
                            $no = 0;
                            while ($sekolah = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $sekolah['npsn'] ?></td>
                                    <td><?= $sekolah['nama_sekolah'] ?></td>
                                    <td><?= $sekolah['alamat'] ?></td>
                                    <td>
                                        <?php if ($sekolah['status'] == 1) { ?>
                                            <span class="badge badge-success">Aktif</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Non Aktif</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <button data-id="<?= $sekolah['npsn'] ?>" class="hapus btn-sm btn btn-danger"><i class="fas fa-trash"></i>Hapus</button>
                                        <!-- Button trigger modal -->


                                    </td>
                                </tr>

                            <?php }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "mod_sekolahpilihan/crud_sekolahpilihan.php?pg=get_provinsi", // Isi dengan url/path file php yang dituju
        // data yang akan dikirim ke file yang dituju
        success: function(response) { // Ketika proses pengiriman berhasil
            $("#provinsi").html(response);

        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
    $("#provinsi").change(function() {
        var provinsi = $(this).val();
        console.log(provinsi);
        $.ajax({
            type: "POST", // Method pengiriman data bisa dengan GET atau POST
            url: "mod_sekolahpilihan/crud_sekolahpilihan.php?pg=get_kabupaten", // Isi dengan url/path file php yang dituju
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
            url: "mod_sekolahpilihan/crud_sekolahpilihan.php?pg=get_kecamatan", // Isi dengan url/path file php yang dituju
            data: "kabupaten=" + kabupaten, // data yang akan dikirim ke file yang dituju
            success: function(response) { // Ketika proses pengiriman berhasil
                $("#kecamatan").html(response);
                // console.log(response);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
    $("#kecamatan").change(function() {
        var kec = $(this).val();
        console.log(kec);
        $.ajax({
            type: "POST", // Method pengiriman data bisa dengan GET atau POST
            url: "mod_sekolahpilihan/crud_sekolahpilihan.php?pg=get_sekolah", // Isi dengan url/path file php yang dituju
            data: "kec=" + kec, // data yang akan dikirim ke file yang dituju
            success: function(response) { // Ketika proses pengiriman berhasil
                $("#coba").html(response);
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
    //IMPORT FILE PENDUKUNG 
    $('#form-import').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_sekolahpilihan/crud_sekolahpilihan.php?pg=import',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                $('#importdata').modal('hide');
                iziToast.success({
                    title: 'Mantap!',
                    message: data,
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);


            }
        });
    });
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_sekolahpilihan/crud_sekolahpilihan.php?pg=tambah',
            data: $(this).serialize(),
            success: function(data) {
                if (data == 'OK') {
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
                        message: 'Data Gagal ditambahkan',
                        position: 'topRight'
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });
    $('#form-grab').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_sekolahpilihan/crud_sekolahpilihan.php?pg=grab_sekolah',
            data: $(this).serialize(),
            success: function(data) {
                console.log(data);

                iziToast.success({
                    title: 'Mantap!',
                    message: 'Data Berhasil ditambahkan',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);



                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });
    $('#table-1').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Akan menghapus data ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_sekolahpilihan/crud_sekolahpilihan.php?pg=hapus',
                    method: "POST",
                    data: 'npsn=' + id,
                    success: function(data) {
                        iziToast.error({
                            title: 'Horee!',
                            message: 'Data Berhasil dihapus',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                });
            }
        })

    });
</script>