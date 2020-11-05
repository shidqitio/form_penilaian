@extends('layouts.master_admin5')
@section('title', 'Form Instrumen UAS')
@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">

                    <h5>Chart PJTU/PJLU Admin</h5>

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
                        <h5>A. PERSIAPAN</h5>
                        <br>
                        <br>
                        <h5>1.Kemudahan berkoordinasi dengan Ko. Registrasi dan Ujian*
                        </h5>
                        <div id="app" style="width: 150 px; height: 150px ;">
                            {!! $charts1->container() !!}
                        </div>
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>2. Kecukupan informasi terkait pelaksanaan UAS* </h5>
                        <div id="app" style="width: 150 px; height: 150px ;">
                            {!! $charts2->container() !!}
                        </div>
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>3. Ketersediaan bahan pendukung UAS* </h5>
                        <div id="app" style="width: 150 px; height: 150px ;">
                            {!! $charts3->container() !!}
                        </div>
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>4. Ketersediaan naskah ujian* </h5>
                        <div id="app" style="width: 150 px; height: 150px ;">
                            {!! $charts4->container() !!}
                        </div>
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>5. Kelayakan sarana dan prasarana* </h5>
                        <div id="app" style="width: 150 px; height: 150px ;">
                            {!! $charts5->container() !!}
                        </div>
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>6. Keamanan naskah ujian* </h5>
                        <div id="app" style="width: 150 px; height: 150px ;">
                            {!! $charts6->container() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h5>B. KUALITAS PELAKSAAN</h5>

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>1. Kuantitas panitia setempat* </h5>
                        <div id="app" style="width: 150 px; height: 150px ;">
                            {!! $charts7->container() !!}
                        </div>
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>2. Kualitas panitia setempat*</h5>
                        <div id="app" style="width: 150 px; height: 150px ;">
                            {!! $charts8->container() !!}
                        </div>
                    </div>
                </div>


                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>3. Keamanan lokasi ujian* </h5>
                        <div id="app" style="width: 150 px; height: 150px ;">
                            {!! $charts9->container() !!}
                        </div>
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>4. Ketertiban dalam pelaksanaan* </h5>
                        <div id="app" style="width: 150 px; height: 150px ;">
                            {!! $charts10->container() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h5>C. KEMUDAHAN PELAKSANAAN</h5>

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>1. Kemudahan dalam pelaksanaan UAS* </h5>
                        <div id="app" style="width: 150 px; height: 150px ;">
                            {!! $charts11->container() !!}
                        </div>
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>2. Kemudahan dalam memusnahkan naskah UAS* </h5>
                        <div id="app" style="width: 150 px; height: 150px ;">
                            {!! $charts12->container() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
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




@endsection