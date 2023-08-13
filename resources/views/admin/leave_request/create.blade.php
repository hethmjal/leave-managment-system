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
            <form id="store_form" method="POST" action="{{route('leave-requests.store')}}">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="name">نوع الاجازة</label>
                            <select id="select" class="form-control" name="leave_type_id">
                                <option value=""  >{{ __('Choose an option') }}</option>
                               @foreach ($types as $type)
                               <option value="{{$type->id}}">{{$type->name}}</option>

                               @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="name">موعد بدء الاجازة</label>
                            <input type="date" class="form-control" name="start_date">
                        </div>
                    </div>
      
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="name">مدة الاجازة</label>
                            <input type="text" class="form-control" name="duration">
                        </div>
                    </div>
                   
                    <div class="col-12 col-md-2">
                        <button type="submit" class="btn btn-primary w-100 mt-5" >حفظ</button>
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

