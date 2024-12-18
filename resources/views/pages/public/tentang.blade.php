@extends('layout.head')

<body>
<div id="preloader"></div>
<style>
#preloader {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  overflow: hidden;
  background: #fff;
}
#preloader:before {
  content: "";
  position: fixed;
  top: calc(50% - 30px);
  left: calc(50% - 30px);
  border: 6px solid rgb(7, 65, 172);
  border-top-color: #e7e4fe;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  animation: animate-preloader 1s linear infinite;
}
@keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-scrolled">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"> <a href="index.html" class="logo"><img src="{{  url('') }}/assets/img/primareft.png" alt="" class="img-fluid"></a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{ url('') }}">Beranda</a></li>
          <li><a class="nav-link scrollto" href="{{ url('produk') }}">Produk</a></li>
          <li><a class="nav-link scrollto" href="{{ url('berita') }}">Berita</a></li>
          <li><a class="nav-link scrollto active" href="#">Tentang</a></li>
          <li><a class="nav-link scrollto" href="{{ url('kontak') }}">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Sudah tahu tentang perusahaan kami?</h1>
          <h2 style="text-align: justify">PT. Prima Teknikindo Raya adalah perusahaan yang berkomitmen untuk menyediakan solusi mesin usaha yang berkualitas tinggi bagi pengusaha es batu kristal maupun bagi pemula yang ingin memulai usaha di bidang ini.</h2>
          <div><a href="#sejarah" class="btn-get-started scrollto">Sejarah Perusahaan</a></div>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="{{  url('') }}/assets/img/sejarah.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Sejarah ======= -->
    <section id="sejarah" class="sejarah">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Sejarah Perusahaan</h2>
            <img src="{{  url('') }}/assets/img/logo-persegi.jpg" class="img-thumbnail m-3" style="max-width: 30vw; border-radius: 25px;">
            </div>
            <p style="text-align: justify;" class="lead mt-2 mb-">
                Prima didirikan pada tahun 2011 sebagai anak perusahaan dari Sampoerna Prima Gemilang. Sejak awal, Prima telah memantapkan diri dalam industri pendingin, khususnya dalam pembuatan dan perakitan mesin pendingin yang berkualitas tinggi.
                Lebih dari sekadar manufaktur, Prima berkomitmen untuk mendorong batas-batas inovasi dalam teknologi pendingin. Kami berfokus pada pengembangan solusi pendingin yang efisien, ramah lingkungan, dan memberikan pengalaman terbaik bagi pelanggan.
                Tekad Prima untuk berinovasi tak tergoyahkan. Kami terus berusaha untuk menjadi pionir dalam teknologi pendingin, menghadirkan produk-produk terbaik yang menginspirasi kenyamanan dan berkontribusi pada keberlanjutan global.
                Dengan pengalaman dan komitmen kami yang mendalam, Prima siap menjadi mitra andal Anda dalam memenuhi kebutuhan pendinginan Anda. Kami menawarkan berbagai macam produk dan layanan pendingin yang dirancang untuk memenuhi kebutuhan spesifik Anda, mulai dari industri hingga komersial dan rumah tangga.
            </p>
          </div>
        </div>
      </section>
  </main><!-- End #main -->

  @extends('layout.footer')
  @extends('layout.bawah')
</body>
</html>
