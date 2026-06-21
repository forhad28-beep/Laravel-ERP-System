<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::latest()
            ->paginate(15);

        return view(
            'admin.attendances.index',
            compact('attendances')
        );
    }

    public function create()
    {
        $employees = Employee::where(
            'status',
            'active'
        )->get();

        return view(
            'admin.attendances.create',
            compact('employees')
        );
    }

    public function store(Request $request)
    {
        foreach ($request->attendance as $employeeId => $status) {

            Attendance::updateOrCreate(
                [
                    'employee_id' => $employeeId,
                    'date' => now()->toDateString(),
                ],
                [
                    'status' => $status,
                ]
            );
        }

        return redirect()
            ->route('admin.attendances.index')
            ->with('success', 'Attendance saved successfully.');
    }
}