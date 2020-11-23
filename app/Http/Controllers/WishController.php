<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WishController extends Controller
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
            $wishes = Wish::query();
            return DataTables::eloquent($wishes)
                ->editColumn('cost_estimate', function ($wish) {
                    return auth()->user()->currency_code .' '. number_format($wish->cost_estimate);
                })
                ->editColumn('pp_date', function ($wish) {
                    return date_only($wish->pp_date);
                })
                ->editColumn('created_at', function ($wish) {
                    return medium_date($wish->created_at);
                })
                ->editColumn('updated_at', function ($wish) {
                    return time_diff($wish->updated_at);
                })
                ->editColumn('priority', function ($wish) {
                    return view('components.wish_dt._priority', ['wish' => $wish]);
                })
                ->addColumn('purchased', function ($wish) {
                    return view('components.wish_dt._purchased', ['wish' => $wish]);
                })
                ->addColumn('action', function ($wish) {
                    return view('components.wish_dt._action', ['wish' => $wish]);
                })
                ->rawColumns(['action', 'priority', 'purchased'])
                ->toJson();
        }
        return view('wish.index');
    }

    // show
    public function show(Wish $wish)
    {
        return $wish;
    }

    // create
    public function create()
    {
        return view('wish.create');
    }

    // store
    public function store(Request $request)
    {
        Wish::create([
            'cost_estimate' => $request->cost_estimate,
            'item' => $request->item,
            'pp_date' => $request->pp_date
        ]);
        return redirect()->route('wish_list.index')
            ->with('message', 'Wish entry successfully created.');
    }

    // edit
    public function edit(Wish $wish){
        return view('wish.edit', [
            'wish' => $wish
        ]);
    }

    // update
    public function update(Request $request, Wish $wish)
    {
        $wish->update([
            'cost_estimate' => $request->cost_estimate,
            'item' => $request->item,
            'pp_date' => $request->pp_date
        ]);
        return redirect()->route('wish_list.index')
            ->with('message', 'Wish entry successfully updated.');
    }

    // destroy
    public function destroy(Wish $wish)
    {
        $wish->delete();
        return redirect()->route('wish_list.index')
            ->with('message', 'Wish entry successfully deleted.');
    }

    // miscellaneous
}
