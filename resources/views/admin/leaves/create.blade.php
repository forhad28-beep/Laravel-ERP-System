@extends('admin.layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-5">
    Apply Leave
</h2>

<form action="{{ route('admin.leaves.store') }}"
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
            <label>From Date</label>
            <input type="date" name="from_date"
                   class="border w-full p-3 rounded">
        </div>

        <div>
            <label>To Date</label>
            <input type="date" name="to_date"
                   class="border w-full p-3 rounded">
        </div>

        <div>
            <label>Reason</label>
            <textarea name="reason"
                      class="border w-full p-3 rounded"></textarea>
        </div>

    </div>

    <button class="mt-5 bg-blue-600 text-black px-5 py-2 rounded">
        Submit Leave
    </button>

</form>

@endsection