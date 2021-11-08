<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Changepw extends Model
{
    use HasFactory;
    protected $table = 'account';
    protected $fillable = ['id','password'];
}
