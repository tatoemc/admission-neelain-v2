@extends('layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection

@section('title')
      الرئيسية
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحباً بك {{ Auth::user()->name }}</h2>

            </div>
        </div>
       
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
 
    <!-- row -->
    @can('isAdmin')
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">عدد الكليات</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ number_format(\App\Models\Faculty::count('id')) }}</h4>
                               
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"> عدد الاقسام</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">             
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ number_format(\App\Models\Dept::count('id')) }}</h4>
                                
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"> عدد الطلاب</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ number_format(\App\Models\Student::count('id')) }}</h4>
                                
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                               
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline3"
                    class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">عدد الملفات</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ number_format(\App\Models\Doc::count('id')) }}</h4>
                                
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                <span class="text-white op-7"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
    </div>
    @endcan

    @can('isUser')
    <div class="row row-md">
        <div class="col-xl-12 col-md-12 col-lg-12">
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
                   
                    </div>
                </div>
            </div>
        </div>
		</div>
    </div>
    <!-- row closed -->
   @endcan
    <!-- row opened  -->
   
   
    <!-- row close -->
    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
@endsection
