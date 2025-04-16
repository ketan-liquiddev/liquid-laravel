<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Validate;

class ProjectCreate extends Component
{
    #[Validate('required|string|min:3')]
    public string $name = '';

    #[Validate('required|string|min:3')]
    public string $description = '';

    #[Validate('required|in:active,inactive')]
    public string $status = 'active';

    public function save(): void
    {
        $data = $this->validate();
        //$data['user_id'] = Auth::id();

        Project::create($data);

        $this->redirectRoute('projects.index');
    }

    public function render(): View
    {
        return view('livewire.projects.create');
    }
}
