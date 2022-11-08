@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@section('title')
    التقارير
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">التقارير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض
                تقرير</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    @if (session()->has('Add_user'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم الاضافة المستخدم بنجاح",
                    type: "success"
                })
            }
        </script>
    @endif

    <div class="col-lg-12 col-md-12">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        
                    </div>
                </div><br>
                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                    action="{{ url('GetReportResult') }}" method="post">
                    
                    {{ csrf_field() }}
                    <div class="">
                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-3">
                                <label class="form-label"> <span class="tx-danger">*</span>الكلية</label>
                                <select class="form-control" name="faculty_id" required>
                                    <option value="0"> -- اختيار الكلية--</option>
                                    @foreach ($faculties as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label> القسم: </label>
                                <select class="form-control" name="dept" id="dept">
                                        
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">نوع القبول</label>
                                <select name="admissiontype_id"
                                    class="form-control">
                                    <option value="0"> -- اختيار نوع القبول--</option>
                                    @foreach ($admissiontypes as $admissiontype)
                                        <option value='{{ $admissiontype->id }}'>{{ $admissiontype->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">البرنامج</label>
                                <select name="degree_id"
                                    class="form-control">
                                    <option value="0"> -- اختيار البرنامج--</option>
                                    @foreach ($degrees as $degree)
                                        <option value='{{ $degree->id }}'>{{ $degree->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-3">
                                <label class="form-label">العام</label>
                                <select name="year" id="ddlYears" class="form-control">
                                    <option value="0"> --الكل--</option>
                                </select>
                            </div>
                            

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">عرض</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')


<!-- Internal Nice-select js-->
<script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>
 <!--Internal  Datepicker js -->
 <script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!--Internal  Parsley.min js -->
<script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<!-- Internal Form-validation js -->
<script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>

<script>
    $(document).ready(function() {

        $('select[name="faculty_id"]').on('change', function() {

            var faculty_id = $(this).val();
           
            if (faculty_id) { 

                $.ajax({
                    url: '/getdepts/' + faculty_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('select[name="dept"]').empty();
                        $('select[name="dept"]')
                        .append('<option value="0">كل الاقسام</option>');
                        $.each(data, function(key, value) {
                            $('select[name="dept"]')
                            .append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });

            } else {
                $('select[name="dept"]').empty();
            }

        });
    });
</script>

<script type="text/javascript">
    $(function () {
        //Reference the DropDownList.
        var ddlYears = $("#ddlYears");
 
        //Determine the Current Year.
        var currentYear = (new Date()).getFullYear();
 
        //Loop and add the Year values to DropDownList.
        for (var i = currentYear ; i >= 1990 ; i--) {
            var option = $("<option />");
            option.html(i);
            option.val(i);
            ddlYears.append(option);
        }
    });
</script>
@endsection
