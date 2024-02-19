<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);


        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('token');
            return response()->json([
                "status" => "success",
                "message" => "login sukses",
                "token" => $token->plainTextToken
            ]);
        }else{
            return response()->json([
                "status" => "failed",
                "message" => "login gagal"
            ]);
        }
    }

    public function createUser(Request $request){
        $request->validate([
            'nama' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Anda sudah terdaftar'
        ]);
    }

    public function logout(Request $request){
        $user = $request->user();
        $user->currentAccessToken()->delete();
    }
}
