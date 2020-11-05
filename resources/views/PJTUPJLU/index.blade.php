@extends('pjtufront.master_pjtu')

@section('title','FORMAT LAPORAN PETUGAS PJTU/PJLU <p>DARI UNIVERSITAS TERBUKA PUSAT </p>
<p>(DI ISI OLEH PETUGAS PJTU & PENDAMPING PJTU)</p>')

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

                        <h1 class="header-w3ls" style="color:black ">
                            FORMAT LAPORAN PETUGAS PJTU/PJLU <p>DARI UNIVERSITAS TERBUKA PUSAT </p>
                            <p>(DI ISI OLEH PETUGAS PJTU & PENDAMPING PJTU)</p>
                        </h1>

                        <!-- multistep form -->
                        <div class=" col-lg-10">
                            <div class="card-body">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                <form action="PJTUPJLU.store" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="form-mid-w3ls">
                                            <p>Nama Petugas</p>
                                            <input type="text" name="nama" class="form-control" placeholder="">
                                        </div>

                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="form-mid-w3ls">
                                            <p>Tempat Ujian</p>
                                            <input type="text" name="tempat_ujian" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-mid-w3ls">
                                            <p>Lokasi Ujian</p>
                                            <input type="text" name="lokasi_ujian" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="form-mid-w3ls">
                                            <p>UPBJJ</p>
                                            <select name="upbjj">
                                                <option value="none" selected="" disabled="">Pilih UPBJJ</option>
                                                @foreach ($upbjj as $item)
                                                <option>{{ $item->upbjj }}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="form-mid-w3ls">
                                            <p>Masa Ujian</p>
                                            <select name="masa_ujian">
                                                <option value="none" selected="" disabled="">Masa Ujian</option>
                                                @foreach ($masa as $item)
                                                <option>{{ $item->tahun_masa }}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="form-mid-w3ls">
                                            <p>Tanggal Ujian</p>
                                            <input type="date" id="name" class="form-control" name="tanggal_ujian" value="mm/dd/yyyy" />
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="personal-info-label">
                                        A. Persiapan
                                    </div>
                                    <div class="personal-info">
                                        <p>1. Kemudahan berkoordinasi dengan Ko. Registrasi dan Ujian<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select1" value="Baik"="">
                                            <label class="form-check-label">
                                                Baik
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select1" value="Sedang">
                                            <label class="form-check-label">
                                                Sedang
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select1" value="Buruk">
                                            <label class="form-check-label">
                                                Buruk
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>2. Kecukupan informasi terkait pelaksanaan UAS<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select2" value="Baik"="">
                                            <label class="form-check-label">
                                                Baik
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select2" value="Sedang">
                                            <label class="form-check-label">
                                                Sedang
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select2" value="Buruk">
                                            <label class="form-check-label">
                                                Buruk
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>3. Ketersediaan bahan pendukung UAS<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select3" value="Baik"="">
                                            <label class="form-check-label">
                                                Baik
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select3" value="Sedang">
                                            <label class="form-check-label">
                                                Sedang
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select3" value="Buruk">
                                            <label class="form-check-label">
                                                Buruk
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>4. Ketersediaan naskah ujian<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select4" value="Baik"="">
                                            <label class="form-check-label">
                                                Baik
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select4" value="Sedang">
                                            <label class="form-check-label">
                                                Sedang
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select4" value="Buruk">
                                            <label class="form-check-label">
                                                Buruk
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>5. Kelayakan sarana dan prasarana<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select5" value="Baik"="">
                                            <label class="form-check-label">
                                                Baik
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select5" value="Sedang">
                                            <label class="form-check-label">
                                                Sedang
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select5" value="Buruk">
                                            <label class="form-check-label">
                                                Buruk
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>6. Keamanan naskah ujian<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select6" value="Baik"="">
                                            <label class="form-check-label">
                                                Baik
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select6" value="Sedang">
                                            <label class="form-check-label">
                                                Sedang
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select6" value="Buruk">
                                            <label class="form-check-label">
                                                Buruk
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="personal-info-label">
                                        B. Kualitas Pelaksanaan
                                    </div>
                                    <div class="personal-info">
                                        <p>1. Kuantitas panitia setempat<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select7" value="Baik"="">
                                            <label class="form-check-label">
                                                Baik
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select7" value="Sedang">
                                            <label class="form-check-label">
                                                Sedang
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select7" value="Buruk">
                                            <label class="form-check-label">
                                                Buruk
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>2. Kualitas panitia setempat<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select8" value="Baik"="">
                                            <label class="form-check-label">
                                                Baik
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select8" value="Sedang">
                                            <label class="form-check-label">
                                                Sedang
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select8" value="Buruk">
                                            <label class="form-check-label">
                                                Buruk
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>3. Keamanan lokasi ujian<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select9" value="Baik"="">
                                            <label class="form-check-label">
                                                Baik
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select9" value="Sedang">
                                            <label class="form-check-label">
                                                Sedang
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select9" value="Buruk">
                                            <label class="form-check-label">
                                                Buruk
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>4. Ketertiban dalam pelaksanaan<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select10" value="Baik"="">
                                            <label class="form-check-label">
                                                Baik
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select10" value="Sedang">
                                            <label class="form-check-label">
                                                Sedang
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select10" value="Buruk">
                                            <label class="form-check-label">
                                                Buruk
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="personal-info-label">
                                        C. Kemudahan Pelaksanaan
                                    </div>
                                    <div class="personal-info">
                                        <p>1. Kemudahan dalam pelaksanaan UAS<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select11" value="Mudah"="">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select11" value="Sedang">
                                            <label class="form-check-label">
                                                Sedang
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select11" value="Sulit">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>2. Kemudahan dalam memusnahkan naskah UAS<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select12" value="Mudah"="">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select12" value="Sedang">
                                            <label class="form-check-label">
                                                Sedang
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select12" value="Sulit">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="store" value="Submit">
                                        <br>
                                        <br>
                                        <a href="#" style="width:120; height:60" class="btn btn-primary" onclick="window.print()" target="_blank">CETAK LAPORAN</a>
                                    </div>
                                    <br>
                                    <br>
                                    <p>*Cetak form laporan sebelum submit</p>
                                    <p>*Submit untuk menyimpan data dari form yang sudah diisi dan lanjut ke sesi upload foto</p>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
                </div>
            </div>
        </div>
    </div>

    @endsection