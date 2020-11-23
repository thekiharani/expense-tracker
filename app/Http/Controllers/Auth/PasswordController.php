<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    // construct
    public function __construct()
    {
        $this->middleware('auth');
    }

    // get change password
    public function get()
    {
        return view('auth.passwords.change');
    }

    // post change password
    public function patch(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
            'new_password_confirmation' => ['required']
        ]);
        $user = $request->user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->temp_pass = false;
            $user->save();
            return redirect()->route('manage.dashboard')
                ->with('message', 'Password was successfully changed.');
        }
        return redirect()->back()
                ->with('error', 'The current password provided is incorrect. Please try with correct password.');
    }
}
