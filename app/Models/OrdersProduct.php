<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersProduct extends Model
{
    use HasFactory;

    protected $primaryKey = 'orders_product_id';

    protected $fillable = [
        'product_id',
        'order_id',
        'payment_id',
        'quantity',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'payment_id');
    }


}
