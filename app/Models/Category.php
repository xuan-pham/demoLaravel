<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['name', 'status', 'prioty'];

    public function ProductTotal()
    {
        return $this->hasMany(Product::class, "category_id", "id");
    }
    //Sử dụng localScope
    public function scopeSearch($query)
    {
        if ($key = request()->keySearch) {
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
