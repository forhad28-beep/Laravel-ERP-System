@extends('admin.layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-5">
    Take Attendance
</h2>

<form action="{{ route('admin.attendances.store') }}"
      method="POST">

    @csrf

    <div class="bg-white rounded shadow p-5">

        <table class="w-full">

            <thead>

            <tr>

                <th class="text-left p-3">
                    Employee
                </th>

                <th class="text-left p-3">
                    Attendance
                </th>

            </tr>

            </thead>

            <tbody>

            @foreach($employees as $employee)

            <tr>

                <td class="p-3">
                    {{ $employee->name }}
                </td>

                <td class="p-3">

                    <select
                        name="attendance[{{ $employee->id }}]"
                        class="border p-2 rounded">

                        <option value="present">
                            Present
                        </option>

                        <option value="late">
                            Late
                        </option>

                        <option value="absent">
                            Absent
                        </option>

                    </select>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

        <button
            class="mt-5 bg-blue-600 text-black px-5 py-2 rounded">

            Save Attendance

        </button>

    </div>

</form>

@endsection