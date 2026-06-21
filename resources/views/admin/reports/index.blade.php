@extends('admin.layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Reports Overview
</h1>

<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

    <div class="bg-white p-5 rounded shadow">
        <h3>Total Employees</h3>
        <p class="text-3xl font-bold">
            {{ $totalEmployees }}
        </p>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <h3>Active Employees</h3>
        <p class="text-3xl font-bold">
            {{ $activeEmployees }}
        </p>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <h3>Inactive Employees</h3>
        <p class="text-3xl font-bold">
            {{ $inactiveEmployees }}
        </p>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <h3>Total Payroll</h3>
        <p class="text-3xl font-bold">
            ৳ {{ number_format($totalPayroll, 2) }}
        </p>
    </div>

</div>

<div class="grid md:grid-cols-2 gap-6 mt-8">

    <div class="bg-white p-6 rounded shadow">

        <h3 class="font-bold mb-4">
            Attendance Report
        </h3>

        <p>Present: {{ $presentCount }}</p>
        <p>Late: {{ $lateCount }}</p>
        <p>Absent: {{ $absentCount }}</p>

    </div>

    <div class="bg-white p-6 rounded shadow">

        <h3 class="font-bold mb-4">
            Expense Report
        </h3>

        <p class="text-2xl font-bold text-red-600">
            ৳ {{ number_format($totalExpense, 2) }}
        </p>

    </div>

</div>

@endsection