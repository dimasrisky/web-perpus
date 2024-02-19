<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++){
            Buku::create([
                'judul' => 'buku' . $i,
                'kategori_id' => rand(1, 10),
                'pengarang' => 'pengarang' . $i,
                'tgl_terbit' => rand(2000, 2020) . '-' . rand(1, 12) . '-' . rand(1, 30)
            ]);
        }
    }
}
