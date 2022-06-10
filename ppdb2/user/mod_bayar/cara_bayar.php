<?php
if (!isset($_GET['id'])) {
    echo "<script> window.location.href = '?pg=bayar';</script>";
}
$id = $_GET['id'];
$qbayar = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM bayar where id_bayar='$id'"));
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Pembayaran</h2>
                <div class="card-header-action">
                </div>
            </div>
            <div class="card-body">

                <table class="table table-striped table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td scope="row">Jumlah Bayar</td>
                            <td><b><?= rupiah($qbayar['jumlah']) ?><b></td>

                        </tr>
                        <tr>
                            <td scope="row">Nomor Transaksi</td>
                            <td><?= $qbayar['id_bayar'] ?></td>

                        </tr>
                        <tr>
                            <td scope="row">Status Pembayaran</td>
                            <td><?php if ($qbayar['verifikasi'] == 1) { ?>
                                    <span class="badge badge-success">Pembayaran diterima</span>
                                <?php } else if ($qbayar['verifikasi'] == 0) { ?>
                                    <span class="badge badge-warning">Belum Dibayar</span>
                                <?php } else { ?>
                                    <span class="badge badge-primary">Proses Pengecekan</span>
                                <?php } ?>
                            </td>

                        </tr>
                    </tbody>
                </table>
                <div id="accordion">
                    <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2" aria-expanded="true">
                            <h4>Konfirmasi Pembayaran</h4>
                        </div>
                        <div class="accordion-body collapse show" id="panel-body-2" data-parent="#accordion">
                            <form id="form-bukti">
                                Selama status masih "Proses Pengecekan" anda masih bisa merubah bukti pembayaran jika ada kesalahan
                                <input type="hidden" class="form-control " name="id_bayar" value="<?= $id ?>">
                                <div class="form-group">
                                    <label for="tgl">Tanggal Pembayaran</label>
                                    <input type="text" class="form-control datepicker" name="tgl_bayar" id="tgl" required>
                                </div>
                                <div class="form-group">
                                    <label for="bukti">Bukti Pembayaran</label>
                                    <input type="file" class="form-control-file" name="file-bukti" id="bukti" accept="image/*" aria-describedby="fileHelpId" required>
                                    <small id="fileHelpId" class="form-text text-muted">Upload file JPG/PNG</small>
                                </div>
                                <?php if ($qbayar['bukti'] <> null or $qbayar['bukti'] <> "") { ?>
                                    <div class="gallery gallery-fw" data-item-height="200">
                                        <div class="gallery-item" data-image="../user/mod_bayar/<?= $qbayar['bukti'] ?>" data-title="Image 1"></div>
                                    </div>
                                <?php } ?>
                                <button type="submit" class="btn btn-success">Upload Bukti</button>
                            </form>
                        </div>

                    </div>
                    <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                            <h4>Cara Pembayaran</h4>
                        </div>
                        <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                            <?= $setting['infobayar'] ?>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
<script>
    $('#form-bukti').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_bayar/crud_bayar.php?pg=bukti',
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
                if (data == 'ok') {

                    iziToast.success({
                        title: 'Mantap!',
                        message: 'Data berhasil disimpan',
                        position: 'topRight'
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);

                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: data,
                        position: 'topRight'
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });
</script>