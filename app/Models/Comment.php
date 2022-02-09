<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable =['id','user_id','product_id','comment', 'rating'];

    public function Customer()
    {
        return $this->belongsTo(Customer::class,'user_id');
    }
}
