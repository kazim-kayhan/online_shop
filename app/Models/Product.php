<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Favourit;
use App\Models\OrderItem;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }
    public function subCategories()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
}
