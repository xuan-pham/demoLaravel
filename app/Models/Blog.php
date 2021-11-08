<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $fillable = ['name', 'image', 'sumaty', 'description', 'status', 'account_id'];
    
    public function author()
    {
        return $this->hasOne(Account::class,'id','account_id');
    }
    public function scopeSearch($query)
    {
        if ($key = request()->keySearch) {
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
