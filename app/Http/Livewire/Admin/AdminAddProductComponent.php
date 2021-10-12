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

class AdminAddProductComponent extends Component
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
    public $images;
    public $scategory_id;
    public $att;
    public $inputs = [];
    public $att_arr = [];
    public $att_values;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = "0";
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }
    public function add(){
        if(!in_array($this->att,$this->att_arr)){
            array_push($this->inputs, $this->att);
            array_push($this->att_arr, $this->att);
        }
    }
    public function remove($att){
        unset($this->inputs[$att]);
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
            'image' => 'required|mimes:jpeg,png',
            'category_id' => 'required',
        ]);
    }

    public function addProduct()
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
            'image' => 'required|mimes:jpeg,png',
            'category_id' => 'required',
        ]);
        $product = new Product();
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
        $imgName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products', $imgName);
        $product->image = $imgName;

        if ($this->images) {
            $imgsName = '';
            foreach ($this->images as $key => $image) {
                $imgsName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('products', $imgName);
                $imgsName = $imgsName . ',' . $imgName;
            }
            $product->images = $imgsName;
        }

        $product->category_id = $this->category_id;
        if($this->scategory_id){
            $product->subcategory_id= $this->scategory_id;
        }
        $product->save();
        
        foreach($this->att_values as $kay=>$att_value){
            $values = explode(',', $att_value);
            foreach($values as $value){
                $att_value = new AttributeValue();
                $att_value->product_attribute_id = $key;
                $att_value->value = $value;
                $att_value->product_id =$product->id;
                $att_value->save();
            }
        }
        session()->flash('message', 'Product has been created successfully!');
    }

    public function changeSubcategory(){
        $this->scategory_id = 0;
    }
    public function render()
    {
        $categories = Category::all();
        $scategories = Subcategory::where('category_id', $this->category_id)->get();
        $pattributes = ProductAttribute::all();
        return view('livewire.admin.admin-add-product-component', ['categories' => $categories,'scategories'=>$scategories,'pattributes'=>$pattributes])->layout('layouts.base');
    }
}
