@extends('admin.layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-5">
    Create Payroll
</h2>

<form action="{{ route('admin.payrolls.store') }}"
      method="POST"
      class="bg-white p-6 rounded shadow">

    @csrf

    <div class="grid grid-cols-2 gap-4">

        <div>
            <label>Employee</label>

            <select name="employee_id"
                    class="border w-full p-3 rounded">

                <option value="">Select Employee</option>

                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">
                        {{ $employee->name }}
                    </option>
                @endforeach

            </select>
        </div>

        <div>
            <label>Month</label>

            <input type="month"
                   name="month"
                   class="border w-full p-3 rounded">
        </div>

        <div>
            <label>Bonus</label>

            <input type="number"
                   name="bonus"
                   value="0"
                   class="border w-full p-3 rounded">
        </div>

        <div>
            <label>Deduction</label>

            <input type="number"
                   name="deduction"
                   value="0"
                   class="border w-full p-3 rounded">
        </div>

    </div>

    <button class="mt-5 bg-blue-600 text-black px-5 py-2 rounded">
        Generate Payroll
    </button>

</form>

@endsection