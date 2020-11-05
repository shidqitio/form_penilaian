<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
@foreach($feedback as $f)
<p style="text-align: center; font-size:24px;">LAPORAN PEMANTAUAN UAS
PROGRAM NON PENDAS DAN PPS
SEMESTER 2020/20.2 (2020.1)

UPBJJ-UT {{$f->upbjj }} </p> 
<br/>
<p style="text-align: center; font-size:16px;">Bertugas Sebagai {{ $f->bertugas_sebagai }}</p>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<!-- <img src = "logout"> -->
<p style="text-align: center; font-size:16px;">{{ $f->nama }}</p>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>





<p style="text-align: center; font-size:24px;">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN

UNIVERSITAS TERBUKA 
<?php   
$now = \Carbon\Carbon::now(); 
?>
TAHUN {{ $now->year }} <p>

{{ csrf_field() }}
<div class="page-break"></div>
<h3 class="header-w3ls">
LAPORAN PEMANTAUAN UAS PROGRAM NON PENDAS DAN PPS SEMESTER 2020/20.2 (2020.1)
 </h3>
 <br/>



 <div class="form-group" style="margin-left: 60px;">
                <div class="form-mid-w3ls">
                    <p>Nama Petugas : </p>
                    <p>{{ $f->nama }}</p>
                </div>
            
                <div class="form-mid-w3ls">
                    <p>Tempat ujian</p>
                    <p>{{ $f->tempat_ujian}}</p>
                
                    <p>Lokasi ujian</p>
                    <p>{{ $f->lokasi_ujian}}</p>
                </div>

                <div class="form-mid-w3ls">
                    <p>Bertugas Sebagai :</p>
                    <p>{{ $f->bertugas_sebagai}}</p>
                    <p>UPBJJ :</p>
                    <p>{{ $f->upbjj}}</p>
                    <p>Masa Ujian :</p>
                    <p>{{ $f->masa_ujian}}</p>
                    <p>Tanggal Awal Observasi :</p>
                    <p>{{ $f->tanggal_mulai_observasi}}</p>
                    <p>Tanggal Akhir Observasi :</p>
                    <p>{{ $f->tanggal_akhir_observasi}}</p>
                    <br>
                    <p style="font-size: 14">Lokasi 1 </p>
                    <p>1. Lokasi Pemantauan :</p>
                    <p>{{ $f->lokasi1 }}</p>
                    <p>2. Aspek :</p>
                    <p>{{ $f->aspek1 }}</p>
                    <p>3. Praktik Baik :</p>
                    <p>{{ $f->praktikbaik1 }}</p>
                    <p>4. Temuan :</p>
                    <p>{{ $f->temuan1 }}</p>
                    <p>5. Saran :</p>
                    <p>{{ $f->saran1 }}</p>
                    <br>
                    <p style="font-size: 14">Lokasi 2 </p>
                    <p>1. Lokasi Pemantauan :</p>
                    <p>{{ $f->lokasi2 }}</p>
                    <p>2. Aspek :</p>
                    <p>{{ $f->aspek2 }}</p>
                    <p>3. Praktik Baik :</p>
                    <p>{{ $f->praktikbaik2 }}</p>
                    <p>4. Temuan :</p>
                    <p>{{ $f->temuan2 }}</p>
                    <p>5. Saran :</p>
                    <p>{{ $f->saran2 }}</p>
                    <p style="font-size: 14">Lokasi 3 </p>
                    <p>1. Lokasi Pemantauan :</p>
                    <p>{{ $f->lokasi3 }}</p>
                    <p>2. Aspek :</p>
                    <p>{{ $f->aspek3 }}</p>
                    <p>3. Praktik Baik :</p>
                    <p>{{ $f->praktikbaik3 }}</p>
                    <p>4. Temuan :</p>
                    <p>{{ $f->temuan3 }}</p>
                    <p>5. Saran :</p>
                    <p>{{ $f->saran3 }}</p>
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



