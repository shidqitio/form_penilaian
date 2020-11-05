@extends('layouts.master_admin4')
@section('title', 'Form Instrumen UAS')
@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">

                    <h5>Chart UPBJJ Admin</h5>

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
                        <h5>1.Tingkat kesulitan dalam mencetak dan menata KTPU, Daftar Hadir, dan Daftar Peserta Ujian*
                        </h5>
                        <div id="app" style="width: 150 px; height: 150px ;">
                            {!! $charts1->container() !!}
                        </div>
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>2. Tingkat kesulitan dalam menyiapkan bahan pendukung ujian dan peralatan per lokasi ujian*
                        </h5>
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>a. LJU/BJU* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts2->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>b. Tape recorder ujian listening* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts3->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>c. Penguji untuk ujian lisan* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts4->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>d. Daftar hadir* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts5->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>e. Berita acara* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts6->container() !!}
                                </div>
                            </div>
                        </div>


                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>f. Denah* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts7->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>g. Tata tertib* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts8->container() !!}
                                </div>
                            </div>
                        </div>


                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>h. Pernyataan anti nyontek* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts9->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>i. Amplop* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts10->container() !!}
                                </div>
                            </div>
                        </div>


                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>j. Karung* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts11->container() !!}
                                </div>
                            </div>
                        </div>


                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>k. Box* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts12->container() !!}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>3. Tingkat kesulitan dalam menentukan lokasi ujian*</h5>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>a. Lokasi* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts13->container() !!}
                                </div>
                            </div>
                        </div>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>b. Jumlah ruang* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts14->container() !!}
                                </div>
                            </div>
                        </div>


                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>c. Pengawas* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts15->container() !!}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>4. Tingkat kesulitan dalam menentukan*</h5>
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>a. Panitia ujian* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts16->container() !!}
                                </div>
                            </div>
                        </div>


                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>b. Penyamaan persepsi pelaksanaan ujian* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts17->container() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>5. Tingkat kesulitan distribusi bahan ujian ke lokasi dengan menggunakan sarana transportasi
                            umum* </h5>
                        <div id="app" style="width: 150 px; height: 150px ;">
                            {!! $charts18->container() !!}
                        </div>
                    </div>
                </div>


                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>6. Tingkat kesulitan dalam penataan naskah per lokasi ujian terkait dengan validitas data
                            registrasi* </h5>
                        <div id="app" style="width: 150 px; height: 150px ;">
                            {!! $charts19->container() !!}
                        </div>
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h5>7. Tingkat kesulitan dalam pengiriman berkas hasil ujian mencakup :</h5>

                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>a. LJU ke UT Pusat* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts20->container() !!}
                                </div>
                            </div>
                        </div>



                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h5>b. BJU ke UPBJJ sentra* </h5>
                                <div id="app" style="width: 150 px; height: 150px ;">
                                    {!! $charts21->container() !!}
                                </div>
                            </div>
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
{!! $charts13->script() !!}
{!! $charts14->script() !!}
{!! $charts15->script() !!}
{!! $charts17->script() !!}
{!! $charts18->script() !!}
{!! $charts19->script() !!}
{!! $charts20->script() !!}
{!! $charts21->script() !!}



@endsection