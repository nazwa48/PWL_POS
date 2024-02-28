<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'C001',
                'barang_nama' => 'Panci Masak',
                'harga_beli' => 50000,
                'harga_jual' => 75000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 5,
                'barang_kode' => 'C002',
                'barang_nama' => 'Lose Powder',
                'harga_beli' => 1000000,
                'harga_jual' => 1500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 1,
                'barang_kode' => 'C003',
                'barang_nama' => 'Setrika Uap',
                'harga_beli' => 200000,
                'harga_jual' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 5,
                'barang_kode' => 'C004',
                'barang_nama' => 'Mascara',
                'harga_beli' => 250000,
                'harga_jual' => 275000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 2,
                'barang_kode' => 'C005',
                'barang_nama' => 'Raket Badminton',
                'harga_beli' => 100000,
                'harga_jual' => 125000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 2,
                'barang_kode' => 'C006',
                'barang_nama' => 'Sepatu Olahraga',
                'harga_beli' => 250000,
                'harga_jual' => 300000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 3,
                'barang_kode' => 'C007',
                'barang_nama' => 'Novel Fiksi',
                'harga_beli' => 50000,
                'harga_jual' => 75000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 3,
                'barang_kode' => 'C008',
                'barang_nama' => 'Buku Komputer',
                'harga_beli' => 75000,
                'harga_jual' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 4,
                'barang_kode' => 'C009',
                'barang_nama' => 'Barbie',
                'harga_beli' => 125000,
                'harga_jual' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 4,
                'barang_kode' => 'C010',
                'barang_nama' => 'Boneka Teddy Bear',
                'harga_beli' => 50000,
                'harga_jual' => 75000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        
        DB::table('m_barang')->insert($data);
        
        
    }
}
