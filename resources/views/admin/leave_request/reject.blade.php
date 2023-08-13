@extends('layouts.app')
@section('title')
رفض اجازة
@endsection
@section('content')    

    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap align-items-center py-3">
            <div class="card-title">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <h3 class="card-label bold-text"> رفض اجازة الموظف - {{$request->employee->name}}</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="store_form" method="POST" action="{{route('admin.leave-requests.reject',$id)}}">
                @csrf
                <div class="row">
                       

                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="name">سبب الرفض</label>
                          <textarea name="reason" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                          </div>
                   
                    <div class="col-12 col-md-2">
                        <button type="submit" class="btn btn-primary w-100 mt-5" >رفض</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
  
@endsection

