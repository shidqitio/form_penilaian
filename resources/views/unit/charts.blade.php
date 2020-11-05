@extends('layouts.title2')
@section ('title','Hasil Laporan')
@section ('headtitle','chart')
@section('content')
<div class="container">
    <a href="/unit/laporanpemantau" class="btn btn-success  mr-5" style="margin-bottom: 25px"> Kembali </a>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                {{-- notifikasi form validasi --}}
                @if ($errors->has('file'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
                @endif

                {{-- notifikasi sukses --}}
                @if ($sukses = Session::get('sukses'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $sukses }}</strong>
                </div>
                @endif

                <!-- <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                        IMPORT EXCEL
                    </button>

                    

                    <!-- Import Excel -->
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="/user/import_excel" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                </div>
                                <div class="modal-body">

                                    {{ csrf_field() }}

                                    <label>Pilih file excel</label>
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- <div class="panel-body">
                    <div class="alert alert-success">
                        <p>
                            Selamat Datang di Halaman Admin
                        </p>
                    </div> -->
                <div class="row" style="margin-left:200px">
                    <div class="col-md-12">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>1. Apakah Jumlah dan Jenis Bahan Pendukung Mencukupi</h5>
                                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                    <table class="table table-bordered table-striped mb-0">
                                        <tr>
                                            <td>Amplop</td>
                                            <td>
                                                <div id="app" style="width: 150 px; height: 150px ;">
                                                    {!! $charts1->container() !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>LJU</td>
                                            <td>
                                                <div id="app" style="width: 150 px; height: 150px ;">
                                                    {!! $charts2->container() !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>BJU</td>
                                            <td>
                                                <div id="app" style="width: 150 px; height: 150px ;">
                                                    {!! $charts3->container() !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Daftar Hadir</td>
                                            <td>
                                                <div id="app" style="width: 150 px; height: 150px ;">
                                                    {!! $charts4->container() !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>KTPU</td>
                                            <td>
                                                <div id="app" style="width: 150 px; height: 150px ;">
                                                    {!! $charts5->container() !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Berita Acara</td>
                                            <td>
                                                <div id="app" style="width: 150 px; height: 150px ;">
                                                    {!! $charts6->container() !!}
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>2. Apakah kemasan naskah ujian dalam keadaan baik </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts7->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>3. Apakah jumlah dan jenis naskah ujian sesuai dengan rekap daftar peserta/daftar 20an </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts8->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila Tidak Tindakan yang dilakukan : </h5>

                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan1 != Null)
                                    <li class="list-group-item">{{$form->pesan1}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>4. Apakah kemasan naskah ujian diterima sesuai dengan jam ujian di setiap ruang ujian? </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts9->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila Tidak Tindakan yang dilakukan : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan2 != Null)
                                    <li class="list-group-item">{{$form->pesan2}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>1. Apakah setiap panitia ujian di lokasi ujian menerima SK Panitia Ujian? (PJTU, PJLU, Pengawas Keliling, Pengawas Ruang, Tenaga administrasi) </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts10->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila Tidak Tindakan yang dilakukan : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan3 != Null)
                                    <li class="list-group-item">{{$form->pesan3}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>2. Apakah jumlah panitia memenuhi persyaratan?* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts11->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila Tidak Tindakan yang dilakukan : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan4 != Null)
                                    <li class="list-group-item">{{$form->pesan4}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>3. Apakah panitia direkrut sesuai dengan persyaratan?* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts12->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>4. Apakah pelaksanaan ujian melibatkan aparat keamanan?* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts13->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>1. Apakah sarana-prasarana sesuai dengan persyaratan?* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts14->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila Tidak Tindakan yang dilakukan : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan5 != Null)
                                    <li class="list-group-item">{{$form->pesan5}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>2. Apakah Denah Lokasi Ujian, Tata Tertib, Nomor Ruang, dan Daftar Peserta Ujian ditempel sesuai ketentuan?* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts15->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila Tidak Tindakan yang dilakukan : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan6 != Null)
                                    <li class="list-group-item">{{$form->pesan6}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>3. Apakah jumlah peserta ujian di ruang sesuai dengan persyaratan?* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts16->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila Tidak Tindakan yang dilakukan : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan7 != Null)
                                    <li class="list-group-item">{{$form->pesan7}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>4. Apakah terdapat lokasi ujian yang menggunakan aula atau GOR? Jika ya, lanjutkan ke pertanyaan 5. Jika tidak lanjutkan ke pertanyaan 6* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts17->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>5. Apakah penataan peserta ujian di aula/GOR diatur sesuai dengan ketentuan? </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts18->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila Tidak Tindakan yang dilakukan : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan8 != Null)
                                    <li class="list-group-item">{{$form->pesan8}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>6. Apakah tersedia ruang khusus (kasus)?* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts19->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Komentar : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan9 != Null)
                                    <li class="list-group-item">{{$form->pesan9}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>7. Apakah tersedia ruang ujian dan sarana untuk ujian listening/speaking/berbicara?* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts20->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Komentar : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan10 != Null)
                                    <li class="list-group-item">{{$form->pesan10}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>8. Apakah pelaksanaan ujian listening/speaking/berbicara sesuai dengan ketentuan?* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts21->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila Tidak, maka tindakan yang dilakukan </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan11 != Null)
                                    <li class="list-group-item">{{$form->pesan11}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>9. Apakah tata tertib ujian dibacakan oleh pengawas ruang setiap jam ujian?* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts22->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila Tidak, maka tindakan yang dilakukan </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan12 != Null)
                                    <li class="list-group-item">{{$form->pesan12}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>10. Apakah ditemukan pelanggaran tata tertib oleh peserta ujian?* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts23->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila iya, tuliskan jenis pelanggaran yang ditemukan (informasi lengkap pelanggaran mencakup nama, NIM, ruang ujian, lokasi ujian, kode dan nama matakuliah serta foto dikirimkan ke timbul@ecampus.ut.ac.id menggunakan format lampiran yang ada di panduan pedoman UAS) </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan13 != Null)
                                    <li class="list-group-item">{{$form->pesan13}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Tindakan yang dilakukan : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan14 != Null)
                                    <li class="list-group-item">{{$form->pesan14}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>11. Apakah Pengawas Ruang melaksanakan tugas sesuai dengan fungsinya?* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts24->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila tidak, tuliskan secara detail nama pengawas, jam ujian, nomor ruang, lokasi ujian: </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan15 != Null)
                                    <li class="list-group-item">{{$form->pesan15}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Tindakan yang dilakukan : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan16 != Null)
                                    <li class="list-group-item">{{$form->pesan16}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>12. Apakah Pengawas Keliling melaksanakan tugas sesuai dengan fungsinya?* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts25->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila tidak, tuliskan secara detail nama pengawas keliling, lokasi ujian </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan17 != Null)
                                    <li class="list-group-item">{{$form->pesan17}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Tindakan yang dilakukan : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan18 != Null)
                                    <li class="list-group-item">{{$form->pesan18}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>13. Apakah permintaan naskah ujian tambahan dan penggandaan naskah ujian sesuai dengan ketentuan?* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts26->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila tidak, Tindakan yang dilakukan : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan19 != Null)
                                    <li class="list-group-item">{{$form->pesan19}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>1. Apakah hasil ujian ditata sesuai dengan ketentuan?* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts27->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila tidak, Tindakan yang dilakukan : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan20 != Null)
                                    <li class="list-group-item">{{$form->pesan20}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>2. Apakah hasil ujian dijaga keamanannya dengan baik?*</h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts28->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>3. Apakah pengiriman hasil ujian dilakukan sesuai ketentuan?*</h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts29->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila tidak, Tindakan yang dilakukan : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan21 != Null)
                                    <li class="list-group-item">{{$form->pesan21}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>4. Apakah naskah ujian di musnahkan pada jam terakhir? *</h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts30->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>5. Apakah semua naskah ujian dimusnahkan setiap hari ujian?*</h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts31->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila tidak, Tindakan yang dilakukan : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan22 != Null)
                                    <li class="list-group-item">{{$form->pesan22}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h4>Bahan Pendukung Ujian </h4>
                                <h5>Temuan : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan23 != Null)
                                    <li class="list-group-item">{{$form->pesan23}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Tindakan yang dilakukan di Lapangan : </h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan24 != Null)
                                    <li class="list-group-item">{{$form->pesan24}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Saran :</h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan25 != Null)
                                    <li class="list-group-item">{{$form->pesan25}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h4>Naskah Ujian </h4>
                                <h5>Temuan :</h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan26 != Null)
                                    <li class="list-group-item">{{$form->pesan26}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Tindakan yang dilakukan di Lapangan :</h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan27 != Null)
                                    <li class="list-group-item">{{$form->pesan27}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Saran :</h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan28 != Null)
                                    <li class="list-group-item">{{$form->pesan28}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h4>Kepanitian </h4>
                                <h5>Temuan :</h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan29 != Null)
                                    <li class="list-group-item">{{$form->pesan29}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Tindakan yang dilakukan di Lapangan :</h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan30 != Null)
                                    <li class="list-group-item">{{$form->pesan30}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Saran :</h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan31 != Null)
                                    <li class="list-group-item">{{$form->pesan31}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h4>Pelaksanaan Ujian </h4>
                                <h5>Temuan :</h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan32 != Null)
                                    <li class="list-group-item">{{$form->pesan32}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Tindakan yang dilakukan di Lapangan :</h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan33 != Null)
                                    <li class="list-group-item">{{$form->pesan33}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Saran :</h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan34 != Null)
                                    <li class="list-group-item">{{$form->pesan34}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h4>Pasca Kegiatan Ujian </h4>
                                <h5>Temuan :</h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan35 != Null)
                                    <li class="list-group-item">{{$form->pesan35}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Tindakan Yang Dilakukan di Lapangan :</h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan36 != Null)
                                    <li class="list-group-item">{{$form->pesan36}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Saran :</h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan37 != Null)
                                    <li class="list-group-item">{{$form->pesan37}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h4> Sarana dan Prasarana Pendukung </h4>
                                <h5>Temuan :</h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan38 != Null)
                                    <li class="list-group-item">{{$form->pesan38}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Tindakan Yang Dilakukan di Lapangan :</h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan39 != Null)
                                    <li class="list-group-item">{{$form->pesan39}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Saran :</h5>
                                <ul class="list-group ">
                                    @foreach($pemantau as $form)
                                    @if($form->pesan40 != Null)
                                    <li class="list-group-item">{{$form->pesan40}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>




                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
{!! $charts1->script() !!}
{!! $charts2->script() !!}
{!! $charts3->script() !!}
{!! $charts4->script() !!}
{!! $charts5->script() !!}
{!! $charts6->script() !!}
{!! $charts7->script() !!}
{!! $charts8->script() !!}
{!! $charts9->script() !!}
{!! $charts10->script() !!}
{!! $charts11->script() !!}
{!! $charts12->script() !!}
{!! $charts13->script() !!}
{!! $charts14->script() !!}
{!! $charts15->script() !!}
{!! $charts17->script() !!}
{!! $charts18->script() !!}
{!! $charts19->script() !!}
{!! $charts20->script() !!}
{!! $charts21->script() !!}
{!! $charts22->script() !!}
{!! $charts23->script() !!}
{!! $charts24->script() !!}
{!! $charts25->script() !!}
{!! $charts26->script() !!}
{!! $charts27->script() !!}
{!! $charts28->script() !!}
{!! $charts29->script() !!}
{!! $charts30->script() !!}
{!! $charts31->script() !!}


@endsection