@extends('admin.layouts.app')

@section('content')

<div class="flex justify-between mb-5">

    <h2 class="text-2xl font-bold">
        Leave Requests
    </h2>

    <a href="{{ route('admin.leaves.create') }}"
       class="bg-green-600 text-white px-4 py-2 rounded">
        Apply Leave
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
    <th class="p-3">From</th>
    <th class="p-3">To</th>
    <th class="p-3">Reason</th>
    <th class="p-3">Status</th>
    <th class="p-3">Action</th>
</tr>
</thead>

<tbody>

@foreach($leaves as $leave)

<tr>

<td class="p-3">
    {{ $leave->employee->name }}
</td>

<td class="p-3">
    {{ $leave->from_date }}
</td>

<td class="p-3">
    {{ $leave->to_date }}
</td>

<td class="p-3">
    {{ $leave->reason }}
</td>

<td class="p-3">

@if($leave->status == 'approved')
    <span class="bg-green-100 text-green-700 px-3 py-1 rounded">
        Approved
    </span>
@elseif($leave->status == 'rejected')
    <span class="bg-red-100 text-red-700 px-3 py-1 rounded">
        Rejected
    </span>
@else
    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded">
        Pending
    </span>
@endif

</td>

<td class="p-3">

@if($leave->status == 'pending')

<form action="{{ route('admin.leaves.updateStatus', $leave->id) }}"
      method="POST"
      class="flex gap-2">

    @csrf
    @method('PUT')

    <input type="hidden" name="status" value="approved">

    <button class="bg-green-600 text-white px-3 py-1 rounded">
        Approve
    </button>

</form>

<form action="{{ route('admin.leaves.updateStatus', $leave->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <input type="hidden" name="status" value="rejected">

    <button class="bg-red-600 text-white px-3 py-1 rounded">
        Reject
    </button>

</form>

@else
    -
@endif

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection