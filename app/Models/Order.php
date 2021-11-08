<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = ['name','email','phone','address','note','status','account_id'];
    //join 1-n hasMany
    public function detail()
    {
       return $this->hasMany(OrderDetail::class,'order_id','id');
    }
    public function scopeSearch($query)
    {
        if ($key = request()->keySearch) {
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
