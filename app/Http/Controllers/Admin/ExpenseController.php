<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $expenses = Expense::when(
            $search,
            function ($query) use ($search) {

                $query->where(
                    'title',
                    'like',
                    "%{$search}%"
                );

            }
        )
            ->latest()
            ->paginate(10);

        $totalExpense = Expense::sum('amount');

        activityLog(
            'Expense',
            'Expense Added'
        );
        return view(
            'admin.expenses.index',
            compact(
                'expenses',
                'totalExpense',
                'search'
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