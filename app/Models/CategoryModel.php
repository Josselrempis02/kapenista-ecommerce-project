<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'category';

    // Add relationships if needed
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

}
