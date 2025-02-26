<?php

namespace App\Livewire\Pages\Projects;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectCreate extends Component
{
    public $name;
    public $description;
    public $startDate;
    public $endDate;
    public $price;
    public $owner;

    public function save(){

        $this->validate([
            'name' => 'required|string|max:255',
            'startDate' => 'required', 
        ]);

        try{

            Project::create(
                [
                    'name' => $this->name,
                    'description' => $this->description,
                    'status' => 'pending',
                    'startDate' => $this->startDate,
                    'endDate' => $this->endDate,
                    'price' => $this->price,
                    'owner' => Auth::user()->id,

                ]
            );

            // Redirect with success notification
            session()->flash('success', 'Dados salvos com sucesso!');

            redirect()->route('projects');

        }catch(Exception $e) {

            // Log exception
            report($e);

            // Display error notification
            $this->dispatch('notification', [
                "type" => "error",
                "title" => null,
                "message" => __("Ocorreu um erro ao salvar os dados. Tente novamente.")
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.projects.project-create')->layout('layouts.app');;
    }
}
