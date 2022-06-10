<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php
$cek = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
                             id_daftar         = '$siswa[id_daftar]' and
                             file_kk                 is not  null and
                             file_ktp                is not null and 
                             file_akte               is not null 
                            "));

if ($cek == 0) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        Data berkas belum lengkap, Silahkan lengkapi form UPLOAD BERKAS anda klik tombol ini untuk isi formulir <a class="btn btn-success" href="?pg=formulir" role="button">Isi Formulir</a>
    </div>
<?php } elseif ($cek <> 0 and $siswa['status'] == 1) { ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>DAFTAR BIAYA ADMINISTRASI</h4>
                    <div class="card-header-action">
                        <?php $query = mysqli_query($koneksi, "select sum(jumlah) as total from biaya");
                        $total = mysqli_fetch_array($query);
                        ?>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsiv">
                        <table class="table table-striped table-sm" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Nama Biaya</th>
                                    <th>Jumlah Biaya</th>

                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td>1</td>
                                    <td>SPP</td>
                                    <td><?= rupiah($setting['spp']) ?></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sumbangan Pembangunan</td>
                                    <td><?= rupiah($setting['spb']) ?></td>
                                </tr> -->
                                <?php
                                $query = mysqli_query($koneksi, "select * from biaya");
                                $no = 0;
                                $tot = 0;
                                while ($biaya = mysqli_fetch_array($query)) {
                                    $no++;


                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $biaya['nama_biaya'] ?></td>

                                        <td><?= rupiah($biaya['jumlah']) ?></td>
                                        <?php $tot = $tot + $biaya['jumlah'] ?>

                                    </tr>
                                <?php }
                                ?>
                                <tr>
                                    <td colspan="2">Total Biaya</td>

                                    <td><b><?= rupiah($tot) ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card author-box card-primary">
                <div class="card-header">
                    <h4>DATA PEMBAYARAN</h4>
                    <div class="card-header-action">
                        <!-- Button trigger modal -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modelId">
                            <i class="fas fa-info-circle    "></i> Info Pembayaran
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Info Pembayaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?= $setting['infobayar'] ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdata">
                            <i class="fas fa-plus-circle    "></i> Tambah Bayar
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Pembayaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="form-bayar">
                                    <div class="modal-body">
                                        <label for="biaya">Pilih Pembayaran</label><br>
                                        <?php
                                        $biaya = mysqli_query($koneksi, "Select * from biaya");
                                        foreach ($biaya as $biaya) {
                                            $bayar = mysqli_num_rows(mysqli_query($koneksi, "Select * from bayar where id_daftar='$siswa[id_daftar]' and id_biaya like '%" . $biaya['id_biaya'] . "%'"));

                                            $stat = "";
                                            if ($bayar == 1) {
                                                $stat = 'disabled';
                                            } else {
                                                $stat = "";
                                            }
                                        ?>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">

                                                    <input <?= $stat ?> class="form-check-input" type="checkbox" name="biaya[]" data-id="<?= $biaya['jumlah'] ?>" value="<?= $biaya['id_biaya'] ?>" <?php if ($biaya['status'] == 1) {
                                                                                                                                                                                                        echo "required";
                                                                                                                                                                                                    } ?> oninvalid="this.setCustomValidity('Pembayaran Wajib')" oninput="setCustomValidity('')"><?= $biaya['nama_biaya'] ?>


                                                </label>
                                            </div>

                                        <?php } ?>
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah Pembayaran Rp.</label>
                                            <input type="text" class="form-control uang" name="jumlah" id="jumlah" aria-describedby="helpjumlah" required onkeypress="return false;">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="tgl">Tanggal Pembayaran</label>
                                            <input type="text" class="form-control datepicker" name="tgl" id="tgl" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="bukti">Bukti Pembayaran</label>
                                            <input type="file" class="form-control-file" name="bukti" id="bukti" accept="image/*" aria-describedby="fileHelpId" required>
                                            <small id="fileHelpId" class="form-text text-muted">Upload file JPG/PNG</small>
                                        </div> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" id="tablebayar" style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Kode Transaksi</th>

                                    <th>Jumlah Bayar</th>

                                    <th>Pembayaran</th>
                                    <th>Status</th>

                                    <th>Action</th>
                                    <!-- <th>Bukti</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "select * from bayar a join daftar b ON a.id_daftar=b.id_daftar where a.id_daftar='$siswa[id_daftar]'");
                                $no = 0;
                                while ($bayar = mysqli_fetch_array($query)) {
                                    $user = fetch($koneksi, 'user', ['id_user' => $bayar['id_user']]);
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $bayar['id_bayar'] ?></td>

                                        <td><?= "Rp " . number_format($bayar['jumlah'], 0, ",", ".") ?></td>

                                        <td><?= $bayar['id_biaya'] ?></td>
                                        <td>
                                            <?php if ($bayar['verifikasi'] == 1) { ?>
                                                <span class="badge badge-success">Pembayaran diterima</span>
                                            <?php } else if ($bayar['verifikasi'] == 0) { ?>
                                                <span class="badge badge-warning">Belum Dibayar</span>
                                            <?php } else { ?>
                                                <span class="badge badge-primary">Proses Cek</span>
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <?php if ($bayar['verifikasi'] == 0) { ?>
                                                <button data-id="<?= $bayar['id_bayar'] ?>" class="hapus btn btn-danger btn-sm"><i class="fas fa-trash    "></i> Batal</button>
                                                <a href="?pg=carabayar&id=<?= $bayar['id_bayar'] ?>" class="btn btn-success btn-sm"><i class="fas fa-eye    "></i> Bayar</a>
                                            <?php } elseif ($bayar['verifikasi'] == 2) { ?>
                                                <button data-id="<?= $bayar['id_bayar'] ?>" class="hapus btn btn-danger btn-sm"><i class="fas fa-trash    "></i> Batal</button>
                                                <a href="?pg=carabayar&id=<?= $bayar['id_bayar'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-image   "></i> Bukti</a>
                                            <?php } else { ?>
                                                <a target="_blank" href="mod_bayar/print_kwitansi.php?id=<?= enkripsi($bayar['id_bayar']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-print    "></i> Cetak</a>

                                            <?php } ?>
                                        </td>
                                        <!-- <td><a target="_blank" class="btn btn-primary btn-sm" href="mod_bayar/<?= $bayar['bukti'] ?>" role="button"><i class="fas fa-file"></i> </a></td> -->
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>

                    </div>
                    <?php
                    $bayar = mysqli_fetch_array(mysqli_query($koneksi, "select sum(jumlah) as total from bayar where id_daftar='$siswa[id_daftar]' and verifikasi='1'"));
                    $sisa = $tot - $bayar['total'];
                    ?>
                    <table class="table table-sm table-striped mt-4" style="font-size:15px">
                        <tbody>
                            <tr>
                                <th scope="row" width="200">TOTAL PEMBAYARAN</th>
                                <td><?= "Rp " . number_format($bayar['total'], 0, ",", ".") ?></td>
                            </tr>
                            <tr>
                                <th scope="row">SISA BAYAR</th>
                                <td><?= "Rp " . number_format($sisa, 0, ",", ".") ?></td>
                            </tr>
                            <tr>
                                <th scope="row">STATUS</th>
                                <td>
                                    <?php if ($sisa <= 0) { ?>
                                        <span class="badge badge-success">SUDAH LUNAS</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger">BELUM LUNAS</span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <center>
                        <?php
                        $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM bayar where id_daftar='$siswa[id_daftar]' and verifikasi='1'"));
                        if ($cek <> 0) { ?>
                            <a target="_blank" href="mod_formulir/print_daftar.php?id=<?= enkripsi($siswa['id_daftar']) ?>" type="button" class="btn btn-success btn-lg"><i class="fas fa-print    "></i> Cetak Formulir</a>
                        <?php } else { ?>
                            <button class="btn btn-success btn-lg disabled"><i class="fas fa-print    "></i> Cetak Formulir</button>
                        <?php } ?>
                        <br>Tombol cetak formulir akan aktif setelah ada pembayaran yang sudah diverifikasi panitia
                    </center>
                </div>
            </div>
        </div>
    </div>
    <script>
        var cleaveI = new Cleave('.uang', {
            numeral: true
        });
    </script>

    <script>
        var $total = 0;


        $('input:checkbox').on('change', function() {
            var jumlah = $(this).data('id');
            // if ($('input:checked').length == 3) {
            //     $('input:checkbox:not(:checked)').attr("disabled", true);
            // } else {
            //     $('input:checkbox:not(:checked)').attr("disabled", false);
            // }
            if (this.checked)
                $total += parseInt(jumlah);
            else
                $total -= parseInt(jumlah);

            $('#jumlah').val($total);

            // if ($total2 > $total)
            //     $('#total').html('<b>Discount  price: </b>' + $total);
            // else
            //     $('#total').html('<b>Normal price: </b>' + $total);

        });
        $('#form-bayar').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_bayar/crud_bayar.php?pg=tambah',
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
                        $('#tambahdata').modal('hide');
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


        $('#tablebayar').on('click', '.hapus', function() {
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
                        url: 'mod_bayar/crud_bayar.php?pg=hapus',
                        method: "POST",
                        data: 'id_bayar=' + id,
                        success: function(data) {
                            iziToast.error({
                                title: 'Hmm!',
                                message: 'Pembayaran berhasil dibatalkan',
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
<?php } else { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        Pembayaran bisa dilakukan setelah verifikasi isian formulir dan berkas oleh Panitia PPDB, mohon untuk menunggu.
    </div>

<?php } ?>