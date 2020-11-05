<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>

</head>

<body>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
    <div class="container">
        @foreach($pemantau as $p)
        <p style="text-align: center; font-size:24px;">LAPORAN PEMANTAUAN PELAKSANAAN
            UJIAN AKHIR SEMESTER (UAS) DAN
            TUGAS AKHIR PROGRAM (TAP)

            MASA UJIAN {{ $p->masa_ujian }}
            UPBJJ-UT {{$p->upbjj }} </p>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <!-- <img src = "logout"> -->
        <p style="text-align: center; font-size:16px;">{{ $p->nama }}</p>
        <br />
        <h4 style="text-align: center; font-size:16px;">{{ $p->nip }}</h4>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />





        <p style="text-align: center; font-size:24px;">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN

            UNIVERSITAS TERBUKA
            <?php
            $now = \Carbon\Carbon::now();
            ?>
            TAHUN {{ $now->year }}
            <p>

                {{ csrf_field() }}
                <div class="page-break"></div>
                <h3 class="header-w3ls">
                    INSTRUMEN OBSERVASI PEMANTAUAN UJIAN DI TEMPAT / LOKASI UJIAN (DI ISI OLEH PEMANTAU UAS)
                </h3>
                <br />



                <div class="form-group" style="margin-left: 60px;">
                    <div class="form-mid-w3ls">
                        <p>Nama Pemantau : </p>
                        <p>{{ $p->nama }}</p>
                    </div>
                    <div class="form-mid-w3ls">
                        <p>Email : </p>
                        <p>{{ $p->email}}</p>
                    </div>

                    <div class="form-mid-w3ls">
                        <p>Tempat ujian</p>
                        <p>{{ $p->tempat_ujian}}</p>
                    </div>
                    <div class="form-mid-w3ls">
                        <p>Lokasi Ujian</p>
                        <p>{{ $p->lokasi_ujian }}</p>
                        <p>UPBJJ :</p>
                        <p>{{ $p->upbjj}}</p>
                        <p>Masa Ujian</p>
                        <p>{{ $p->masa_ujian }}</p>
                        <p>Tanggal Ujian</p>
                        <p>{{ $p->tanggal_ujian}}</p>
                        <p style="font-size: 16;">I. OBSERVASI UMUM PEMANTAUAN </p>
                        <p style="font-size: 14;">Bahan Ujian</p>
                        <p>1. Apakah Jumlah dan Jenis Bahan Pendukung Mencukupi</p>
                        <p>a. Amplop : </p>
                        <p>{{ $p->select1 }}</p>
                        <p>b. LJU : </p>
                        <p>{{ $p->select2 }}</p>
                        <p>c. BJU : </p>
                        <p>{{ $p->select3 }}</p>
                        <p>d. Daftar Hadir : </p>
                        <p>{{ $p->select4 }}</p>
                        <p>e. KTPU : </p>
                        <p>{{ $p->select5 }}</p>
                        <p>f. Berita Acara : </p>
                        <p>{{ $p->select6 }}</p>
                        <p>2. Apakah kemasan naskah ujian dalam keadaan baik </p>
                        <p>{{ $p->select7 }}</p>
                        <p>3. Apakah jumlah dan jenis naskah ujian sesuai dengan rekap daftar peserta/daftar 20an </p>
                        <p>{{ $p->select8 }}</p>
                        <p>Bila Tidak, maka tindakan yang dilakukan</p>
                        <p>{{ $p->pesan1 }}</p>
                        <p>4. Apakah kemasan naskah ujian diterima sesuai dengan jam ujian di setiap ruang ujian? </p>
                        <p>{{ $p->select9 }}</p>
                        <p>Bila Tidak, maka tindakan yang dilakukan</p>
                        <p>{{ $p->pesan2 }}</p>
                        <p style="font-size: 14">B. Kepanitian</p>
                        <p>1. Apakah setiap panitia ujian di lokasi ujian menerima SK Panitia Ujian? (PJTU, PJLU, Pengawas Keliling, Pengawas Ruang, Tenaga administrasi)</p>
                        <p>{{$p->select10}}</p>
                        <p>Bila Tidak, maka tindakan yang dilakukan</p>
                        <p>{{ $p->pesan3 }}</p>
                        <p>2. Apakah jumlah panitia memenuhi persyaratan?*</p>
                        <p>{{$p->select11}}</p>
                        <p>Bila Tidak, maka tindakan yang dilakukan</p>
                        <p>{{ $p->pesan4 }}</p>
                        <p>3. Apakah panitia direkrut sesuai dengan persyaratan?*</p>
                        <p>{{ $p->select12 }}</p>
                        <p>4. Apakah pelaksanaan ujian melibatkan aparat keamanan?*</p>
                        <p>{{ $p->select13 }}</p>
                        <p style="font-size: 14">C. Pelaksanaan Ujian</p>
                        <p>1. Apakah sarana-prasarana sesuai dengan persyaratan?*</p>
                        <p>{{ $p->select14 }}</p>
                        <p>Bila Tidak, maka tindakan yang dilakukan</p>
                        <p>{{ $p->pesan5 }}</p>
                        <p>2. Apakah Denah Lokasi Ujian, Tata Tertib, Nomor Ruang, dan Daftar Peserta Ujian ditempel sesuai ketentuan?*</p>
                        <p>{{ $p->select15 }}</p>
                        <p>Bila Tidak, maka tindakan yang dilakukan</p>
                        <p>{{ $p->pesan6 }}</p>
                        <p>3. Apakah jumlah peserta ujian di ruang sesuai dengan persyaratan?*</p>
                        <p>{{ $p->select16 }}</p>
                        <p>Bila Tidak, maka tindakan yang dilakukan</p>
                        <p>{{ $p->pesan7 }}</p>
                        <p>4. Apakah terdapat lokasi ujian yang menggunakan aula atau GOR? Jika ya, lanjutkan ke pertanyaan 5. Jika tidak lanjutkan ke pertanyaan 6*</p>
                        <p>{{ $p->select17 }}</p>
                        <p>5. Apakah penataan peserta ujian di aula/GOR diatur sesuai dengan ketentuan? *</p>
                        <p>{{ $p->select18 }}</p>
                        <p>Bila Tidak, maka tindakan yang dilakukan</p>
                        <p>{{ $p->pesan8 }}</p>
                        <p>6. Apakah tersedia ruang khusus (kasus)?*</p>
                        <p>{{ $p->select19 }}</p>
                        <p>Komentar: </p>
                        <p>{{ $p->pesan9 }}</p>
                        <p>7. Apakah tersedia ruang ujian dan sarana untuk ujian listening/speaking/berbicara?*</p>
                        <p>{{ $p->select20 }}</p>
                        <p>Komentar: </p>
                        <p>{{ $p->pesan10 }}</p>
                        <p>8. Apakah pelaksanaan ujian listening/speaking/berbicara sesuai dengan ketentuan?*</p>
                        <p>{{ $p->select21 }}</p>
                        <p>Bila Tidak, maka tindakan yang dilakukan</p>
                        <p>{{ $p->pesan11 }}</p>
                        <p>9. Apakah tata tertib ujian dibacakan oleh pengawas ruang setiap jam ujian?*</p>
                        <p>{{ $p->select22 }}</p>
                        <p>Bila Tidak, maka tindakan yang dilakukan</p>
                        <p>{{ $p->pesan12 }}</p>
                        <p>10. Apakah ditemukan pelanggaran tata tertib oleh peserta ujian?*</p>
                        <p>{{ $p->select23 }}</p>
                        <p>Bila iya, tuliskan jenis pelanggaran yang ditemukan (informasi lengkap pelanggaran mencakup nama, NIM, ruang ujian, lokasi ujian, kode dan nama matakuliah serta foto dikirimkan ke timbul@ecampus.ut.ac.id menggunakan format lampiran yang ada di panduan pedoman UAS)</p>
                        <p>{{ $p->pesan13 }}</p>
                        <p>Tindakan yang dilakukan :</p>
                        <p>{{ $p->pesan14 }}</p>
                        <p>11. Apakah Pengawas Ruang melaksanakan tugas sesuai dengan fungsinya?*</p>
                        <p>{{ $p->select24 }}</p>
                        <p>Bila tidak, tuliskan secara detail nama pengawas, jam ujian, nomor ruang, lokasi ujian</p>
                        <p>{{ $p->pesan15 }}</p>
                        <p>Tindakan yang dilakukan :</p>
                        <p>{{ $p->pesan16 }}</p>
                        <p>12. Apakah Pengawas Keliling melaksanakan tugas sesuai dengan fungsinya?*</p>
                        <p>{{ $p->select25 }}</p>
                        <p>Bila tidak, tuliskan secara detail nama pengawas keliling, lokasi ujian</p>
                        <p>{{ $p->pesan17 }}</p>
                        <p>Tindakan yang dilakukan :</p>
                        <p>{{ $p->pesan18 }}</p>
                        <p>13. Apakah permintaan naskah ujian tambahan dan penggandaan naskah ujian sesuai dengan ketentuan?*</p>
                        <p>{{ $p->select26 }}</p>
                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                        <p>{{ $p->pesan19 }}</p>
                        <p style="font-size: 14">D. Pascapelaksanaan Ujian </p>
                        <p>1. Apakah hasil ujian ditata sesuai dengan ketentuan?*</p>
                        <p>{{ $p->select27 }}</p>
                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                        <p>{{ $p->pesan20 }}</p>
                        <p>2. Apakah hasil ujian dijaga keamanannya dengan baik?*</p>
                        <p>{{ $p->select28 }}</p>
                        <p>3. Apakah pengiriman hasil ujian dilakukan sesuai ketentuan?*</p>
                        <p>{{ $p->select29 }}</p>
                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                        <p>{{ $p->pesan21 }}</p>
                        <p>4. Apakah naskah ujian di musnahkan pada jam terakhir? *</p>
                        <p>{{ $p->select30 }}</p>
                        <p>5. Apakah semua naskah ujian dimusnahkan setiap hari ujian?*</p>
                        <p>{{ $p->select31 }}</p>
                        <p>Bila tidak, maka tindakan yang dilakukan :</p>
                        <p>{{ $p->pesan22 }}</p>
                        <p style="font-size: 16;">II. Rekap Laporan Pelaksanaan UAS dan TAP Program Non Pendas </p>
                        <p style="font-size: 14">A. Bahan Pendukung Ujian </p>
                        <p>Temuan :</p>
                        <p>{{ $p->pesan23 }}</p>
                        <p>Tindakan yang dilakukan di Lapangan :</p>
                        <p>{{ $p->pesan24 }}</p>
                        <p>Saran :</p>
                        <p>{{ $p->pesan25 }}</p>
                        <p style="font-size: 14">B. Naskah Ujian</p>
                        <p>Temuan :</p>
                        <p>{{ $p->pesan26 }}</p>
                        <p>Tindakan yang dilakukan di Lapangan :</p>
                        <p>{{ $p->pesan27 }}</p>
                        <p>Saran :</p>
                        <p>{{ $p->pesan28 }}</p>
                        <p style="font-size: 14">C. Kepanitiaan</p>
                        <p>Temuan :</p>
                        <p>{{ $p->pesan29 }}</p>
                        <p>Tindakan yang dilakukan di Lapangan :</p>
                        <p>{{ $p->pesan30 }}</p>
                        <p>Saran :</p>
                        <p>{{ $p->pesan31 }}</p>
                        <p style="font-size: 14">D. Pelaksanaan Ujian</p>
                        <p>Temuan :</p>
                        <p>{{ $p->pesan32 }}</p>
                        <p>Tindakan yang dilakukan di Lapangan :</p>
                        <p>{{ $p->pesan33 }}</p>
                        <p>Saran :</p>
                        <p>{{ $p->pesan34 }}</p>
                        <p style="font-size: 14">E. Pascakegiatan Ujian</p>
                        <p>Temuan :</p>
                        <p>{{ $p->pesan35 }}</p>
                        <p>Tindakan yang dilakukan di Lapangan :</p>
                        <p>{{ $p->pesan36 }}</p>
                        <p>Saran :</p>
                        <p>{{ $p->pesan37 }}</p>
                        <p style="font-size: 14">F. Sarana dan Prasarana Pendukung</p>
                        <p>Temuan :</p>
                        <p>{{ $p->pesan38 }}</p>
                        <p>Tindakan yang dilakukan di Lapangan :</p>
                        <p>{{ $p->pesan39 }}</p>
                        <p>Saran :</p>
                        <p>{{ $p->pesan40 }}</p>
                    </div>


                </div>
    </div>



    @endforeach




    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>


</html>