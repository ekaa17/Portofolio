<?php

namespace Database\Seeders;

use App\Models\Product; // Sesuaikan dengan namespace model yang benar
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'nama_product' => 'Sepatu Adidas',
            'harga_product' => 1000000.00,
            'jenis_product' => 'Sepatu',
            'gambar_product' => 'shop_1.jpg'
        ]);

        Product::create([
            'nama_product' => 'Sepatu Gazhele',
            'harga_product' => 1000000.00,
            'jenis_product' => 'Sepatu',
            'gambar_product' => 'shop_2.jpg'
        ]);

        Product::create([
            'nama_product' => 'Sepatu Nike',
            'harga_product' => 1000000.00,
            'jenis_product' => 'Sepatu',
            'gambar_product' => 'shop_3.jpeg'
        ]);

        Product::create([
            'nama_product' => 'Sepatu Nike',
            'harga_product' => 1000000.00,
            'jenis_product' => 'Sepatu',
            'gambar_product' => 'shop_4.jpeg'
        ]);
    }
}
