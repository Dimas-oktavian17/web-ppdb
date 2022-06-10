<!-- Modal -->
<div class="modal fade" id="tambahdata" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-tambah">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Pendaftar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control nik" required="">
                    </div>
                    <div class="form-group">
                        <label>Nama Pendaftar</label>
                        <input type="text" name="nama" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jenis Pendaftaran</label>
                        <select class="form-control" name="jenis" id="jenis" required>
                            <option value="">Pilih Jenis</option>
                            <?php
                            $query = mysqli_query($koneksi, "select * from jenis where status='1'");
                            while ($jenis = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= $jenis['id_jenis'] ?>"><?= $jenis['id_jenis'] ?> <?= $jenis['nama_jenis'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="asal">Asal Sekolah</label>
                        <select class="form-control select2" style="width: 100%;" name="asal" id="asal" required>
                            <option value="">Pilih Asal Sekolah</option>
                            <?php
                            $query = mysqli_query($koneksi, "select * from sekolah where status='1'");
                            while ($sekolah = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= $sekolah['npsn'] ?>"><?= $sekolah['nama_sekolah'] ?></option>
                            <?php }  ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="asal">Sekolah Tujuan</label>
                        <select class="form-control select2" style="width: 100%" name="pilihan" id="pilihan" required>
                            <option value="">Pilih Sekolah Pilihan</option>
                            <?php
                            $query = mysqli_query($koneksi, "select * from sekolahpilihan where status='1'");
                            while ($sekolah = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= $sekolah['npsn'] ?>"><?= $sekolah['nama_sekolah'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Pilihan Jenjang</label>
                        <select class="form-control" name="jenjang" id="jenjang" required>
                            <option value="">Pilih Jenjang</option>
                            <?php
                            $query = mysqli_query($koneksi, "select * from jenjang where status='1'");
                            while ($jenjang = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= $jenjang['id_jenjang'] ?>"><?= $jenjang['id_jenjang'] ?> <?= $jenjang['nama_jenjang'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <?php if ($setting['jurusan'] == 1) { ?>
                        <div class="form-group">
                            <label for="jurusan">Pilihan Jurusan</label>
                            <select class="form-control" name="jurusan" id="jurusan" required>
                                <option value="">Pilih Jurusan</option>
                                <?php
                                $query = mysqli_query($koneksi, "select * from jurusan where status='1'");
                                while ($jurusan = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?= $jurusan['id_jurusan'] ?>"><?= $jurusan['id_jurusan'] ?> <?= $jurusan['nama_jurusan'] ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="nohp" class="form-control nohp" required="">
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
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Pendaftar</h4>
                <div class="card-header-action">
                    <a class="btn btn-success" href="mod_daftar/export_excel.php" role="button"> Download Excel</a>
                    <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#tambahdata">
                        <i class="far fa-edit"></i> Tambah Data
                    </button>
                    <button type="button" id="btnhapus" class="btn btn-danger"><i class="fas fa-trash    "></i> Hapus</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table style="font-size: 12px" class="table table-striped table-sm" id="table-1">
                        <thead>
                            <tr>
                                <th><input type='checkbox' id='ceksemua'></th>
                                <th class="text-center">
                                    No
                                </th>
                                <th>Pilihan Jurusan</th>
                                <th>Nama Pendaftar</th>
                                <th>Asal Sekolah</th>
                                <th>Tanggal Daftar</th>
                                <th>No Hp</th>
                                <?php if ($setting['pembayaran'] == 1) { ?>
                                    <th>Bayar</th>
                                <?php } ?>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "select * from daftar");
                            $no = 0;
                            while ($daftar = mysqli_fetch_array($query)) {
                                $no++;
                                $bayar = mysqli_fetch_array(mysqli_query($koneksi, "select sum(jumlah) as total from bayar where id_daftar='$daftar[id_daftar]' "));
                            ?>
                                <tr>
                                    <td><input type='checkbox' name='cekpilih[]' class='cekpilih' id='cekpilih-<?= $no ?>' value="<?= $daftar['id_daftar'] ?>"></td>
                                    <td><?= $no; ?></td>
                                    <td><?= $daftar['jurusan'] ?></td>
                                    <td><?= $daftar['nama'] ?></td>
                                    <td><?= $daftar['asal_sekolah'] ?></td>
                                    <td><?= $daftar['tgl_daftar'] ?></td>
                                    <td>
                                        <i class="fab fa-whatsapp text-success   "></i>
                                        <a target="_blank" href="https://api.whatsapp.com/send?phone=62<?= $daftar['no_hp'] ?>&text=Terima%20kasih%20sudah%20mendaftar%20di%20SMK%20HS%20AGUNG%2C%0AHarap%20segera%20melakukan%20proses%20%2ADAFTAR%20ULANG%2A%20agar%20bisa%20diterima%20menjadi%20siswa%20baru%20di%20SMK%20HS%20AGUNG.%0AInfo%20lebih%20lanjut%20silahkan%20kunjungi%20website%20ppdb.smkhsagung.sch.id%0ASilahkan%20login%20dan%20lengkapi%20data%20formulirnya.%20%0Ausername%20%3A%20%2A<?= $daftar['no_daftar'] ?>%2A%0Apassword%20%3A%20%2A<?= $daftar['password'] ?>%2A">
                                            <?= $daftar['no_hp'] ?></a>
                                    </td>
                                    <?php if ($setting['pembayaran'] == 1) { ?>
                                        <td>
                                            <?php
                                            if ($bayar['total'] <> 0) { ?>
                                                <a href="?pg=bayar&id=<?= enkripsi($daftar['id_daftar']) ?>">Rp <?= number_format($bayar['total'], 0, ",", "."); ?></a>
                                            <?php  } else {
                                            ?>
                                                <a href="?pg=bayar&id=<?= enkripsi($daftar['id_daftar']) ?>" type="button" class="badge badge-danger">belum</a>
                                            <?php }
                                            ?>
                                        </td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($daftar['status'] == 1) { ?>
                                            <span class="badge badge-success">Lunas/diterima</span>
                                        <?php } elseif ($daftar['status'] == 2) { ?>
                                            <span class="badge badge-warning">HEREGISTRASI</span>
                                        <?php } else { ?>
                                            <span class="badge badge-danger">DAFTAR</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="?pg=detail&id=<?= enkripsi($daftar['id_daftar']) ?>" class="btn btn-sm btn-success"><i class="fas fa-eye    "></i></a>
                                        <!-- Button trigger modal -->

                                        <!-- <button data-id="<?= $daftar['id_daftar'] ?>" class="hapus btn-sm btn btn-danger"><i class="fas fa-trash    "></i></button> -->
                                        <!-- Modal -->

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
    $('#ceksemua').change(function() {
        $(this).parents('#table-1:eq(0)').
        find(':checkbox').attr('checked', this.checked);
    });
    $(function() {
        $("#btnhapus").click(function() {
            id_array = new Array();
            i = 0;
            $("input.cekpilih:checked").each(function() {
                id_array[i] = $(this).val();
                i++;
            });
            $.ajax({
                url: "mod_daftar/crud_daftar.php?pg=hapusdaftar",
                data: "kode=" + id_array,
                type: "POST",
                success: function(respon) {
                    if (respon == 1) {
                        $("input.cekpilih:checked").each(function() {
                            $(this).parent().parent().remove('.cekpilih').animate({
                                opacity: "hide"
                            }, "slow");
                        })
                    }
                }
            });
            return false;
        })
    });
    var cleaveI = new Cleave('.nik', {
        blocks: [16],

    });
    var cleaveI = new Cleave('.nohp', {
        blocks: [13]
    });
    $('#form-tambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_daftar/crud_daftar.php?pg=tambah',
            data: $(this).serialize(),
            beforeSend: function() {
                $('form button').on("click", function(e) {
                    e.preventDefault();
                });
            },
            success: function(data) {

                iziToast.success({
                    title: 'Mantap!',
                    message: data,
                    position: 'topRight'
                });
                // setTimeout(function() {
                //     window.location.reload();
                // }, 2000);
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
                    url: 'mod_daftar/crud_daftar.php?pg=hapus',
                    method: "POST",
                    data: 'id_daftar=' + id,
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