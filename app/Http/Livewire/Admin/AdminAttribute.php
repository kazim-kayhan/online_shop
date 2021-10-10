<?php

namespace App\Http\Livewire\Admin;

use Attribute;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductAttribute;

class AdminAttribute extends Component
{
    use WithPagination;
    public function deleteAttribute($id){
    $att = ProductAttribute::find($id);
    $att->delete();
    session()->flash('message', 'Attribute has been deleted successfully.');
    }
    public function render()
    {
        $pattributes = ProductAttribute::paginate(10);
        return view('livewire.admin.admin-attribute',['pattributes'=>$pattributes])->layout('layouts.base');
    }
}
