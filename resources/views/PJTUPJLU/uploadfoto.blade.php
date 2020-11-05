@extends('template.template')

@section('title',' UPLOAD FOTO FORMAT LAPORAN PETUGAS PJTU/PJLU 
        <P>DARI UNIVERSITAS TERBUKA PUSAT</P>')

@section('css')
<style type="text/css">
    body {
        background: url(../images/pemantau-bg.png) no-repeat fixed center top;
        background-size:cover;
        background-attachment: fixed;
    }
    </style>  
@endsection

@section('content')

    <body>
    <h1 class="header-w3ls">
        UPLOAD FOTO FORMAT LAPORAN PETUGAS PJTU/PJLU 
        <P>DARI UNIVERSITAS TERBUKA PUSAT</P>
    </h1>
    <!-- multistep form -->
    <div class="main-bothside">

    <form method="post" enctype="multipart/form-data" action="PJTUPJLU.uploadfoto">  
        {{ csrf_field() }} 
        <div class="form-group" >
            <label for="fotopersiapanuas">1. Foto Persiapan UAS<span>*</span></label>
            <input type="file" name="fotopersiapanuas" class="form-control-file" id="fotopersiapanuas" required>
        </div>
        <br>
        <br>
        <div class="form-group" >
            <label for="fotopelaksanaanuas">2. Foto Pelaksanaan UAS<span>*</span></label>
            <input type="file" name="fotopelaksanaanuas" class="form-control-file" id="fotopelaksanaanuas" required>
        </div>
        <br>
        <br>
        <div class="form-group" >
            <label for="fotolokasiuas">3. Foto Lokasi UAS<span>*</span></label>
            <input type="file" name="fotolokasiuas" class="form-control-file" id="fotolokasiuas" required>
        </div>
        <br>
        <br> 
        <div class="col-auto">
            <button type="submit" class="button">Submit</button>
            </div>
            <br>
        </form> 
    </form>
</form>
										
    <!-- <div class="personal-info-sub">
        Foto Kegiatan UAS
    </div> -->

    <!-- <label class="rating">1. Foto Persiapan UAS<span>*</span> </label>
    <br>
    <br>
    <label class="input append-small-btn">
        <form method="post" enctype="multipart/form-data" action="PJTUPJLU.uploadfoto">
        {{ csrf_field() }}     
        <input type="file" name="fotopersiapanuas">    
        <input type="submit" value="Upload">
    </form>
    </label>

    <br>
    <br>
    <br>

    <label class="rating">2. Foto Pelaksanaan UAS <span>*</span> </label>
    <br>
    <br>

    <label class="input append-small-btn">
        <form method="post" enctype="multipart/form-data" action="PJTUPJLU.uploadfoto">   
        {{ csrf_field() }}    
        <input type="file" name="fotopelaksanaanuas">    
        <input type="submit" value="Upload">
    </form>
    </label>

    <br>
    <br>
    <br>

    <label class="rating">3. Foto Lokasi UAS<span>*</span> </label>

    <label class="input append-small-btn">
        <form method="post" enctype="multipart/form-data" action="PJTUPJLU.uploadfoto">    
        {{ csrf_field() }}   
        <input type="file" name="fotolokasiuas">    
        <input type="submit" value="Upload">
        </form>
        <br>
    <br>
    <a href="index.php" class="button">FORM INSTRUMEN</a>		   -->
        <p>*Form instrumen yang sudah di kirim tidak dapat di edit kembali</p>
        <p>*Ukuran file foto maksimal 10mb</p>
    </label>

    <br>
    <br>
    <br>
                                            
      </div>
      <div class="copy">
         <p>©2019 <a href="http://lppmp.ut.ac.id" target="_blank">LPPMP</a></p>
      </div>
   </body>

@endsection