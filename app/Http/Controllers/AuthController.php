<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request){
        
        $loginData = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',           
        ]);
     
        // $user = User::where('email', $request->email)->first();
     
        // dd($user);
        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }
        // if (! Hash::check($loginData)) {
        //     throw ValidationException::withMessages([
        //         'email' => ['The provided credentials are incorrect.'],
        //     ]);
        // }
        // $deToken = $user->createToken("login")->plainTextToken;
        $deToken = auth()->user()->createToken("login")->plainTextToken;
        
        return response([
            'status' => true,
            'message' => 'Berhasil',
            'token' => $deToken
        ], 200);
    }


    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
    }
}
