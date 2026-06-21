@extends('admin.layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-5">
    Add Expense
</h2>

<form action="{{ route('admin.expenses.store') }}"
      method="POST"
      class="bg-white p-6 rounded shadow">

    @csrf

    <div class="grid grid-cols-2 gap-4">

        <div>
            <label>Expense Title</label>

            <input type="text"
                   name="title"
                   class="border w-full p-3 rounded">
        </div>

        <div>
            <label>Amount</label>

            <input type="number"
                   name="amount"
                   class="border w-full p-3 rounded">
        </div>

        <div>
            <label>Date</label>

            <input type="date"
                   name="expense_date"
                   class="border w-full p-3 rounded">
        </div>

        <div>
            <label>Description</label>

            <textarea name="description"
                      class="border w-full p-3 rounded"></textarea>
        </div>

    </div>

    <button
        class="mt-5 bg-blue-600 text-black px-5 py-2 rounded">

        Save Expense

    </button>

</form>

@endsection