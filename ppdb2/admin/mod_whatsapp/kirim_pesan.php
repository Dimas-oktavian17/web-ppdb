<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<div class="section-header">
    <h1>Kirim Pesan</h1>

</div>
<h2 class="section-title">Kirim Pesan Whatsapp</h2>

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <div class="alert alert-info" role="alert">
                    <strong>Template Kirim Pesan Dinamis</strong><br>
                    <button class="btn btn-sm" id="btnnama">{{nama}}</button>
                    <button class="btn btn-sm" id="btnasal">{{asal_sekolah}}</button>
                    <button class="btn btn-sm" id="btnsudahbayar">{{sudah_bayar}}</button>
                    <button class="btn btn-sm" id="btnbelumbayar">{{belum_bayar}}</button>
                    <button class="btn btn-sm" id="btnsekolah">{{nama_sekolah}}</button>
                    <button class="btn btn-sm" id="btnalamat">{{alamat_sekolah}}</button>

                </div>

                <form id="form-grab">
                    <div class="form-group">
                        <label for="Pesan">Isi Pesan</label>
                        <textarea class="form-control " name="pesan" id="pesan" style="min-height: 150px;"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="device">Pilih Device</label>
                                <select class="form-control" name="device" id="device" required>
                                    <?php
                                    $query = mysqli_query($koneksi, "select * from device where status='1'");
                                    while ($device = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?= $device['device_id'] ?>"><?= $device['nama_device'] ?> - <?= $device['no_hp'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Pilih Gambar atau Dokumen</label>
                                <input type="file" class="form-control-file" name="file" id="file" aria-describedby="fileHelpId">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Status Pendaftar</label>
                                <select class="select2 form-control" name="status" id="status" style="width: 100%;">
                                    <option value="semua">Semua</option>
                                    <option value="1">Diterima</option>
                                    <option value="0">Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <!-- <div class="col-md-4">
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
                        </div> -->
                    </div>
                    <div id="coba"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#btnnama').click(function() {
        $('#pesan').val($('#pesan').val() + '{{nama}}');
    });
    $('#btnasal').click(function() {
        $('#pesan').val($('#pesan').val() + '{{asal_sekolah}}');
    });
    $('#btnsudahbayar').click(function() {
        $('#pesan').val($('#pesan').val() + '{{sudah_bayar}}');
    });
    $('#btnbelumbayar').click(function() {
        $('#pesan').val($('#pesan').val() + '{{belum_bayar}}');
    });
    $('#btnsekolah').click(function() {
        $('#pesan').val($('#pesan').val() + '{{nama_sekolah}}');
    });
    $('#btnalamat').click(function() {
        $('#pesan').val($('#pesan').val() + '{{alamat_sekolah}}');
    });
    $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "mod_whatsapp/crud_pesan.php?pg=get_kontak", // Isi dengan url/path file php yang dituju
        // data yang akan dikirim ke file yang dituju
        success: function(response) { // Ketika proses pengiriman berhasil
            $("#coba").html(response);

        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
    $("#status").change(function() {
        var valu = $(this).val();
        console.log(valu);
        $.ajax({
            type: "POST", // Method pengiriman data bisa dengan GET atau POST
            url: "mod_whatsapp/crud_pesan.php?pg=get_kontak", // Isi dengan url/path file php yang dituju
            data: "status=" + valu, // data yang akan dikirim ke file yang dituju
            success: function(response) { // Ketika proses pengiriman berhasil
                $("#coba").html(response);
                // console.log(response);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
    $('#form-grab').submit(function(e) {
        e.preventDefault();
        swal({
            title: 'Are you sure?',
            text: 'Akan mengirim ke no kontak tersebut',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    type: 'POST',
                    url: 'mod_whatsapp/crud_pesan.php?pg=kirimpesan',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    // beforeSend: function() {
                    //     $('form button').on("click", function(e) {
                    //         e.preventDefault();
                    //     });
                    // },
                    success: function(data) {
                        console.log(data);

                        iziToast.success({
                            title: 'Mantap!',
                            message: data,
                            position: 'topRight'
                        });
                        // setTimeout(function() {
                        //     window.location.reload();
                        // }, 2000);



                        //$('#bodyreset').load(location.href + ' #bodyreset');
                    }
                });
            }
        })
        return false;
    });
</script>