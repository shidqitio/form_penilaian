@extends('layoutfront.master')

@section('title','INSTRUMEN OBSERVASI PEMANTAUAN UJIAN DI TEMPAT / LOKASI UJIAN (DI ISI OLEH PEMANTAU UAS)')


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

                        <h1 class="header-w3ls" style="color:black ">
                            INSTRUMEN OBSERVASI PEMANTAUAN UJIAN DI TEMPAT / LOKASI UJIAN (DI ISI OLEH PEMANTAU UAS)
                        </h1>
                        <!-- <button class="button" onclick="window.location.href='/form'" />
                            Kembali ke menu utama
                            </button> -->
                        <!-- multistep form -->
                        <div class=" col-lg-10">
                            <div class="card-body">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                <form action="pemantauan.store" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}


                                    <div class="form-group">
                                        <div class="form-mid-w3ls">
                                            <p>Tempat ujian</p>
                                            <input type="text" name="tempat_ujian" class="form-control" placeholder="" required>
                                        </div>
                                        <div class="form-mid-w3ls">
                                            <p>Lokasi Ujian</p>
                                            <input type="text" name="lokasi_ujian" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <div class="form-mid-w3ls">
                                            <p>UPBJJ</p>
                                            <select name="upbjj" required>
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
                                            <select name="masa_ujian" required>
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
                                            <p>Tanggal Ujian</p>
                                            <input type="date" id="name" class="form-control" name="tanggal_ujian" value="mm/dd/yyyy" required />
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                    <div class="personal-info-label">
                                        I. OBSERVASI UMUM PEMANTAUAN
                                    </div>
                                    <br>
                                    <br>
                                    <div class="personal-info-sub"> A. Bahan Ujian</div>
                                    <br>
                                    <br>

                                    <label class="rating">
                                        1. Apakah jumlah dan jenis bahan pendukung mencukupi?<span>*</span>
                                    </label>


                                    <div class="personal-info">
                                        <p>a. Amplop<span>*</span></p>
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
                                        <p>b. LJU<span>*</span></p>
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
                                        <p>c. BJU<span>*</span></p>
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
                                        <p>d. daftar hadir<span>*</span></p>
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
                                        <p>e. KTPU<span>*</span></p>
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
                                        <p>f. berita acara<span>*</span></p>
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
                                        <p>2. Apakah kemasan naskah ujian dalam keadaan baik?<span>*</span></p>
                                    </div>
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

                                    <div class="personal-info">
                                        <p>3. Apakah jumlah dan jenis naskah ujian sesuai dengan rekap daftar peserta/daftar 20 an?<span>*</span></p>
                                    </div>
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


                                    <div class="form-control-w3l">
                                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                                        <textarea name="pesan1" placeholder=""></textarea>
                                    </div>

                                    <div class="personal-info">
                                        <p>4. Apakah kemasan naskah ujian diterima sesuai dengan jam ujian di setiap ruang ujian?<span>*</span></p>
                                    </div>
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


                                    <div class="form-control-w3l">
                                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                                        <textarea name="pesan2" placeholder=""></textarea>
                                    </div>



                                    <br>
                                    <div class="personal-info-sub">B. Kepanitiaan</div>
                                    <br>

                                    <div class="personal-info">
                                        <p>1. Apakah setiap panitia ujian di lokasi ujian menerima SK Panitia Ujian? (PJTU, PJLU, Pengawas Keliling, Pengawas Ruang, Tenaga administrasi) <span>*</span></p>
                                    </div>
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


                                    <div class="form-control-w3l">
                                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                                        <textarea name="pesan3" placeholder=""></textarea>
                                    </div>

                                    <div class="personal-info">
                                        <p>2. Apakah jumlah panitia memenuhi persyaratan?<span>*</span></p>
                                    </div>
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


                                    <div class="form-control-w3l">
                                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                                        <textarea name="pesan4" placeholder=""></textarea>
                                    </div>

                                    <div class="personal-info">
                                        <p>3. Apakah panitia direkrut sesuai dengan persyaratan?<span>*</span></p>
                                    </div>
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

                                    <div class="personal-info">
                                        <p>4. Apakah pelaksanaan ujian melibatkan aparat keamanan?<span>*</span></p>
                                    </div>
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

                                    <br>
                                    <br>
                                    <br>
                                    <div class="personal-info-sub">C. Pelaksanaan Ujian</div>

                                    <br>

                                    <div class="personal-info">
                                        <p>1. Apakah sarana-prasarana sesuai dengan persyaratan?<span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select14" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select14" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                                        <textarea name="pesan5" placeholder=""></textarea>
                                    </div>


                                    <div class="personal-info">
                                        <p>2. Apakah Denah Lokasi Ujian, Tata Tertib, Nomor Ruang, dan Daftar Peserta Ujian ditempel sesuai ketentuan?<span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select15" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select15" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                                        <textarea name="pesan6" placeholder=""></textarea>
                                    </div>



                                    <div class="personal-info">
                                        <p>3. Apakah jumlah peserta ujian di ruang sesuai dengan persyaratan?<span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select16" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select16" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                                        <textarea name="pesan7" placeholder=""></textarea>
                                    </div>



                                    <div class="personal-info">
                                        <p>4. Apakah terdapat lokasi ujian yang menggunakan aula atau GOR? Jika ya, lanjutkan ke pertanyaan 5. Jika tidak lanjutkan ke pertanyaan 6<span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select17" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select17" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>


                                    <div class="personal-info">
                                        <p>5. Apakah penataan peserta ujian di aula/GOR diatur sesuai dengan ketentuan? <span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select18" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select18" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                                        <textarea name="pesan8" placeholder=""></textarea>
                                    </div>



                                    <div class="personal-info">
                                        <p>6. Apakah tersedia ruang khusus (kasus)?<span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select19" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select19" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Komentar :</p>
                                        <textarea name="pesan9" placeholder=""></textarea>
                                    </div>



                                    <div class="personal-info">
                                        <p>7. Apakah tersedia ruang ujian dan sarana untuk ujian listening/speaking/berbicara?<span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select20" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select20" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Komentar :</p>
                                        <textarea name="pesan10" placeholder=""></textarea>
                                    </div>


                                    <div class="personal-info">
                                        <p>8. Apakah pelaksanaan ujian listening/speaking/berbicara sesuai dengan ketentuan?<span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select21" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select21" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                                        <textarea name="pesan11" placeholder=""></textarea>
                                    </div>


                                    <div class="personal-info">
                                        <p>9. Apakah tata tertib ujian dibacakan oleh pengawas ruang setiap jam ujian?<span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select22" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select22" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                                        <textarea name="pesan12" placeholder=""></textarea>
                                    </div>


                                    <div class="personal-info">
                                        <p>10. Apakah ditemukan pelanggaran tata tertib oleh peserta ujian?<span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select23" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select23" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>

                                    <div class="form-control-w3l">
                                        <p>Bila iya, tuliskan jenis pelanggaran yang ditemukan (informasi lengkap pelanggaran mencakup nama, NIM, ruang ujian, lokasi ujian, kode dan nama matakuliah serta foto dikirimkan ke timbul@ecampus.ut.ac.id menggunakan format lampiran yang ada di panduan pedoman UAS)</p>
                                        <textarea name="pesan13" placeholder=""></textarea>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Tindakan yang dilakukan :</p>
                                        <textarea name="pesan14" placeholder=""></textarea>
                                    </div>



                                    <div class="personal-info">
                                        <p>11. Apakah Pengawas Ruang melaksanakan tugas sesuai dengan fungsinya?<span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select24" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select24" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>

                                    <div class="form-control-w3l">
                                        <p>Bila tidak, tuliskan secara detail nama pengawas, jam ujian, nomor ruang, lokasi ujian</p>
                                        <textarea name="pesan15" placeholder=""></textarea>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Tindakan yang dilakukan :</p>
                                        <textarea name="pesan16" placeholder=""></textarea>
                                    </div>


                                    <div class="personal-info">
                                        <p>12. Apakah Pengawas Keliling melaksanakan tugas sesuai dengan fungsinya?<span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select25" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select25" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>

                                    <div class="form-control-w3l">
                                        <p>Bila tidak, tuliskan secara detail nama pengawas keliling, lokasi ujian</p>
                                        <textarea name="pesan17" placeholder=""></textarea>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Tindakan yang dilakukan :</p>
                                        <textarea name="pesan18" placeholder=""></textarea>
                                    </div>

                                    <div class="personal-info">
                                        <p>13. Apakah permintaan naskah ujian tambahan dan penggandaan naskah ujian sesuai dengan ketentuan?<span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select26" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select26" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                                        <textarea name="pesan19" placeholder=""></textarea>
                                    </div>


                                    <br>
                                    <br>
                                    <div class="personal-info-sub">D. Pascapelaksanaan Ujian</div>
                                    <br>



                                    <div class="personal-info">
                                        <p>1. Apakah hasil ujian ditata sesuai dengan ketentuan?<span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select27" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select27" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                                        <textarea name="pesan20" placeholder=""></textarea>
                                    </div>


                                    <div class="personal-info">
                                        <p>2. Apakah hasil ujian dijaga keamanannya dengan baik?<span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select28" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select28" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>


                                    <div class="personal-info">
                                        <p>3. Apakah pengiriman hasil ujian dilakukan sesuai ketentuan?<span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select29" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select29" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>

                                    <div class="form-control-w3l">
                                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                                        <textarea name="pesan21" placeholder=""></textarea>
                                    </div>




                                    <div class="personal-info">
                                        <p>4. Apakah naskah ujian di musnahkan pada jam terakhir? <span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select30" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select30" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>


                                    <div class="personal-info">
                                        <p>5. Apakah semua naskah ujian dimusnahkan setiap hari ujian?<span>*</span></p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select31" value="Ya"="">
                                        <label class="form-check-label">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="select31" value="Tidak">
                                        <label class="form-check-label">
                                            Tidak
                                        </label>
                                    </div>

                                    <div class="form-control-w3l">
                                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                                        <textarea name="pesan22" placeholder=""></textarea>
                                    </div>


                                    <br>
                                    <br>
                                    <br>
                                    <div class="personal-info-label">II. Rekap Laporan Pelaksanaan UAS dan TAP Program Non Pendas </div>
                                    <br>
                                    <br>
                                    <div class="personal-info-sub">A. Bahan Pendukung Ujian</div>
                                    <br>
                                    <br>

                                    <div class="form-control-w3l">
                                        <p>Temuan :</p>
                                        <textarea name="pesan23" placeholder=""></textarea>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Tindakan yang dilakukan di Lapangan :</p>
                                        <textarea name="pesan24" placeholder=""></textarea>
                                    </div>

                                    <div class="form-control-w3l">
                                        <p>Saran :</p>
                                        <textarea name="pesan25" placeholder=""></textarea>
                                    </div>

                                    <br>
                                    <br>
                                    <div class="personal-info-sub">B. Naskah Ujian</div>
                                    <br>
                                    <br>

                                    <div class="form-control-w3l">
                                        <p>Temuan :</p>
                                        <textarea name="pesan26" placeholder=""></textarea>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Tindakan yang dilakukan di Lapangan :</p>
                                        <textarea name="pesan27" placeholder=""></textarea>
                                    </div>

                                    <div class="form-control-w3l">
                                        <p>Saran :</p>
                                        <textarea name="pesan28" placeholder=""></textarea>
                                    </div>



                                    <br>
                                    <br>
                                    <div class="personal-info-sub">C. Kepanitiaan</div>
                                    <br>
                                    <br>

                                    <div class="form-control-w3l">
                                        <p>Temuan :</p>
                                        <textarea name="pesan29" placeholder=""></textarea>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Tindakan yang dilakukan di Lapangan :</p>
                                        <textarea name="pesan30" placeholder=""></textarea>
                                    </div>

                                    <div class="form-control-w3l">
                                        <p>Saran :</p>
                                        <textarea name="pesan31" placeholder=""></textarea>
                                    </div>



                                    <br>
                                    <br>
                                    <div class="personal-info-sub">D. Pelaksanaan Ujian</div>
                                    <br>
                                    <br>

                                    <div class="form-control-w3l">
                                        <p>Temuan :</p>
                                        <textarea name="pesan32" placeholder=""></textarea>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Tindakan yang dilakukan di Lapangan :</p>
                                        <textarea name="pesan33" placeholder=""></textarea>
                                    </div>

                                    <div class="form-control-w3l">
                                        <p>Saran :</p>
                                        <textarea name="pesan34" placeholder=""></textarea>
                                    </div>


                                    <br>
                                    <br>
                                    <div class="personal-info-sub">E. Pascakegiatan Ujian</div>
                                    <br>
                                    <br>

                                    <div class="form-control-w3l">
                                        <p>Temuan :</p>
                                        <textarea name="pesan35" placeholder=""></textarea>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Tindakan yang dilakukan di Lapangan :</p>
                                        <textarea name="pesan36" placeholder=""></textarea>
                                    </div>

                                    <div class="form-control-w3l">
                                        <p>Saran :</p>
                                        <textarea name="pesan37" placeholder=""></textarea>
                                    </div>




                                    <br>
                                    <br>
                                    <div class="personal-info-sub">F. Sarana dan Prasarana Pendukung</div>
                                    <br>
                                    <br>

                                    <div class="form-control-w3l">
                                        <p>Temuan :</p>
                                        <textarea name="pesan38" placeholder=""></textarea>
                                    </div>


                                    <div class="form-control-w3l">
                                        <p>Tindakan yang dilakukan di Lapangan :</p>
                                        <textarea name="pesan39" placeholder=""></textarea>
                                    </div>

                                    <div class="form-control-w3l">
                                        <p>Saran :</p>
                                        <textarea name="pesan40" placeholder=""></textarea>
                                    </div>

                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="store" value="Submit">
                                        <br>
                                        <br>


                                        <input href="#" class="btn btn-primary" onclick="window.print()" target="_blank" value="Cetak Laporan">
                                    </div>
                                    <br>
                                    <br>
                                    <p>*Cetak form laporan sebelum submit</p>
                                    <p>*Submit untuk menyimpan data dari form yang sudah diisi dan lanjut ke sesi upload foto</p>

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