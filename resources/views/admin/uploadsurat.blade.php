@extends('layouts.master_admin8')
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

    <a href="{{route('addsurattugasadmin')}}" class="btn btn-primary">
      Upload Surat Tugas
    </a>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UAS">
      Upload Panduan UAS
    </button>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Panduan">
      Upload Panduan Pemantauan
    </button>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Aplikasi">
      Upload Panduan Manual Aplikasi
    </button>
  </div>


  @endsection