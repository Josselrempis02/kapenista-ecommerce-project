<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    // Specify the table name (optional if it follows Laravel's naming convention)
    protected $table = 'orders';

    // Specify the primary key (optional if it follows Laravel's naming convention)
    protected $primaryKey = 'order_id';

    // Specify the fields that can be mass assigned
    protected $fillable = [
        'admin_id',
        'user_id',
        'payment_id',
        'orderDate',
        'TotalAmount',
        'order_status'
    ];

    // Define the relationship with the Admin model
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'payment_id');
    }
}

