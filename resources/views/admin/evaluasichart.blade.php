@extends('layouts.master_admin7')
@section('title', 'Form Instrumen UAS')
@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">

                    <h5>Chart Evaluasi Admin</h5>

                </div>
            </div>
        </div>

        <a href="#" class="btn btn-success" onclick="window.print()" target="_blank">CETAK LAPORAN</a>
        <br>
        <br>


        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                                <h5>1. Petugas memberitahu ke Ka. UPBJJ-UT/Manager Registrasi dan Asesmen (MRA) bahwa yang bersangkutan akan bertugas di UPBJJ-UT </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts1->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>2. Petugas meminta perlakuan khusus yang tidak berkaitan dengan pelaksanaan UAS </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts2->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>3. Petugas berkoordinasi dengan petugas lainnya terkait dengan jadwal keberangkatan dan kepulangan </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts3->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>4. Petugas sopan dalam berkomunikasi pada saat melaksanakan tugas </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts4->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5> 5. Petugas sopan dalam berpakaian pada saat melaksanakan tugas </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts5->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>6. Petugas mengenakan tanda pengenal </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts6->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>7. Pemantau membantu panitia/PJTU/PJLU dalam penyelenggaraan ujian (Hanya di isi untuk mengevaluasi pemantau) </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts7->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>8. Petugas membantu menjaga ketertiban dan ketenangan pelaksanaan ujian </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts8->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>9. Pemantau berkoordinasi dengan MRA/PJTU/PJLU/Pengawas Keliling/Pengawas Ruang dalam menangani pengaduan mahasiswa (Hanya di isi untuk mengevaluasi pemantau) </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts9->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>10. Petugas berkoordinasi dengan MRA/Pengawas Keliling/Pengawas Ruang dalam menangani pengaduan mahasiswa (Hanya di isi untuk mengevaluasi PJTU/pendamping PJTU/PJLU) </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts10->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>11. Petugas memahami dengan baik prosedur penyelenggaraan ujian </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts11->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>12. Petugas berada di lokasi ujian sesuai dengan jadwal UAS </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts12->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>13. Petugas melapor ke Ka. UPBJJ-UT/MRA secara lisan/WA tentang temuannya di lapangan </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts13->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid table-wrapper-scroll-y my-custom-scrollbar">
                            <div class="container">
                                <h5>Bila tidak, Tindakan yang dilakukan : </h5>
                                <ul class="list-group ">
                                    @foreach($evaluasi as $form)
                                    @if($form->pesan1 != Null)
                                    <li class="list-group-item">{{$form->pesan1}}</li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <a href="#" class="btn btn-success" onclick="window.print()" target="_blank">CETAK LAPORAN</a>



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



@endsection