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
@foreach($mra as $m)
<p style="text-align: center; font-size:24px;">INSTRUMEN PERSIAPAN PELAKSANAAN UJIAN
DI UPBJJ-UT (DI ISI OLEH MRA UPBJJ)

UPBJJ-UT {{$m->upbjj }} </p> 
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
<p style="text-align: center; font-size:16px;">{{ $m->nama }}</p>
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
INSTRUMEN PERSIAPAN PELAKSANAAN UJIAN DI UPBJJ-UT (DI ISI OLEH MRA UPBJJ)
 </h3>
 <br/>



 <div class="form-group" style="margin-left: 60px;">
                <div class="form-mid-w3ls">
                    <p>Nama MRA : </p>
                    <p>{{ $m->nama }}</p>
                </div>
            
                <div class="form-mid-w3ls">
                    <p>UPBJJ :</p>
                    <p>{{ $m->upbjj}}</p>
                </div>
                <div class="form-mid-w3ls">
                    <p>1. Tingkat kesulitan dalam mencetak dan menata KTPU, Daftar Hadir, dan Daftar Peserta Ujian</p>
                    <p>{{ $m->select1 }}</p>

                    <p>2. Tingkat kesulitan dalam menyiapkan bahan pendukung ujian dan peralatan per lokasi ujian</p>
                    <p>a. LJU/BJU : </p>
                    <p>{{ $m->select2 }}</p>
                    <p>b. Tape recorder ujian listening : </p>
                    <p>{{ $m->select3 }}</p>
                    <p>c. Penguji untuk ujian lisan : </p>
                    <p>{{ $m->select4 }}</p>
                    <p>d. Daftar hadir : </p>
                    <p>{{ $m->select5 }}</p>
                    <p>d. Berita acara : </p>
                    <p>{{ $m->select6 }}</p>
                    <p>d. Denah : </p>
                    <p>{{ $m->select7 }}</p>
                    <p>d. Tata tertib : </p>
                    <p>{{ $m->select8 }}</p>
                    <p>d. Pernyataan anti nyontek : </p>
                    <p>{{ $m->select9 }}</p>
                    <p>d. Amplop : </p>
                    <p>{{ $m->select10 }}</p>
                    <p>d. Karung : </p>
                    <p>{{ $m->select11 }}</p>
                    <p>d. Box : </p>
                    <p>{{ $m->select12 }}</p>
                    
                    <p>3. Tingkat kesulitan dalam menentukan lokasi ujian </p>
                    <p>a. Lokasi : </p>
                    <p>{{ $m->select13 }}</p>
                    <p>b. Jumlah ruang : </p>
                    <p>{{ $m->select14 }}</p>
                    <p>c. Pengawas : </p>
                    <p>{{ $m->select15 }}</p>

                    <p>4. Tingkat kesulitan dalam menentukan </p>
                    <p>a. Panitia ujian : </p>
                    <p>{{ $m->select16 }}</p>
                    <p>b. Penyamaan persepsi pelaksanaan ujian : </p>
                    <p>{{ $m->select17 }}</p>

                    <p>5. Tingkat kesulitan distribusi bahan ujian ke lokasi dengan menggunakan sarana transportasi umum </p>
                    <p>{{ $m->select18 }}</p>

                    <p>6. Tingkat kesulitan dalam penataan naskah per lokasi ujian terkait dengan validitas data registrasi </p>
                    <p>{{ $m->select19 }}</p>

                    <p>7. Tingkat kesulitan dalam pengiriman berkas hasil ujian mencakup </p>
                    <p>a. LJU ke UT Pusat : </p>
                    <p>{{ $m->select20 }}</p>
                    <p>b. BJU ke UPBJJ sentra : </p>
                    <p>{{ $m->select21 }}</p>
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



