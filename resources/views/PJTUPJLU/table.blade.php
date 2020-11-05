<table>
    <thead>
        <tr>
            <th>No</th>  
            <th>Nama Petugas</th>
            <th>Email</th>
            <th>Tempat Ujian</th>
            <th>Lokasi Ujian</th>
            <th>UPBJJ</th>
            <th>Masa Ujian</th>
            <th>Tanggal Ujian</th>
            <th>1. Kemudahan berkoordinasi dengan Ko. Registrasi dan Ujian</th>
            <th>2. Kecukupan informasi terkait pelaksanaan UAS</th>
            <th>3. Ketersediaan bahan pendukung UAS</th>
            <th>4. Ketersediaan naskah ujian</th>
            <th>5. Kelayakan sarana dan prasarana</th>
            <th>6. Keamanan naskah ujian</th>
            <th>1. Kuantitas panitia setempat</th>
            <th>2. Kualitas panitia setempat</th>
            <th>3. Keamanan lokasi ujian</th>
            <th>4. Ketertiban dalam pelaksanaan</th>
            <th>1. Kemudahan dalam pelaksanaan UAS</th>
            <th>2. Kemudahan dalam memusnahkan naskah UAS</th>
        </tr>
    </thead>
    @foreach ($pjtu as $pjtu) 
@php 
$no = 1 ;
@endphp
<tr> 
    <td>@php echo $no++ @endphp</td>
    <td>{{$pjtu -> nama }}</td>
    <td>{{$pjtu -> email }}</td>
    <td>{{$pjtu -> tempat_ujian }}</td>
    <td>{{$pjtu -> lokasi_ujian }}</td>
    <td>{{$pjtu -> upbjj }}</td>
    <td>{{$pjtu -> masa_ujian }}</td>
    <td>{{$pjtu -> tanggal_ujian }}</td>
    <td>{{$pjtu -> select1 }}</td>
    <td>{{$pjtu -> select2 }}</td>
    <td>{{$pjtu -> select3 }}</td>
    <td>{{$pjtu -> select4 }}</td>
    <td>{{$pjtu -> select5 }}</td>
    <td>{{$pjtu -> select6 }}</td>
    <td>{{$pjtu -> select7 }}</td>
    <td>{{$pjtu -> select8 }}</td>
    <td>{{$pjtu -> select9 }}</td>
    <td>{{$pjtu -> select10 }}</td>
    <td>{{$pjtu -> select11 }}</td>
    <td>{{$pjtu -> select12 }}</td>
</tr>
@endforeach
</table>