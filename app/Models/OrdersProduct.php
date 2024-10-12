<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersProduct extends Model
{
    use HasFactory;

    protected $table = 'orders_product';

    protected $primaryKey = 'orders_product_id';

    protected $fillable = [
        'order_id',
        'product_id',
        'size',
        'quantity',
        'price',
        'total_price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

   

    



}
