@extends('layouts.master')
@section('css')
  @section('title')
       grade list
  @stop
@endsection

@section('content')
@include('partial.error')
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> grade list</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">admin list</li>
            </ol>
        </div>
        <div class="col-md-6 mb-30">

            <a href="{{ route('grades.create') }}"  class="btn btn-primary "><i class="fa fa-user-circle"></i> Add grade</a>
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-striped table-bordered p-0" id="datatable" >
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-10p border-bottom-0">grade name</th>
                                <th class="wd-10p border-bottom-0">Notes</th>
                                <th class="wd-10p border-bottom-0">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count=0; @endphp
                            @foreach ($grades as $grade)
                            @php $count++; @endphp
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $grade->name }}</td>
                                    <td>{{ $grade->notes }}</td>

                                    <td>
                                        <form action="{{ route('grades.destroy', $grade) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <a href="{{ route('grades.edit', $grade) }}" class="btn btn-info">{{ __('Edit') }}</a>

                                            <button type="button" class="btn btn-danger" onclick="confirm('{{ __("Are you sure you want to delete this grade ?") }}') ? this.parentElement.submit() : ''">
                                                {{ __('Delete') }}
                                            </button>

                                        </form>
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
    <!--/div-->

    <!-- Modal effects -->
    {{-- <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">?????? ????????????????</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('users.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>???? ?????? ?????????? ???? ?????????? ?????????? ??</p><br>
                        <input type="hidden" name="user_id" id="user_id" value="">
                        <input class="form-control" name="username" id="username" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">??????????</button>
                        <button type="submit" class="btn btn-danger">??????????</button>
                    </div>
            </div>
            </form>
        </div>
    </div> --}}



@endsection
@section('js')

@endsection
