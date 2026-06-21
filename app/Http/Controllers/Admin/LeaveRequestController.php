<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeaveRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $leaves = LeaveRequest::with('employee')
            ->latest()
            ->get();

        return view('admin.leaves.index', compact('leaves'));
    }

    public function create()
    {
        $employees = Employee::all();

        return view('admin.leaves.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'reason' => 'required',
        ]);

        LeaveRequest::create([
            'employee_id' => $request->employee_id,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('admin.leaves.index')
            ->with('success', 'Leave request created successfully.');
    }

    public function updateStatus(Request $request, LeaveRequest $leave)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $leave->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Leave status updated.');
    }
}