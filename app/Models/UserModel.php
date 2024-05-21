<?php
// namespace App\Models;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\HasMany;
// use \Illuminate\Foundation\Auth\User as Authenticatable;
// use Tymon\JWTAuth\Contracts\JWTSubject;
// class UserModel extends Authenticatable implements JWTSubject
// {
//     public function getJWTIdentifier()
//     {
//         return $this->getKey();
//     }
//     public function getJWTCustomClaims()
//     {
//         return [];
//     }
//     protected $table = 'm_user';
//     protected $primaryKey = 'user_id';
//     protected $fillable = ['level_id', 'username', 'nama', 'password'];
//     public function level(): BelongsTo
//     {
//         return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
//     }
//     public function stok(): HasMany
//     {
//         return $this->hasMany(StokModel::class, 'user_id', 'user_id');
//     }
//     public function transaksi(): HasMany
//     {
//         return $this->hasMany(TransaksiPenjualanModel::class, 'user_id', 'user_id');
//     }
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Model; use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable implements JWTSubject
{
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username', 
        'nama', 
        'password',
        'level_id', 
        'image' //tambahan
    ];

    public function level() {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    protected function image(): Attribute {
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/' . $image),
        );
    }

}
