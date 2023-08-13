@extends('layouts.app')
@section('title')
leave managment system
@endsection
@section('content')    

    <link href="{{asset('assets/control_panel/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />

    <div class="card card-custom gutter-b">
     
      
  
        <div class="card-header flex-wrap align-items-center py-3">

            
            <div class="card-title">
                
                <div class="d-flex align-items-center justify-content-between w-100">
                    <h3 class="card-label bold-text">   اجازاتي </h3>
                </div>
            </div>
            <div>
                <a href="{{route('leave-requests.create')}}" class="btn btn-primary">  طلب اجازة </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-checkable yajra-datatable">
                <thead>
                    <tr>
                        <th></th>
                        <th>الموظف</th>
                        <th> نوع الاجازة</th>
                        <th>الحالة</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$request->employee->name}}</td>

                        <td>{{$request->leaveType->name}}</td>
                        <td>{{$request->status}}</td>
                        <td>
                          {{$request->reason}}

                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript">
        

     

        function deleteRow(id){
            swal({
                title: "هل أنت متأكد؟",
                text: "سيتم  الحذف !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: {
                    confirm: "تأكيد",
                    cancel: "إغلاق",
                },
                closeOnConfirm: false,
                closeOnCancel: false
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/leave-types/" + id,
                        type: 'delete',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (data){
                            toastr.clear();
                            if(data.errors){
                                data.errors.forEach(error => {
                                    toastr.error(error);
                                });
                            }else{
                                toastr.success('تم');
                                location.reload()

                            }
                        }
                    });
                    swal("تم الحذف بنجاح", {
                    icon: "success",
                    });
                }
            });
        }

    </script>
@endsection

