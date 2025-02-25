<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class ProjectsList extends Component
{
    public function render()
    {
        return view('livewire.pages.projects-list')->layout('layouts.app');;
    }
}
