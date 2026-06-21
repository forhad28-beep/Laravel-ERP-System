<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\Payroll;

class ReportController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();

        $activeEmployees = Employee::where(
            'status',
            'active'
        )->count();

        $inactiveEmployees = Employee::where(
            'status',
            'inactive'
        )->count();

        $presentCount = Attendance::where(
            'status',
            'present'
        )->count();

        $lateCount = Attendance::where(
            'status',
            'late'
        )->count();

        $absentCount = Attendance::where(
            'status',
            'absent'
        )->count();

        $totalPayroll = Payroll::sum(
            'net_salary'
        );

        $totalExpense = Expense::sum(
            'amount'
        );

        return view(
            'admin.reports.index',
            compact(
                'totalEmployees',
                'activeEmployees',
                'inactiveEmployees',
                'presentCount',
                'lateCount',
                'absentCount',
                'totalPayroll',
                'totalExpense'
            )
        );
    }
}