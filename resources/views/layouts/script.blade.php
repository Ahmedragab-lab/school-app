<!--=================================
 jquery -->

<!-- jquery -->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js')}}"></script>

<!-- plugins-jquery -->
<script src="{{ asset('assets/js/plugins-jquery.js')}}"></script>
<!-- plugin_path -->
<script type="text/javascript"> var plugin_path = "{{ asset('assets/js') }}/";</script>


<!-- chart -->
<script src="{{ asset('assets/js/chart-init.js')}}"></script>

<!-- calendar -->
<script src="{{ asset('assets/js/calendar.init.js')}}"></script>

<!-- charts sparkline -->
<script src="{{ asset('assets/js/sparkline.init.js')}}"></script>

<!-- charts morris -->
<script src="{{ asset('assets/js/morris.init.js')}}"></script>

<!-- datepicker -->
<script src="{{ asset('assets/js/datepicker.js')}}"></script>

<!-- sweetalert2 -->
<script src="{{ asset('assets/js/sweetalert2.js')}}"></script>
@yield('js')
<!-- toastr -->
<script src="{{ asset('assets/js/toastr.js')}}"></script>

<!-- validation -->
<script src="{{ asset('assets/js/validation.js')}}"></script>

<!-- lobilist -->
<script src="{{ asset('assets/js/lobilist.js')}}"></script>

<!-- custom -->
<script src="{{ asset('assets/js/custom.js')}}"></script>


<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>
@if (App::getLocale() == 'en')
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/en/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/en/dataTables.bootstrap4.min.js') }}"></script>
@else
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/ar/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/ar/dataTables.bootstrap4.min.js') }}"></script>
@endif

{{-- image preview --}}
<script>
    $(".img").change(function(){
        if(this.files && this.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $(".img-preview").attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
{{-- end image preview --}}
{{-- start ajax of add student and add new promotion pages --}}
<script>
    $(document).ready(function(){
        $('select[name="Grade_id"]').on('change',function(){
            var Grade_id = $(this).val();
            if(Grade_id){
               $.ajax({
                   url     :"{{ URL::to('Get_classrooms') }}/" + Grade_id,
                   type    :"GET",
                   dataType:"json",
                   success:function(data){
                     $('select[name="Classroom_id"]').empty();
                     $('select[name="Classroom_id"]').append('<option selected disabled>{{ trans('Parent_trans.Choose') }}</option>');
                     $.each(data,function(key,value){
                        $('select[name="Classroom_id"]').append('<option value="'+key+'">'+value+'</option>');
                     });
                   },
               });
            }else{
                console.log('Ajax load did not work');
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('select[name="Classroom_id"]').on('change',function(){
            var Classroom_id = $(this).val();
            if(Classroom_id){
               $.ajax({
                   url     :"{{ URL::to('Get_sections') }}/" + Classroom_id,
                   type    :"GET",
                   dataType:"json",
                   success:function(data){
                     $('select[name="section_id"]').empty();
                     $('select[name="section_id"]').append('<option selected disabled>{{ trans('Parent_trans.Choose') }}</option>');
                     $.each(data,function(key,value){
                        $('select[name="section_id"]').append('<option value="'+key+'">'+value+'</option>');
                     });
                   },
               });
            }else{
                console.log('Ajax load did not work');
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('select[name="Grade_id_new"]').on('change',function(){
            var Grade_id = $(this).val();
            if(Grade_id){
               $.ajax({
                   url     :"{{ URL::to('Get_classrooms') }}/" + Grade_id,
                   type    :"GET",
                   dataType:"json",
                   success:function(data){
                     $('select[name="Classroom_id_new"]').empty();
                     $('select[name="Classroom_id_new"]').append('<option selected disabled>{{ trans('Parent_trans.Choose') }}</option>');
                     $.each(data,function(key,value){
                        $('select[name="Classroom_id_new"]').append('<option value="'+key+'">'+value+'</option>');
                     });
                   },
               });
            }else{
                console.log('Ajax load did not work');
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('select[name="Classroom_id_new"]').on('change',function(){
            var Classroom_id = $(this).val();
            if(Classroom_id){
               $.ajax({
                   url     :"{{ URL::to('Get_sections') }}/" + Classroom_id,
                   type    :"GET",
                   dataType:"json",
                   success:function(data){
                     $('select[name="section_id_new"]').empty();
                     $('select[name="section_id_new"]').append('<option selected disabled>{{ trans('Parent_trans.Choose') }}</option>');
                     $.each(data,function(key,value){
                        $('select[name="section_id_new"]').append('<option value="'+key+'">'+value+'</option>');
                     });
                   },
               });
            }else{
                console.log('Ajax load did not work');
            }
        });
    });
</script>

{{-- end  ajax of add student and add new promotion pages --}}

