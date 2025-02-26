<?php

namespace App\Livewire\Components\Projects;

use Livewire\Component;
use App\Models\Project;
use Carbon\Carbon;

class ProjectListItem extends Component
{
    public $project;

    // For deleted items
    public $deletionCountdown = [];
    public $itemPermanentlyDeleted = false;

    public $selectable;

    public $selected = FALSE;

    public function mount()
    {
        // If deleted, count days until removed from trash bin
        if ($this->project['status'] == 'deleted') {
            $deletedAt = Carbon::parse($this->project['updated_at']);
            $deletionDate = $deletedAt->copy()->addDays(30);
            $now = Carbon::now();

            if ($deletionDate->isFuture()) {
                $diffInDays = (int) $now->diffInDays($deletionDate);

                $this->deletionCountdown = [
                    'days' => $diffInDays,
                ];
            } else {
                $this->itemPermanentlyDeleted = true;
            }
        }
    }

    public function render()
    {
        return view('livewire.components.projects.project-list-item');
    }
}
