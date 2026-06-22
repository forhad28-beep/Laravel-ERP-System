@extends('admin.layouts.app')

@section('content')

    <div class="flex justify-between mb-5">

        <h2 class="text-2xl font-bold">
            Departments
        </h2>

        <a href="{{ route('admin.departments.create') }}" class="bg-green-600 text-black px-4 py-2 rounded">
            Add Department
        </a>

    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow">

        <table class="w-full">

            <thead>
                <tr class="border-b">
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Department Name</th>
                    <th class="p-3 text-left">Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($departments as $department)

                    <tr class="border-b">
                        <td class="p-3">
                            {{ $department->id }}
                        </td>

                        <td class="p-3">
                            {{ $department->name }}
                        </td>
                        <td class="p-3 flex gap-2">

                            <a href="{{ route('admin.departments.edit', $department->id) }}"
                                class="bg-blue-600 text-black px-3 py-1 rounded">
                                Edit
                            </a>

                            <form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Delete Department?')"
                                    class="bg-red-600 text-white px-3 py-1 rounded">

                                    Delete

                                </button>

                            </form>

                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="2" class="p-3 text-center">
                            No Department Found
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

@endsection