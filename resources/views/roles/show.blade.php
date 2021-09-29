@extends('layouts.master')
@section('css')
  @section('title')
  show permission
  @stop
@endsection
@section('content')
@include('partial.error')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">show permission </h4>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">show permission </li>
            </ol>
            </div>
        </div>
    </div>
    <div class="card card-statistics mb-30">
        <div class="card-body">
            <a class="btn btn-primary " style="margin: 10px;" href="{{ route('roles.index') }}">رجوع</a>
            <div class="row">
                <div class="col-lg-4">
                    <h2>{{ $role->name }}</h2>
                    <ul>
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                                <li class="badge badge-info " style="padding: 10px; font-size: 100%;">{{ $v->name }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <!-- /col -->
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection
