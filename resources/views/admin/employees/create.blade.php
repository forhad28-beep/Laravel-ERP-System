@extends('admin.layouts.app')

@section('content')

    <h2 class="text-2xl font-bold mb-5">
        Add Employee
    </h2>

    <form action="{{ route('admin.employees.store') }}" method="POST" class="bg-white p-6 rounded shadow">

        @csrf

        <div class="grid grid-cols-2 gap-4">

            <div>
                <label>Department</label>

                <select name="department_id" class="border w-full p-3 rounded">

                    <option value="">
                        Select Department
                    </option>

                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">
                            {{ $department->name }}
                        </option>
                    @endforeach

                </select>
                @error('department_id')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div>
                <label>Name</label>

                <input type="text" value="{{ old('name') }}" name="name" class="border w-full p-3 rounded">
                @error('name')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div>
                <label>Email</label>

                <input type="email" value="{{ old('email') }}" name="email" class="border w-full p-3 rounded">
                @error('email')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div>
                <label>Phone</label>

                <input type="text" value="{{ old('phone') }}" name="phone" class="border w-full p-3 rounded">
                @error('phone')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div>
                <label>Designation</label>

                <input type="text" value="{{ old('designation') }}" name="designation" class="border w-full p-3 rounded">
                @error('designation')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div>
                <label>Salary</label>

                <input type="number" value="{{ old('salary') }}" name="salary" class="border w-full p-3 rounded">
                @error('salary')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>

        </div>

        <button class="mt-5 bg-blue-600 text-black px-5 py-2 rounded">
            Save Employee
        </button>

    </form>

@endsection