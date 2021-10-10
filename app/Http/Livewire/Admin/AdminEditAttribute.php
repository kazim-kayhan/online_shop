<?php

namespace App\Http\Livewire\Admin;

use PDO;
use Livewire\Component;
use App\Models\ProductAttribute;

class AdminEditAttribute extends Component
{
    public $name;
    public $att_id;
    protected $rules = ['name'=>'required'];
    public function mount($attribute_id){
        $att = ProductAttribute::find($attribute_id);
        $this->name = $att->name;
        $this->att_id = $att->id;
    }
    public function updated($fields){
        $this->validateOnly($fields);
    }
    public function updateAttribute(){
        $this->validate();
        $att = ProductAttribute::find($this->att_id);
        $att->name = $this->name;
        $att->save();
        session()->flash('message', 'Attribute has been updated successfully.');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-attribute')->layout('layouts.base');
    }
}
