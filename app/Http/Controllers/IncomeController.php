<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncomeRequest;
use App\Models\Income;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class IncomeController extends Controller
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
            $incomes = Income::query();
            return DataTables::eloquent($incomes)
                ->editColumn('amount', function ($income) {
                    return auth()->user()->currency_code .' '. number_format($income->amount);
                })
                ->editColumn('date_received', function ($income) {
                    return medium_date($income->date_received, true);
                })
                ->editColumn('created_at', function ($income) {
                    return medium_date($income->created_at, true);
                })
                ->editColumn('updated_at', function ($income) {
                    return time_diff($income->updated_at, true);
                })
                ->addColumn('action', function ($income) {
                    return view('components.income_dt._action', ['income' => $income]);
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('income.index');
    }

    // show
    public function show(Income $income)
    {
        return view('income.show', [
            'income' => $income
        ]);
    }

    // create
    public function create()
    {
        return view('income.create');
    }

    // store
    public function store(IncomeRequest $request)
    {
        Income::create([
            'amount' => $request->input('amount'),
            'source' => $request->input('source'),
            'date_received' => date_picked($request->input('date_received'))
        ]);
        if ($request->ajax()) {
            return response()->json(['message' => 'Income was successfully recorded.'], 200);
        }
        return redirect()->route('income.index')
            ->with('message', 'Income entry successfully recorded.');
    }

    // edit
    public function edit(Income $income){
        return view('income.edit', [
            'income' => $income
        ]);
    }

    // update
    public function update(IncomeRequest $request, Income $income)
    {
        $income->update([
            'amount' => $request->input('amount'),
            'source' => $request->input('source'),
            'date_received' => date_picked($request->input('date_received'))
        ]);
        if ($request->ajax()) {
            return response()->json(['message' => 'Income was successfully updated.'], 200);
        }
        return redirect()->route('income.index')
            ->with('message', 'Income entry successfully updated.');
    }

    // destroy
    public function destroy(Request $request, Income $income)
    {
        $income->delete();
        if ($request->ajax()) {
            return response()->json(['message' => 'Income was successfully created'], 200);
        }
        return redirect()->route('income.index')
            ->with('message', 'Income entry successfully deleted.');
    }

    // miscellaneous
}
