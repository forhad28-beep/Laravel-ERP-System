@extends('admin.layouts.app')

@section('content')

    <div class="flex justify-between mb-5">

        <h2 class="text-2xl font-bold">
            Attendance List
        </h2>

        <a href="{{ route('admin.attendances.create') }}" class="bg-green-600 text-black px-4 py-2 rounded">

            Take Attendance

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>

    @endif

    <div class="bg-white rounded shadow">
<div class="overflow-x-auto">
        <table class="w-full">

            <thead>

                <tr>

                    <th class="p-3">Employee</th>
                    <th class="p-3">Date</th>
                    <th class="p-3">Status</th>

                </tr>

            </thead>

            <tbody>

                @foreach($attendances as $attendance)

                    <tr>

                        <td class="p-3">
                            {{ $attendance->employee->name }}
                        </td>

                        <td class="p-3">
                            {{ $attendance->date }}
                        </td>

                        <td class="p-3">
                            @if($attendance->status == 'present')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                Present
                            </span>

                            @elseif($attendance->status == 'late')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                                Late
                            </span>

                            @else

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                                Absent
                            </span>

                            @endif
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>
        </div>
<div class="mt-4">
    {{ $attendances->links() }}
</div>
    </div>

@endsection