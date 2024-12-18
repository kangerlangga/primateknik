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
<form method="POST" action="{{ route('cp.update', $EditCP->id_cp) }}" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-sm-6">
            <div class="form-group">
                <label for="Nama">Nama Lengkap</label>
                <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" value="{{ $EditCP->nama_cp }}" id="Nama" @error('nama') aria-describedby="NamaFeedback" @enderror required>
                @error('nama')
                <div id="NamaFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="Jabatan">Jabatan</label>
                <input class="form-control @error('jabatan') is-invalid @enderror" type="text" name="jabatan" value="{{ $EditCP->jabatan_cp }}" id="Jabatan"  @error('jabatan') aria-describedby="JabatanFeedback" @enderror required>
                @error('jabatan')
                <div id="JabatanFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="Nowa">Nomor Whatsapp (Tanpa Angka 0 Didepan)</label>
                <input class="form-control @error('nowa') is-invalid @enderror" type="tel" name="nowa" value="{{ $EditCP->wa_cp }}" id="Nowa" @error('nowa') aria-describedby="NowaFeedback" @enderror required>
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
                    <option name='visibilitas' value='Tampilkan' {{ $EditCP->visib_cp == 'Tampilkan' ? 'selected' : '' }}>Tampilkan</option>
                    <option name='visibilitas' value='Sembunyikan' {{ $EditCP->visib_cp == 'Sembunyikan' ? 'selected' : '' }}>Sembunyikan</option>
                </select>
            </div>
        </div>

    </div>
    <br>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
    <a href="{{  route('cp.data') }}" class="btn btn-success tbl-kembali">KEMBALI</a>
</form>
<hr>

<script type="text/javascript">

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
