<?php
session_start();
require("../config/database.php");
require("../config/function.php");
require("../config/function_sekolah.php");
require("../config/functions.crud.php");


if (isset($_SESSION['id_user'])) {
  $user = mysqli_fetch_array(mysqli_query($koneksi, "select * from user where id_user='$_SESSION[id_user]'"));
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin &mdash; PPDB</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="../assetss/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assetss/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries
    <link rel="stylesheet" href="../assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="../assets/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href="../assets/modules/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="../assets/modules/summernote/summernote-bs4.css"> -->

    <!-- CSS TOASTR -->
    <link rel="stylesheet" href="../assetss/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="../assetss/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="../assetss/modules/summernote/summernote-bs4.css">

    <!-- CSS DATATABLE -->
    <link rel="stylesheet" href="../assetss/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="../assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assetss/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="../assetss/modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../assetss/modules/chocolat/dist/css/chocolat.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="../assetss/css/style.css">
    <link rel="stylesheet" href="../assetss/css/components.css">
    <!-- Start GA -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script> -->

    <script src="../assetss/modules/jquery.min.js"></script>
    <!-- JS Libraies -->
    <script src="../assetss/modules/izitoast/js/iziToast.min.js"></script>
    <script src="../assetss/modules/sweetalert/sweetalert.min.js"></script>
    <!-- JS Libraies -->
    <script src="../assetss/modules/cleave-js/dist/cleave.min.js"></script>
    <script src="../assetss/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>



    <!-- <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'UA-94034622-3');
    </script> -->
    <!-- /END GA -->
    <style>
      .modal-backdrop {
        position: inherit;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 900;
        background-color: #000;

      }
    </style>
    <!-- Smartsupp Live Chat script -->
    <!-- <script type="text/javascript">
      var _smartsupp = _smartsupp || {};
      _smartsupp.key = '77ed94a8e63dac9adf98be37bff919ff119b315b';
      window.smartsupp || (function(d) {
        var s, c, o = smartsupp = function() {
          o._.push(arguments)
        };
        o._ = [];
        s = d.getElementsByTagName('script')[0];
        c = d.createElement('script');
        c.type = 'text/javascript';
        c.charset = 'utf-8';
        c.async = true;
        c.src = 'https://www.smartsuppchat.com/loader.js?';
        s.parentNode.insertBefore(c, s);
      })(document);
    </script> -->
  </head>

  <body>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
          <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
              <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            </ul>

          </form>
          <ul class="navbar-nav navbar-right">


            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="../assetss/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block"><?= $user['nama_user'] ?></div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">

                <a href="features-settings.html" class="dropdown-item has-icon">
                  <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item has-icon text-danger">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="index.html">ADMIN PPDB
              </a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="index.html">CP</a>
            </div>
            <!-- INCLUDE MAIN MENU DI MENU.PHP -->
            <?php include "menu.php" ?>
            <!-- <div class="mt-4 mb-3 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
              </a>
            </div> -->
          </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <?php include "content.php"; ?>
          </section>
        </div>
        <footer class="main-footer">
          <div class="footer-left">
            Copyright &copy; <?= date('Y') ?> ICT SMK KAWUNG 1 SURABAYA<div class="bullet"></div> 
          </div>
          <div class="footer-right">

          </div>
        </footer>
      </div>
    </div>

    <!-- General JS Scripts -->

    <script src="../assetss/modules/popper.js"></script>
    <script src="../assetss/modules/tooltip.js"></script>
    <script src="../assetss/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assetss/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="../assetss/modules/moment.min.js"></script>
    <script src="../assetss/js/stisla.js"></script>

    <!-- JS Libraies -->
    <!-- <script src="../assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
    <script src="../assets/modules/chart.min.js"></script>
    <script src="../assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="../assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../assets/modules/summernote/summernote-bs4.js"></script>
    <script src="../assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script> -->

    <!-- JS DATATABLE -->
    <script src="../assetss/modules/datatables/datatables.min.js"></script>
    <script src="../assetss/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assetss/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="../assetss/modules/jquery-ui/jquery-ui.min.js"></script>

    <!-- Page Specific DATATABLE -->
    <script src="../assetss/js/page/modules-datatables.js"></script>
    <script src="../assetss/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="../assetss/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="../assetss/modules/summernote/summernote-bs4.js"></script>

    <!-- Page Specific JS File
    <script src="../assets/js/page/index-0.js"></script> -->


    <!-- Template JS File -->
    <script src="../assetss/js/scripts.js"></script>
    <script src="../assetss/js/custom.js"></script>
    <script type="text/javascript">
      var url = window.location;
      // for sidebar menu entirely but not cover treeview
      $('ul.sidebar-menu a').filter(function() {
        return this.href == url;
      }).parent().addClass('active');

      // for treeview
      $('ul.dropdown-menu a').filter(function() {
        return this.href == url;
      }).closest('.treeview').addClass('active');
    </script>
    <!-- <script type='text/javascript' data-cfasync='false'>
      window.purechatApi = {
        l: [],
        t: [],
        on: function() {
          this.l.push(arguments);
        }
      };
      (function() {
        var done = false;
        var script = document.createElement('script');
        script.async = true;
        script.type = 'text/javascript';
        script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript';
        document.getElementsByTagName('HEAD').item(0).appendChild(script);
        script.onreadystatechange = script.onload = function(e) {
          if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {
            var w = new PCWidget({
              c: '3a902ebc-63db-4345-b136-90e1351bd3bd',
              f: true
            });
            done = true;
          }
        };
      })();
    </script> -->
  </body>

  </html>
<?php
} else {
  include "login.php";
}

?>