<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="section-header">

    <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#tambahdata">
        <i class="far fa-edit"></i> Tambah Data
    </button>

    <!-- Modal -->
    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-tambah">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data slide</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="slide-1" class="custom-file-input">
                                <label class="custom-file-label">Choose File</label>
                            </div>
                            <div class="form-text text-muted">Upload yang diperbolehkan ukuran maksimun 2Mb</div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnsimpan" class="btn btn-primary">Save</button>
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
                <h4>Data slide</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>

                                <th>Nama slide</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from slide");
                            $no = 0;
                            while ($slide = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>

                                    <td>
                                        <div class="gallery gallery-fw" data-item-height="150">
                                            <div class="gallery-item" data-image="../<?= $slide['nama_slide'] ?>" data-title="Image 1"></div>

                                        </div>
                                    </td>


                                    <td>
                                        <button data-id="<?= $slide['id_slide'] ?>" class="hapus btn btn-danger">Hapus</button>
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
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#form-tambah').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mod_slide/crud_slide.php?pg=tambah',
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
                    url: 'mod_slide/crud_slide.php?pg=hapus',
                    method: "POST",
                    data: 'id_slide=' + id,
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