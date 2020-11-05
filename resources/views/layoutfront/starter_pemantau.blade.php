@extends('layoutfront.master')
@section('title', 'Form Instrumen UAS')
@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Selamat Datang {{ Auth::user()->name }}
                        <div class="page-title-subheading">Ini adalah halaman depan untuk pengguna / user
                            yang bertugas sebagai pemantau
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-xl-6">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-right">
                            <a href="/pemantauan" type="button" class="mb-2 mr-2 btn btn-focus" style="font-weight: bold"><span>INSTRUMEN OBSERVASI PEMANTAUAN UJIAN DI TEMPAT / LOKASI UJIAN (DI ISI OLEH PEMANTAU UAS)</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-xl-6">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-right">
                            <a href="/feedback" type="button" class="mb-2 mr-2 btn btn-focus " style="font-weight: bold"><span>FEEDBACK PEMANTAUAN UAS PROGRAM NON PENDAS DAN PPS SEMESTER 2020/20.2 (2020.1)</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Download Hasil Pemantauan</h5>
                        <table class="mb-0 table table-striped table table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pemantau</th>
                                    <th>Tanggal Pemantauan</th>
                                    <th>Masa Ujian</th>
                                    <th>Download File</th>
                                </tr>
                            </thead>
                            @php
                            $no = 1
                            @endphp
                            @foreach($pdf as $pdf)
                            @if($pdf->pdf != NULL)
                            <tbody>
                                <tr>
                                    <th scope="row">{{$no++}}</th>
                                    <td>{{$pdf->nama}}</td>
                                    <td>{{$pdf->tanggal_ujian}}</td>
                                    <td>{{$pdf->masa_ujian}}</td>
                                    <td><a href="/download/pdf/{{ $pdf->no }}" class="btn btn-success">Download {{$pdf->tanggal_ujian}}</a></td>
                                </tr>
                                @endif
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>
</div>
</div>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
@endsection