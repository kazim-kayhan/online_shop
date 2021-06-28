<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourit extends Model
{
    use HasFactory;
    protected $table = "favourits";
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
