@extends('unitfront.master_unit2')
@section('title', 'Form Instrumen UAS')
@section('content')

<div class="app-main__outer">
  <div class="app-main__inner">
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">
          <form class="form-inline" method="get" action="/unit/searchpemantau">
            {{ csrf_field() }}
            <select class="form-control" name="search">
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
  </div>


  @endsection