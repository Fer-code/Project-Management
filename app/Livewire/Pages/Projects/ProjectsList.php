<?php

namespace App\Livewire\Pages\Projects;

use Livewire\Component;

class ProjectsList extends Component
{
    public function render()
    {
        return view('livewire.pages.projects.projects-list')->layout('layouts.app');
    }
}
