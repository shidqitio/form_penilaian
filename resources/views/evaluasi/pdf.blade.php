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
@foreach($evaluasi as $ev)
<p style="text-align: center; font-size:24px;">LEMBAR EVALUASI PEMANTAU/PJTU
/PENDAMPING/PJTU/PJLU PELAKSANAAN UAS 
(DI ISI OLEH UPBJJ)

UPBJJ-UT {{$ev->upbjj }} </p> 
<br/>
<p style="text-align: center; font-size:16px;">Bertugas Sebagai {{ $ev->tugas }}</p>
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
<p style="text-align: center; font-size:16px;">{{ $ev->nama }}</p>
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
LEMBAR EVALUASI PEMANTAU/PJTU/PENDAMPING PJTU/PJLU PELAKSANAAN UAS (DI ISI OLEH UPBJJ)
 </h3>
 <br/>



 <div class="form-group" style="margin-left: 60px;">
                <div class="form-mid-w3ls">
                    <p>Nama Petugas yang dievaluasi : </p>
                    <p>{{ $ev->nama }}</p>
                    <p>Tempat dan lokasi ujian : </p>
                    <p>{{ $ev->tempat_ujian }}</p>
                </div>

                <div class="form-mid-w3ls">
                    <p>Bertugas Sebagai :</p>
                    <p>{{ $ev->tugas }}</p>
                    <p>Masa Ujian :</p>
                    <p>{{ $ev->masa_ujian }}</p>
                    <p>UPBJJ :</p>
                    <p>{{ $ev->upbjj }}</p>
                    <p>Tanggal Ujian :</p>
                    <p>{{ $ev->tanggal_ujian }}</p>
                    <br>
                    <p style="font-size: 14">Petunjuk :
                                            Pilihlah jawaban dengan mengklik kata Ya atau Tidak
                                            sesuai dengan penilaian Bapak/Ibu
                    </p>
                    <p>1. Petugas memberitahu ke Ka. UPBJJ-UT/Manager Registrasi dan Asesmen (MRA) bahwa yang bersangkutan akan bertugas di UPBJJ-UT :</p>
                    <p>{{ $ev->select1 }}</p>
                    <p>2. Petugas meminta perlakuan khusus yang tidak berkaitan dengan pelaksanaan UAS :</p>
                    <p>{{ $ev->select2 }}</p>
                    <p>3. Petugas berkoordinasi dengan petugas lainnya terkait dengan jadwal keberangkatan dan kepulangan :</p>
                    <p>{{ $ev->select3 }}</p>
                    <p>4. Petugas sopan dalam berkomunikasi pada saat melaksanakan tugas :</p>
                    <p>{{ $ev->select4 }}</p>
                    <p>5. Petugas sopan dalam berpakaian pada saat melaksanakan tugas :</p>
                    <p>{{ $ev->select5 }}</p>
                    <p>6. Petugas mengenakan tanda pengenal :</p>
                    <p>{{ $ev->select6 }}</p>
                    <p>7. Pemantau membantu panitia/PJTU/PJLU dalam penyelenggaraan ujian (Hanya di isi untuk mengevaluasi pemantau) :</p>
                    <p>{{ $ev->select7 }}</p>
                    <p>8. Petugas membantu menjaga ketertiban dan ketenangan pelaksanaan ujian :</p>
                    <p>{{ $ev->select8 }}</p>
                    <p>9. Pemantau berkoordinasi dengan MRA/PJTU/PJLU/Pengawas Keliling/Pengawas Ruang dalam menangani pengaduan mahasiswa (Hanya di isi untuk mengevaluasi pemantau) :</p>
                    <p>{{ $ev->select9 }}</p>
                    <p>10. Petugas berkoordinasi dengan MRA/Pengawas Keliling/Pengawas Ruang dalam menangani pengaduan mahasiswa (Hanya di isi untuk mengevaluasi PJTU/pendamping PJTU/PJLU) :</p>
                    <p>{{ $ev->select10 }}</p>
                    <p>11. Petugas memahami dengan baik prosedur penyelenggaraan ujian :</p>
                    <p>{{ $ev->select11 }}</p>
                    <br>
                    <p>12. Petugas berada di lokasi ujian sesuai dengan jadwal UAS :</p>
                    <p>{{ $ev->select12 }}</p>
                    <p>13. Petugas melapor ke Ka. UPBJJ-UT/MRA secara lisan/WA tentang temuannya di lapangan :</p>
                    <p>{{ $ev->select13 }}</p>
                    <br>
                    <p>Komentar umum secara keseluruhan :</p>
                    <p>{{ $ev->pesan1 }}</p>
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



