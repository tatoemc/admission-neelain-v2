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
                <br>
                @if ($students->count() > 0)
                
                <br><br>
                <div class="table-responsive hoverable-table" id="printTable">
                <table dir="rtl"  class="table table-bordered ">
                    <tbody>
                        <tr>
                            @if (isset($faculty))
                            <td><span style="font-weight:bold"> الكلية : </span></td>
                            <td>{{$faculty->name}}</td>
                            @endif
                            @if (isset($dept))
                            <td><span style="font-weight:bold"> القسم : </span></td>
                            <td>{{$dept->name}}</td>
                            @endif
                            @if (isset($year))
                            <td><span style="font-weight:bold"> العام : </span></td>
                            <td>{{$year}}</td>
                            @endif
                        </tr>
                        <tr>
                            @if (isset($admissiontype))
                            <td><span style="font-weight:bold"> نوع القبول :</span></td>
                            <td>{{$admissiontype->name}}</td>
                            @endif
                            @if (isset($degree))
                            <td><span style="font-weight:bold"> البرنامج :</span></td>
                            <td>{{$degree->name}}</td>
                            @endif
                           
                            <td><span style="font-weight:bold"> عدد الطلاب :</span></td>
                            <td>({{$students->count()}})</td>
                           
                        </tr>
                    </tbody>
                </table>
                <br><br><br>
                    <table dir="rtl"  border="1" class="table table-hover table-bordered" style=" text-align: center;">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">الرقم الجامعي</th>
                                    <th class="border-bottom-0">الأسم </th>
                                    <th class="border-bottom-0">نوع القبول</th>
                                    <th class="border-bottom-0">البرنامج</th>
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
                                        <td>{{ $student->N1 }} {{ $student->N2 }} {{ $student->N3 }} {{ $student->N4 }} </td>
                                        
                                        <td>{{ $student->admissiontype->name }}</td>
                                        <td>{{ $student->degree->name }}</td>
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
<!--

        
    function printDiv() {
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
-->
<script type="text/javascript">
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
