<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function favourit(){
        return $this->hasMany(Favourit::class);
    }
}
