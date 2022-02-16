<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'eamil', 'phone', 'amount', 'address', 'address2', 'country', 'state', 'zip', 'status', 'transaction_id', 'currency'];

 


}
