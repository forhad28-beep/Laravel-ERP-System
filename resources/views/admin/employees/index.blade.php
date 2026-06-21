@extends('admin.layouts.app')

@section('content')

    <div class="flex justify-between mb-5">

        <h2 class="text-2xl font-bold">
            Employees
        </h2>

        <a href="{{ route('admin.employees.create') }}" class="bg-green-600 text-black px-4 py-2 rounded">
            Add Employee
        </a>

    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="p-3">ID</th>
                    <th class="p-3">Name</th>
                    <th class="p-3">Department</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Phone</th>
                    <th class="p-3">Salary</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($employees as $employee)

                    <tr class="border-b">

                        <td class="p-3">
                            {{ $employee->id }}
                        </td>

                        <td class="p-3">
                            {{ $employee->name }}
                        </td>

                        <td class="p-3">
                            {{ $employee->department->name }}
                        </td>

                        <td class="p-3">
                            {{ $employee->email }}
                        </td>

                        <td class="p-3">
                            {{ $employee->phone }}
                        </td>

                        <td class="p-3">
                            {{ $employee->salary }}
                        </td>

                        <td class="p-3">

                            @if($employee->status == 'active')

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                    Active
                                </span>

                            @else

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                    Inactive
                                </span>

                            @endif

                        </td>
                        <td class="p-3">

                            <div class="flex gap-2">

                                <a href="{{ route('admin.employees.edit', $employee->id) }}"
                                    class="bg-blue-600 text-black px-3 py-1 rounded">

                                    Edit

                                </a>

                                <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Delete Employee?')"
                                        class="bg-red-600 text-white px-3 py-1 rounded">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="p-3 text-center">
                            No Employee Found
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

@endsection