<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $fillable = [
        'judul',
        'kategori_id',
        'pengarang',
        'tgl_terbit'
    ];
    protected $cast = [
        'tg;_terbit' => 'date'
    ];

    protected $hidden = [
        'kategori_id'
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
