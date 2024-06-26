<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;


// class BarangModel extends Model
// {
//     use HasFactory;

//     protected $table = 'm_barang'; //mendefiniskan nama tabel yang digunakan oleh model ini
//     protected $primaryKey = 'barang_id'; //mendefiniskan primary key dari tabel yang digunakan

//     protected $fillable = ['kategori_id','barang_kode','barang_nama','harga_beli','harga_jual'];

//     public function kategori(): BelongsTo
//     {
//         return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
//     }
// }

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;

// class BarangModel extends Model
// {
//     protected $table = 'm_barang';
//     protected $primaryKey = 'barang_id';
    
//     protected $fillable = ['barang_id', 'kategori_id', 'barang_nama', 'harga_beli', 'harga_jual', 'created_at', 'update_at'];
    
//     public function kategori(): BelongsTo
//     {
//         return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
//     }
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class BarangModel extends Model
{
    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';
    
    protected $fillable = ['kategori_id', 'barang_kode','barang_nama', 'harga_beli', 'harga_jual', 'created_at', 'updated_at', 'image'];
    
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/' . $image),
        );
    }
}