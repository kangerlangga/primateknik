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
<form method="POST" action="{{ route('harga.update', $EditHarga->id_harga) }}" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-sm-6">
            <div class="form-group">
                <label for="NamaMesin">Nama Mesin</label>
                <input class="form-control @error('NamaMesin') is-invalid @enderror" type="text" name="NamaMesin" value="{{ old('NamaMesin', $EditHarga->produk_harga) }}" id="NamaMesin" @error('NamaMesin') aria-describedby="NamaMesinFeedback" @enderror required>
                @error('NamaMesin')
                <div id="NamaMesinFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="Jenis">Jenis Mesin</label>
                <input class="form-control @error('Jenis') is-invalid @enderror" type="text" name="Jenis" value="{{ old('Jenis', $EditHarga->jenis_harga) }}" id="Jenis" @error('Jenis') aria-describedby="JenisFeedback" @enderror required>
                @error('Jenis')
                <div id="JenisFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="Harga">Harga Mesin (Juta)</label>
                <input class="form-control @error('Harga') is-invalid @enderror" type="number" name="Harga" value="{{ old('Harga', $EditHarga->nominal_harga) }}" id="Harga" @error('Harga') aria-describedby="HargaFeedback" @enderror required>
                @error('Harga')
                <div id="HargaFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="Visibilitas">Visibilitas Harga</label>
                <br>
                <select name='visibilitas' id='Visibilitas' class="form-control">
                    <option name='visibilitas' value='Tampilkan' {{ $EditHarga->visib_harga == 'Tampilkan' ? 'selected' : '' }}>Tampilkan</option>
                    <option name='visibilitas' value='Sembunyikan' {{ $EditHarga->visib_harga == 'Sembunyikan' ? 'selected' : '' }}>Sembunyikan</option>
                </select>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="Kapasitas">Kapasitas Mesin (KG / 24 Jam)</label>
                <input class="form-control @error('Kapasitas') is-invalid @enderror" type="number" name="Kapasitas" value="{{ old('Kapasitas', $EditHarga->kapasitas_harga) }}" id="Kapasitas" @error('Kapasitas') aria-describedby="KapasitasFeedback" @enderror required>
                @error('Kapasitas')
                <div id="KapasitasFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="Listrik">Listrik (KW)</label>
                <input class="form-control @error('Listrik') is-invalid @enderror" type="number" name="Listrik" value="{{ old('Listrik', $EditHarga->listrik_harga) }}" id="Listrik" step="any" @error('Listrik') aria-describedby="ListrikFeedback" @enderror required>
                @error('Listrik')
                <div id="ListrikFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="Bonus">Bonus Pembelian</label>
                <input class="form-control @error('Bonus') is-invalid @enderror" type="text" name="Bonus" value="{{ old('Bonus', $EditHarga->bonus_harga) }}" id="Bonus" @error('Bonus') aria-describedby="BonusFeedback" @enderror required>
                @error('Bonus')
                <div id="BonusFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="Garansi">Garansi (Tahun)</label>
                <input class="form-control @error('Garansi') is-invalid @enderror" type="number" name="Garansi" value="{{ old('Garansi', $EditHarga->garansi_harga) }}" id="Garansi" @error('Garansi') aria-describedby="GaransiFeedback" @enderror required>
                @error('Garansi')
                <div id="GaransiFeedback" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </div>
    <br>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
    <a href="{{  route('harga.data') }}" class="btn btn-success tbl-kembali">KEMBALI</a>
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
