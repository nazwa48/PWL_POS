<?php 
 
namespace App\Models; 
 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
 
class UserModel extends Model 
{ 
    use HasFactory; 
    protected $primaryKey = 'user_id';  
    protected $table = 'm_user'; 
    protected $fillable = ['level_id','username','nama']; 
} 