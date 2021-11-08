<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'name',
        'image',
        'price',
        'sale_price',
        'description',
        'image_list',
        'status',
        'category_id',
    ];
    //join 1-1 hasOne
    public function cat()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    //join 1-n hasMany
    public function detail()
    {
       return $this->hasMany(OrderDetail::class,'product_id','id');
    }
    public function scopeSearch($query)
    {
        if ($key = request()->keySearch) {
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
