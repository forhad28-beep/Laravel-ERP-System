@extends('admin.layouts.app')

@section('content')

    <div class="mb-8">
        <h1 class="text-3xl font-bold">
            ERP Dashboard
        </h1>

        <p class="text-gray-500 mt-1">
            Welcome back, {{ auth()->user()->name }}
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-gray-500">
                Total Employees
            </h3>

            <p class="text-3xl font-bold mt-2">
                {{ $totalEmployees }}
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-gray-500">
                Active Employees
            </h3>

            <p class="text-3xl font-bold mt-2">
                {{ $activeEmployees }}
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-gray-500">
                Departments
            </h3>

            <p class="text-3xl font-bold mt-2">
                {{ $totalDepartments }}
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-gray-500">
                Today's Attendance
            </h3>

            <p class="text-3xl font-bold mt-2">
                {{ $todayAttendance }}
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-gray-500">
                Pending Leaves
            </h3>

            <p class="text-3xl font-bold mt-2">
                0
            </p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-gray-500">
                Total Payroll
            </h3>

            <p class="text-3xl font-bold mt-2">
                ৳ {{ number_format($totalPayroll, 2) }}
            </p>
        </div>

    </div>

    <div class="grid lg:grid-cols-2 gap-6 mt-8">

        <div class="bg-white rounded-lg shadow">

            <div class="p-5 border-b">
                <h3 class="font-semibold">
                    Recent Employees
                </h3>
            </div>

            <div class="p-5">

                <table class="w-full">

                    <thead>

                        <tr>
                            <th class="text-left py-2">
                                Name
                            </th>

                            <th class="text-left py-2">
                                Designation
                            </th>

                            <th class="text-left py-2">
                                Status
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($recentEmployees as $employee)

                            <tr class="border-t">

                                <td class="py-3">
                                    {{ $employee->name }}
                                </td>

                                <td class="py-3">
                                    {{ $employee->designation }}
                                </td>

                                <td class="py-3">

                                    @if($employee->status == 'active')

                                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">
                                            Active
                                        </span>

                                    @else

                                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-sm">
                                            Inactive
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

        <div class="bg-white rounded-lg shadow">

            <div class="p-5 border-b">
                <h3 class="font-semibold">
                    Recent Payrolls
                </h3>
            </div>

            <div class="p-5">

                <table class="w-full">

                    <thead>

                        <tr>
                            <th class="text-left py-2">
                                Employee
                            </th>

                            <th class="text-left py-2">
                                Month
                            </th>

                            <th class="text-left py-2">
                                Salary
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($recentPayrolls as $payroll)

                            <tr class="border-t">

                                <td class="py-3">
                                    {{ $payroll->employee->name }}
                                </td>

                                <td class="py-3">
                                    {{ $payroll->month }}
                                </td>

                                <td class="py-3 font-semibold">
                                    ৳ {{ number_format($payroll->net_salary, 2) }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="grid lg:grid-cols-2 gap-6 mt-8">

        <div class="bg-white p-6 rounded-lg shadow">

            <h3 class="font-bold mb-4">
                Payroll vs Expense
            </h3>

            <canvas id="financeChart"></canvas>

        </div>

        <div class="bg-white p-6 rounded-lg shadow">

            <h3 class="font-bold mb-4">
                Employee Status
            </h3>

            <canvas id="employeeChart"></canvas>

        </div>

    </div>

    <div class="bg-white rounded-lg shadow p-5">
    <h3 class="font-semibold mb-4">
        Recent Activities
    </h3>

    @foreach($recentActivities as $activity)
        <div class="border-b py-2">
            {{ $activity->action }}
            <br>
            <small>
                {{ $activity->created_at->diffForHumans() }}
            </small>
        </div>
    @endforeach
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const financeCtx = document.getElementById('financeChart');

    new Chart(financeCtx, {
        type: 'bar',
        data: {
            labels: ['Payroll', 'Expense'],
            datasets: [{
                label: 'Amount',
                data: [
                    {{ $totalPayroll }},
                    {{ $totalExpense }}
                ]
            }]
        }
    });

    const employeeCtx = document.getElementById('employeeChart');

    new Chart(employeeCtx, {
        type: 'pie',
        data: {
            labels: ['Active', 'Inactive'],
            datasets: [{
                data: [
                    {{ $activeEmployees }},
                    {{ $inactiveEmployees }}
                ]
            }]
        }
    });

});
</script>

@endsection