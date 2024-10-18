<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin;
use App\Models\CategoryModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';
    
    

   
    // Specify the table name (optional if it follows Laravel's naming convention)
    protected $table = 'orders';

    // Specify the primary key (optional if it follows Laravel's naming convention)
    protected $primaryKey = 'order_id';

    // Specify the fields that can be mass assigned
    protected $fillable = [
        'user_id',
        'Name',
        'address',
        'apartment',
        'city',
        'payment_method',
        'gcash_reference_number',
        'gcash_receipt',
        'status',

    ];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}

public function orderProducts()
{
    return $this->hasMany(OrdersProduct::class, 'order_id', 'order_id');
}

public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'id', 'id');
    }
 

  
}

