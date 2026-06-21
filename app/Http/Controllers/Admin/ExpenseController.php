<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::latest()->get();

        $totalExpense = Expense::sum('amount');

        return view(
            'admin.expenses.index',
            compact(
                'expenses',
                'totalExpense'
            )
        );
    }

    public function create()
    {
        return view('admin.expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'amount' => 'required|numeric',
            'expense_date' => 'required|date',
        ]);

        Expense::create($request->all());

        return redirect()
            ->route('admin.expenses.index')
            ->with('success', 'Expense added successfully.');
    }

    public function edit(Expense $expense)
    {
        return view(
            'admin.expenses.edit',
            compact('expense')
        );
    }

    public function update(
        Request $request,
        Expense $expense
    ) {
        $request->validate([
            'title' => 'required',
            'amount' => 'required|numeric',
            'expense_date' => 'required|date',
        ]);

        $expense->update($request->all());

        return redirect()
            ->route('admin.expenses.index')
            ->with('success', 'Expense updated.');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()
            ->route('admin.expenses.index')
            ->with('success', 'Expense deleted.');
    }
}