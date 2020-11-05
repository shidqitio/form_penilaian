@extends('unitfront.master_unit6')
@section('title', 'Form Instrumen UAS')
@section('content')

<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">
          <form class="form-inline" method="get" action="/unit/searchevaluasi">
            {{ csrf_field() }}
            <select class="form-control" name="search" style="width: 30%;">
              <option value="{{$search}}"> {{$search}} </option>
              @foreach($masa as $masa)
              <option value=" {{$masa->tahun_masa}}">{{$masa->tahun_masa}} </option>
              @endforeach
            </select>

            <button type="submit" class="btn btn-secondary mr-5" name="tampil">Search</button>
            <br>
            <br>
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="submit" class="btn btn-success  mr-5" name="ExportExcel"> Cetak Laporan </button>
              <button type="submit" class="btn btn-info" name="Chart"> Halaman Chart </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="row">
      @if(count($result))
      <div class="col-lg-12">
        <div class="main-card mb-3 card">
          <div class="card-body">
            <table class="mb-0 table table-bordered table-responsive">
              <thead>
                <tr>
                  <th width="5">No</th>
                  <th>Nama</th>
                  <th>Tempat Ujian</th>
                  <th>Tugas</th>
                  <th>UPBJJ</th>
                  <th>Masa Ujian</th>
                  <th>Tanggal Ujian</th>
                </tr>
              </thead>
              <tbody>
                @php
                $no = 1 ;
                @endphp
                @foreach ($result as $i)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $i->nama }}</td>
                  <td>{{ $i->tempat_ujian }}</td>
                  <td>{{ $i->tugas }}</td>
                  <td>{{ $i->upbjj }}</td>
                  <td>{{ $i->masa_ujian }}</td>
                  <td>{{ $i->tanggal_ujian }}</td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{ $result->render() }}
        </div>
      </div>
      @else
      <h1>Data Tidak Ditemukan</h1>
      @endif
    </div>

  </div>


  @endsection