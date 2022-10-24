@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@section('title')
    تصدير ملف
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الطلاب</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تصدير
                ملف</span>
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
                    
                </div><br>

                {!! Form::open(['url'=>'export', 'method'=>'get','autocomplete'=>'off','files'=>'true','class'=>'form']) !!}  
                        {{csrf_field()}}
                <div class="row row-sm mg-b-20">
                    <div>
                        <label> الكلية: <span class="tx-danger">*</span></label>
                        <select class="form-control" name="faculty_id" id="faculty_id">
                         <option value="" selected disabled> -- اختيار الكلية --</option>
                           @foreach ($faculties as $key => $value)
                             <option value="{{ $key }}" >{{ $value }}</option>
		                   @endforeach

                        </select>
                    </div>

                    <div>
                    <label> القسم: <span class="tx-danger">*</span></label>
                      <select class="form-control" name="dept" id="dept"> 
                        
                      </select>
                   
                    </div>

                </div>
                <div class="mg-t-30">
                    <button class="btn btn-main-primary pd-x-20" type="submit">تحميل</button>
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
