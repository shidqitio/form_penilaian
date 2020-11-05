@extends('layouts.master_admin2')
@section('title', 'Form Instrumen UAS')
@section('content')

<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahmasa" style="margin-left:10px">
            Tambah Masa
          </button>

        </div>
      </div>
    </div>




    <div class="row">
      <div class="col-lg-8">
        <div class="main-card mb-3 card">
          <div class="card-body">
            <h5 class="card-title">Masa Ujian</h5>
            <div class="scroll-area-lg">
              <div class="scrollbar-container ps--active-y">
                <table class="mb-0 table table-striped table table-responsive">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Masa Ujian</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1 ;
                    @endphp
                    @foreach($masa as $masa)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$masa->tahun_masa}}</td>
                      <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus_{{$masa->kd_masa}}">
                          Hapus
                        </button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  @endsection