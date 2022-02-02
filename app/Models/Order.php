<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'cus_id', 'shipping_id', 'pay_id', 'total', 'status'];

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'cus_id');   //here 'cus_id' is foreignkey. 
    }
    public function Shipping()
    {
        return $this->belongsTo(Shipping::class, 'shipping_id');   //here 'shipping_id' is foreignkey. 
    }
    public function Payment()
    {
        return $this->belongsTo(Payment::class, 'pay_id');   //here 'pay_id' is foreignkey. 
    }

}

