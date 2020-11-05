<table>
    <thead>
        <tr>
            <th>No</th>  
            <th>Nama Petugas</th>    
            <th>Tempat Ujian</th>
            <th>Lokasi Ujian</th>
            <th>Bertugas Sebagai
            <th>UPBJJ</th>
            <th>Masa Ujian</th>
            <th>Tanggal Awal Observasi</th>
            <th>Tanggal Akhir Observasi</th>
            <th>1. Lokasi Pemantauan :</th>
            <th>1. Aspek :</th>
            <th>1. Praktik Baik :</th>
            <th>1. Temuan :</th>
            <th>1. Saran :</th>
            <th>2. Lokasi Pemantauan :</th>
            <th>2. Aspek :</th>
            <th>2. Praktik Baik :</th>
            <th>2. Temuan :</th>
            <th>2. Saran :</th>
            <th>3. Lokasi Pemantauan :</th>
            <th>3. Aspek :</th>
            <th>3. Praktik Baik :</th>
            <th>3. Temuan :</th>
            <th>3. Saran :</th>
        </tr>
    </thead>
    @foreach ($feedback as $feedback) 
@php 
$no = 1 ;
@endphp
<tr> 
    <td>@php echo $no++ @endphp</td>
    <td>{{$feedback -> nama }}</td>
    <td>{{$feedback -> tempat_ujian }}</td>
    <td>{{$feedback -> lokasi_ujian }}</td>
    <td>{{$feedback -> bertugas_sebagai }}</td>
    <td>{{$feedback -> upbjj }}</td>
    <td>{{$feedback -> masa_ujian }}</td>
    <td>{{$feedback -> tanggal_mulai_observasi }}</td>
    <td>{{$feedback -> tanggal_akhir_observasi }}</td>
    <td>{{$feedback -> lokasi1 }}</td>
    <td>{{$feedback -> aspek1 }}</td>
    <td>{{$feedback -> praktikbaik1 }}</td>
    <td>{{$feedback -> temuan1 }}</td>
    <td>{{$feedback -> saran1 }}</td>
    <td>{{$feedback -> lokasi2 }}</td>
    <td>{{$feedback -> aspek2 }}</td>
    <td>{{$feedback -> praktikbaik2 }}</td>
    <td>{{$feedback -> temuan2 }}</td>
    <td>{{$feedback -> saran2 }}</td>
    <td>{{$feedback -> lokasi3 }}</td>
    <td>{{$feedback -> aspek3 }}</td>
    <td>{{$feedback -> praktikbaik3 }}</td>
    <td>{{$feedback -> temuan3 }}</td>
    <td>{{$feedback -> saran3 }}</td>
</tr>
@endforeach
</table>