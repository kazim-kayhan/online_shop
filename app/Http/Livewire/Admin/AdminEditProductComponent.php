<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\AttributeValue;
use App\Models\ProductAttribute;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $newimage;
    public $product_id;

    public $images;
    public $newimages;
    public $scategory_id;

    public $attr;
    public $inputs =[];
    public $attr_arr = [];
    public $attr_values = [];

    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->images = explode(',', $product->images);
        $this->category_id = $product->category_id;
        $this->product_id = $product->id;
        $this->scategory_id = $product->subcategory_id;
        $this->inputs = $product->attributeValues->where('product_id', $product->id)->unique('product_attribute_id')->pluck('product_attribute_id');
        $this->attr_arr = $product->attributeValues->where('product_id', $product->id)->unique('product_attribute_id')->pluck('product_attribute_id');

        foreach ($this->attr_arr as $a_arr) {
            $allAttrValue = AttributeValue::where('product_id', $product->id)->where('product_attribute_id', $a_arr)->get()->pluck('value');
            
            $valueString = '';
            foreach ($allAttrValue as $value) {
                $valueString .= $value .',';
            }
            $this->attr_values[$a_arr]= rtrim($valueString, ',');
        }
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function add(){
        if(!in_array($this->attr_arr,$this->attr)){
            array_push($this->inputs, $this->attr);
            array_push($this->attr_arr, $this->attr);
        }
    }
    
    public function remove($attr){
        unset($this->inputs[$attr]);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'newimage' => 'required|mimes:jpeg,png',
            'category_id' => 'required',
        ]);
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'newimage' => 'required|mimes:jpeg,png',
            'category_id' => 'required',
        ]);
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        if ($this->newimage) {
            unlink('assets/images/products/' . $product->image);
            $imgName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('products', $imgName);
            $product->image = $imgName;
        }
        if ($this->newimages) {
            if ($product->images) {
                $images = explode(',', $product->images);
                foreach ($images as $image) {
                    if ($image) {
                        unlink('assets/images/products/' . $image);
                    }
                }
            }
            $imagesname = '';
            foreach ($this->newimages as $key => $image) {
                $imgName = Carbon::now()->timestamp .$key. '.' . $image->extension();
                $image->storeAs('products', $imgName);
                $imagesname = $imagesname. ','. $imgName;
            }
            $product->images = $imagesname;
        }
        $product->category_id = $this->category_id;
        if ($this->scategory_id) {
            $product->subcategory_id= $this->scategory_id;
        }
        $product->save();

        AttributeValue::where('product_id', $product->id)->delete();
        foreach ($this->attr_values as $key=>$attr_value) {
            $values = explode(',', $attr_value);
            foreach($values as $value){
                $attr_val = new AttributeValue();
                $attr_val->product_attribute_id = $key;
                $attr_val->value = $value;
                $attr_val->product_id = $product->id;
                $attr_val->save();
            }
        }
        session()->flash('message', 'Product has been updated successfully!');
    }
    public function changeSubcategory()
    {
        $this->scategory_id = 0;
    }
    public function render()
    {
        $categories = Category::all();
        $scategories = Subcategory::where('category_id', $this->category_id)->get();
        $pattributes = ProductAttribute::all();
        return view('livewire.admin.admin-edit-product-component', ['categories' => $categories,'scategories'=>$scategories,'pattributes'=>$pattributes])->layout('layouts.base');
    }
}
