<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;

    public function mount()
    {
        $this->status = 0;
    }

    public function addSlide()
    {
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $imgName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('sliders',$imgName);
        $slider->image = $imgName;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message','Slider has been created successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}
