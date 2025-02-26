<?php

namespace App\Livewire\Components\Projects;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use App\Models\Project;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;


class ProjectList extends Component
{
    // Use livewire pagination and remove parameters from visible URL
    use WithPagination, WithoutUrlPagination;

    // Ids of selected items
    public $ids = []; 

    public $itemsSelectable = true;

    // List of ids of items that are already selected
    public $selectedItems;

    // Search filters
    public $search = '';
    public $filterStatus = '';

    public function mount()
    {
        $this->selectedItems = json_decode($this->selectedItems);
    }

    public function render()
    {
        dump($this->filterStatus);
        // Gets items
        $items = Project::search(
            $this->ids, 
            $this->search, 
            $this->filterStatus, 
        );

        return view('livewire.components.projects.project-list', [

            // Querybuilder result, used for pagination
            'items' => $items,
        
        ]);
    }
}
