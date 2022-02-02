<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'order_id', 'product_id', 'product_name', 'product_price', 'product_sales_quantity'];

    public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
  
}