@extends('layouts.master')
@section('css')
  @section('title')
       classroom list
  @stop
@endsection

@section('content')
@include('partial.error')
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> classroom list</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">classroom list</li>
            </ol>
        </div>
        <div class="col-md-6 mb-30">
            <a href="{{ route('classrooms.create') }}"  class="btn btn-primary "><i class="fa fa-plus"></i> Add Class</a>
            <button   class="btn btn-danger " id="btn_delete_all" ><i class="fa fa-trash"></i> Delete All</button>
        </div>
    </div>
</div>
<div class="row ">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-hover table-bordered p-0" id="datatable" >
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">
                                    <input type="checkbox" name="select_all" id="example-select-all"
                                     onclick="CheckAll('box1',this)"/>
                                </th>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-10p border-bottom-0">classroom name</th>
                                <th class="wd-10p border-bottom-0">Grade name</th>
                                <th class="wd-10p border-bottom-0">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count=0; @endphp
                            @foreach ($classrooms as $classroom)
                            @php $count++; @endphp
                                <tr>
                                    <td>
                                        <input type="checkbox" class="box1" value="{{ $classroom->id }}">
                                    </td>
                                    <td>{{ $count }}</td>
                                    <td>{{ $classroom->classname }}</td>
                                    <td>{{ $classroom->grade->name }}</td>
                                    <td>
                                        <form action="{{ route('classrooms.destroy', $classroom) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('classrooms.edit', $classroom) }}" class="btn btn-info"><i class="fa fa-edit"></i> {{ __('Edit') }}</a>
                                            <button type="button" class="btn btn-danger" onclick="confirm('{{ __("Are you sure you want to delete this classroom ?") }}') ? this.parentElement.submit() : ''">
                                                <i class="fa fa-trash"></i> {{ __('Delete') }}
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
<!-- حذف مجموعة صفوف -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Delete Process') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('delete_all') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    {{ trans('Are You Sure You Want To Delete This Classrooms') }}
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('Delete') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
@section('js')
<script>
    function CheckAll(className,elem){
        var elements = document.getElementsByClassName(className);
        var l = elements.length;
        if(elem.checked){
            for(var i=0 ; i<l ; i++){
                elements[i].checked = true;
            }
        }else{
            for(var i=0 ; i<l ; i++){
                elements[i].checked = false;
            }
        }
    }
</script>
<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });
            if (selected.length > 0) {
                $('#delete_all').modal('show');
                $('input[id="delete_all_id"]').val(selected);
            }

        });
    });

</script>
@endsection
