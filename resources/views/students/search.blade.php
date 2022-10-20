@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
البحث 
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الطلاب</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ بحث
                عن تفاصيل طالب</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
@if (session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif

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
                        
                    </div>
                </div><br>
                {!! Form::open(['url' => 'search','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data' ]) !!}
                    {{csrf_field()}}
                  
                    <div class="">
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-8 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>الرقم الجامعي: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="frmno" type="text" value="{{ old('frmno') }}" required="">
                            </div>
                           
                            <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                <br>
                                <button class="btn btn-main-primary pd-x-20" type="submit">بحث</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <br>
                    {!! Form::open(['url' => 'search','method'=>'POST','autocomplete'=>'off','enctype'=>'multipart/form-data' ]) !!}
                    {{csrf_field()}}
                  
                    <div class="">

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-2 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>الاسم الاول: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="N1" type="text" value="{{ old('N1') }}" required="">
                            </div>
                            <div class="parsley-input col-md-2 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>الاسم الثاني: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="N2" type="text" value="{{ old('N2') }}" required="">
                            </div>
                            <div class="parsley-input col-md-2 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>الاسم الثالث: </label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="N3" type="text" value="{{ old('N3') }}">
                            </div>
                            <div class="parsley-input col-md-2 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>الاسم الرابع: </label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="N4" type="text" value="{{ old('N4') }}">
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                <br>
                                <button class="btn btn-main-primary pd-x-20" type="submit">بحث</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                <br><br>
                @if (isset($students))
                <div class="table-responsive">
                    
                        <table id="example" class="table key-buttons text-md-nowrap" style=" text-align: center">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">الرقم الجامعي</th>
                                    <th class="border-bottom-0">الأسم الاول</th>
                                    <th class="border-bottom-0">الأسم الثاني</th>
                                    <th class="border-bottom-0">الأسم الاوسط</th>
                                    <th class="border-bottom-0">الأسم الاخير</th>
                                    <th class="border-bottom-0">عام القبول</th>
                                    <th class="border-bottom-0">الكلية</th>
                                    <th class="border-bottom-0">القسم</th>
                                    <th class="border-bottom-0">العمليات</th>

                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($students as $index => $student)
                                    
                                    <tr>
                                       
                                        <td>{{  $student->id }}</td>
                                        <td>{{ $student->frmno }} </td>
                                        <td>{{ $student->N1 }} </td>
                                        <td>{{ $student->N2 }}</td>
                                        <td>{{ $student->N3 }}</td>
                                        <td>{{ $student->N4 }}</td> 
                                        <td>{{ $student->ENTS }}</td>
                                        <td>{{ $student->faculty->name }}</td>
                                        <td>{{ $student->dept->name }}</td>
                                        
                                        
                                        <td>
                                            @can('عرض طالب')
                                            <a class="btn btn-sm btn-info" href="{{ route('students.show',$student->id)}}"><i class="fa fa-eye"></i> تفاصيل</a>
                                            @endcan
                                            @can('حذف طالب')
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-student_id="{{ $student->id }}"
                                                data-studentname="{{ $student->N1}} {{ $student->N2}} {{ $student->N3}} {{ $student->N4}}" data-toggle="modal"
                                                href="#delete" title="حذف"><i class="las la-trash">حذف</i></a>
                                           @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

                </div>
            </div>
        </div>
        <!-- Delete -->
    <div class="modal" id="delete">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف طالب</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('students.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="student_id" id="student_id" value="">
                        <input class="form-control" name="studentname" id="studentname" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
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
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

<!--Internal  Parsley.min js -->
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>

<script>
    $('#delete').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var student_id = button.data('student_id')
        var studentname = button.data('studentname')
        var modal = $(this)
        modal.find('.modal-body #student_id').val(student_id);
        modal.find('.modal-body #studentname').val(studentname);
    })
</script>

@endsection