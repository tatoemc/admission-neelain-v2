@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    تفاصيل طالب
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الطلاب</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل طالب</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    <!-- row opened -->
    <div class="card">
        @can('طباعة')
        <div class="card-header bg-black"><button class="btn btn-primary  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i class="mdi mdi-printer ml-1"></i>طباعة</button></div>
        @endcan
        <div class="card-body" id="print">

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <img src="{{ URL::asset('assets/img/brand/logo.png') }}" alt="logo">
                    </div>
                </div><br><br>
                <div class="row">
                    <h4>التاريخ : {{ \Carbon\Carbon::now()->format('Y/m/d') }}</h4>
                </div><br>
                <div class="row">

                    <div class="col-xl-12">

                        <ul class="list-unstyled float-end">
                            <li style="font-size: 26px; color: rgb(3, 3, 3);">السيد/ عميد كلية {{ $student->faculty->name }}
                            </li>

                        </ul>
                       
                    </div>

                </div>
                
                
                <center style="font-size: 15px;">السلام عليكم و رحمة الله و بركاتة</center>
                <br>
               <center><u class="text text-center mt-3" style="font-size: 26px;">الموضوع / تأكيد صحة الرقم الجامعي</u></center>
                <br>    
               
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="list-unstyled float-end">
                            <li style="font-size: 18px; color: rgb(3, 3, 3);">
                                بناءاً على الطلب المقدم من الطالب / <b>{{ $student->N1 }} {{ $student->N2 }} {{ $student->N3 }} {{ $student->N4 }}  </b>  نؤكد لسيادتكم ان الطالب موجود في 
                                السجلات و ذلك حسب االلبيانات التالية :
                            </li>
                        </ul>

                    </div>

                </div>
              <br>

                <div class="row mx-3">
                    <table class="table">
                        
                        <tbody>
                            <tr>
                                <td>النوع</td>
                                <td>{{ $student->gender->name }}</td>
                            </tr>
                            <tr>
                                <td>الرقم الجامعي</td>
                                <td>{{ $student->frmno }}</td>
                            </tr>
                            <tr>
                                <td>اسم الكلية</td>
                                <td> {{ $student->faculty->name }}</td>
                            </tr>
                            <tr>
                                <td>اسم القسم</td>
                                <td> {{ $student->dept->name }}</td>
                            </tr>
                            <tr>
                                <td>نوع القبول</td>
                                <td>{{ $student->admissiontype->name }}</td> 
                            </tr>
                            <tr>
                                <td>نوع الدراسة</td>
                                <td>{{ $student->degree->name }}</td>
                            </tr>
                            <tr>
                                <td>المدرسة الثانوية</td>
                                <td>{{ $student->SCHS }}</td>
                            </tr>
                            <tr>
                                <td>تاريخ القبول</td>
                                <td>{{ $student->ENTS }}</td>
                            </tr>
                           
                        </tbody>
                    </table>

                </div>
            </div>
        </div>



    </div>
    <!-- /row -->

    <!-- delete -->

    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <script type="text/javascript">
        
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

    </script>

@endsection
