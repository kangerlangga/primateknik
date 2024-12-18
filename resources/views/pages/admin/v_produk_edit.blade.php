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
<form method="POST" action="{{ route('produk.update', $EditProduk->id_produk) }}" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-sm-12">
            <div class="form-group">
                <label for="Foto">Foto Produk (PNG, JPG, JPEG) <b>Maksimal 3 MB</b> Ukuran Standar 750px x 500px</label>
                <input class="form-control-file @error('Foto') is-invalid @enderror" name="Foto" id="Foto" type="file" accept=".png, .jpg, .jpeg" @error('Foto') aria-describedby="FotoFeedback" @enderror>
                @error('Foto')
                <div id="FotoFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label for="NamaProduk">Nama Produk</label>
                <input class="form-control @error('NamaProduk') is-invalid @enderror" name="NamaProduk" value="{{ old('NamaProduk', $EditProduk->nama_produk) }}" id="NamaProduk" @error('NamaProduk') aria-describedby="NamaProdukFeedback" @enderror required>
                @error('NamaProduk')
                <div id="NamaProdukFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label for="Deskripsi">Deskripsi</label>
                <textarea class="form-control @error('Deskripsi') is-invalid @enderror" id="Deskripsi" name="Deskripsi" @error('Deskripsi') aria-describedby="DeskripsiFeedback" @enderror required>{{ old('Deskripsi', $EditProduk->desk_produk) }}</textarea>
                @error('Deskripsi')
                <div id="DeskripsiFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="Visibilitas">Visibilitas Produk</label>
                <br>
                <select name='visibilitas' id='Visibilitas' class="form-control">
                    <option name='visibilitas' value='Tampilkan' {{ $EditProduk->visib_produk == 'Tampilkan' ? 'selected' : '' }}>Tampilkan</option>
                    <option name='visibilitas' value='Sembunyikan' {{ $EditProduk->visib_produk == 'Sembunyikan' ? 'selected' : '' }}>Sembunyikan</option>
                </select>
            </div>
        </div>

    </div>
    <br>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
    <a href="{{ route('produk.data') }}" class="btn btn-success tbl-kembali">KEMBALI</a>
</form>
<hr>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'Deskripsi' );

    $(document).on('click','.tbl-kembali',function(e) {

    //Hentikan aksi default
    e.preventDefault();
    const href1 = $(this).attr('href');

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Perubahan Tidak Akan Disimpan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#fd7e14',
            confirmButtonText: 'KEMBALI',
            cancelButtonText: 'BATAL'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href1;
            }
        })
    })
</script>
@endsection
