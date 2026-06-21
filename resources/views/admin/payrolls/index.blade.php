@extends('admin.layouts.app')

@section('content')

<div class="flex justify-between mb-5">

    <h2 class="text-2xl font-bold">
        Payroll List
    </h2>

    <a href="{{ route('admin.payrolls.create') }}"
       class="bg-green-600 text-white px-4 py-2 rounded">
        Create Payroll
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
<tr>
    <th class="p-3">Employee</th>
    <th class="p-3">Month</th>
    <th class="p-3">Basic Salary</th>
    <th class="p-3">Bonus</th>
    <th class="p-3">Deduction</th>
    <th class="p-3">Net Salary</th>
    <th class="p-3">Action</th>
</tr>
</thead>

<tbody>

@forelse($payrolls as $payroll)

<tr class="border-b">

<td class="p-3">
    {{ $payroll->employee->name }}
</td>

<td class="p-3">
    {{ $payroll->month }}
</td>

<td class="p-3">
    {{ number_format($payroll->basic_salary, 2) }}
</td>

<td class="p-3">
    {{ number_format($payroll->bonus, 2) }}
</td>

<td class="p-3">
    {{ number_format($payroll->deduction, 2) }}
</td>

<td class="p-3 font-bold">
    {{ number_format($payroll->net_salary, 2) }}
</td>
<td class="p-3">

<div class="flex gap-2">

<a href="{{ route('admin.payrolls.edit', $payroll->id) }}"
   class="bg-blue-600 text-black px-3 py-1 rounded">

    Edit

</a>

<form action="{{ route('admin.payrolls.destroy', $payroll->id) }}"
      method="POST">

    @csrf
    @method('DELETE')

    <button
        onclick="return confirm('Delete Payroll?')"
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
        No Payroll Found
    </td>
</tr>

@endforelse

</tbody>

</table>

</div>

@endsection