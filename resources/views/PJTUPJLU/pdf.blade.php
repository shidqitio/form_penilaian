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
        @foreach($pjtu as $pj)
        <p style="text-align: center; font-size:24px;">FORMAT LAPORAN PETUGAS PJTU/PJLU
            DARI UNIVERSITAS TERBUKA PUSAT
            (DI ISI OLEH PETUGAS PJTU & PENDAMPING PJTU)

            MASA UJIAN {{ $pj->masa_ujian }}
            UPBJJ-UT {{$pj->upbjj }} </p>
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
        <p style="text-align: center; font-size:16px;">{{ $pj->nama }}</p>
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
                    FORMAT LAPORAN PETUGAS PJTU/PJLU DARI UNIVERSITAS TERBUKA PUSAT (DI ISI OLEH PETUGAS PJTU & PENDAMPING PJTU)
                </h3>
                <br />



                <div class="form-group" style="margin-left: 60px;">
                    <div class="form-mid-w3ls">
                        <p>Nama Petugas : </p>
                        <p>{{ $pj->nama }}</p>
                    </div>

                    <div class="form-mid-w3ls">
                        <p>Tempat ujian</p>
                        <p>{{ $pj->tempat_ujian}}</p>
                    </div>
                    <div class="form-mid-w3ls">
                        <p>Lokasi Ujian</p>
                        <p>{{ $pj->lokasi_ujian }}</p>
                        <p>UPBJJ :</p>
                        <p>{{ $pj->upbjj}}</p>
                        <p>Masa Ujian</p>
                        <p>{{ $pj->masa_ujian }}</p>
                        <p>Tanggal Ujian</p>
                        <p>{{ $pj->tanggal_ujian}}</p>
                        <p style="font-size: 14;">A. Persiapan </p>
                        <p>1. Kemudahan berkoordinasi dengan Ko. Registrasi dan Ujian</p>
                        <p>{{ $pj->select1 }}</p>
                        <p>2. Kecukupan informasi terkait pelaksanaan UAS </p>
                        <p>{{ $pj->select2 }}</p>
                        <p>3. Ketersediaan bahan pendukung UAS </p>
                        <p>{{ $pj->select3 }}</p>
                        <p>4. Ketersediaan naskah ujian </p>
                        <p>{{ $pj->select4 }}</p>
                        <p>5. Kelayakan sarana dan prasarana </p>
                        <p>{{ $pj->select5 }}</p>
                        <p>6. Keamanan naskah ujian</p>
                        <p>{{ $pj->select6 }}</p>
                        <p style="font-size: 14">B. Kepanitian</p>
                        <p>1. Kuantitas panitia setempat</p>
                        <p>{{$pj->select7}}</p>
                        <p>2. Kualitas panitia setempat</p>
                        <p>{{$pj->select8}}</p>
                        <p>3. Keamanan lokasi ujian</p>
                        <p>{{ $pj->select9 }}</p>
                        <p>4. Ketertiban dalam pelaksanaan</p>
                        <p>{{ $pj->select10 }}</p>
                        <p style="font-size: 14">C. Kemudahan Pelaksanaan</p>
                        <p>1. Kemudahan dalam pelaksanaan UAS</p>
                        <p>{{ $pj->select11 }}</p>
                        <p>2. Kemudahan dalam memusnahkan naskah UAS</p>
                        <p>{{ $pj->select12 }}</p>
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