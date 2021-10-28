<div class="container-fluid">
    <div class="row">
      <!-- Left Sidebar start-->
      <div class="side-menu-fixed">
       <div class="scrollbar side-menu-bg">
        <ul class="nav navbar-nav side-menu" id="sidebarnav">
          <!-- menu item Dashboard-->
          <li>
            <a href="{{ route('home') }}" >
              <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ __('site.dashboard') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li>
            <a href="#" >
              <div class="pull-left"><span class="right-nav-text" style="color: rgb(236, 65, 65)">{{ __('site.wolf') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li>
            <a href="{{ route('users.index') }}">
              <div class="pull-left"><i class="fa fa-address-book"></i><span class="right-nav-text">{{ __('site.admins') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li>
            <a href="{{ route('roles.index') }}">
              <div class="pull-left"><i class="fa fa-times-rectangle"></i><span class="right-nav-text">{{ __('site.permissions') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li>
            <a href="{{ route('grades.index') }}">
              <div class="pull-left"><i class="fa fa-id-card"></i><span class="right-nav-text">{{ __('site.grades') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li>
            <a href="{{ route('classrooms.index') }}">
              <div class="pull-left"><i class="fa fa-id-badge"></i><span class="right-nav-text">{{ __('site.classroom') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li>
            <a href="{{ route('sections.index') }}">
              <div class="pull-left"><i class="fa fa-id-badge"></i><span class="right-nav-text">{{ __('site.sections') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>
          {{-- teacher route --}}
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements2">
                <div class="pull-left"><i class="fa fa-id-card-o"></i><span class="right-nav-text">{{ __('teacher') }}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                </a>
                <ul id="elements2" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{ route('teachers.index') }}">{{ __('teacher-list') }}</a></li>
                </ul>
            </li>
          {{-- end teacher route --}}
          {{-- student route --}}
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements3">
                    <div class="pull-left"><i class="fa fa-address-book"></i><span class="right-nav-text">{{trans('main_trans.students')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                    </a>
                    <ul id="elements3" class="collapse" data-parent="#sidebarnav">
                        <li> <a href="{{route('Students.create')}}">{{trans('main_trans.add_student')}}</a></li>
                        <li> <a href="{{route('Students.index')}}">{{trans('main_trans.list_students')}}</a></li>
                        <li> <a href="{{route('Promotion.index')}}">{{trans('main_trans.add_Promotion')}}</a></li>
                        <li> <a href="{{route('Promotion.create')}}">{{trans('main_trans.list_Promotions')}}</a> </li>
                    </ul>
                </li>
          {{-- End student route --}}
          {{--  parent route --}}
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements1">
                <div class="pull-left"><i class="fa fa-id-card-o"></i><span class="right-nav-text">{{ __('site.parent') }}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
                </a>
                <ul id="elements1" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{ route('parent') }}">{{ __('site.parent-list') }}</a></li>
                </ul>
            </li>
          {{--  End parent route --}}
          {{-- test crud with ajax --}}
          <li>
            <a href="{{ route('cruds.index') }}">
              <div class="pull-left"><i class="fa fa-id-badge"></i><span class="right-nav-text">{{ __('test') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li>
            <a href="{{ url('test') }}">
              <div class="pull-left"><i class="fa fa-id-badge"></i><span class="right-nav-text">{{ __('test-counterlivewire') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li>

        </ul>
    </div>
  </div>
