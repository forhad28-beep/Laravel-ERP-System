@extends('admin.layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Company Settings
</h2>

<form method="POST"
      action="{{ route('admin.settings.update') }}"
      enctype="multipart/form-data"
      class="bg-white p-6 rounded shadow">

    @csrf

    <div class="mb-4">
        <label>Company Name</label>

        <input type="text"
               name="company_name"
               value="{{ $setting->company_name ?? '' }}"
               class="border p-3 w-full rounded">
    </div>

    <div class="mb-4">
        <label>Email</label>

        <input type="email"
               name="email"
               value="{{ $setting->email ?? '' }}"
               class="border p-3 w-full rounded">
    </div>

    <div class="mb-4">
        <label>Phone</label>

        <input type="text"
               name="phone"
               value="{{ $setting->phone ?? '' }}"
               class="border p-3 w-full rounded">
    </div>

    <div class="mb-4">
        <label>Address</label>

        <textarea name="address"
                  class="border p-3 w-full rounded">{{ $setting->address ?? '' }}</textarea>
    </div>

    <div class="mb-4">
        <label>Logo</label>

        <input type="file"
               name="logo"
               class="border p-3 w-full rounded">
    </div>

    <button
        class="bg-blue-600 text-white px-5 py-2 rounded">

        Save Settings

    </button>

</form>

@endsection