@extends('layouts.app')
@section('title')
اضافة نوع اجازة 
@endsection
@section('content')    

    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap align-items-center py-3">
            <div class="card-title">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <h3 class="card-label bold-text"> إضافة نوع  اجازة  </h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="store_form" method="POST" action="{{route('leave-types.store')}}">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="name">الإسم</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
      
                   
                    <div class="col-12 col-md-2">
                        <span class="btn btn-primary w-100 mt-5" onclick="send('store_form')">حفظ</span>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript">
        
        // store user
        function send(form_id){
            let form = document.getElementById(form_id);
            let formData = new FormData(form);
            $.ajax({
                url: form.action,
                processData: false,
                contentType: false,
                type: 'post',
                data:formData,
                beforeSend: function() {
                    toastr.info("جاري الحفظ ..");
                },
                success: function (data){
                    toastr.clear();
                    if(data.errors){
                        data.errors.forEach(error => {
                            toastr.error(error);
                        });
                    }else{
                        toastr.success('تم');
                    }
                }
            });
        }
        
    </script>
@endsection

