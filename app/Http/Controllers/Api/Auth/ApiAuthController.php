<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ApiAuthController extends Controller
{
    // register
    public function register(Request $request)
    {
        $userData = $request->validate([
            "name" => "required|string",
            "email" => "required|string|email|unique:users",
            "phone_number" => "required|digits:10|unique:users",
            "type" => "sometimes|string",
            "password" => "required|string"
        ]);
        $userData["password"] = Hash::make($request->input("password"));
        $user = User::forceCreate($userData);
        return response()->json(["message" => "User account created!", "user" => $user], 201);
    }

    // login
    public function login(Request $request)
    {
        $request->validate([
            "username" => "required|string",
            "password" => "required|string"
        ]);

        $user = User::where('email', $request->username)
                ->orWhere('phone_number', $request->username)
                ->first();

            if ($user &&
                Hash::check($request->password, $user->password)) {
                $user->tokens()->delete();
                $token = $user->createToken("personal-access")->plainTextToken;
                return response()->json([
                    "access_token" => explode('|', $token)[1],
                    "token_type" => "Bearer"
                ], 200);
            }
            return response()->json(["message" => "Authentication failed! Please make sure you are using correct credentials."], 401);
    }

    // update
    public function update(Request $request)
    {
        $updateData = $request->validate([
            "name" => ["required", "string"],
            "email" => [
                "required", "string", "email",
                Rule::unique('users')->ignore($request->user()->id),
            ],
            "phone_number" => [
                "required", "digits:10",
                Rule::unique('users')->ignore($request->user()->id),
                ],
            "type" => ["sometimes", "string"]
        ]);
        $request->user()->update($updateData);
    return response()->json(["message" => "User account was successfully updated."], 200);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(["message" => "You have been successfully logged out."], 200);
    }

    // Authenticated
    public function user(Request $request)
    {
        return response()->json(['user' => $request->user()], 200);
    }
}
