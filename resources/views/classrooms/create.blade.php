@extends('layouts.master')
@section('css')
  @section('title')
       add classroom
  @stop
@endsection

@section('content')
@include('partial.error')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">add classroom </h4>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">add classroom </li>
            </ol>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <form action="{{route('classrooms.store')}}" method="post" autocomplete="off">
                    {{csrf_field()}}
                        {{-- <h5 class="card-title">add classrooms </h5> --}}
                        <div class="repeater">
                            <div data-repeater-list="class_list">
                                <div data-repeater-item="">
                                    <div class=" row mb-30">
                                        <div class="col-lg-2">
                                            <input class="form-control" type="text" placeholder="Name" name="classname">
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="box">
                                                <select name="grade_id" class="fancyselect" style="display: none;">
                                                    <option value="" disabled selected >{{ __('select Grade')}}</option>
                                                    @foreach ($grades as $grade)
                                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                    @endforeach
                                                    </select>
                                                    {{-- <div class="nice-select fancyselect" tabindex="0"><span class="current">Grade</span>
                                                        <ul class="list">
                                                            <li data-value="1" class="option selected">grade</li>
                                                            <li data-value="2" class="option">Male</li>
                                                            <li data-value="3" class="option">Female</li>
                                                        </ul>
                                                    </div> --}}
                                                </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <input class="btn btn-danger btn-block" data-repeater-delete="" type="button" value="Delete">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create="" type="button" value="Add new">
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="btn btn-primary" type="submit" value="save">
                                    <a class="btn btn-basic " style="margin: 10px;" href="{{ route('classrooms.index') }}">back</a>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

