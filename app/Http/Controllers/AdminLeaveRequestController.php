<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class AdminLeaveRequestController extends Controller
{
    public function index()
    {
        $requests = LeaveRequest::latest()->get();
        return view('admin.leave_request.index', compact('requests'));
    }

    public function accept($id)
    {
        $leaveRequest = LeaveRequest::find($id);
        $leaveRequest->update([
            'status' => 'accepted',
            'reason' => 'تم قبول الاجازة!'
        ]);
        return redirect()->route('admin.leave-requests')->with('success', 'تمت الموافقة على طلب الإجازة.');
    }

    public function rejectPage($id)
    {
        $request = LeaveRequest::find($id);

        return view('admin.leave_request.reject', compact('id','request'));

    }
    public function reject( Request $request,$id)
    {
        $leaveRequest = LeaveRequest::find($id);

        $leaveRequest->update([
            'status' => 'rejected',
           'reason' => $request->input('reason')
        ]);
        return redirect()->route('admin.leave-requests')->with('success', 'تم رفض طلب الإجازة.');
    }


}
