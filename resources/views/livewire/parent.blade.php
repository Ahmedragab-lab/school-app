@extends('layouts.master')
@section('css')
@livewireStyles
    @section('title')
        {{ __('site.parent-add') }}
    @stop
    @endsection
    @section('page-header')
    <!-- breadcrumb -->
      {{ __('site.parent-add') }}
    @section('PageTitle')
    @stop
    <!-- breadcrumb -->

@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <h1>{{ __('site.parent-add') }} </h1>
                @livewire('add-parent')
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
  @livewireScripts
@endsection
