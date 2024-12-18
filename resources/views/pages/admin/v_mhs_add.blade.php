@extends('layout.v_admin')

@section('title')
<title>{{ $judul }} | PT Prima Teknikindo Raya</title>
@endsection

@section('pageHeading')
<h1 class="h3 mb-2 text-gray-800"><b>{{ $judul }}</b></h1>
@endsection

@section('page')
<style>
    .form-group {
        margin-top: 17px;
    }
    .form-group input, select{
        margin-top: 3px;
    }
    .btn {
        width: 100px;
        margin-right: 5px;
    }
</style>
<form method="POST" action="{{ route('mhs.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-sm-6">
            <div class="form-group">
                <label for="Nama">Nama Lengkap</label>
                <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" value="{{ old('nama') }}" id="Nama" @error('nama') aria-describedby="NamaFeedback" @enderror required>
                @error('nama')
                <div id="NamaFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="nim">nim</label>
                <input class="form-control @error('nim') is-invalid @enderror" type="text" name="nim" value="{{ old('nim') }}" id="nim"  @error('nim') aria-describedby="nimFeedback" @enderror required>
                @error('nim')
                <div id="nimFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="prodi">Prodi</label>
                <input class="form-control @error('prodi') is-invalid @enderror" type="tel" name="prodi" value="{{ old('prodi') }}" id="prodi" @error('prodi') aria-describedby="prodiFeedback" @enderror required>
                @error('prodi')
                <div id="prodiFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input class="form-control @error('jurusan') is-invalid @enderror" type="tel" name="jurusan" value="{{ old('jurusan') }}" id="jurusan" @error('jurusan') aria-describedby="jurusanFeedback" @enderror required>
                @error('jurusan')
                <div id="jurusanFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </div>
    <br>
    <button type="submit" class="btn btn-primary">TAMBAH</button>
    <button type="reset" class="btn btn-success">RESET</button>
</form>
<hr>
<script>
    //message with sweetalert
    @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000
        });
    @elseif(session('error'))
        Swal.fire({
            icon: "error",
            title: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 3000
        });
    @endif
</script>
@endsection
