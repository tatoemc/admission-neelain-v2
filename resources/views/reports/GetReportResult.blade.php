@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
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
                    <div class="card-header bg-black"><button class="btn btn-primary  float-right mt-3 mr-2" id="print_Button" onclick="printData()"> <i class="mdi mdi-printer ml-1"></i>طباعة</button></div>
                </div><br><br> <br>
                
                @if ($students->count() > 0)
                <div class="table-responsive hoverable-table" id="printTable">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
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
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<!--Internal  Parsley.min js -->
<script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<!-- Internal Form-validation js -->
<script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>

<script type="text/javascript">
        
    function printDiv() {
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }

    function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

</script>



@endsection
