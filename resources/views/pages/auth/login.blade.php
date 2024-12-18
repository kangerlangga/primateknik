<!DOCTYPE html>
<html lang="id">
<head>

    <!-- PRECONNECT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://unpkg.com">
    <link rel="preconnect" href="https://unpkg.com">
    <link rel="dns-prefetch" href="https://www.w3.org">
    <link rel="preconnect" href="https://www.w3.org">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">

    <!-- SIMPLE META -->
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta name="google" content="notranslate">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index,follow">
    <meta name="author" content="PT Prima Teknikindo Raya">
    <meta name="language" content="id">
    <meta name="geo.country" content="id">
    <meta name="geo.placename" content="Indonesia">

    <!-- WEBSITE META -->
    <title>{{ $judul }} | PT Prima Teknikindo Raya</title>
    <meta name="description" content="PT. Prima Teknikindo Raya merupakan anak perusahaan dari Sampoerna Prima Gemilang. Prima sudah bergerak dalam dunia pendingin sejak 2011 khususnya pada pembuatan dan perakitan mesin pendingin seperti mesin es tube (es kristal), mesin pembuatan es balok, dan coldstrorage.">
    <link rel="icon" type="image/png" href="{{  url('') }}/assets/img/primaref.png">

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- Source Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

</head>
<body>
    <main class="container my-5">
    <div class="row">
        <section class="col-md-6 my-5 offset-md-3">

        <div class="card shadow p-5">
        <form method="POST" action="{{ route('login.verifikasi') }}" enctype="multipart/form-data">
            @csrf

            <h3 class="text-center mb-4" style="font-family: Roboto;">Login Admin</h3>
            <hr>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}" class="form-control" required>
            </div>

            <label for="Password">Password</label>
            <div class="input-group mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" aria-label="Enter Password" aria-describedby="basic-addon2" required>
                <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye" aria-hidden="true"></i>
                </span>
                </div>
            </div>

            <button class="btn btn-block btn-primary mt-3 pt-2 pb-2 fw-bold" style="font-size: medium;"><b>LOGIN</b></button>

            <p class="mt-3">Kembali Ke Beranda? <a href="{{ url('') }}">Klik Disini</a></p>

        </form>
        </div>
        </section>
    </div>
    </main>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        main .card {
        background-color: #fff;
        }

        body {
        background: #0741AC;
        color: black;
        }

        h3 {
        font-family: Times New Roman;
        font-weight: bold;
        }
        hr {
        border-bottom: solid black 1px;
        }

        .btn {
        background: #0741AC;
        }

        .btn:hover {
        background: #18027c;
        }

        input {
        background-color: #fff !important;
        color: black !important;
        }

        ::placeholder {
        color: darkslategrey !important;
        }

    </style>
    <script type="text/javascript">

    $(document).ready(function () {
        $("#basic-addon2").click(function () {
            let passwordField = $("#password");
            let passwordFieldAttr = passwordField.attr("type");

            if (passwordFieldAttr == "password") {
            passwordField.attr("type", "text");
            $(this).html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
            } else {
            passwordField.attr("type", "password");
            $(this).html('<i class="fa fa-eye" aria-hidden="true"></i>');
            }
        });
    });

    @error('email')
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal!',
            text: 'Email atau Password Anda Salah!',
            showConfirmButton: false,
            timer: 3000
        })
    @enderror

    @error('password')
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal!',
            text: 'Email atau Password Anda Salah!',
            showConfirmButton: false,
            timer: 3000
        })
    @enderror

</script>
</body>
</html>
