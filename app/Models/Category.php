<?php

namespace App\Models;

use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    public function subCategories(){
        $this->hasMany(Subcategory::class, 'category_id');
    }
}
