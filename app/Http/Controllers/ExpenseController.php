<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
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
                    return date_only($expense->created_at);
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
        return view('expense.show', [
            'expense' => $expense
        ]);
    }

    // create
    public function create()
    {
        return view('expense.create');
    }

    // store
    public function store(ExpenseRequest $request)
    {
        Expense::create([
            'cost' => $request->input('cost'),
            'item' => $request->input('item'),
            'date_transacted' => date_picked($request->input('date_transacted')),
            'description' => $request->input('description') ?? null
        ]);
        if ($request->ajax()) {
            return response()->json(['message' => 'Expense was successfully recorded.'], 200);
        }
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
    public function update(ExpenseRequest $request, Expense $expense)
    {
        $expense->update([
            'cost' => $request->input('cost'),
            'item' => $request->input('item'),
            'date_transacted' => date_picked($request->input('date_transacted')),
            'description' => $request->input('description') ?? null
        ]);
        if ($request->ajax()) {
            return response()->json(['message' => 'Expense was successfully recorded.'], 200);
        }
        return redirect()->route('expense.index')
            ->with('message', 'Expense entry successfully updated.');
    }

    // destroy
    public function destroy(Request $request, Expense $expense)
    {
        $expense->delete();
        if ($request->ajax()) {
            return response()->json(['message' => 'Expense was successfully trashed.'], 200);
        }
        return redirect()->route('expense.index')
            ->with('message', 'Expense entry successfully trashed.');
    }

    // miscellaneous
}
