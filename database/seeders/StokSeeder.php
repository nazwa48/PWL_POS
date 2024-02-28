<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'stok_id' => 1,
                'barang_id' => 1,
                'user_id' => 1,
                'stok_jumlah' => 35,
                'stok_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 2,
                'barang_id' => 2,
                'user_id' => 1,
                'stok_jumlah' => 40,
                'stok_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 3,
                'barang_id' => 3,
                'user_id' => 1,
                'stok_jumlah' => 45,
                'stok_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 4,
                'barang_id' => 4,
                'user_id' => 1,
                'stok_jumlah' => 50,
                'stok_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 5,
                'barang_id' => 5,
                'user_id' => 1,
                'stok_jumlah' => 55,
                'stok_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 6,
                'barang_id' => 6,
                'user_id' => 3,
                'stok_jumlah' => 60,
                'stok_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 7,
                'barang_id' => 7,
                'user_id' => 3,
                'stok_jumlah' => 65,
                'stok_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 8,
                'barang_id' => 8,
                'user_id' => 3,
                'stok_jumlah' => 70,
                'stok_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 9,
                'barang_id' => 9,
                'user_id' => 3,
                'stok_jumlah' => 75,
                'stok_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'stok_id' => 10,
                'barang_id' => 10,
                'user_id' => 3,
                'stok_jumlah' => 80,
                'stok_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];


        DB::table('t_stok')->insert($data);
    }
}
