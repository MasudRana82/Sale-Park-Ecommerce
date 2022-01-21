<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable=['id','cat_id','name','description','status'];
    
    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }
}
