<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class UserEditProfile extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $image;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    public $newImage;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->image = $user->profile->image;
        $this->mobile = $user->profile->mobile;
        $this->line1 = $user->profile->line1;
        $this->line2 = $user->profile->line2;
        $this->city = $user->profile->city;
        $this->province = $user->profile->province;
        $this->country = $user->profile->country;
        $this->zipcode = $user->profile->zipcode;
        $this->newImage = $user->profile->newImage;
    }
    public function updateProfile()
    {
        $user = User::find(Auth::user()->id);
        $user->name = $this->name;
        $user->save();
        $user->profile->email = $this->email;
        $user->profile->mobile = $this->mobile;
        $user->profile->line1 = $this->line1;
        $user->profile->line2 = $this->line2;
        $user->profile->city = $this->city;
        $user->profile->province = $this->province;
        $user->profile->country = $this->country;
        $user->profile->zipcode = $this->zipcode;
        if ($this->newImage) {
            if ($this->image) {
                unlink('assets/images/profile/'.$this->image);
            }
            $imageName = now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('profile', $imageName);
            $user->profile->newImage = $imageName;
        }
        $user->profile->save();
        session()->flash('message', 'Profile has been updated successfully!');
    }
    public function render()
    {
        return view('livewire.user.user-edit-profile')->layout('layouts.base');
    }
}
