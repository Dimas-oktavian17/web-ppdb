<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php
if ($pg == '') {
    include "home.php";
} elseif ($pg == 'formulir') {
    include "mod_formulir/formulir.php";
} elseif ($pg == 'detail') {
    include "mod_formulir/detail.php";  //Modul Detail Pendaftaran
} elseif ($pg == 'bayar') {
    if ($setting['pembayaran'] <> 1) {
        echo "<script>location.href='.';</script>";
    }
    include "mod_bayar/bayar.php";
} elseif ($pg == 'carabayar') {
    if ($setting['pembayaran'] <> 1) {
        echo "<script>location.href='.';</script>";
    }
    include "mod_bayar/cara_bayar.php";
} elseif ($pg == 'pengumuman') {
    include "mod_pengumuman/pengumuman.php";
} elseif ($pg == 'user') {
    include "mod_user/user.php";
} elseif ($pg == 'setting') {
    include "mod_setting/setting.php";
}
