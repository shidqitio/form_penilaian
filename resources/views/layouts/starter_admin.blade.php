@extends('layouts.master_admin')
@section('title', 'Form Instrumen UAS')
@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Selamat Datang di Halaman Admin
                        <div class="page-title-subheading">Ini adalah halaman depan untuk pengguna / user
                            yang login atau masuk sebagai admin
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
            Input Data User
        </button>

        <a href="{{ route ('createuser') }}" class=" btn btn-primary mr-5">
            Input Manual Data User
        </a>
        <br>
        <br>

        <div class="row">
            <div class="col-lg-8">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Data User</h5>
                        <div class="scroll-area-lg">
                            <div class="scrollbar-container ps--active-y">
                                <table class="mb-0 table table-striped table table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="5">No</th>
                                            <th>Member Name</th>
                                            <th>NIP</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1 ;
                                        @endphp
                                        @foreach ($users as $i)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $i->name }}</td>
                                            <td>{{ $i->nip }}</td>
                                            <td>{{ $i->email }}</td>
                                            <td>{{ $i->role_name }}</td>
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
</div>
</div>
</div>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
@endsection