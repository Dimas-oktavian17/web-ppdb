<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>SMK Kawung 1 Surabaya</title>
   <link rel="icon" href="img/smkkawung1.jpg">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
   <!-- animate CSS -->
   
   <link rel="stylesheet" href="css/animate.css">
   <!-- owl carousel CSS -->
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <!-- themify CSS -->
   <link rel="stylesheet" href="css/themify-icons.css">
   <!-- flaticon CSS -->
   <link rel="stylesheet" href="css/flaticon.css">
   <!-- magnific-popup CSS -->
   <link rel="stylesheet" href="css/magnific-popup.css">
   <!-- font awesome CSS -->
   <link rel="stylesheet" href="fontawesome/css/all.min.css">
   <!-- style CSS -->
   <link rel="stylesheet" href="css/style.css">
   
</head>

<body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e8b5ffa35bcbb0c9aae5bf1/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<!-- /Getbutton.io widget -->
   <!--::menu part start::-->
   <header class="main_menu home_menu">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <a class="navbar-brand" href="index.html"> <img src="img/smkkawung1.jpg" width="50px" alt="logo"> </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                     aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse main-menu-item" id="navbarNav">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="smkkawung1sby.com/../pendaftaran.html">Pendaftaran PPDB</a>
                        </li>
                        <!-- <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact us</a>
                        </li> -->
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </header>
   <!--::menu part end::-->
<style>
.lebargarissisiberbeda {
   border-top-width: 2px;
   border-right-width: 6px;
   border-bottom-width: 10px;
   border-left-width: 14px;
   border-style: solid;
   border-color: blue;
}
</style>
   <!--::banner part start::-->
   
   <section class="">
      
      <div class="container">
      
         <div class="row">
          
           
            <div class="col-lg-12 offset-lg-1 col-sm-7 offset-sm-2">
               
                  
                  <div class="banner_text aling-items-center"></div>
                     <div class="banner_text_iner">
      <br><br><br><br><br>

                     <h5 align="center">PPDB</h5>
                     <h2 align="center">SMK KAWUNG 1  
                        Surabaya</h2>
                     <p align ="center"> Selamat Datang Di PPDB SMK Kawung 1 Surbaya Tahun Ajaran 2020/2021 </p>
                     <br><br>
                     <p align ="center"> DATA YANG SUDAH MENDAFTAR DI SMK KAWUNG 1 SURABAYA </p>
                   
        <tbody>
            <center>
		     <?php 
		    
		 
	include 'colokan.php';

$batas   = 10;
$halaman = @$_GET['halaman'];
if(empty($halaman)){
 $posisi  = 0;
 $halaman = 1;
}
else{ 
  $posisi  = ($halaman-1) * $batas; 
}

// Langkah 2. Sesuaikan query dengan posisi dan batas
$query  = "SELECT * FROM siswa LIMIT $posisi,$batas";
$kuota=216; $terpakai=0;
$tampil = mysqli_query($colok, $query);


echo "<table>
      <tr><th>No</th><th>Nama</th><th>sekolah asal</th></tr>";

$no = $posisi+1;
while ($data=mysqli_fetch_array($tampil)){
   $terpakai++;
  echo "<tr>
          <td>$no</td>
          <td>$data[nm_siswa]</td>
          <td>$data[nm_sekolah]</td>
        </tr>";
  $no++;
} 
echo "</table>";
// Langkah 3: Hitung total data dan halaman serta link 1,2,3 
$query2     = mysqli_query($colok, "select * from siswa");

	$terpakai++;
$jmldata    = mysqli_num_rows($query2);
$jmlhalaman = ceil($jmldata/$batas);

echo "<br> Halaman : ";

