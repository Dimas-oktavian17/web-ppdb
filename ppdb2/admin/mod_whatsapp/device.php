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
                        <h5 class="modal-title">Tambah Data Device</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Device Id</label>
                            <input type="text" name="device_id" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Nama Device</label>
                            <input type="text" name="nama_device" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>No_HP</label>
                            <input type="text" name="no_hp" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <div class="control-label">Status Device</div>
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status" class="custom-switch-input" value='1'>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description"> Pilih Status</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <div class="control-label">Jadikan No Utama ?</div>
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="no_utama" class="custom-switch-input" value='1'>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description"> Ya / Tidak</span>
                            </label>
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
                <h4>Data Device</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Device Id</th>
                                <th>Nama Device</th>
                                <th>No_HP</th>
                                <th>Status</th>
                                <th>No Utama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from device");
                            $no = 0;
                            while ($device = mysqli_fetch_array($query)) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $device['device_id'] ?></td>
                                    <td><?= $device['nama_device'] ?></td>
                                    <td><?= $device['no_hp'] ?></td>
                                    <td>
                                        <?php if ($device['status'] == 1) { ?>
                                            <span class="badge badge-success">Aktif</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Non Aktif</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($device['no_utama'] == 1) { ?>
                                            <span class="badge badge-success">Ya</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">Tidak</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <button data-id="<?= $device['id_device'] ?>" class="hapus btn btn-danger">Hapus</button>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form id="form-edit<?= $no ?>">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" value="<?= $device['id_device'] ?>" name="id_device" class="form-control" required="">
                                                            <div class="form-group">
                                                                <label>Device Id</label>
                                                                <input type="text" name="device_id" value="<?= $device['device_id'] ?>" class="form-control" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nama device</label>
                                                                <input type="text" name="nama_device" value="<?= $device['nama_device'] ?>" class="form-control" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>No_Hp</label>
                                                                <input type="text" name="no_hp" value="<?= $device['no_hp'] ?>" class="form-control" required="">
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="control-label">Status device</div>
                                                                <label class="custom-switch mt-2">
                                                                    <input type="checkbox" name="status" class="custom-switch-input" value='1' <?php if ($device['status'] == 1) {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span class="custom-switch-description"> Pilih Status</span>
                                                                </label>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="control-label">No Utama</div>
                                                                <label class="custom-switch mt-2">
                                                                    <input type="checkbox" name="no_utama" class="custom-switch-input" value='1' <?php if ($device['no_utama'] == 1) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                                                    <span class="custom-switch-indicator"></span>
                                                                    <span class="custom-switch-description"> No Utama Ya/ Tidak</span>
                                                                </label>
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
                                    </td>
                                </tr>
                                <script>
                                    $('#form-edit<?= $no ?>').submit(function(e) {
                                        e.preventDefault();
                                        $.ajax({
                                            type: 'POST',
                                            url: 'mod_whatsapp/crud_device.php?pg=ubah',
                                            data: $(this).serialize(),
                                            success: function(data) {

                                                iziToast.success({
                                                    title: 'OKee!',
                                                    message: 'Data Berhasil diubah',
                                                    position: 'topRight'
                                                });
                                                setTimeout(function() {
                                                    window.location.reload();
                                                }, 2000);
                                                $('#modal-edit<?= $no ?>').modal('hide');
                                                //$('#bodyreset').load(location.href + ' #bodyreset');
                                            }
                                        });
                                        return false;
                                    });
                                </script>
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
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_whatsapp/crud_device.php?pg=tambah',
            data: $(this).serialize(),
            success: function(data) {

                iziToast.success({
                    title: 'Mantap!',
                    message: 'Data Berhasil ditambahkan',
                    position: 'topRight'
                });
                setTimeout(function() {
                    window.location.reload();
                }, 2000);
                $('#tambahdata').modal('hide');
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
                    url: 'mod_whatsapp/crud_device.php?pg=hapus',
                    method: "POST",
                    data: 'id_device=' + id,
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