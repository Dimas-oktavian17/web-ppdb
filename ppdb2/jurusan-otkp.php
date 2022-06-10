<?php

session_start();
error_reporting();
include "config/colokan.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="generator" content="Mobirise v4.9.3, mobirise.com" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, minimum-scale=1"
    />
    <meta name="description" content="Website Generator Description" />
    <title>Jurusan OTKP</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="./asset/Ilustrasi-Icon/logo/kawung-logo.png" type="image/x-icon">
    <!-- Bootstrap,Aos,Animate.css,ionic-icons-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="./asset/animatecss/animate.min.css" />
    <link rel="stylesheet" href="./asset/Bootstrap/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="./asset/bootstrap-footer-18/bootstrap-footer-18/css/ionicons.min.css"
    />
    <!-- end -->
    <!-- Css Only -->
    <link rel="stylesheet" href="./asset/CSS/jurusan.css" />
    <!-- end -->
  </head>
  <body>
    <!--navbar  -->
    <nav
      class="navbar fixed-top navbar-expand-lg navbar-light p-md-3 lh-base"
      id="nav"
    >
      <div class="container">
        <img
          src="./asset/Ilustrasi-Icon/logo/kawung-logo.png"
          alt=""
          class="me-2"
          style="width: 3em"
        />
        <a class="navbar-brand text-dark text-start" href="./index.php"
          >SMK KAWUNG 1 SURABAYA</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mx-auto"></div>
          <ul class="navbar-nav">
            <li
              class="nav-item pe-2"
              data-toggle="collapse"
              data-target=".navbar-collapse.show"
            >
              <a class="nav-link" href="./index.php">Beranda</a>
            </li>
            <li class="nav-item pe-2">
              <a class="nav-link" href="./alur-pendaftaran.php"
                >Alur Pendaftaran</a
              >
            </li>
            <li
              class="nav-item pe-2"
              data-toggle="collapse"
              data-target=".navbar-collapse.show"
            >
              <a class="nav-link" href="./index.php">Program Keahlian</a>
            </li>
            <li
              class="nav-item pe-2"
              data-toggle="collapse"
              data-target=".navbar-collapse.show"
            >
              <a class="nav-link" href="./index.php">Ekstrakurikuler</a>
            </li>
            <li
              class="nav-item pe-2"
              data-toggle="collapse"
              data-target=".navbar-collapse.show"
            >
              <a class="nav-link" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end navbar -->
    <!-- Content -->
    <section class="content" style="margin-top: 12em">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mt-5">
            <div class="container">
              <h1 class="title">Otomatisasi dan Tata Kelola Perkantoran</h1>
              <p class="lead">
                Mempelajari tentang Kearsipan,Public Relations dan Aspek"
                penting lainya yang berkaitan dengan Otomatisasi dan Tata Kelola
                Perkantoran
              </p>
              <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button
                      class="accordion-button"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#panelsStayOpen-collapseOne"
                      aria-expanded="true"
                      aria-controls="panelsStayOpen-collapseOne"
                    >
                      <img
                        src="./asset/Ilustrasi-Icon/major/document.png"
                        alt="Kearsipan"
                      />
                      Kearsipan
                    </button>
                  </h2>
                  <div
                    id="panelsStayOpen-collapseOne"
                    class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-headingOne"
                  >
                    <div class="accordion-body">
                      Siswa akan mempelajari cara mengatur atau menyusun
                      sedemikian rupa arsip-arsip yang ada dengan tujuan agar
                      pencarian arsip tersebut akan mudah dilakukan.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#panelsStayOpen-collapseTwo"
                      aria-expanded="false"
                      aria-controls="panelsStayOpen-collapseTwo"
                    >
                      <img
                        src="./asset/Ilustrasi-Icon/major/conversation.png"
                        alt="Public Relations"
                      />
                      Public Relations
                    </button>
                  </h2>
                  <div
                    id="panelsStayOpen-collapseTwo"
                    class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingTwo"
                  >
                    <div class="accordion-body">
                      Siswa akan mempelajari suatu fungsi manajemen yang memulai
                      sikap publik, menunjukkan kebijaksanaan dan prosedur dari
                      individu atau organisasi atas dasar kepentingan publik dan
                      melaksanakan rencana kerja untuk memperoleh pengertian dan
                      pengakuan publik.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#panelsStayOpen-collapseThree"
                      aria-expanded="false"
                      aria-controls="panelsStayOpen-collapseThree"
                    >
                      <img
                        src="./asset/Ilustrasi-Icon/major/job.png"
                        alt="Peluang Kerja"
                      />
                      Peluang Kerja
                    </button>
                  </h2>
                  <div
                    id="panelsStayOpen-collapseThree"
                    class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingThree"
                  >
                    <div class="accordion-body">
                      Lulusan OTKP banyak bekerja pada posisi Receptionist,Front
                      Office,Staf Operasional Gudang,Staff Admin
                      Produksi,Sekretaris perusahaan
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <figure class="figure">
              <img
                src="./asset/Ilustrasi-Icon/content-img/content.png"
                class="figure-img img-fluid rounded"
                alt="Otomatisasi dan Tata Kelola Perkantoran"
                data-aos="fade-up"
              />
            </figure>
          </div>
        </div>
      </div>
    </section>
    <!-- end content -->
    <!--footer-->
    <footer class="footer-08" id="contact" style="margin-top: 6.25em">
      <div class="container-fluid px-lg-5">
        <div class="row">
          <div class="col-md-12 py-5">
            <div class="row">
              <div class="col-md-4 mb-md-0 mb-4">
                <img
                  src="./asset/Ilustrasi-Icon/logo/kawung-logo.png"
                  style="margin-bottom: 1em"
                  alt=""
                  width="30%"
                />
                <h2 class="footer-heading">Lokasi Kami</h2>
                <p style="color: #cbd5e1">
                  Surabaya, jl.Parang klitik No: 2 Kemayoran - Krembangan.
                </p>
                <ul
                  class="ftco-footer-social p-0 d-flex flex-row"
                  style="list-style: none"
                >
                  <li class="ftco-animate">
                    <a href="https://twitter.com/smkkawung1sby"
                      ><span class="ion-logo-twitter"></span
                    ></a>
                  </li>
                  <li class="ftco-animate">
                    <a
                      href="https://www.facebook.com/smk_kawung1_official-102331551880793"
                      ><span class="ion-logo-facebook"></span
                    ></a>
                  </li>
                  <li class="ftco-animate">
                    <a
                      href="https://instagram.com/smk_kawung1_official?utm_medium=copy_link"
                      ><span class="ion-logo-instagram"></span
                    ></a>
                  </li>
                </ul>
              </div>
              <div class="col-md-8">
                <div class="row justify-content-center">
                  <div class="col-md-12 col-lg-9">
                    <div class="row">
                      <div class="col-md-6 mb-md-0 mb-4">
                        <h2 class="footer-heading">Tautan Lain</h2>
                        <ul class="list-unstyled">
                          <li>
                            <a href="./index.php" class="py-2 d-block"
                              >Beranda</a
                            >
                          </li>
                          <li>
                            <a
                              href="./alur-pendaftaran.php"
                              class="py-2 d-block"
                              >Alur Pendaftaran</a
                            >
                          </li>
                          <li>
                            <a href="./index.php" class="py-2 d-block"
                              >Program Keahlian</a
                            >
                          </li>
                          <li>
                            <a href="./index.php" class="py-2 d-block"
                              >Ekstrakurikuler</a
                            >
                          </li>
                        </ul>
                      </div>
                      <div class="col-md-6 mb-md-0 mb-4">
                        <h2 class="footer-heading">Contact</h2>
                        <ul class="list-unstyled">
                          <li>
                            <a
                              href="https://api.whatsapp.com/send?phone=628978378911&text=Permisi Abang Frondt end"
                              class="py-2 d-block"
                              ><img
                                src="./asset/Ilustrasi-Icon/logo/phone-portrait-outline.svg"
                                alt=""
                              />+62 812 3526 9999 (pak Dimas)</a
                            >
                          </li>
                          <li>
                            <a
                              href="https://api.whatsapp.com/send?phone=628978378911&text=Permisi Abang Frondt end"
                              class="py-2 d-block"
                              ><img
                                src="./asset/Ilustrasi-Icon/logo/phone-portrait-outline.svg"
                                alt=""
                              />+62 812 3526 8888 (Bu Dian)</a
                            >
                          </li>
                          <li>
                            <a
                              href="https://api.whatsapp.com/send?phone=628978378911&text=Permisi Abang Frondt end"
                              class="py-2 d-block"
                              ><img
                                src="./asset/Ilustrasi-Icon/logo/phone-portrait-outline.svg"
                                alt=""
                              />+62 812 3526 7777 (Bu Felly)</a
                            >
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-md-5">
              <div class="col-md-12">
                <p class="copyright text-light">
                  Copyright All rights reserved | DmsOkr
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- end footer -->
    <!--script-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./asset/bootstrap-footer/js/jquery.min.js"></script>
    <script src="./asset/bootstrap-footer/js/popper.js"></script>
    <script src="./asset/bootstrap-footer/js/bootstrap.min.js"></script>
    <script src="./asset/js/aos.js"></script>
    <script src="./asset/Bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./asset/js/window.js"></script>
    <!--akhir script-->
  </body>
</html>
