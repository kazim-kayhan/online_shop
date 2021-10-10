<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductAttribute;

class AdminAddAttribute extends Component
{
    public $name;
    protected $rules = ['name'=>'required'];
    public function updated($fields){
        $this->validateOnly($fields);
    }
    public function storeAttribute(){
        $this->validate();
        $att = new ProductAttribute();
        $att->name = $this->name;
        $att->save();
        session()->flash('message','Attribute has been added successfully.');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-attribute')->layout('layouts.base');
    }
}
