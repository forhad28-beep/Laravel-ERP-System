@extends('admin.layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-5">
    Add Department
</h2>

<form action="{{ route('admin.departments.store') }}"
      method="POST"
      class="bg-white p-6 rounded shadow">

    @csrf

    <div class="mb-4">
        <label class="block mb-2">
            Department Name
        </label>

        <input
            type="text" value="{{ old('name') }}"
            name="name"
            class="border w-full p-3 rounded">

        @error('name')
            <span class="text-red-500">
                {{ $message }}
            </span>
        @enderror
    </div>

    <button
        class="bg-blue-600 text-yellow-100 px-5 py-2 rounded">
        Save Department
    </button>

</form>

@endsection