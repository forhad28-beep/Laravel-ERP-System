@extends('admin.layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Activity Logs
</h2>

<div class="bg-white rounded shadow">

    <table class="w-full">

        <thead>

            <tr>
                <th class="p-3">Module</th>
                <th class="p-3">Action</th>
                <th class="p-3">User</th>
                <th class="p-3">Date</th>
            </tr>

        </thead>

        <tbody>

            @foreach($logs as $log)

                <tr class="border-t">

                    <td class="p-3">
                        {{ $log->module }}
                    </td>

                    <td class="p-3">
                        {{ $log->action }}
                    </td>

                    <td class="p-3">
                        {{ $log->user_name }}
                    </td>

                    <td class="p-3">
                        {{ $log->created_at->format('d M Y h:i A') }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>

<div class="mt-4">
    {{ $logs->links() }}
</div>

@endsection