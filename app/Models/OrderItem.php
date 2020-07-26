<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['user_id', 'order_id', 'product_id', 'quantity', 'price', 'size', 'color', 'admin_id', 'order_status', 'status',  'is_return', 'created_at', 'updated_at'];

    protected $with = ['product'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
