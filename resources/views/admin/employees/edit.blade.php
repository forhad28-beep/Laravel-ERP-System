@extends('admin.layouts.app')

@section('content')

    <h2 class="text-2xl font-bold mb-5">
        Add Employee
    </h2>

    <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">

            <div>
                <label>Department</label>

                <select name="department_id" class="border w-full p-3 rounded">

                    @foreach($departments as $department)

                        <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>

                            {{ $department->name }}

                        </option>

                    @endforeach

                </select>
            </div>

            <div>
                <label>Name</label>

                <input type="text" value="{{ old('name', $employee->name) }}" name="name" class="border w-full p-3 rounded">
                @error('name')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div>
                <label>Email</label>

                <input type="email" value="{{ old('email', $employee->email) }}" name="email"
                    class="border w-full p-3 rounded">
                @error('email')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div>
                <label>Phone</label>

                <input type="text" value="{{ old('phone', $employee->phone) }}" name="phone"
                    class="border w-full p-3 rounded">
                @error('phone')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div>
                <label>Designation</label>

                <input type="text" value="{{ old('designation', $employee->designation) }}" name="designation"
                    class="border w-full p-3 rounded">
                @error('designation')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div>
                <label>Salary</label>

                <input type="number" value="{{ old('salary', $employee->salary) }}" name="salary"
                    class="border w-full p-3 rounded">
                @error('salary')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div>
                <label>Status</label>

                <select name="status" class="border w-full p-3 rounded">

                    <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>
            </div>

        </div>

        <button class="mt-5 bg-blue-600 text-black px-5 py-2 rounded">
            Save Employee
        </button>

    </form>

@endsection