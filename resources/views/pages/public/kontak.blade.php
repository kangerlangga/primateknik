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
          <li><a class="nav-link scrollto" href="{{ url('tentang') }}">Tentang</a></li>
          <li><a class="nav-link scrollto active" href="#">Kontak</a></li>
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
          <h1>Anda punya pertanyaan?</h1>
          <h2 style="text-align: justify">Jangan ragu untuk menghubungi kami jika Anda memerlukan bantuan atau memiliki pertanyaan terkait layanan kami. Tim kami akan dengan senang hati membantu Anda.</h2>
          <div><a href="#kontak" class="btn-get-started scrollto">Hubungi Kami</a></div>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="{{  url('') }}/assets/img/ask.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="kontak">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 mb-3 pb-3">
                    <div class="col">
                        <div class="m-0 pb-5 pb-lg-0">
                            <div class="d-flex justify-content-start mb-1">
                                <div>
                                    <h2 class="fw-bold mb-3">Kontak Kami</h2>
                                    <div class="underbar ms-0"></div>
                                </div>
                            </div>
                            <p class="mb-2 fw-bold">Email :</p>
                            <p class="mb-3">prima.factory.pf@gmail.com</p>
                            <p class="mb-2 fw-bold">Hubungi Kami :</p>
                            @foreach ($CP as $C)
                            <a href="https://api.whatsapp.com/send?phone=62{{ $C->wa_cp }}&text=Halo%2C%20Saya%20ingin%20menanyakan%20lebih%20lanjut%20tentang%20alat%20di%20website%20https%3A%2F%2Fprima-teknik.com"
                                target="_blank" class="btn btn-success py-2 px-3">
                                <i class="me-2 fa-brands fa-whatsapp"></i>
                                Contact Person
                            </a>
                            @endforeach

                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <div class="d-flex justify-content-start mb-1">
                                <div>
                                    <h2 class="fw-bold mb-3">Alamat</h2>
                                    <div class="underbar ms-0"></div>
                                </div>
                            </div>
                            <p class="mb-2">Jl. Melati No.03, Balonggabus, Kec. Candi, Kabupaten Sidoarjo, Jawa Timur 61271</p>
                        </div>
                        <section class="rounded google-map overflow-hidden shadow-sm p-0" style="min-height: 350px; height: calc(100% - 372px);">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.7389451006984!2d112.71900567411562!3d-7.494048473909982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e78589691dbf%3A0x894fe83547aa0d35!2sPrima%20Teknikindo%20Raya!5e0!3m2!1sid!2sid!4v1711439738306!5m2!1sid!2sid" width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </section>
                    </div>
                </div>
            </div>
    </section>
  </main><!-- End #main -->

  @extends('layout.footer')
  @extends('layout.bawah')
</body>
</html>
