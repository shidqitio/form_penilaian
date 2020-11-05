@extends('layouts.master_admin9')
@section('title', 'Form Instrumen UAS')
@section('content')

<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">
        </div>
      </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahtugas" style="margin-left:10px">
      Tambah Surat Tugas
    </button>

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Surat Tugas</th>
          <th scope="col">Masa Ujian</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @php
        $no = 1 ;
        @endphp
        @foreach($tugas as $tugas)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$tugas->lampiran}}</td>
          <td>{{$tugas->masa_ujian}}</td>
          <td>
            <button class="btn btn-secondary" data-toggle="modal" data-target="#edit_{{$tugas->id}}">Edit</button>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy_{{$tugas->id}}">
              Hapus
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>


  </div>

  @endsection