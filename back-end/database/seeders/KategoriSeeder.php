<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_kategori = [
            'Fiksi',
            'Non-Fiksi',
            'Romantis',
            'Fantasi',
            'Misteri',
            'Sains',
            'Sejarah',
            'Biografi',
            'Self-Help',
            'Pendidikan'
        ];

        foreach($list_kategori as $kategori){
            Kategori::create([
                'nama' => $kategori
            ]);
        }
    }
}
