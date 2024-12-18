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
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"> <a href="{{  url('') }}" class="logo"><img src="{{  url('') }}/assets/img/primareft.png" alt="" class="img-fluid"></a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#">Beranda</a></li>
          <li><a class="nav-link scrollto" href="{{ url('produk') }}">Produk</a></li>
          <li><a class="nav-link scrollto" href="{{ url('berita') }}">Berita</a></li>
          <li><a class="nav-link scrollto" href="{{ url('tentang') }}">Tentang</a></li>
          <li><a class="nav-link scrollto" href="{{ url('kontak') }}">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" >
    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Teknologi Sempurna, Inovasi Tanpa Batas!</h1>
          <h2 style="text-align: justify">Kami melayani dengan sepenuh hati kebutuhan mesin bagi pengusaha es batu kristal maupun bagi pemula yang ingin membuka usaha es batu kristal.</h2>
          <div><a href="#features" class="btn-get-started scrollto">Tentang Kami</a></div>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="{{  url('') }}/assets/img/Mesin1.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Produk Unggulan ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Produk Kami</h2>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 pt-3 ">
        @foreach ($Produk as $P)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="card shadow mb-4 text-center " style="border-color: #0741AC; border-radius: 25px; border-width: 3px;">
                    <img src="{{  url('') }}/assets/img/produk/{{ $P->foto_produk }}" class="card-img-top" alt="..." style="border-radius: 25px; margin: 10px 10px 0px 10px; width: auto; height: auto;">
                    <div class="card-body">
                        <h5 class="card-title mb-3">{{ $P->nama_produk }}</h5>
                        <div class="pricing box featured btn-wrap">
                            <a href="{{ route('produk.publik') }}" class="btn-buy">Lihat Produk</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
      </div>
    </section>
    <!-- End Produk Unggulan -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Pusat Penyedia Alat Pendingin</h2>
          <img src="{{  url('') }}/assets/img/banner 2.png" class="img-thumbnail m-3" style="max-width: 50vw; border-radius: 25px; border-width: 0px;">
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kami siap memberikan layanan terbaik</h2>
          <p class="mb-5">Prima merupakan anak perusahaan dari Sampoerna Prima Gemilang. Prima sudah bergerak dalam dunia pendingin sejak 2011 khususnya pada pembuatan dan perakitan mesin pendingin seperti mesin es tube (es kristal), mesin pembuatan es balok, dan coldstrorage.</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column ">
            <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up" data-aos-delay="50">
              <i class="bx bx-shield"></i>
              <h4>Garansi</h4>
              <p>Prouk yang kami jual memiliki garansi servis selama 1 tahun</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-medal"></i>
              <h4>Kualitas</h4>
              <p>Produk yang kami buat memiliki kualitas terbaik</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-task"></i>
              <h4>Fitur</h4>
              <p>Produk kami memiliki fitur menarik</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-headset"></i>
              <h4>Pelayanan</h4>
              <p>Pelayanan customor yang ramah dan kapan saja</p>
            </div>
          </div>
          <div class="image col-lg-6 order-1 order-lg-2 " data-aos="zoom-in" data-aos-delay="100">
            <img src="{{  url('') }}/assets/img/gambar 3.png" alt="" class="img-fluid" style="height: 80%;">
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Informasi Harga Terbaru</h2>
        </div>
        <div class="row pt-3">
        @foreach ($Harga as $H)
            <div class="col-lg-3 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="100">
                <div class="box featured">
                <h3>{{ $H->produk_harga }}</h3>
                <h4><sup>Rp</sup>{{ $H->nominal_harga }}<sup>  jt</sup></h4>
                <ul class="text-start ms-4">
                    <li> <i class="bx bx-check-circle"></i> {{ $H->kapasitas_harga }} Kg / 24 Jam</li>
                    <li> <i class="bx bx-check-circle"></i> Listrik = {{ $H->listrik_harga }} (KW)</li>
                    <li> <i class="bx bx-check-circle"></i> Bonus {{ $H->bonus_harga }}</li>
                    <li> <i class="bx bx-check-circle"></i> Garansi {{ $H->garansi_harga }} Tahun</li>
                </ul>
                <div class="btn-wrap">
                    <a href="{{ route('kontak.publik') }}" class="btn-buy">Beli Sekarang</a>
                </div>
                </div>
            </div>
        @endforeach
        </div>
      </div>
    </section><!-- End Pricing Section -->
  </main><!-- End #main -->

  @extends('layout.footer')
  @extends('layout.bawah')
</body>
</html>
