@extends('upbjjfront.master_upbjj')
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
                    <div>Selamat Datang di Halaman UPBJJ
                        <div class="page-title-subheading">Ini adalah halaman depan untuk pengguna / user
                            yang login atau masuk sebagai upbjj
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
                            <a href="/mra" type="button" class="mb-2 mr-2 btn btn-focus" style="font-weight: bold"><span>INSTRUMEN PERSIAPAN PELAKSANAAN UJIAN DI UPBJJ-UT (DI ISI OLEH MANAGER REGISTRASI DAN ASESMENT (MRA) DI UPBJJ-UT) </span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-xl-6">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-right">
                            <a href="/evaluasi" type="button" class="mb-2 mr-2 btn btn-focus " style="font-weight: bold"><span>LEMBAR EVALUASI PEMANTAU / PJTU / PENDAMPING PJTU / PJLU PELAKSANAAN UAS (DI ISI OLEH KEPALA UPBJJ / MANAGER REGISTRASI DAN ASESMEN (MRA))</span></a>
                        </div>
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