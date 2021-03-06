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
          {{-- student route --}}
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu">
                <i class="fa fa-user-circle-o"></i>
                {{trans('main_trans.students')}}
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div></a>
            <ul id="students-menu" class="collapse">
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_information">
                        {{trans('main_trans.Student_information')}}
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div></a>
                    <ul id="Student_information" class="collapse">
                        <li> <a href="{{route('Students.create')}}">{{trans('main_trans.add_student')}}</a></li>
                        <li> <a href="{{route('Students.index')}}">{{trans('main_trans.list_students')}}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students_upgrade">{{trans('main_trans.Students_Promotions')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                    <ul id="Students_upgrade" class="collapse">
                        <li> <a href="{{route('Promotion.index')}}">{{trans('main_trans.add_Promotion')}}</a></li>
                        <li> <a href="{{route('Promotion.create')}}">{{trans('main_trans.list_Promotions')}}</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#Graduate students">{{trans('main_trans.Graduate_students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                    <ul id="Graduate students" class="collapse">
                        <li> <a href="{{route('Graduated.create')}}">{{trans('main_trans.add_Graduate')}}</a> </li>
                        <li> <a href="{{route('Graduated.index')}}">{{trans('main_trans.list_Graduate')}}</a> </li>
                    </ul>
                </li>
            </ul>
        </li>
          {{-- End student route --}}
            <!-- Accounts-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                    <div class="pull-left"><i class="fa fa-vcard"></i><span
                            class="right-nav-text">{{trans('main_trans.Accounts')}}</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{route('Fees.index')}}">???????????? ????????????????</a> </li>
                    <li> <a href="{{route('Fees_Invoices.index')}}">????????????????</a> </li>
                    <li> <a href="{{route('receipt_students.index')}}">?????????? ??????????</a> </li>
                    <li> <a href="{{route('ProcessingFee.index')}}">?????????????? ????????</a> </li>
                    <li> <a href="{{route('Payment_students.index')}}">???????? ??????????</a> </li>
                </ul>
            </li>
            <!--End  Accounts-->
          {{-- test crud with ajax --}}
          {{-- <li>
            <a href="{{ route('cruds.index') }}">
              <div class="pull-left"><i class="fa fa-id-badge"></i><span class="right-nav-text">{{ __('test') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li> --}}
          {{-- <li>
            <a href="{{ url('test') }}">
              <div class="pull-left"><i class="fa fa-id-badge"></i><span class="right-nav-text">{{ __('test-counterlivewire') }}</span></div>
              <div class="clearfix"></div>
            </a>
          </li> --}}
         {{-- end test crud with ajax --}}
        </ul>
    </div>
  </div>
