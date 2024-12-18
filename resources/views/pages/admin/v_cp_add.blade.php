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
<form method="POST" action="{{ route('cp.store') }}" enctype="multipart/form-data">
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
                <label for="Jabatan">Jabatan</label>
                <input class="form-control @error('jabatan') is-invalid @enderror" type="text" name="jabatan" value="{{ old('jabatan') }}" id="Jabatan"  @error('jabatan') aria-describedby="JabatanFeedback" @enderror required>
                @error('jabatan')
                <div id="JabatanFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="Nowa">Nomor Whatsapp (Tanpa Angka 0 Didepan)</label>
                <input class="form-control @error('nowa') is-invalid @enderror" type="tel" name="nowa" value="{{ old('nowa') }}" id="Nowa" @error('nowa') aria-describedby="NowaFeedback" @enderror required>
                @error('nowa')
                <div id="NowaFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="Visibilitas">Visibilitas Contact Person</label>
                <br>
                <select name='visibilitas' id='Visibilitas' class="form-control">
                    <option name='visibilitas' value='Tampilkan'>Tampilkan</option>
                    <option name='visibilitas' value='Sembunyikan'>Sembunyikan</option>
                </select>
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
