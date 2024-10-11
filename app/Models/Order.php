<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin;
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
        'user_id',
        'first_name',
        'last_name',
        'address',
        'apartment',
        'city',
        'payment_method',
    ];

 

  
}

