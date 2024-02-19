<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $kategori = Kategori::with('buku')->get();
        if($kategori){
            return response()->json([
                "status" => "success",
                "message" => "data berhasil didapat",
                "data" => $kategori
            ]);
        }else{
            return response()->json([
                "status" => "failed",
                "message" => "data gagal didapat"
            ]);
        }
    }
}
