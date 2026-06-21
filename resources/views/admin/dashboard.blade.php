@extends('admin.layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Dashboard
</h1>

<div class="grid grid-cols-4 gap-6">

    <div class="bg-white p-5 rounded shadow">
        <h3>Total Employees</h3>
        <p class="text-3xl font-bold">0</p>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <h3>Total Departments</h3>
        <p class="text-3xl font-bold">0</p>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <h3>Attendance Today</h3>
        <p class="text-3xl font-bold">0</p>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <h3>Payroll</h3>
        <p class="text-3xl font-bold">0</p>
    </div>

</div>

@endsection