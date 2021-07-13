<?php

namespace App\Http\Livewire;

use App\Models\TeamMember;
use Livewire\Component;

class AboutComponent extends Component
{
    public function render()
    {
        $team_members = TeamMember::all();
        return view('livewire.about-component',['team_members'=>$team_members])->layout('layouts.base');
    }
}
