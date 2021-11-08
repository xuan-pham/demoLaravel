<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banner';
    protected $fillable=['name','image','link','description','status','prioty'];
    //Sử dụng localScope
    public function scopeSearch($query)
    {
        if ($key = request()->keySearch) {
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
