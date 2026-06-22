<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\LeaveRequest;
use App\Models\Payroll;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();

        $activeEmployees = Employee::where(
            'status',
            'active'
        )->count();

        $totalDepartments = Department::count();

        $todayAttendance = Attendance::whereDate(
            'date',
            today()
        )->count();

        // $pendingLeaves = LeaveRequest::where(
        //     'status',
        //     'pending'
        // )->count();

        $totalPayroll = Payroll::sum(
            'net_salary'
        );

        $payrollRecords = Payroll::count();

        $recentEmployees = Employee::latest()
            ->take(5)
            ->get();

        $recentPayrolls = Payroll::with('employee')
            ->latest()
            ->take(5)
            ->get();

        $totalExpense = Expense::sum('amount');

        $inactiveEmployees = Employee::where(
            'status',
            'inactive'
        )->count();

        $recentActivities = ActivityLog::latest()
    ->take(5)
    ->get();

        return view(
            'admin.dashboard',
            compact(
                'totalEmployees',
                'activeEmployees',
                'totalDepartments',
                'todayAttendance',

                'totalPayroll',
                'payrollRecords',
                'recentEmployees',
                'recentPayrolls',
                'totalExpense',
                'activeEmployees',
                'inactiveEmployees',
                'recentActivities'
            )
        );
    }
}