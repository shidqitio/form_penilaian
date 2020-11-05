@extends('layouts.title')
@section ('title','Hasil Laporan')
@section ('headtitle','chart')
@section('content')
<div class="container">
    <a href="/admin" class="btn btn-success  mr-5" style="margin-bottom: 25px"> Kembali </a>
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

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Lokasi 1 </h5>
                                <br />
                                <h6>Lokasi Pemantauan</h6>

                                <ul class="list-group ">
                                    @foreach($feedback as $form)
                                    @if($form->lokasi1 != Null)
                                    <li class="list-group-item">{{$form->lokasi1}}</li>
                                    @endif
                                    @endforeach
                                </ul>

                                <h6 style="margin-top: 20px">Aspek</h6>

                                <ul class="list-group ">
                                    @foreach($feedback as $form)
                                    @if($form->aspek1 != Null)
                                    <li class="list-group-item">{{$form->aspek1}}</li>
                                    @endif
                                    @endforeach
                                </ul>

                                <h6 style="margin-top: 20px">Praktik Baik</h6>

                                <ul class="list-group ">
                                    @foreach($feedback as $form)
                                    @if($form->praktikbaik1 != Null)
                                    <li class="list-group-item">{{$form->praktikbaik1}}</li>
                                    @endif
                                    @endforeach
                                </ul>

                                <h6 style="margin-top: 20px">Temuan</h6>

                                <ul class="list-group ">
                                    @foreach($feedback as $form)
                                    @if($form->temuan1 != Null)
                                    <li class="list-group-item">{{$form->temuan1}}</li>
                                    @endif
                                    @endforeach
                                </ul>

                                <h6 style="margin-top: 20px">Saran</h6>

                                <ul class="list-group ">
                                    @foreach($feedback as $form)
                                    @if($form->saran1 != Null)
                                    <li class="list-group-item">{{$form->saran1}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Lokasi 2 </h5>
                                <br />
                                <h6>Lokasi Pemantauan</h6>

                                <ul class="list-group ">
                                    @foreach($feedback as $form)
                                    @if($form->lokasi2 != Null)
                                    <li class="list-group-item">{{$form->lokasi2}}</li>
                                    @endif
                                    @endforeach
                                </ul>

                                <h6 style="margin-top: 20px">Aspek</h6>

                                <ul class="list-group ">
                                    @foreach($feedback as $form)
                                    @if($form->aspek2 != Null)
                                    <li class="list-group-item">{{$form->aspek2}}</li>
                                    @endif
                                    @endforeach
                                </ul>

                                <h6 style="margin-top: 20px">Praktik Baik</h6>

                                <ul class="list-group ">
                                    @foreach($feedback as $form)
                                    @if($form->praktikbaik2 != Null)
                                    <li class="list-group-item">{{$form->praktikbaik2}}</li>
                                    @endif
                                    @endforeach
                                </ul>

                                <h6 style="margin-top: 20px">Temuan</h6>

                                <ul class="list-group ">
                                    @foreach($feedback as $form)
                                    @if($form->temuan2 != Null)
                                    <li class="list-group-item">{{$form->temuan2}}</li>
                                    @endif
                                    @endforeach
                                </ul>

                                <h6 style="margin-top: 20px">Saran</h6>

                                <ul class="list-group ">
                                    @foreach($feedback as $form)
                                    @if($form->saran2 != Null)
                                    <li class="list-group-item">{{$form->saran2}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Lokasi 3 </h5>
                                <br />
                                <h6>Lokasi Pemantauan</h6>

                                <ul class="list-group ">
                                    @foreach($feedback as $form)
                                    @if($form->lokasi3 != Null)
                                    <li class="list-group-item">{{$form->lokasi3}}</li>
                                    @endif
                                    @endforeach
                                </ul>

                                <h6 style="margin-top: 20px">Aspek</h6>

                                <ul class="list-group ">
                                    @foreach($feedback as $form)
                                    @if($form->aspek3 != Null)
                                    <li class="list-group-item">{{$form->aspek3}}</li>
                                    @endif
                                    @endforeach
                                </ul>

                                <h6 style="margin-top: 20px">Praktik Baik</h6>

                                <ul class="list-group ">
                                    @foreach($feedback as $form)
                                    @if($form->praktikbaik3 != Null)
                                    <li class="list-group-item">{{$form->praktikbaik3}}</li>
                                    @endif
                                    @endforeach
                                </ul>

                                <h6 style="margin-top: 20px">Temuan</h6>

                                <ul class="list-group ">
                                    @foreach($feedback as $form)
                                    @if($form->temuan3 != Null)
                                    <li class="list-group-item">{{$form->temuan3}}</li>
                                    @endif
                                    @endforeach
                                </ul>

                                <h6 style="margin-top: 20px">Saran</h6>

                                <ul class="list-group ">
                                    @foreach($feedback as $form)
                                    @if($form->saran3 != Null)
                                    <li class="list-group-item">{{$form->saran3}}</li>
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





@endsection