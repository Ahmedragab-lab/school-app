@extends('layouts.master')
@section('css')
  @section('title')
       add grade
  @stop
@endsection

@section('content')
@include('partial.error')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">add grade </h4>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">add grade </li>
            </ol>
            </div>
        </div>
    </div>
    <div class="card card-statistics mb-30">
            <div class="card-body">
                <a class="btn btn-primary " style="margin: 10px;" href="{{ route('grades.index') }}">back</a>
                <form action="{{route('grades.store')}}" method="post" autocomplete="off">
                    {{csrf_field()}}
                        <div class="row " style=" display: block;">
                            <div class="col-lg-6">
                                <label>grade name </label>
                                <input class="form-control" name="name"  type="text">
                            </div>
                            <div class="col-lg-6">
                                <label>notes </label>
                                <textarea class="form-control" name="notes"  >
                                </textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-success" style="margin: 10px;" type="submit">save</button>
                        </div>
                </form>
            </div>
        </div>


@endsection

