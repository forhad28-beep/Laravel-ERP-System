@extends('admin.layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-5">
    Edit Department
</h2>

<form action="{{ route('admin.departments.update', $department->id) }}"
      method="POST"
      class="bg-white p-6 rounded shadow">

    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block mb-2">
            Department Name
        </label>

        <input
            type="text"
            name="name"
            value="{{ $department->name }}"
            class="border w-full p-3 rounded">

        @error('name')
            <span class="text-red-500">
                {{ $message }}
            </span>
        @enderror
    </div>

    <button
        class="bg-blue-600 text-black px-5 py-2 rounded">
        Update Department
    </button>

</form>

@endsection