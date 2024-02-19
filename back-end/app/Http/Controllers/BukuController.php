<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::with('kategori')->get();
        if($buku->count() > 0){
            return response()->json([
                'status' => 'success',
                'message' => 'data ditemukan',
                'data' => $buku
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
            'judul' => ['required'],
            'kategori_id' => ['required'],
            'pengarang' => ['required'],
            'tgl_terbit' => ['required']
        ]);

        if(Buku::create($request->all())){
            return response()->json([
                'status' => 'success',
                'message' => 'Buku telah berhasil dibuat'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = Buku::where('id', $id)->first();
        if($buku){
            return response()->json([
                'status' => 'success',
                'message' => 'data berhasil didapat',
                'data' => $buku
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
        $buku = Buku::where('id', $id);
        if($buku){
            $buku->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'data berhasil di update',
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'data gagal di update',
            ]);
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::where('id', $id);
        if($buku){
            Buku::destroy($id);
            return response()->json([
                'status' => 'success',
                'message' => 'data berhasil di hapus',
            ]);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'data gagal di hapus',
            ]);
        }
        
    }
}
