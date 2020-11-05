@extends('upbjjfront.master_upbjj5')
@section('title', 'Form Instrumen UAS')
@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">

                    <h5>Chart Feedback Per UPBJJ</h5>

                </div>
            </div>
        </div>

        <a href="#" class="btn btn-success" onclick="window.print()" target="_blank">CETAK LAPORAN</a>
        <br>
        <br>
        <div class="row">
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







    @endsection