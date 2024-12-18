@extends('layout.v_admin')

@section('title')
<title>{{ $judul }} | PT Prima Teknikindo Raya</title>
@endsection

@section('pageHeading')
<h1 class="h3 mb-2 text-gray-800"><b>{{ $judul }}</b></h1>
@endsection

@section('page')
<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs text-uppercase mb-0 font-weight-bold text-gray-800">
                            <span class="text-success">JUMLAH BERITA</span>
                            </div>
                            <div class="text-lg font-weight-bold text-dark mb-1">{{ $jBerita }} Artikel</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs text-uppercase mb-0 font-weight-bold text-gray-800">
                            <span class="text-danger">CONTACT PERSON</span>
                            </div>
                            <div class="text-lg font-weight-bold text-dark mb-1">{{ $jCP }} Karyawan</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-headset fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs text-uppercase mb-0 font-weight-bold text-gray-800">
                            <span class="text-info">JUMLAH PRODUK</span>
                            </div>
                            <div class="text-lg font-weight-bold text-dark mb-1">{{ $jProduk }} Produk</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes-stacked fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //message with sweetalert
        @if(session('successprof'))
            Swal.fire({
                icon: "success",
                title: "{{ session('successprof') }}",
                showConfirmButton: false,
                timer: 3000
            });
        @elseif(session('successlog'))
            Swal.fire({
                icon: "success",
                title: "{{ session('successlog') }}",
                text: 'Disarankan Membuka Halaman Administrasi Dengan Komputer atau Laptop!',
            });
        @endif
    </script>
@endsection
