@extends('admin.layouts.app')

@section('content')

    <div class="flex justify-between mb-5">

        <div>

            <h2 class="text-2xl font-bold">
                Expenses
            </h2>

            <p class="text-red-600 font-semibold">
                Total Expense:
                ৳ {{ number_format($totalExpense, 2) }}
            </p>

        </div>

        <a href="{{ route('admin.expenses.create') }}" class="bg-green-600 text-black px-4 py-2 rounded">

            Add Expense

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>

    @endif

    <div class="bg-white rounded shadow overflow-x-auto">

        <form method="GET" class="mb-4 flex gap-2">

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search expense..."
                class="border p-2 rounded">

            <button class="bg-blue-600 text-black px-4 rounded">
                Search
            </button>

        </form>
        <div class="overflow-x-auto">
            <table class="w-full">

                <thead>

                    <tr>

                        <th class="p-3">Title</th>
                        <th class="p-3">Amount</th>
                        <th class="p-3">Date</th>
                        <th class="p-3">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($expenses as $expense)

                        <tr class="border-b">

                            <td class="p-3">
                                {{ $expense->title }}
                            </td>

                            <td class="p-3">
                                ৳ {{ number_format($expense->amount, 2) }}
                            </td>

                            <td class="p-3">
                                {{ $expense->expense_date }}
                            </td>

                            <td class="p-3">

                                <div class="flex gap-2">

                                    <a href="{{ route('admin.expenses.edit', $expense->id) }}"
                                        class="bg-blue-600 text-black px-3 py-1 rounded">

                                        Edit

                                    </a>

                                    <form action="{{ route('admin.expenses.destroy', $expense->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Delete Expense?')"
                                            class="bg-red-600 text-white px-3 py-1 rounded">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center p-4">

                                No Expense Found

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>
        <div class="mt-4">
            {{ $expenses->links() }}
        </div>
    </div>

@endsection