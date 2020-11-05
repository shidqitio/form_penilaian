@extends('layouts.master_admin10')
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

        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Register</div>
                            </br>
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="{{ route('user') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                                        <label for="nip" class="col-md-4 control-label">NIP</label>

                                        <div class="col-md-6">
                                            <input id="nip" type="text" class="form-control" name="nip" value="{{ old('nip') }}" required>

                                            @if ($errors->has('nip'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nip') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="Roles" class="col-md-4 control-label">Roles</label>

                                        <div class="col-md-6">
                                            <select class="form-control" name="role_id" id="admin">
                                                <option value="1">--Pilih Role--</option>
                                                <option value="2">Pemantau</option>
                                                <option value="3">Upbjj</option>
                                                <option value="4">Pjtu</option>
                                                <option value="5">AdminUpbjj</option>
                                                <option value="6">Unit</option>
                                            </select>
                                            <br>
                                            <ul>

                                                <select class="form-control" name="id_upbjj" id="upbjj">
                                                    @foreach($wilayah as $wil)
                                                    <option value="0"> </option>
                                                    <option value="{{$wil->id_upbjj}}">{{$wil->upbjj}} </option>
                                                    @endforeach
                                                </select>

                                            </ul>
                                        </div>
                                    </div>


                                    <!--  <input id="" type="text" class="form-control" name="id_upbjj" value="0" hidden> -->


                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

        })
    </script>

    <script>
        $(document).ready(function() {
            $("#admin").change(function() {
                var val = $(this).val();
                if (val == "3") {

                } else if (val == "2") {
                    $("#upbjj").html("<option value=''>--select one--</option>").attr("disabled", "disabled");
                } else if (val == "4") {
                    $("#upbjj").html("<option value=''>--select one--</option>").attr("disabled", "disabled");
                } else if (val == "5") {
                    $("#upbjj").html("<option value=''>--select one--</option>").attr("disabled", "disabled");
                } else if (val == "6") {
                    $("#upbjj").html("<option value=''>--select one--</option>").attr("disabled", "disabled");
                } else if (val == "1") {
                    $("#upbjj").html("<option value=''>--select one--</option>");
                }
            });
        });
    </script>

    @endsection