<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class AdminSettingComponent extends Component
{
    public $name;
    public $slogan;
    public $developer;
    public $email;
    public $phone;
    public $phone2;
    public $address;
    public $map;
    public $twiter;
    public $facebook;
    public $github;
    public $linkedin;
    public $youtube;

    public function mount()
    {
        $setting = Setting::find(1);
        if($setting)
        {
            $this->name = $setting->name;
            $this->slogan = $setting->slogan;
            $this->developer = $setting->developer;
            $this->email = $setting->email;
            $this->phone = $setting->phone;
            $this->phone2 = $setting->phone2;
            $this->address = $setting->address;
            $this->map = $setting->map;
            $this->twiter = $setting->twiter;
            $this->facebook = $setting->facebook;
            $this->github = $setting->github;
            $this->linkedin = $setting->linkedin;
            $this->youtube = $setting->youtube;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slogan' => 'required',
            'developer' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'phone2' => 'required',
            'address' => 'required',
            'map' => 'required',
            'twiter' => 'required',
            'facebook' => 'required',
            'github' => 'required',
            'linkedin' => 'required',
            'youtube' => 'required',
        ]);
    }

    public function saveSettings()
    {
        $this->validate([
            'name' => 'required',
            'slogan' => 'required',
            'developer' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'phone2' => 'required',
            'address' => 'required',
            'map' => 'required',
            'twiter' => 'required',
            'facebook' => 'required',
            'github' => 'required',
            'linkedin' => 'required',
            'youtube' => 'required',
        ]);

        $setting = Setting::find(1);
        if(!$setting)
        {
            $setting = new Setting();
        }
        $setting->name = $this->name;
        $setting->slogan = $this->slogan;
        $setting->developer = $this->developer;
        $setting->email = $this->email;
        $setting->phone = $this->phone;
        $setting->phone2 = $this->phone2;
        $setting->address = $this->address;
        $setting->map = $this->map;
        $setting->twiter = $this->twiter;
        $setting->facebook = $this->facebook;
        $setting->github = $this->github;
        $setting->linkedin = $this->linkedin;
        $setting->youtube = $this->youtube;
        $setting->save();
        session()->flash('message','Settings has been saved successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-setting-component')->layout('layouts.base');
    }
}
