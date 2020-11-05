@extends('layoutfront.master')

@section('title','Feedback Pemantauan UAS Program Non Pendas dan PPS Semester 2020/20.2 (2020.1)')

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

                        <body>
                            <h1 class="header-w3ls" style="color: black">
                                Feedback Pemantauan UAS Program Non Pendas dan PPS Semester 2020/20.2 (2020.1)
                            </h1>

                            @php
                            if(auth()->user()->hasRole('pemantau'))
                            {
                            @endphp
                            <!-- <a class="button" href="/form">Kembali ke menu utama </a> -->
                            @php
                            }

                            elseif(auth()->user()->hasRole('pjtu'))
                            {
                            @endphp
                            <!-- <a class="button" href="/pjtu">Kembali ke menu utama </a> -->
                            @php
                            }

                            @endphp

                            <!-- multistep form -->
                            <div class=" col-lg-10">
                                <div class="card-body">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    <form action="{{ route('feedback.store') }}" method="post">
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
                                                <p>Tempat ujian</p>
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
                                                <p>Bertugas Sebagai</p>
                                                <select name="bertugas_sebagai">
                                                    <option value="none" selected="" disabled="">Pilih</option>

                                                    @foreach ($bertugas_sebagai as $petugas)
                                                    <option>{{ $petugas->bertugas_sebagai }}</option>
                                                    @endforeach

                                                </select>
                                                <i></i>
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
                                                <p>Tanggal Awal Observasi</p>
                                                <input type="date" id="name" class="form-control" name="tanggal_mulai_observasi" value="mm/dd/yyyy" />
                                            </div>
                                            <div class="form-mid-w3ls">
                                                <p>Tanggal Akhir Observasi</p>
                                                <input type="date" id="name" class="form-control" name="tanggal_akhir_observasi" value="mm/dd/yyyy" />
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="personal-info-label">Lokasi 1</div>
                                        <br>
                                        <br>
                                        <div class="form-control-w3l">
                                            <p>Lokasi Pemantauan :</p>
                                            <textarea name="lokasi1" placeholder=""></textarea>
                                        </div>
                                        <div class="form-control-w3l">
                                            <p>Aspek :</p>
                                            <textarea name="aspek1" placeholder=""></textarea>
                                        </div>
                                        <div class="form-control-w3l">
                                            <p>Praktik Baik :</p>
                                            <textarea name="praktikbaik1" placeholder=""></textarea>
                                        </div>
                                        <div class="form-control-w3l">
                                            <p>Temuan :</p>
                                            <textarea name="temuan1" placeholder=""></textarea>
                                        </div>
                                        <div class="form-control-w3l">
                                            <p>Saran :</p>
                                            <textarea name="saran1" placeholder=""></textarea>
                                        </div>
                                        <div class="personal-info-label">Lokasi 2</div>
                                        <br>
                                        <br>
                                        <div class="form-control-w3l">
                                            <p>Lokasi Pemantauan :</p>
                                            <textarea name="lokasi2" placeholder=""></textarea>
                                        </div>
                                        <div class="form-control-w3l">
                                            <p>Aspek :</p>
                                            <textarea name="aspek2" placeholder=""></textarea>
                                        </div>
                                        <div class="form-control-w3l">
                                            <p>Praktik Baik :</p>
                                            <textarea name="praktikbaik2" placeholder=""></textarea>
                                        </div>
                                        <div class="form-control-w3l">
                                            <p>Temuan :</p>
                                            <textarea name="temuan2" placeholder=""></textarea>
                                        </div>
                                        <div class="form-control-w3l">
                                            <p>Saran :</p>
                                            <textarea name="saran2" placeholder=""></textarea>
                                        </div>
                                        <div class="personal-info-label">Lokasi 3</div>
                                        <br>
                                        <br>
                                        <div class="form-control-w3l">
                                            <p>Lokasi Pemantauan :</p>
                                            <textarea name="lokasi3" placeholder=""></textarea>
                                        </div>
                                        <div class="form-control-w3l">
                                            <p>Aspek :</p>
                                            <textarea name="aspek3" placeholder=""></textarea>
                                        </div>
                                        <div class="form-control-w3l">
                                            <p>Praktik Baik :</p>
                                            <textarea name="praktikbaik3" placeholder=""></textarea>
                                        </div>
                                        <div class="form-control-w3l">
                                            <p>Temuan :</p>
                                            <textarea name="temuan3" placeholder=""></textarea>
                                        </div>
                                        <div class="form-control-w3l">
                                            <p>Saran :</p>
                                            <textarea name="saran3" placeholder=""></textarea>
                                        </div>



                                        <div class="form-group">
                                            <button class="button" onclick="window.location.href='/pemantau'" />SUBMIT</button>

                                            <br>
                                            <br>

                                            <a href="#" class="btn btn-primary" onclick="window.print()" target="_blank">CETAK LAPORAN</a>
                                        </div>
                                        <br>
                                        <br>
                                        <p>*Cetak form laporan sebelum submit</p>


                                    </form>
                                </div>
                            </div>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
                    </body>

                </div>
            </div>
        </div>
    </div>
    @endsection