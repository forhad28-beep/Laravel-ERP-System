<!-- <div class="mb-8 text-center">

    @if($setting && $setting->logo)

        <img
            src="{{ asset('storage/' . $setting->logo) }}"
            class="w-16 h-16 mx-auto rounded-full object-cover">

    @endif

    <h2 class="mt-3 font-bold">
        {{ $setting->company_name ?? 'Mini ERP' }}
    </h2>

</div> -->

<div class="w-64 min-h-screen bg-gray-900 text-black">
    <div class="p-5 text-2xl font-bold border-b">
        Mini ERP
    </div>

    <ul class="p-4 space-y-3">

        <li>
            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('admin.departments.index') }}">
                Departments
            </a>
        </li>

        <li>
            <a href="{{ route('admin.employees.index') }}">
                Employees
            </a>
        </li>

        <li>
            <a href="{{ route('admin.attendances.index') }}">
                Attendance
            </a>
        </li>

        <li>
            <a href="{{ route('admin.leaves.index') }}">
                Leaves
            </a>
        <li>

        <li>
            <a href="{{ route('admin.payrolls.index') }}">
                Payroll
            </a>
        </li>

        <li>
            <a href="{{ route('admin.expenses.index') }}">
                Expenses
            </a>
        </li>

        <li><a href="{{ route('admin.reports.index') }}">
                Reports
            </a></li>

        <li>
            <a href="{{ route('admin.settings.index') }}">
                Settings
            </a>
        </li>

        <li>
            <a href="{{ route('admin.activity.logs') }}">
                Activity Logs
            </a>
        </li>

    </ul>
</div>