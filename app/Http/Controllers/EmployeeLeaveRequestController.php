<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeLeaveRequestController extends Controller
{
    public function index()
    {
        $requests = LeaveRequest::where('user_id',Auth::id())->get();
        return view('employee.leave_request.index', compact('requests'));
    }

    public function create()
    {
        $types = LeaveType::all();
        return view('employee.leave_request.create', compact('types'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'leave_type_id' => 'required',
            'start_date' => 'required|date',
            'duration' => 'required|integer|min:1',
        ]);


        LeaveRequest::create([
            'user_id' => Auth::id(),
            'leave_type_id' => $request->input('leave_type_id'),
            'start_date' => $request->input('start_date'),
            'duration' => $request->input('duration'),
        ]);

        return redirect()->route('leave-requests.index')->with('success', 'تم تقديم طلب الإجازة بنجاح.');
    }

   
}
