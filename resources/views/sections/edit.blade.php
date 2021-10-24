@extends('layouts.master')
@section('css')
  @section('title')
       edit section
  @stop
@endsection

@section('content')
@include('partial.error')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">edit section </h4>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">edit section </li>
            </ol>
            </div>
        </div>
    </div>
    <div class="card card-statistics mb-30">
            <div class="card-body">
                <a class="btn btn-primary " style="margin: 10px;" href="{{ route('sections.index') }}">back</a>
                <form action="{{route('sections.update',$section)}}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT')
                        <div class="row " style=" display: block;">
                            <div class="col-lg-6">
                                <label>section name </label>
                                <input class="form-control" name="name"  type="text" value="{{ $section->section_name }}">
                            </div>
                            <div class="col-lg-6">
                                <label>grade name </label>
                                <select type="checkbox" class="form-control " style="padding: 10px;"
                                        name="Grade_id" onchange="console.log($(this).val())" >
                                    <option value="{{ $section->grade->id }}">{{ $section->grade->name }}</option>
                                    @foreach ($grades as $grade)
                                      <option value="{{$grade->id}}" >{{$grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>class name </label>
                               <select type="checkbox" class="form-control" style="padding: 10px;" name="Class_id">
                                <option value="{{ $section->classroom->id }}">{{ $section->classroom->classname }}</option>
                                {{-- @foreach ($section->grade->classrooms as $class)
                                <option value="{{$class->id}}" >{{$class->classname}}</option>
                                @endforeach --}}
                               </select>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
                                <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                    @foreach($section->teachers as $teacher)
                                        <option selected value="{{$teacher['id']}}">{{$teacher['Name']}}</option>
                                    @endforeach

                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
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
@section('js')
<script>
    $(document).ready(function(){
        $('select[name="Grade_id"]').on('change',function(){
          var Grade_id = $(this).val();
          if(Grade_id){
              $.ajax({
                 url:"{{ URL::to('classes') }}/" + Grade_id,
                 type:"GET",
                 dataType:"json",
                 success:function(data){
                    $('select[name="Class_id"]').empty();
                    $.each(data,function(key,value){
                        $('select[name="Class_id"]').append('<option value="'+key+'">'+value+'</option>');
                    });
                 },
              });
          }else{
              consloe.log('ajax did not working');
          }
        });
    });
</script>
@endsection

