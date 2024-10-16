<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; 

    protected $primaryKey = 'product_id';

    protected $fillable = ['name', 'description', 'category_id', 'stock', 'price', 'img'];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }
    
}
