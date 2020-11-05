@extends('upbjjfront.master_upbjj')

@section('title','INSTRUMEN PERSIAPAN PELAKSANAAN UJIAN <p>DI UPBJJ-UT (DI ISI OLEH MRA UPBJJ)</p>')

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
                            INSTRUMEN PERSIAPAN PELAKSANAAN UJIAN <p>DI UPBJJ-UT (DI ISI OLEH MRA UPBJJ)</p>
                        </h1>

                        <!-- multistep form -->
                        <div class=" col-lg-10">
                            <div class="card-body">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                <form action="mra.store" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="form-mid-w3ls">
                                            <p>Nama MRA :</p>
                                            <input type="text" name="nama" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="form-mid-w3ls">
                                            <p>UPBJJ :</p>
                                            <select name="upbjj">
                                                <option value="none" selected="" disabled="">Pilih UPBJJ</option>

                                                @foreach ($upbjj as $item)
                                                <option>{{ $item->upbjj }}</option>
                                                @endforeach

                                            </select>
                                            <i></i>
                                        </div>
                                        <br>
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
                                    <br>


                                    <div class="personal-info">
                                        <p>1. Tingkat kesulitan dalam mencetak dan menata KTPU, Daftar Hadir, dan Daftar Peserta Ujian<span>*</span></p>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select1" value="Sulit"="">
                                        <label class="form-check-label">
                                            Sulit
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select1" value="Cukup sulit">
                                        <label class="form-check-label">
                                            Cukup sulit
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select1" value="Cukup mudah">
                                        <label class="form-check-label">
                                            Cukup mudah
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select1" value="Mudah">
                                        <label class="form-check-label">
                                            Mudah
                                        </label>
                                    </div>

                                    <br>
                                    <div class="personal-info">
                                        <p>2. Tingkat kesulitan dalam menyiapkan bahan pendukung ujian dan peralatan per lokasi ujian<span>*</span></p>
                                        <p>a. LJU/BJU<span>*</span></p>
                                    </div>

                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select2" value="Sulit"="">
                                        <label class="form-check-label">
                                            Sulit
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select2" value="Cukup sulit">
                                        <label class="form-check-label">
                                            Cukup sulit
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select2" value="Cukup mudah">
                                        <label class="form-check-label">
                                            Cukup mudah
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select2" value="Mudah">
                                        <label class="form-check-label">
                                            Mudah
                                        </label>
                                    </div>

                                    <div class="personal-info">
                                        <p>b. Tape recorder ujian listening<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select3" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select3" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select3" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select3" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>c. Penguji untuk ujian lisan<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select4" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select4" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select4" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select4" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>d. Daftar hadir<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select5" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select5" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select5" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select5" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>e. Berita acara<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select6" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select6" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select6" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select6" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>f. Denah<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select7" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select7" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select7" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select7" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>g. Tata tertib<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select8" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select8" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select8" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select8" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>h. Pernyataan anti nyontek<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select9" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select9" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select9" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select9" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>i. Amplop<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select10" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select10" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select10" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select10" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>j. Karung<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select11" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select11" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select11" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select11" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>k. Box<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select12" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select12" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select12" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select12" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>3. Tingkat kesulitan dalam menentukan lokasi ujian<span>*</span></p>
                                    </div>
                                    <div class="personal-info">
                                        <p>a. Lokasi<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select13" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select13" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select13" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select13" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>b. Jumlah ruang<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select14" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select14" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select14" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select14" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>c. Pengawas<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select15" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select15" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select15" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select15" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>4. Tingkat kesulitan dalam menentukan<span>*</span></p>
                                    </div>
                                    <div class="personal-info">
                                        <p>a. Panitia ujian<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select16" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select16" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select16" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select16" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>b. Penyamaan persepsi pelaksanaan ujian<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select17" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select17" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select17" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select17" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>5. Tingkat kesulitan distribusi bahan ujian ke lokasi dengan menggunakan sarana transportasi umum<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select18" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select18" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select18" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select18" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>6. Tingkat kesulitan dalam penataan naskah per lokasi ujian terkait dengan validitas data registrasi<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select19" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select19" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select19" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select19" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>7. Tingkat kesulitan dalam pengiriman berkas hasil ujian mencakup :</p>
                                    </div>
                                    <div class="personal-info">
                                        <p>a. LJU ke UT Pusat<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select20" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select20" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select20" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select20" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>b. BJU ke UPBJJ sentra<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select21" value="Sulit"="">
                                            <label class="form-check-label">
                                                Sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select21" value="Cukup sulit">
                                            <label class="form-check-label">
                                                Cukup sulit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select21" value="Cukup mudah">
                                            <label class="form-check-label">
                                                Cukup mudah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select21" value="Mudah">
                                            <label class="form-check-label">
                                                Mudah
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                    <div class="form-group"></div>
                                    <button style="width:120; height:50" class="btn btn-primary" onclick="window.location.href='/upbjj'" />SUBMIT</button>
                                    <br>
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
        </div>
    </div>

    @endsection