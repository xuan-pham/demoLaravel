<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
class Account extends Model
{
    use HasFactory;
    protected $table = 'account';
    protected $fillable = ['id','name',	'email','phone','password',	'address','role',	'status'];

    public function scopeSearch($query)
    {
        if($key = request()->keySearch){
            $query= $query->where('name','like','%'.$key.'%');
        }
    }
    public function roleList()
    {
       return $this->hasOne(Role::class,'id','role');
    }
}
