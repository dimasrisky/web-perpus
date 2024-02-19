<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();

        if($users->count() > 0){
            return response()->json([
                'status' => 'success',
                'message' => 'data ditemukan',
                'data' => $users
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'data tidak ditemukan'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'nama' => ['required'],
            'password' => ['required'],
        ]);

        User::create([
            'email' => $request->email,
            'nama' => $request->nama,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'user berhasil dibuat'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->first();
        if($user){
            return response()->json([
                'status' => 'success',
                'message' => 'data berhasil didapat',
                'data' => $user
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'data gagal didapat',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::where('id', $id)->first();

        if($user){
            $user->update([
                
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
