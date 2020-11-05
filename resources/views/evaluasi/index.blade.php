@extends('upbjjfront.master_upbjj')

@section('title','LEMBAR EVALUASI PEMANTAU/PJTU/PENDAMPING PJTU/PJLU PELAKSANAAN UAS (DI ISI OLEH UPBJJ)
Kembali ke menu utama')

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

                        <h1 class="header-w3ls" style="color:black">
                            LEMBAR EVALUASI PEMANTAU/PJTU/PENDAMPING PJTU/PJLU PELAKSANAAN UAS (DI ISI OLEH UPBJJ)
                        </h1>

                        <!-- multistep form -->
                        <div class=" col-lg-10">
                            <div class="card-body">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                <form action="{{ route('evaluasi.store') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="personal-info-sub">
                                        <!-- <h1>Lembar evaluasi ini bertujuan untuk mengevaluasi kinerja pemantau / PJTU / pendamping PJTU / PJLU UAS,
                                            di isi oleh kepala UPBJJ / Manager Registrasi dan Asesment (MRA)</h1> -->
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <div class="form-mid-w3ls">
                                            <p>Nama Petugas yang dievaluasi :</p>
                                            <input type="text" name="nama" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-mid-w3ls">
                                            <p>Tempat dan lokasi ujian :</p>
                                            <input type="text" name="tempat_ujian" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <div class="form-mid-w3ls">
                                            <p>Bertugas Sebagai :</p>
                                            <select name="tugas">
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
                                            <p>Masa Ujian :</p>
                                            <select name="masa_ujian">
                                                <option value="none" selected="" disabled="">Pilih</option>

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
                                            <p>UPBJJ :</p>
                                            <select name="upbjj">
                                                <option value="none" selected="" disabled="">Pilih</option>

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
                                            <p>Tanggal Ujian</p>
                                            <input type="date" id="name" class="form-control" name="tanggal_ujian" value="mm/dd/yyyy" />
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="personal-info-label">
                                        <p>Petunjuk :</p>
                                        <p>Pilihlah jawaban dengan mengklik kata Ya atau Tidak sesuai dengan penilaian Bapak/Ibu</p>
                                    </div>

                                    <div class="personal-info">
                                        <p>1. Petugas memberitahu ke Ka. UPBJJ-UT/Manager Registrasi dan Asesmen (MRA) bahwa yang bersangkutan akan bertugas di UPBJJ-UT<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select1" value="Ya"="">
                                            <label class="form-check-label">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select1" value="Tidak">
                                            <label class="form-check-label">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>2. Petugas meminta perlakuan khusus yang tidak berkaitan dengan pelaksanaan UAS<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select2" value="Ya"="">
                                            <label class="form-check-label">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select2" value="Tidak">
                                            <label class="form-check-label">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>3. Petugas berkoordinasi dengan petugas lainnya terkait dengan jadwal keberangkatan dan kepulangan<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select3" value="Ya"="">
                                            <label class="form-check-label">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select3" value="Tidak">
                                            <label class="form-check-label">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>4. Petugas sopan dalam berkomunikasi pada saat melaksanakan tugas<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select4" value="Ya"="">
                                            <label class="form-check-label">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select4" value="Tidak">
                                            <label class="form-check-label">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>5. Petugas sopan dalam berpakaian pada saat melaksanakan tugas<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select5" value="Ya"="">
                                            <label class="form-check-label">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select5" value="Tidak">
                                            <label class="form-check-label">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>6. Petugas mengenakan tanda pengenal<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select6" value="Ya"="">
                                            <label class="form-check-label">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select6" value="Tidak">
                                            <label class="form-check-label">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>7. Pemantau membantu panitia/PJTU/PJLU dalam penyelenggaraan ujian (Hanya di isi untuk mengevaluasi pemantau)</p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select7" value="Ya"="">
                                            <label class="form-check-label">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select7" value="Tidak">
                                            <label class="form-check-label">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>8. Petugas membantu menjaga ketertiban dan ketenangan pelaksanaan ujian <span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select8" value="Ya"="">
                                            <label class="form-check-label">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select8" value="Tidak">
                                            <label class="form-check-label">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>9. Pemantau berkoordinasi dengan MRA/PJTU/PJLU/Pengawas Keliling/Pengawas Ruang dalam menangani pengaduan mahasiswa
                                            (Hanya di isi untuk mengevaluasi pemantau)</p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select9" value="Ya"="">
                                            <label class="form-check-label">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select9" value="Tidak">
                                            <label class="form-check-label">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>10. Petugas berkoordinasi dengan MRA/Pengawas Keliling/Pengawas Ruang dalam menangani pengaduan mahasiswa
                                            (Hanya di isi untuk mengevaluasi PJTU/pendamping PJTU/PJLU)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="select10" value="Ya"="">
                                                <label class="form-check-label">
                                                    Ya
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="select10" value="Tidak">
                                                <label class="form-check-label">
                                                    Tidak
                                                </label>
                                            </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>11. Petugas memahami dengan baik prosedur penyelenggaraan ujian<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select11" value="Ya"="">
                                            <label class="form-check-label">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select11" value="Tidak">
                                            <label class="form-check-label">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>12. Petugas berada di lokasi ujian sesuai dengan jadwal UAS<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select12" value="Ya"="">
                                            <label class="form-check-label">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select12" value="Tidak">
                                            <label class="form-check-label">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="personal-info">
                                        <p>13. Petugas melapor ke Ka. UPBJJ-UT/MRA secara lisan/WA tentang temuannya di lapangan<span>*</span></p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select13" value="Ya"="">
                                            <label class="form-check-label">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="select13" value="Tidak">
                                            <label class="form-check-label">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Komentar umum secara keseluruhan :</p>
                                        <textarea name="pesan1" placeholder=""></textarea>
                                    </div>


                                    <div class="form-group">
                                    </div>
                                    <button class="button" onclick="window.location.href='/upbjj'" />SUBMIT</button>

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