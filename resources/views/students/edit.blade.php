@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@section('title')
    تعديل مستخدم
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الطلاب</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
                طالب</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-lg-12 col-md-12">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>خطا</strong>
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
                        <a class="btn btn-primary btn-sm" href="{{ url('GetSearchView') }}">رجوع</a>
                    </div>
                </div><br>

                {!! Form::model($student, ['method' => 'PATCH', 'route' => ['students.update', $student->id]]) !!}
                <div class="">
                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label> الرقم الجامعي: <span class="tx-danger">*</span></label>
                            {!! Form::text('frmno', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label>  عام القبول: <span class="tx-danger">*</span></label>
                            {!! Form::text('ENTS', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-3" id="fnWrapper">
                            <label> الاسم الاول: <span class="tx-danger">*</span></label>
                            {!! Form::text('N1', null, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="parsley-input col-md-3" id="fnWrapper">
                            <label> الاسم الثاني: <span class="tx-danger">*</span></label>
                            {!! Form::text('N2', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="parsley-input col-md-3" id="fnWrapper">
                            <label> الاسم الثالث: <span class="tx-danger">*</span></label>
                            {!! Form::text('N3', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="parsley-input col-md-3" id="fnWrapper">
                            <label> الاسم الرابع: <span class="tx-danger">*</span></label>
                            {!! Form::text('N4', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                </div>

                
                <div class="row row-sm mg-b-20">
                    <div>
                        <label> الكلية: <span class="tx-danger">*</span></label>
                        <select class="form-control" name="faculty_id" id="faculty_id">
                           
                           @foreach ($faculties as $key => $value)
                             <option value='{{ $key }}'{{ $key == $student->faculty_id ? 'selected' : '' }}> {{ $value }}</option>
		                   @endforeach

                        </select>
                    </div>

                    <div>
                    <label> القسم: <span class="tx-danger">*</span></label>
                      <select class="form-control" name="dept" id="dept"> 
                        <option value="{{ $student->dept->id }}">{{ $student->dept->name}}</option>
                      </select>
                   
                    </div>

                    <div>
                        <label> نوع القبول: <span class="tx-danger">*</span></label>
                        <select class="form-control" name="admissiontype_id">
                            @foreach ($admissiontypes as $admissiontype)
                                <option
                                    value='{{ $admissiontype->id }}'{{ $admissiontype->id == $student->admissiontype_id ? 'selected' : '' }}>
                                    {{ $admissiontype->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label> البرنامج: <span class="tx-danger">*</span></label>
                        <select class="form-control" name="degree_id">
                            @foreach ($degrees as $degree)
                                <option
                                    value='{{ $degree->id }}'{{ $degree->id == $student->degree_id ? 'selected' : '' }}>
                                    {{ $degree->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mg-b-20">

                </div>
                <div class="mg-t-30">
                    <button class="btn btn-main-primary pd-x-20" type="submit">تحديث</button>
                </div>
                {!! Form::close() !!}
            </div>
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

<!--Internal  Parsley.min js -->
<script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<!-- Internal Form-validation js -->
<script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>

<script>
	 
	$(document).ready(function(){

	      $('select[name="faculty_id"]').on('change',function(){

          var faculty_id = $(this).val();
          
          if(faculty_id) {

          	$.ajax({
          		url:'/getdepts/'+faculty_id,
          		type: 'GET',
          		dataType: 'json',
          		success: function(data){
          			console.log(data);
          			$('select[name="dept"]').empty();
          			$.each(data,function(key,value){
          				$('select[name="dept"]')
          				.append('<option value="'+key+'">'+ value + '</option>');
          			});
          		}

          	});

          } else{
          	$('select[name="dept"]').empty();
          }

	      });
		});
	</script>

    
@endsection
