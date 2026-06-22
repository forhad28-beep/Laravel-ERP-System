<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\Payroll;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

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

    public function payrollPdf(Request $request)
    {
        $month = $request->month;

        $payrolls = Payroll::with('employee')
            ->when($month, function ($query) use ($month) {
                $query->where('month', $month);
            })
            ->get();

        $pdf = Pdf::loadView(
            'admin.reports.payroll-pdf',
            compact('payrolls', 'month')
        );

        return $pdf->download('payroll-report.pdf');
    }
    public function expensePdf(Request $request)
    {
        $month = $request->month;

        $expenses = Expense::when(
            $month,
            function ($query) use ($month) {

                $query->whereMonth(
                    'expense_date',
                    date('m', strtotime($month))
                );

            }
        )->get();

        $pdf = Pdf::loadView(
            'admin.reports.expense-pdf',
            compact('expenses', 'month')
        );

        return $pdf->download('expense-report.pdf');
    }
public function employeePdf()
{
    $employees = Employee::with('department')
        ->latest()
        ->get();

    $pdf = Pdf::loadView(
        'admin.reports.employee-pdf',
        compact('employees')
    );

    return $pdf->download('employee-report.pdf');
}
}