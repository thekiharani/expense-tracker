<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use App\Models\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('dashboard', [
            'total_income' => auth()->user()->currency_code .' '. number_format(
                Income::all()->sum('amount'), 2
            ),
            'total_expense' => auth()->user()->currency_code .' '. number_format(
                Expense::all()->sum('cost'), 2
            ),
            'total_wishlist' => auth()->user()->currency_code .' '. number_format(
                Wish::all()->sum('cost_estimate'), 2
            )
        ]);
    }
}
