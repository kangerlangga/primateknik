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
          <li><a class="nav-link scrollto active" href="#">Berita</a></li>
          <li><a class="nav-link scrollto" href="{{ url('tentang') }}">Tentang</a></li>
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
          <h1>Yuk cari tahu informasi menarik dari kami!</h1>
          <h2 style="text-align: justify">Kami menyediakan beberapa informasi menarik yang tentunya dapat membantu anda dalam menambah wawasan yang lebih luas.</h2>
          <div><a href="#berita" class="btn-get-started scrollto">Baca Selengkapnya</a></div>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="{{  url('') }}/assets/img/tips.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Berita ======= -->
    <section id="berita" class="berita">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Berita dan Informasi</h2>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 pt-3 ">
            @foreach ($Berita as $B)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="card shadow mb-4 text-center " style="border-color: #0741AC; border-radius: 25px; border-width: 3px;">
                        <img src="{{  url('') }}/assets/img/berita/{{ $B->foto_berita }}" class="card-img-top" alt="..." style="border-radius: 25px; margin: 17px 17px 0px 17px; width: auto; height: auto;">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $B->judul_berita }}</h5>
                            <div class="pricing box featured btn-wrap">
                                <a href="{{ route('berita.detail', $B->id_berita) }}" class="btn-buy">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
  </main><!-- End #main -->

  @extends('layout.footer')
  @extends('layout.bawah')
</body>
</html>
