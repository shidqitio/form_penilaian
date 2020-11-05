@extends('layoutfront.master')

@section('title','UPLOAD FOTO INSTRUMEN OBSERVASI PEMANTAUAN UJIAN DI TEMPAT / LOKASI UJIAN')

<link href="css/head/style.css" rel='stylesheet' type='text/css' media="all">
<!--//style sheet end here-->
<link href="//fonts.googleapis.com/css?family=Barlow:300,400,500" rel="stylesheet">


@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="row">

                        <h1 class="header-w3ls" style="color:black">
                            UPLOAD FOTO INSTRUMEN OBSERVASI PEMANTAUAN UJIAN DI TEMPAT / LOKASI UJIAN
                        </h1>
                        <!-- multistep form -->
                        <div class=" col-lg-10">
                            <div class="card-body">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                <form method="post" enctype="multipart/form-data" action="pemantauan.uploadfoto">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="fotolokasi">1. Foto Tempat/Lokasi Ujian<span>*</span></label>
                                        <input type="file" name="fotolokasi" class="form-control-file" id="fotolokasi" required>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <label for="fotopelaksanaan">2. Foto Pelaksanaan Ujian<span>*</span></label>
                                        <input type="file" name="fotopelaksanaan" class="form-control-file" id="fotopelaksanaan" required>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <label for="fotopemusnahan">3. Foto Pemusnahan Naskah<span>*</span></label>
                                        <input type="file" name="fotopemusnahan" class="form-control-file" id="fotopemusnahan" required>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-auto">
                                        <button class="button" onclick="window.location.href='/pemantau'" />SUBMIT</button>
                                    </div>
                                    <br>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
                </div>
            </div>
            <br>
            <p>*Form instrumen yang sudah di kirim tidak dapat di edit kembali</p>
            <p>*Ukuran file foto maksimal 10mb</p>
            </label>

            <br>
            <br>
            <br>
        </div>
    </div>


    @endsection