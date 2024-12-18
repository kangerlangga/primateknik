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
          <li><a class="nav-link scrollto active" href="{{ url('produk') }}">Produk</a></li>
          <li><a class="nav-link scrollto" href="{{ url('berita') }}">Berita</a></li>
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
          <h1>Penasaran dengan produk kami?</h1>
          <h2 style="text-align: justify">Kami memiliki produk dengan standar kualitas yang baik pada pembuatan dan perakitan mesin pendingin.</h2>
          <div><a href="#produk" class="btn-get-started scrollto">Detail Produk</a></div>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="{{  url('') }}/assets/img/prod.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <section id="produk" class="gallery">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>{{ $DetailProduk->nama_produk }}</h2>
            <img src="{{  url('') }}/assets/img/produk/{{ $DetailProduk->foto_produk }}" class="img-thumbnail m-3" style="max-width: 50vw; border-radius: 25px;">
            </div>
            <p class="fs-4 fw-bold">Deskripsi :</p>
            <?= $DetailProduk['desk_produk']; ?>
            <center>
            <div class="pricing box featured btn-wrap">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=62{{ $CP->wa_cp }}&text=Hai%2C%20Saya%20tertarik%20dengan%20produk%20ini%20https%3A%2F%2Fprima-teknik.com%2Fproduk%2Fdetail%2F{{ $DetailProduk->id_produk }}" class="btn-buy">Beli Sekarang</a>
            </div>
            </center>
          </div>
        </div>
      </section>
  </main><!-- End #main -->

  @extends('layout.footer')
  @extends('layout.bawah')
</body>
</html>
