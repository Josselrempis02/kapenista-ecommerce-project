<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'name',
        'price',
        'category',
        'description',
        'stock',
    ];

    protected $primaryKey = 'product_id';
}
