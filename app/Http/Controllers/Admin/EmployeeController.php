<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('department')
            ->latest()
            ->get();

        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();

        return view('admin.employees.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required',
            'designation' => 'required',
            'salary' => 'required|numeric',
        ]);

        Employee::create($request->all());

        return redirect()
            ->route('admin.employees.index')
            ->with('success', 'Employee added successfully.');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();

        return view(
            'admin.employees.edit',
            compact('employee', 'departments')
        );
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'department_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'required',
            'designation' => 'required',
            'salary' => 'required|numeric',
            'status' => 'required',
        ]);

        $employee->update($request->all());

        return redirect()
            ->route('admin.employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()
            ->route('admin.employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
