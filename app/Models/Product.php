<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'slug', 'category_id', 'sub_category_id', 'brand_id', 'color_id', 'unit_id', 'size_id', 'image', 'original_image', 'purchase_price', 'regular_price', 'sale_price', 'description', 'quantity', 'discount', 'discount_time', 'rating', 'is_offer', 'is_feature_product', 'admin_id', 'status','delivery','product_return','warranty', 'product_area', 'd_commission', 'min_sale_quantity'];

    protected $with = ['unit'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }


    public function getImageAttribute($value)
    {
        return json_decode($value);
    }


    public function getOriginalImageAttribute($value)
    {
        return json_decode($value);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
