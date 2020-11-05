<table>
    <thead>
        <tr>
            <th>No</th>  
            <th>Nama Petugas yang dievaluasi</th>    
            <th>Tempat dan Lokasi Ujian</th>
            <th>Bertugas Sebagai</th>
            <th>Masa Ujian</th>
            <th>UPBJJ</th>
            <th>Tanggal Ujian</th>
            <th>1. Petugas memberitahu ke Ka. UPBJJ-UT/Manager Registrasi dan Asesmen (MRA) bahwa yang bersangkutan akan bertugas di UPBJJ-UT :</th>
            <th>2. Petugas meminta perlakuan khusus yang tidak berkaitan dengan pelaksanaan UAS :</th>
            <th>3. Petugas berkoordinasi dengan petugas lainnya terkait dengan jadwal keberangkatan dan kepulangan :</th>
            <th>4. Petugas sopan dalam berkomunikasi pada saat melaksanakan tugas :</th>
            <th>5. Petugas sopan dalam berpakaian pada saat melaksanakan tugas :</th>
            <th>6. Petugas mengenakan tanda pengenal :</th>
            <th>7. Pemantau membantu panitia/PJTU/PJLU dalam penyelenggaraan ujian (Hanya di isi untuk mengevaluasi pemantau) :</th>
            <th>8. Petugas membantu menjaga ketertiban dan ketenangan pelaksanaan ujian :</th>
            <th>9. Pemantau berkoordinasi dengan MRA/PJTU/PJLU/Pengawas Keliling/Pengawas Ruang dalam menangani pengaduan mahasiswa (Hanya di isi untuk mengevaluasi pemantau) :</th>
            <th>10. Petugas berkoordinasi dengan MRA/Pengawas Keliling/Pengawas Ruang dalam menangani pengaduan mahasiswa (Hanya di isi untuk mengevaluasi PJTU/pendamping PJTU/PJLU) :</th>
            <th>11. Petugas memahami dengan baik prosedur penyelenggaraan ujian :</th>
            <th>12. Petugas berada di lokasi ujian sesuai dengan jadwal UAS :</th>
            <th>13. Petugas melapor ke Ka. UPBJJ-UT/MRA secara lisan/WA tentang temuannya di lapangan :</th>
            <th>14. Komentar umum secara keseluruhan :</th>
        </tr>
    </thead>
    @foreach ($evaluasi as $evaluasi) 
@php 
$no = 1 ;
@endphp
<tr> 
    <td>@php echo $no++ @endphp</td>
    <td>{{$evaluasi -> nama }}</td>
    <td>{{$evaluasi -> tempat_ujian }}</td>
    <td>{{$evaluasi -> tugas }}</td>
    <td>{{$evaluasi -> bertugas_sebagai }}</td>
    <td>{{$evaluasi -> masa_ujian }}</td>
    <td>{{$evaluasi -> upbjj }}</td>
    <td>{{$evaluasi -> tanggal_ujian }}</td>
    <td>{{$evaluasi -> select1 }}</td>
    <td>{{$evaluasi -> select2 }}</td>
    <td>{{$evaluasi -> select3 }}</td>
    <td>{{$evaluasi -> select4 }}</td>
    <td>{{$evaluasi -> select5 }}</td>
    <td>{{$evaluasi -> select6 }}</td>
    <td>{{$evaluasi -> select7 }}</td>
    <td>{{$evaluasi -> select8 }}</td>
    <td>{{$evaluasi -> select9 }}</td>
    <td>{{$evaluasi -> select10 }}</td>
    <td>{{$evaluasi -> select11 }}</td>
    <td>{{$evaluasi -> select12 }}</td>
    <td>{{$evaluasi -> select13 }}</td>
    <td>{{$evaluasi -> pesan1 }}</td>
</tr>
@endforeach
</table>