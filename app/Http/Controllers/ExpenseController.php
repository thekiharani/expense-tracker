<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ExpenseController extends Controller
{
    // constructor
    public function __construct()
    {
        $this->middleware('auth');
    }

    // index
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $expenses = Expense::query();
            return DataTables::eloquent($expenses)
                ->editColumn('cost', function ($expense) {
                    return auth()->user()->currency_code .' '. number_format($expense->cost);
                })
                ->editColumn('date_transacted', function ($expense) {
                    return date_only($expense->date_transacted);
                })
                ->editColumn('created_at', function ($expense) {
                    return medium_date($expense->created_at);
                })
                ->editColumn('updated_at', function ($expense) {
                    return time_diff($expense->updated_at);
                })
                ->addColumn('action', function ($expense) {
                    return view('components.expense_dt._action', ['expense' => $expense]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('expense.index');
    }

    // show
    public function show(Expense $expense)
    {
        return $expense;
    }

    // create
    public function create()
    {
        return view('expense.create');
    }

    // store
    public function store(Request $request)
    {
        Expense::create([
            'cost' => $request->cost,
            'item' => $request->item,
            'date_transacted' => $request->date_transacted,
            'description' => $request->description ?? null
        ]);
        return redirect()->route('expense.index')
            ->with('message', 'Expense entry successfully created.');
    }

    // edit
    public function edit(Expense $expense){
        return view('expense.edit', [
            'expense' => $expense
        ]);
    }

    // update
    public function update(Request $request, Expense $expense)
    {
        $expense->update([
            'cost' => $request->cost,
            'item' => $request->item,
            'date_transacted' => $request->date_transacted,
            'description' => $request->description ?? null
        ]);
        return redirect()->route('expense.index')
            ->with('message', 'Expense entry successfully updated.');
    }

    // destroy
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expense.index')
            ->with('message', 'Expense entry successfully deleted.');
    }

    // miscellaneous
}
