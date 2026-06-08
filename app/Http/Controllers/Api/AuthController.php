<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    return response()->json([
        'status' => true,
        'message' => 'User Registered Successfully',
        'user' => $user
    ]);
}
//     public function login(Request $request)
// {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required'
//     ]);

//     $user = User::where('email', $request->email)->first();

//     if (!$user || !Hash::check($request->password, $user->password)) {

//         return response()->json([
//             'status' => false,
//             'message' => 'Invalid Email or Password'
//         ], 401);
//     }

//     return response()->json([
//         'status' => true,
//         'message' => 'Login Successful',
//         'user' => $user
//     ]);
// }
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');

    if (!$token = Auth::guard('api')->attempt($credentials)) {

        return response()->json([
            'status' => false,
            'message' => 'Invalid Email or Password'
        ], 401);
    }

    return response()->json([
        'status' => true,
        'message' => 'Login Successful',
        'token' => $token
    ]);
}
public function profile()
{
    return response()->json([
        'status' => true,
        'user' => Auth::guard('api')->user()
    ]);
}
    
}