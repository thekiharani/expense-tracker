<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
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
            $users = User::query()->has('admin');
            return DataTables::eloquent($users)
                ->addColumn('super_admin', function ($user) {
                    return view('components.user_dt._super_admin', ['user' => $user]);
                })
                ->editColumn('created_at', function ($user) {
                    return medium_date($user->created_at);
                })
                ->editColumn('updated_at', function ($user) {
                    return time_diff($user->updated_at);
                })
                ->addColumn('action', function ($user) {
                    return view('components.user_dt._action', ['user' => $user]);
                })
                ->rawColumns(['action', 'super_admin'])
                ->toJson();
        }
        return view('manage.admin.index');
    }

    public function create()
    {
        return 'Create Admin Account';
    }

    public function store(Request $request)
    {
        return $request->all();
    }
}
