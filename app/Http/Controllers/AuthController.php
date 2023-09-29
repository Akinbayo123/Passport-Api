<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
//use Doctrine\Inflector\Rules\English\Rules;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $formField = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:9','confirmed'],
        ]);
        $formField['password'] =  Hash::make($request->password);
        $user = User::create($formField);
        $token = $user->createToken('auth_token')->accessToken;
        return response()->json([
            'message'=>'User succesfully created',
            'user' => $user,
            'token' => $token,
        ], 200);
    }
    public function login(Request $request)
    {
        $formField = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();
        if (auth()->attempt($formField)) {
            $token = $user->createToken('auth_token')->accessToken;
            return response()->json([
                'message'=>'Login Succesful',
                'token' => $token,
            ], 200);
        }
        return response()->json([
            'message' => 'The provided credentials are incorrect',
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => "Logged out succesfully",
        ], 200);
    }
}
