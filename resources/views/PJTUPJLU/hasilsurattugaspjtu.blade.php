@extends('pjtufront.master_pjtu2')
@section('title', 'Form Instrumen UAS')
@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">

                    <form class="form-inline" method="get" action="/pjtu/searchsurattugas">
                        {{ csrf_field() }}
                        <select class="form-control" name="search">
                            <option value="{{$search}}"> {{$search}} </option>
                            @foreach($masa as $masa)
                            <option value="{{$masa->tahun_masa}}">{{$masa->tahun_masa}} </option>
                            @endforeach
                        </select>
                        <br />
                        <button type="submit" class="btn btn-secondary" name="tampil">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            @if(count($result))
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <table class="mb-0 table table-bordered">
                            <thead>
                                <tr>
                                    <th width="5">No</th>
                                    <th>Masa Ujian</th>
                                    <th>Surat Tugas</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1 ;
                                @endphp
                                @foreach ($result as $i)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $i->masa_ujian }}</td>
                                    <td>{{ $i->lampiran }}</td>
                                    <td>

                                        <a href="/download/surattugas/{{ $i->id }}" class="btn btn-success">Download</a>

                                    </td>
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