for($i=1;$i<=$jmlhalaman;$i++)
if ($i != $halaman){
 echo " <a href=\"datappdb.php?halaman=$i\">$i</a> | ";
}
else{ 
 echo " <b>$i</b> | "; 
}
// echo "<p>Total anggota : <b>$jmldata</b> Siswa Baru</p>";
?>
	    
		
		
       
	</center>
		</tbody>
     </table> 
     <h3 class="lebargarissisiberbeda" align ="center"> Segera daftarkan diri anda! <br>
    pagu terbatas hanya 6 kelas !<br>
    </h3>

                   
                     <center> <a align="center"  href="smkkawung1sby.com/../pendaftaran.html" class="btn_1">DAFTAR PPDB DISINI!</a>
                     <br><br>
                     <h3 class="lebargarissisiberbeda" align  ="center">Video tata cara mendaftar PPDB <br>
                          <iframe  width="300" height="300" src="https://www.youtube.com/embed/i11qOCqCQ74" frameborder="0"  allowfullscreen></iframe> </h3>
                     </div>
                  </div>
               </div>
            </div>
            <BR></BR>
         </div>
      </div>
      <section class="service_part">
      <div class="container">
         <div class="row justify-content-between align-items-center">
            <div class="col-lg-7 col-xl-6">
               <div class="section_tittle">
                  <h2> Program Khusus Untuk kelas 10 <span>(Interest and Classes)</span></h2>
               </div>
               <div class="service_part_iner">
                  <div class="row">
                     <div class="col-lg-6 col-sm-6">
                        <div class="single_service_text ">
                           <img src="img/icon/service_1.svg" alt="">
                           <h4>Kelas Tata Boga</h4>
                           <!-- <p>Lorem ipsum dolor sit amet consectetur elit seiusmod tempor incididunt </p> -->
                        </div>
                     </div>
                     <div class="col-lg-6 col-sm-6">
                        <div class="single_service_text">
                           <img src="img/icon/service_2.svg" alt="">
                           <h4>Kelas Babershop</h4>
                           <!-- <p>Lorem ipsum dolor sit amet consectetur elit seiusmod tempor incididunt</p>
                       --> </div> 
                     </div>
                     <div class="col-lg-6 col-sm-6">
                        <div class="single_service_text">
                           <img src="img/icon/service_3.svg" alt="">
                           <h4>Event Organizer</h4>
                           <!-- <p>Lorem ipsum dolor sit amet consectetur elit seiusmod tempor incididunt</p> -->
                        </div>
                     </div>
                     <div class="col-lg-6 col-sm-6">
                        <div class="single_service_text">
                           <img src="img/icon/service_4.svg" alt="">
                           <h4>Online Shop</h4>
                           <!-- <p>Lorem ipsum dolor sit amet consectetur elit seiusmod tempor incididunt</p>
                        --></div> 
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-sm-10">
               <div class="service_text">
                  <h2>About <span> SMK KAWUNG</span></h2>
                  <p align="justify">SMK Kawung 1 Surabaya adalah Sekolah Menengah Kejuruan (SMK) Swasta yang berlokasi di Propinsi Jawa Timur Kabupaten
                      Kota Surabaya dengan alamat Jl. Parang Klitik No. 2 Kemayoran - Krembangan.</p>
                  <a href="smkkawung1sby.com/../pendaftaran.html" class="btn_1">Daftar PPDB DISINI</a>
               </div>
            </div>
         </div>
      </div>
   </section>
   </section> 
   <!--::banner part end::-->
   

   <!--::team part end::-->
   <!-- <section class="about_part section-padding">
      <div class="container">
         <div class="row">
            <div class="section_tittle">
               <h2><span>Sambutan Kepala Sekolah </span> Kusmardianto</h2>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6 col-md-6">
               <div class="about_img">
                  <img src="img/pakanto.jpeg" width="500" alt="">
               </div>
            </div>
            <div class="offset-lg-1 col-lg-5 col-sm-8 col-md-6">
               <div class="about_text">
                  <h2>SEKAPUR SIRIH
                      <span>Kusmardianto </span></h2>
                  <p align="justify">
                     Assalamualaikum Wr. Wb.
                     Puji syukur kehadirat Allah, SWT. Yang telah memberikan rahmat dan hidayahNya kepada kita sehingga selalu sehat .
                     
                     SMK Kawung 1 Surabaya menghadirkan website ini agar dapat menjadi media komunikasi bagi semua civitas akademika guru, siswa, orang tua dan masyarakat luas.
                     
                     Kami mengucapkan terima kasih kepada semua pihak yang telah membantu terwujudnya media ini.
                     
                     Mudah mudahan Allah, SWT selalu menuntun setiap langkah kita.
                     
                      </p>
                      <br>
                      <p>Wassalam.
                     
                        Surabaya, 6 April 2020</p>
                  <a href="#" class="btn_1">Pendafaran PPDB 2020</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section> -->
   <!--::team part end::-->
   <br><br>
   <h3 class="lebargarissisiberbeda" align ="center"> Segera daftarkan diri anda <br>
     Kouta <?php echo $kuota;?> kursi <br>
     Sudah <?php echo $jmldata;?> Kursi Terisi <br>
     Tinggal <?php echo $kuota-$jmldata;?> Kursi Tersisa  </h3>
   <!--::project part start::-->
   <section class="portfolio_area pt_30 padding_bottom">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="section_tittle">
                  <h2><span>Galeri</span> Sekolah</h2>
               </div>
               <div class="portfolio-filter">
                  <h2>Foto Foto kegiatan <br>
                         <span>SMK Kawung 1 Surabaya .</span></h2>
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                     <li>
                        <a class="active" id="Architecture-tab" data-toggle="tab" href="#Architecture" role="tab"
                           aria-controls="Architecture" aria-selected="true">
                           Guru SMAKASA
                        </a>
                     </li>
                     <li>
                        <a id="Interior-tab" data-toggle="tab" href="#Interior" role="tab" aria-controls="Interior"
                           aria-selected="false">
                           PASKASA
                        </a>
                     </li>
                     <li>
                        <a id="Exterior-tab" data-toggle="tab" href="#Exterior" role="tab" aria-controls="Exterior"
                           aria-selected="false">
                           PRESTASI
                        </a>
                     </li>
                     <!-- <li>
                        <a id="Landing-tab" data-toggle="tab" href="#Landing" role="tab" aria-controls="Landing"
                           aria-selected="false">
                           COVID 19
                        </a>
                     </li> -->
                  </ul>
               </div>
               <div class="portfolio_item tab-content" id="myTabContent">
                  <div class="row align-items-center justify-content-between tab-pane fade show active"
                     id="Architecture" role="tabpanel" aria-labelledby="Architecture-tab">
                     <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="portfolio_box">
                           <a href="img/smk/guru1.jpg" class="img-gal">
                              <div class="single_portfolio">
                                 <img class="img-fluid w-100" src="img/smk/guru1.jpg" alt="">
                              </div>
                           </a>
                           <div class="short_info">
                              <p>Kunjungan Industri</p>
                              <h4><a href="#">SMK Kawung 1 <br>
                                    Surabaya</a></h4>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-5 col-md-6">
                        <div class="row">
                           <div class="col-lg-12 col-sm-6 col-md-12 single_portfolio_project">
                              <div class="portfolio_box">
                                 <a href="img/smk/guru2.jpg" class="img-gal">
                                    <div class="single_portfolio">
                                       <img class="img-fluid w-100" src="img/smk/guru2.jpg" alt="">
                                    </div>
                                 </a>
                                 <div class="short_info">
                                    <p>Guru</p>
                                    <h4><a href="#">SMK Kawung 1 <br>
                                          Surabaya</a></h4>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-12 col-sm-6 col-md-12 single_portfolio_project">
                              <div class="portfolio_box">
                                 <a href="img/smk/20200219_082021.jpg" class="img-gal">
                                    <div class="single_portfolio">
                                       <img class="img-fluid w-100" src="img/smk/20200219_082021.jpg" alt="">
                                    </div>
                                 </a>
                                 <div class="short_info">
                                    <p>Kegiatan Belajar Mengajar</p>
                                    <h4><a href="#">SMK Kawung 1  <br>
                                          Surabaya</a></h4>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row align-items-center justify-content-between tab-pane fade" id="Interior" role="tabpanel"
                     aria-labelledby="Interior-tab">
                     <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="portfolio_box">
                           <a href="img/smk/20200219_081956.jpg" class="img-gal">
                              <div class="single_portfolio">
                                 <img class="img-fluid w-100" src="img/smk/WhatsApp Image 2020-04-06 at 07.24.53.jpeg" alt="">
                              </div>
                           </a>
                           <div class="short_info">
                                 <p>Panitia LKBB Monocrom</p>
                                 <h4><a href="#">SMK Kawung 1  <br>
                                    Surabaya</a></h4>
                              </div>
                        </div>
                     </div>
                     <div class="col-lg-5 col-md-6">
                        <div class="row">
                           <div class="col-lg-12 col-sm-6 col-md-12 single_portfolio_project">
                              <div class="portfolio_box">
                                 <a href="img/smk/peserta.jpeg" class="img-gal">
                                    <div class="single_portfolio">
                                       <img class="img-fluid w-100" src="img/smk/peserta.jpeg" alt="">
                                    </div>
                                 </a>
                                 <div class="short_info">
                                       <p>Peserta</p>
                                       <h4><a href="#">SMK Kawung 1  <br>
                                             Surabayaa</h4>
                                    </div>
                              </div>
                           </div>
                           <div class="col-lg-12 col-sm-6 col-md-12 single_portfolio_project">
                              <div class="portfolio_box">
                                 <a href="img/smk/IMG-20200217-WA0022.jpg" class="img-gal">
                                    <div class="single_portfolio">
                                       <img class="img-fluid w-100" src="img/smk/IMG-20200217-WA0022.jpg" alt="">
                                    </div>
                                 </a>
                                 <div class="short_info">
                                       <p>TIM PASKIB</p>
                                       <h4><a href="#">SMK Kawung 1  <br>
                                             Surabaya</h4>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row align-items-center justify-content-between tab-pane fade" id="Exterior" role="tabpanel"
                     aria-labelledby="Exterior-tab">
                     <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="portfolio_box">
                           <a href="img/smk/prestasi 1.jpeg" class="img-gal">
                              <div class="single_portfolio">
                                 <img class="img-fluid w-100" src="img/smk/prestasi1.jpeg" alt="">
                              </div>
                           </a>
                           <div class="short_info">
                                 <p>Juara 3 LKBB MONOCROM</p>
                                 <h4><a href="#">SMK Kawung 1  <br>
                                       Surabaya</a></h4>
                              </div>
                        </div>
                     </div>
                     <div class="col-lg-5 col-md-6">
                        <div class="row">
                           <div class="col-lg-12 col-sm-6 col-md-12 single_portfolio_project">
                              <div class="portfolio_box">
                                 <a href="img/smk/prestasi2.jpeg" class="img-gal">
                                    <div class="single_portfolio">
                                       <img class="img-fluid w-100" src="img/smk/prestasi2.jpeg" alt="">
                                    </div>
                                 </a>
                                 <div class="short_info">
                                       <p>Juara 2 LKBB MONOCROM</p>
                                       <h4><a href="#">SMK Kawung 1 <br>
                                             Surabaya</a></h4>
                                    </div>
                              </div>
                           </div>
                           <div class="col-lg-12 col-sm-6 col-md-12 single_portfolio_project">
                              <div class="portfolio_box">
                                 <a href="img/smk/prestasi3.jpeg" class="img-gal">
                                    <div class="single_portfolio">
                                       <img class="img-fluid w-100" src="img/smk/prestasi3.jpeg" alt="">
                                    </div>
                                 </a>
                                 <div class="short_info">
                                       <p>Juara 1 LKBB MONOCROM</p>
                                       <h4><a href="#">SMK Kawung 1  <br>
                                             Surabaya</a></h4>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row align-items-center justify-content-between tab-pane fade" id="Landing" role="tabpanel"
                     aria-labelledby="Landing-tab">
                     <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="portfolio_box">
                           <a href="img/project-1.png" class="img-gal">
                              <div class="single_portfolio">
                                 <img class="img-fluid w-100" src="img/project-1.png" alt="">
                              </div>
                           </a>
                           <div class="short_info">
                                 <p>new Project</p>
                                 <h4><a href="#">Etiam tortor <br>
                                       aliquet habitant</a></h4>
                              </div>
                        </div>
                     </div>
                     <div class="col-lg-5 col-md-6">
                        <div class="row">
                           <div class="col-lg-12 col-sm-6 col-md-12 single_portfolio_project">
                              <div class="portfolio_box">
                                 <a href="img/project-4.png" class="img-gal">
                                    <div class="single_portfolio">
                                       <img class="img-fluid w-100" src="img/project-5.png" alt="">
                                    </div>
                                 </a>
                                 <div class="short_info">
                                       <p>new Project</p>
                                       <h4><a href="#">Etiam tortor <br>
                                             aliquet habitant</a></h4>
                                    </div>
                              </div>
                           </div>
                           <div class="col-lg-12 col-sm-6 col-md-12 single_portfolio_project">
                              <div class="portfolio_box">
                                 <a href="img/project-3.png" class="img-gal">
                                    <div class="single_portfolio">
                                       <img class="img-fluid w-100" src="img/project-3.png" alt="">
                                    </div>
                                 </a>
                                 <div class="short_info">
                                       <p>new Project</p>
                                       <h4><a href="#">Etiam tortor <br>
                                             aliquet habitant</a></h4>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--::project part end::-->

   <!--::service part end::-->
  
   <!--::team part end::-->
   <!-- <section class="project_gallery section-padding">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="project_gallery_tittle">
                  <h2><span>Luxuries</span> Apartment</h2>
               </div>
               <div class="grid">
                  <div class="grid-sizer"></div>
                  <div class="grid-item big_weight">
                     <div class="project_img">
                        <img src="img/gallery/gallery_1.png" alt="">
                        <div class="project_gallery_hover_text">
                           <p>Home Apartment</p>
                           <h3><a href="apartment.html"> Detached House For Sale</a></h3>
                           <ul>
                              <li><a href=""><span class="flaticon-bath"></span></a> 04</li>
                              <li><a href=""><span class="flaticon-bed"></span></a> 03</li>
                              <li><a href=""><span class="flaticon-frame"></span></a> 2400 sqft</li>
                              <li><a href=""><span class="ti-heart"></span></a> like</li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="grid-item big_height">
                     <div class="project_img">
                        <img src="img/gallery/gallery_4.png" alt="">
                        <div class="project_gallery_hover_text">
                           <p>Home Apartment</p>
                           <h3><a href="apartment.html"> Detached House For Sale</a></h3>
                           <ul>
                              <li><a href=""><span class="flaticon-bath"></span></a> 04</li>
                              <li><a href=""><span class="flaticon-bed"></span></a> 03</li>
                              <li><a href=""><span class="flaticon-frame"></span></a> 2400 sqft</li>
                              <li><a href=""><span class="ti-heart"></span></a> like</li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="grid-item">
                     <div class="project_img">
                        <img src="img/gallery/gallery_2.png" alt="">
                        <div class="project_gallery_hover_text">
                           <p>Home Apartment</p>
                           <h3><a href="apartment.html"> Detached House For Sale</a></h3>
                           <ul>
                              <li><a href=""><span class="flaticon-bath"></span></a> 04</li>
                              <li><a href=""><span class="flaticon-bed"></span></a> 03</li>
                              <li><a href=""><span class="flaticon-frame"></span></a> 2400 sqft</li>
                              <li><a href=""><span class="ti-heart"></span></a> like</li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="grid-item">
                     <div class="project_img">
                        <img src="img/gallery/gallery_3.png" alt="">
                        <div class="project_gallery_hover_text">
                           <p>Home Apartment</p>
                           <h3><a href="apartment.html"> Detached House For Sale</a></h3>
                           <ul>
                              <li><a href=""><span class="flaticon-bath"></span></a> 04</li>
                              <li><a href=""><span class="flaticon-bed"></span></a> 03</li>
                              <li><a href=""><span class="flaticon-frame"></span></a> 2400 sqft</li>
                              <li><a href=""><span class="ti-heart"></span></a> like</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   ::team part end::-->

   <!--::blog_part start::-->
   <!-- <div class="blog_part padding_bottom">
      <div class="container">
         <div class="row">
            <div class="col-md-7 col-lg-5">
               <div class="blog_part_tittle">
                  <h2>our <span>blog</span> </h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-7">
               <div class="single_blog">
                  <div class="appartment_img">
                     <img src="img/blog_1.png" alt="">
                  </div>
                  <div class="single_appartment_content">
                     <p><a href="#">Apartment</a> / March 20, 2019</p>
                     <a href="blog.html">
                        <h4>Doee lights without darkness that said
                           good deep years very.</h4>
                     </a>
                     <ul class="list-unstyled">
                        <li><a href=""> <span class="ti-comment"></span> </a> 2 comment</li>
                        <li><a href=""> <span class="ti-heart"></span> </a> 0 like</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-5">
               <div class="right_single_blog">
                  <div class="single_blog">
                     <div class="media">
                        <div class="media-body align-self-center">
                           <p><a href="#">Apartment</a> / March 20, 2019</p>
                           <a href="blog.html">
                              <h5 class="mt-0"> lights without darkness that said.</h5>
                           </a>
                           <ul class="list-unstyled">
                              <li><a href=""> <span class="ti-time"></span> </a> Mar 12</li>
                              <li><a href=""> <span class="ti-heart"></span> </a> 0 like</li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="single_blog">
                     <div class="media">
                        <div class="media-body align-self-center">
                           <p><a href="#">Apartment</a> / March 20, 2019</p>
                           <a href="blog.html">
                              <h5 class="mt-0"> lights without darkness that said.</h5>
                           </a>
                           <ul class="list-unstyled">
                              <li><a href=""> <span class="ti-time"></span> </a> Mar 12</li>
                              <li><a href=""> <span class="ti-heart"></span> </a> 0 like</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> -->
   <!-- ::blog_part end:: --> 

   <!--::footer_part start::-->
   <footer class="footer_part">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="footer_logo">
                     <a href="index.html" class="footer_logo_iner"> <img src="img/smkkawung1.jpg" width="50" alt="#"> </a>
               </div>
            </div>
            <style>
               .kontak {
                  color: rgb(20, 214, 13);
               }
               </style>
            <div class="col-sm-6 col-lg-3">
               <div class="single_footer_part">
                  <h4>Online Service</h4>
                  <p>Jika mengalamai kesulitan pendaftaran silahkan kontak
                     dengan petugas kami, dengan klik nomer dibawah

                  </p>
                  
                  <p> Pak Nasir<a  href="https://api.whatsapp.com/send?phone=6289677222789" class="kontak"> 089677222789</a> </p> 
                  <div class="footer_icon social_icon">
                     <ul class="list-unstyled">
                        <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
                        <li><a href="#" class="single_social_icon"><i class="fab fa-wh"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-lg-3">
               <div class="single_footer_part">
                  <h4>Contact Info</h4>
                  <p>silahkan tanya jika ada seputar pertanyaan tentang sekolah.</p>
                  <p> Pak Wildan<a  href="https://api.whatsapp.com/send?phone=08819495779" class="kontak"> 08819495779</a> </p> 
                  <p> Pak Junaidi<a  href="https://api.whatsapp.com/send?phone=08993383017" class="kontak"> 08993383017</a> </p> 
                  <p> Pak Deddy<a  href="https://api.whatsapp.com/send?phone=081515269565" class="kontak"> 081515269565</a> </p> 
               
               </div>
            </div>
            <!-- <div class="col-sm-6 col-lg-3"> -->
               <!-- <div class="single_footer_part"></div>
                  <h4>Important Link</h4>
                  <ul class="list-unstyled">
                     <li><a href=""> WHMCS-bridge</a></li>
                     <li><a href="">Search Domain</a></li>
                     <li><a href="">My Account</a></li>
                     <li><a href="">Shopping Cart</a></li>
                     <li><a href="">Our Shop</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-sm-6 col-lg-3"> -->
               <!-- <div class="single_footer_part">
                  <h4>Newsletter</h4>
                  <p>Heaven fruitful doesn't over lesser in days. Appear creeping seasons deve behold bearing days open
                  </p>
                  <div id="mc_embed_signup">
                     <form target="_blank"
                        action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                        method="get" class="subscribe_form relative mail_part" required>
                        <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                           class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '"
                           required="" type="email">
                        <button type="submit" name="submit" id="newsletter-submit"
                           class="email_icon newsletter-submit button-contactForm"><i
                              class="far fa-paper-plane"></i></button>
                        <div class="mt-10 info"></div>
                     </form>
                  </div>
               </div> -->
            </div>
         </div>
         <hr>
         <div class="row">
            <div class="col-lg-12">
               <div class="copyright_text text-center">
                  <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://smkkawung1sby.com" target="_blank">SMK Kawung 1 Surabaya</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!--::footer_part end::-->

   <!-- jquery plugins here-->
   <script src="js/jquery-1.12.1.min.js"></script>
   <!-- popper js -->
   <script src="js/popper.min.js"></script>
   <!-- bootstrap js -->
   <script src="js/bootstrap.min.js"></script>
   <!-- magnific js -->
   <script src="js/jquery.magnific-popup.min.js"></script>
   <!-- carousel js -->
   <script src="js/owl.carousel.min.js"></script>
   <!-- easing js -->
   <script src="js/jquery.easing.min.js"></script>
   <!--masonry js-->
   <script src="js/masonry.pkgd.min.js"></script>
   <script src="js/masonry.pkgd.js"></script>
   <!--form validation js-->
   <script src="js/jquery.nice-select.min.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.form.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/mail-script.js"></script>
   <!-- counter js -->
   <script src="js/jquery.counterup.min.js"></script>
   <script src="js/waypoints.min.js"></script>
   <!-- custom js -->
   <script src="js/custom.js"></script>
</body>

</html>