<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_quantity', 'total_price', 'is_paid', 'txid', 'payment_gateway_id', 'order_status', 'address', 'shipping_cost', 'coupon_discount', 'status', 'is_return', 'created_at', 'updated_at'];

    protected $with = ['order_items'];


    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment_gateway()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function upazilla()
    {
        return $this->belongsTo(Upazilla::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
