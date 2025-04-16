<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\Validate;

class ProjectEdit extends Component
{
    #[Validate('required|string|min:3')]
    public string $name = '';

    #[Validate('required|string|min:3')]
    public string $description = '';

    #[Validate('required|in:active,inactive')]
    public string $status = 'active';

    public Project $project;
    public function mount(Project $project): void
    {
        $this->project = $project;
        $this->name = $project->name;
        $this->description = $project->description;
        $this->status = $project->status;
    }

    public function save(): void
    {
        $data = $this->validate();

        $this->project->update($data);

        $this->redirectRoute('projects.index');
    }

    public function render(): View
    {
        return view('livewire.projects.edit');
    }
}
