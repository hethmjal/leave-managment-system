<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    public function index()
    {
        $types = LeaveType::all();
        return view('leave_types.index', compact('types'));
    }

    public function create()
    {
        return view('leave_types.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        LeaveType::create($request->all());
        return response()->json(['message','تمت الاضافة']);
    }

    public function edit($id)
    {
        $type = LeaveType::find($id);
        return view('leave_types.edit', compact('type'));
    }

    public function update(Request $request,$id)
    {
        $leaveType = LeaveType::find($id);

        $request->validate(['name'=>'required']);
        $leaveType->update($request->all());
        return response()->json(['message','تم التعديل']);
    }

    public function destroy(LeaveType $leaveType)
    {
        $leaveType->delete();
        return response()->json(['message','تم الحذف']);
    }
}
