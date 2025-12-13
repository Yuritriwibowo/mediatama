<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::insert([
            [
                'title' => 'E-Plus Kimia Pendekatan Deep Learning',
                'category' => 'E-PLUS',
                'image' => '/images/kimia.jpg',
                'description' => 'Buku Kimia dengan pendekatan Deep Learning...',
            ],
            [   
                'title' => 'A to Z Menjaga Kesehatan Reproduksi Remaja',
                'category' => 'NON-TEKS',
                'image' => '/images/kesehatan.jpg',
                'description' => 'Panduan menjaga kesehatan reproduksi...',
            ],
            [
                'title' => 'Aku Anak Hebat Seri 5',
                'category' => 'ESENSI',
                'image' => '/images/anak-hebat.jpg',
                'description' => 'Buku PAUD untuk mengembangkan kreativitas...',
            ],
            [
                'title' => 'Aku Anak Kreatif Seri 5',
                'category' => 'ESENSI',
                'image' => '/images/anak-kreatif.jpg',
                'description' => 'Kreativitas anak melalui kegiatan edukatif...',
            ],
        ]);
    }
}
