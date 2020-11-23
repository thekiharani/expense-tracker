<?php

namespace App\Http\Controllers;

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
                    return date_only($income->date_received);
                })
                ->editColumn('created_at', function ($income) {
                    return medium_date($income->created_at);
                })
                ->editColumn('updated_at', function ($income) {
                    return time_diff($income->updated_at);
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
        return $income;
    }

    // create
    public function create()
    {
        return view('income.create');
    }

    // store
    public function store(Request $request)
    {
        Income::create([
            'amount' => $request->amount,
            'source' => $request->source,
            'date_received' => $request->date_received
        ]);
        return redirect()->route('income.index')
            ->with('message', 'Income entry successfully created.');
    }

    // edit
    public function edit(Income $income){
        return view('income.edit', [
            'income' => $income
        ]);
    }

    // update
    public function update(Request $request, Income $income)
    {
        $income->update([
            'amount' => $request->amount,
            'source' => $request->source,
            'date_received' => $request->date_received
        ]);
        return redirect()->route('income.index')
            ->with('message', 'Income entry successfully updated.');
    }

    // destroy
    public function destroy(Income $income)
    {
        $income->delete();
        return redirect()->route('income.index')
            ->with('message', 'Income entry successfully deleted.');
    }

    // miscellaneous
}
