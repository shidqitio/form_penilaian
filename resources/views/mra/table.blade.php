<table>
    <thead>
        <tr>
            <th>No</th>  
            <th>Nama MRA</th>    
            <th>UPBJJ</th>
            <th>Masa Ujian</th>
            <th>1. Tingkat kesulitan dalam mencetak dan menata KTPU, Daftar Hadir, dan Daftar Peserta Ujian</>
            <th>2. Tingkat kesulitan dalam menyiapkan bahan pendukung ujian dan peralatan per lokasi ujian [a.LJU/BJU]</th>
            <th>2. Tingkat kesulitan dalam menyiapkan bahan pendukung ujian dan peralatan per lokasi ujian [b.Tape recorder ujian listening]</th>
            <th>2. Tingkat kesulitan dalam menyiapkan bahan pendukung ujian dan peralatan per lokasi ujian [c.Penguji untuk ujian lisan]</th>
            <th>2. Tingkat kesulitan dalam menyiapkan bahan pendukung ujian dan peralatan per lokasi ujian [d.Daftar hadir]</th>
            <th>2. Tingkat kesulitan dalam menyiapkan bahan pendukung ujian dan peralatan per lokasi ujian [e.Berita acara]</th>
            <th>2. Tingkat kesulitan dalam menyiapkan bahan pendukung ujian dan peralatan per lokasi ujian [f.Denah]</th>
            <th>2. Tingkat kesulitan dalam menyiapkan bahan pendukung ujian dan peralatan per lokasi ujian [g.Tata tertib]</th>
            <th>2. Tingkat kesulitan dalam menyiapkan bahan pendukung ujian dan peralatan per lokasi ujian [h.Pernyataan anti nyontek]</th>
            <th>2. Tingkat kesulitan dalam menyiapkan bahan pendukung ujian dan peralatan per lokasi ujian [i.Amplop]</th>
            <th>2. Tingkat kesulitan dalam menyiapkan bahan pendukung ujian dan peralatan per lokasi ujian [j.Karung]</th>
            <th>2. Tingkat kesulitan dalam menyiapkan bahan pendukung ujian dan peralatan per lokasi ujian [k.Box]</th>
            <th>3. Tingkat kesulitan dalam menentukan lokasi ujian [a. Lokasi]</th>
            <th>3. Tingkat kesulitan dalam menentukan lokasi ujian [b. Jumlah ruang]</th>
            <th>3. Tingkat kesulitan dalam menentukan lokasi ujian [c. Pengawas]</th>
            <th>4. Tingkat kesulitan dalam menentukan [a. Panitia ujian]</th>
            <th>4. Tingkat kesulitan dalam menentukan [b. Penyamaan persepsi pelaksanaan ujian]</th>
            <th>5. Tingkat kesulitan distribusi bahan ujian ke lokasi dengan menggunakan sarana transportasi umum</th>
            <th>6. Tingkat kesulitan dalam penataan naskah per lokasi ujian terkait dengan validitas data registrasi</th>
            <th>7. Tingkat kesulitan dalam pengiriman berkas hasil ujian mencakup : [a. LJU ke UT Pusat] </th>
            <th>7. Tingkat kesulitan dalam pengiriman berkas hasil ujian mencakup : [b. BJU ke UPBJJ sentra] </th>
        </tr>
    </thead>
    @foreach ($upbjj as $upbjj) 
@php 
$no = 1 ;
@endphp
<tr> 
    <td>@php echo $no++ @endphp</td>
    <td>{{$upbjj -> nama }}</td>
    <td>{{$upbjj -> upbjj }}</td>
    <td>{{$upbjj -> masa_ujian}}</td>
    <td>{{$upbjj -> select1 }}</td>
    <td>{{$upbjj -> select2 }}</td>
    <td>{{$upbjj -> select3 }}</td>
    <td>{{$upbjj -> select4 }}</td>
    <td>{{$upbjj -> select5 }}</td>
    <td>{{$upbjj -> select6 }}</td>
    <td>{{$upbjj -> select7 }}</td>
    <td>{{$upbjj -> select8 }}</td>
    <td>{{$upbjj -> select9 }}</td>
    <td>{{$upbjj -> select10 }}</td>
    <td>{{$upbjj -> select11 }}</td>
    <td>{{$upbjj -> select12 }}</td>
    <td>{{$upbjj -> select13 }}</td>
    <td>{{$upbjj -> select14 }}</td>
    <td>{{$upbjj -> select15 }}</td>
    <td>{{$upbjj -> select16 }}</td>
    <td>{{$upbjj -> select17 }}</td>
    <td>{{$upbjj -> select18 }}</td>
    <td>{{$upbjj -> select19 }}</td>
    <td>{{$upbjj -> select20 }}</td>
</tr>
@endforeach
</table>