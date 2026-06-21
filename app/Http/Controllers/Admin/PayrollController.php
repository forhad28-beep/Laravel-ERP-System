<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Payroll;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PayrollController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::with('employee')
            ->latest()
            ->get();

        return view('admin.payrolls.index', compact('payrolls'));
    }

    public function create()
    {
        $employees = Employee::where('status', 'active')->get();

        return view('admin.payrolls.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'month' => 'required',
            'bonus' => 'nullable|numeric',
            'deduction' => 'nullable|numeric',
        ]);

        $exists = Payroll::where('employee_id', $request->employee_id)
            ->where('month', $request->month)
            ->exists();

        if ($exists) {
            return back()
                ->withInput()
                ->withErrors([
                    'month' => 'Payroll already exists for this employee and month.'
                ]);
        }

        $employee = Employee::findOrFail($request->employee_id);

        $basicSalary = $employee->salary;
        $bonus = $request->bonus ?? 0;
        $deduction = $request->deduction ?? 0;

        $netSalary = $basicSalary + $bonus - $deduction;

        Payroll::create([
            'employee_id' => $employee->id,
            'month' => $request->month,
            'basic_salary' => $basicSalary,
            'bonus' => $bonus,
            'deduction' => $deduction,
            'net_salary' => $netSalary,
        ]);

        return redirect()
            ->route('admin.payrolls.index')
            ->with('success', 'Payroll created successfully.');
    }
    public function edit(Payroll $payroll)
    {
        $employees = Employee::all();

        return view(
            'admin.payrolls.edit',
            compact('payroll', 'employees')
        );
    }
    public function update(Request $request, Payroll $payroll)
    {
        $employee = Employee::findOrFail(
            $request->employee_id
        );

        $basicSalary = $employee->salary;

        $bonus = $request->bonus ?? 0;
        $deduction = $request->deduction ?? 0;

        $netSalary = $basicSalary + $bonus - $deduction;

        $payroll->update([
            'employee_id' => $employee->id,
            'month' => $request->month,
            'basic_salary' => $basicSalary,
            'bonus' => $bonus,
            'deduction' => $deduction,
            'net_salary' => $netSalary,
        ]);

        return redirect()
            ->route('admin.payrolls.index')
            ->with('success', 'Payroll updated.');
    }
    public function destroy(Payroll $payroll)
    {
        $payroll->delete();

        return redirect()
            ->route('admin.payrolls.index')
            ->with('success', 'Payroll deleted.');
    }

    public function pdf()
    {
        $payrolls = Payroll::with('employee')->get();

        $pdf = Pdf::loadView(
            'admin.payrolls.pdf',
            compact('payrolls')
        );

        return $pdf->download('payroll-report.pdf');
    }

}