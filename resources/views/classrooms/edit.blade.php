@extends('layouts.master')
@section('css')
  @section('title')
       edit classroom
  @stop
@endsection

@section('content')
@include('partial.error')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">edit classroom </h4>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">edit classroom </li>
            </ol>
            </div>
        </div>
    </div>
    <div class="card card-statistics mb-30">
            <div class="card-body">
                <a class="btn btn-primary " style="margin: 10px;" href="{{ route('classrooms.index') }}">back</a>
                <form action="{{route('classrooms.update',$classroom)}}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT')
                        <div class="row " style=" display: block;">
                            <div class="col-lg-6">
                                <label>classroom name </label>
                                <input class="form-control" name="classname"  type="text" value="{{ $classroom->classname }}">
                            </div>
                            <div class="col-lg-6">
                                <label>grades </label>
                                <select name="grade_id" id="" class="form-control" style="padding: 10px;">
                                    <option value="{{ $classroom->grade->id }}" disabled selected >{{$classroom->grade->name }}</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-success" style="margin: 10px;" type="submit">save</button>
                        </div>
                </form>
            </div>
        </div>


@endsection

